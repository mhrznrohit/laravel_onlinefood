@extends('layouts.admin_layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Items') }}</div>

                <div class="card-body">
                    <form action="{{ route('item.update', $item->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $item->title) }}" required><br><br>
                    
                        <label for="description">Description:</label><br>
                        <textarea id="description" name="description" required>{{ old('description', $item->description) }}</textarea><br><br>
                    
                        <label for="category_id">Category:</label>
                        <select id="category_id" name="category_id" required>
                            @foreach($categories as $key => $value)
                                <option value="{{ $key }}" {{ old('category_id', $item->category_id) == $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select><br><br>
                    
                        <label for="price">Price:</label>
                        <input type="number" id="price" name="price" value="{{ old('price', $item->price) }}" required><br><br>
                    
                        <label for="status">Status:</label>
                        <select id="status" name="status" required>
                            <option value=1 {{ old('status', $item->status) == 1 ? 'selected' : '' }}>Active</option>
                            <option value=0 {{ old('status', $item->status) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select><br><br>
                    
                        <label for="image">Image:</label>
                        <input type="file" id="image" name="image[]" multiple><br><br>
                    
                        @if ($item->image)
                            <label>Current Images:</label><br>
                            @foreach(json_decode($item->image) as $image)
                            
                            <img src="{{ Storage::url($image) }}" alt="item image" style="max-width: 200px; max-height: 200px; margin-bottom: 10px;">
                            @endforeach
                            <br><br>
                        @endif
                    
                        <button type="submit" class="btn btn-primary" id="updateButton">Update Item</button>

                        <div class="alert alert-success mt-3" id="successMessage" style="display: none;">
                            Updated successfully
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('updateButton').addEventListener('click', function() {
        // Perform the update operation here (e.g., AJAX request, form submission, etc.)

        // Display the success message
        document.getElementById('successMessage').style.display = 'block';
    });
</script>

@endsection
