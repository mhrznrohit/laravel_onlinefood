@extends('Layouts.app');

@section('content')



<div class="container mt-1">

    <div class="row">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('contact.form') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Address:</label>
                <input type="text" name="address" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Description:</label>
                <input type="text" name="description" class="form-control" required>
            </div>
            <br>
            
            <button type="submit" class="btn btn-primary">Send Mail</button>
        </form>
    </div>


</div>
@endsection