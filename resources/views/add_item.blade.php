@extends('layouts.admin_layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add Items') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('additem') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Title:</label>
                            <input type="text" name="title">
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <input type="text" name="description">
                            <textarea name="description"></textarea>
    <script>
        // Initialize CKEditor
        ClassicEditor
            .create(document.querySelector('textarea'))
            .then(description => {
                console.log('Editor was initialized', editor);
            })
            .catch(error => {
                console.error('Error during initialization of the editor', error);
            });
    </script>
                        </div>
                        <div class="form-group">
                            <label>Price:</label>
                            <input type="number" name="price">
                        </div>
                        <div class="form-group">
                            <label>Category:</label>
                            <select name="category_id" id="category_id">
                                @foreach($categories as $id => $title)
                                    <option value="{{ $id }}">{{ $title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image:</label>
                            <input type="file" class="form-control" name="image[]" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
