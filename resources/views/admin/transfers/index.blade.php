
@extends('layouts.admin')

@section('content')
   <div class="container">
    <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('Transfers') }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('admin.transfers.create') }}" class="btn btn-primary">
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
                        <th>Sender</th>
                        <th>Receiver</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($transfers as $transfer)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transfer->sender->name }}</td>
                            <td>{{ $transfer->receiver->name }}</td>
                            <td>{{  number_format($transfer->amount, 0, ',', '.') . ' DA' }}</td>
                            <td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $transfer->created_at->toDateString())->format('d, M Y') }}
                            </td>
                           
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="12">No transfers found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="12">
                                <div class="float-right">
                                    {!! $transfers->appends(request()->all())->links() !!}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
   </div>
@endsection
