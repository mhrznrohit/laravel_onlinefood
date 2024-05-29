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

      </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
      <tr>
        <th scope="row">{{ $item->id }}</th>
        <td>{{ $item->title }}</td>
        <td>{{ $item->price }}</td>
        <td>{{ $item->created_at }}</td>
        <td>{{ $item->category->title }}</td>
      </tr>
      @endforeach
    </tbody>
</table>
@endsection