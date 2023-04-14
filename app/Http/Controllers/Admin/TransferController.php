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
public function create()
{
    // dd('test');
    $subusers = User::where('parent_user_id', auth()->id())->get();
    // return 'test';
    return view('admin.transfers.create', compact('subusers'));
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

    return redirect()->route('admin.transfers.create')->with('success', 'Transfer successful!');
}


}
?>