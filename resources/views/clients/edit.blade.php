@extends('layouts.app')

@section('content')
<div class="content">
    <h1 class="page-title"> Edit Client</h1>
    <form action="{{ route('clients.update', $client->id) }}" method="POST" class="form-card">
        @csrf @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" value="{{ $client->name }}" required>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $client->email }}" required>

        <label>Phone:</label>
        <input type="text" name="phone" value="{{ $client->phone }}" required>

        <button type="submit" class="btn btn-success"> Update</button>
    </form>
</div>
@endsection
