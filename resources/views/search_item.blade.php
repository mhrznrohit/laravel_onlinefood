@extends('Layouts.app')

@section('content')

@if (count($results) > 0  )
<ul>
    @foreach ($results as $result)
        <li>{{ $result->title }}</li>

        <x-product :item="$item"/>
    @endforeach
</ul>


@else
<p>No results found.</p>
@endif 

@endsection