<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Income;
use App\Models\Expense;
use App\Models\Transfer;
use Illuminate\Http\Request;
use App\Models\IncomeCategory;
use App\Models\ExpenseCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class TransferController extends Controller
{
    public function index()
{
    $transfers = Transfer::where('sender_id', auth()->id())
                    ->orWhere('receiver_id', auth()->id())
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);
    return view('admin.transfers.index', compact('transfers'));
}
public function create()
{
    $subusers = User::where('parent_user_id', auth()->id())->get();
    $parentUser = User::find(auth()->user()->parent_user_id); // Get the parent user
    return view('admin.transfers.create', compact('subusers', 'parentUser'));
}



public function store(Request $request)
{
    $sender = Auth::user();
    $receiver = User::find($request->receiver_id);
    
    $expenseCategory = ExpenseCategory::create([
        'name' => 'Transfer to ' . $receiver->name,
        'user_id' => $sender->id,
    ]);
    
    $date = Carbon::now();
    $formattedDate = $date->format('Y-m-d');
    $expense = new Expense();
    $expense->user_id = $sender->id;
    $expense->expense_category_id = $expenseCategory->id;
    $expense->amount = $request->amount;
    $expense->entry_date = $formattedDate;
    $expense->description = 'Transfer to ' . $receiver->name;
    $expense->save();

    $incomeCategory = IncomeCategory::create([
        'name' => 'Transfer from ' . $sender->name,
        'user_id' => $receiver->id,
    ]);

    
    $income = new Income();
    $income->user_id = $receiver->id;
    $income->income_category_id = $incomeCategory->id;
    $income->amount = $request->amount;
    $income->entry_date = $formattedDate;
    $income->description = 'Transfer from ' . $sender->name;
    $income->save();

    $transfer = new Transfer();
    $transfer->sender_id = $sender->id;
    $transfer->receiver_id = $receiver->id;
    $transfer->amount = $request->amount;
    $transfer->description = 'Transfer from ' . $sender->name . ' to ' . $receiver->name ;
    $transfer->save();


    return redirect()->route('admin.transfers.index')->with('success', 'Transfer successful!');
}


}
?>