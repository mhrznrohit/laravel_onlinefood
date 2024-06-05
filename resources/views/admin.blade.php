@extends('layouts.admin_layout')

@section('content')
<table class="table" >
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        <th scope="col">Cagtegory</th>
        <th scope="col">Created </th>
        <th scope="col">Action </th>

      </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
      <tr>
        <th scope="row">{{ $item->id }}</th>
        <td>{{ $item->title }}</td>
        <td>{{ $item->price }}</td>
        <td>{{ $item->category->title }}</td>
        <td>{{ $item->created_at }}</td>
        <td>
          {{-- <form method="delete">
            
            @csrf
        <input type="hidden"  value="{{ $item->id }}" name="item_id" id="item_id">
        <input type="submit" value="Delete" class="btn btn-danger"/>
          
        </form> --}}
       <a href="{{route('form.update', ['id' => $item->id])}}">
       
          <button type="submit" class="btn btn-primary">Edit</button>
      
        </a>
        <form method="POST" action="{{ route('item.delete', ['id' => $item->id]) }}">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
      </form>
      
        </td>
        
      </tr>
      @endforeach
    </tbody>
</table>
@endsection