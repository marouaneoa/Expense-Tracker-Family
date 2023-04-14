@extends('layouts.admin')

@section('content')
   <div class="container">
    <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('Incomes') }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('admin.incomes.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">{{ __('New') }}</span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Income Name</th>
                        <th>Income Category</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th class="text-center" style="width: 30px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($incomes as $income)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ route('admin.incomes.show', $income) }}">{{ $income->description}}</a></td>
                            <td>{{$income->income_category->name }}</td>
                            <td>{{ 'DZD'  . ' ' . number_format($income->amount, 0, ',', '.') }}</td>
                            <td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $income->entry_date)->format('d, M Y') }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.incomes.edit', $income) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form onclick="return confirm('are you sure !')" action="{{ route('admin.incomes.destroy', $income) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="12">No income found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="12">
                                <div class="float-right">
                                    {!! $incomes->appends(request()->all())->links() !!}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <p class="text-right"> Total Income : @php $user = Auth::user();
                $totalIncome = $user->totalIncome();
                echo $totalIncome;
                @endphp DA &nbsp;</p>
                <p class="text-right ">Current Balance: @php $user = Auth::user();
                    echo $user->balance();
                    @endphp DA &nbsp;
                </p>
            </div>
        </div>
   </div>
@endsection
