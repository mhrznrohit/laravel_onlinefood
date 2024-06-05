@extends('Layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- card section begins --}}
        <div class="card-group">
            
            @foreach ($category->items as $item)
            <x-product :item="$item"/>
            @endforeach
        </div>
      </div>    
</div>
@endsection