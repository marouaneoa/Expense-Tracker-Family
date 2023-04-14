@extends ('layouts.admin')

@section ('content')
<form action="{{ route('admin.transfer.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="amount">Amount</label>
        <input type="number" name="amount" id="amount" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="receiver_id">Receiver</label>
        <select name="receiver_id" id="receiver_id" class="form-control" required>
            <option value="">Select a sub-user</option>
            @foreach(auth()->user()->subusers as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Transfer</button>
</form>
@endsection