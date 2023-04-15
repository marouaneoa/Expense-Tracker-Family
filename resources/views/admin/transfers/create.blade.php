@extends ('layouts.admin')

@section ('content')
<div class="card shadow">
    <div class="card-body">
<form action="{{ route('admin.transfer.store') }}" method="POST" style="margin-left: 25px; ">
    @csrf
    <div class="form-group">
        <label for="amount">Amount</label>
        <input type="number" name="amount" id="amount" class="form-control"  required>
    </div>

    <div class="form-group">
        <label for="receiver_id">Receiver</label>
        <select name="receiver_id" id="receiver_id" class="form-control"  required>
            <option value="">Select a user</option>
            @foreach(auth()->user()->subusers as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
            @if (isset($parentUser))
                <option value="{{ $parentUser->id }}">{{ $parentUser->name }}</option>
            @endif
        </select>
    </div>  

    <button type="submit" class="btn btn-primary">Transfer</button>
</form>
    </div>
</div>
@endsection