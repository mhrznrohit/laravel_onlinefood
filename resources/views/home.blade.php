@extends('layouts.app')

@section('content')

<div class="container">
    
    <br>
    
    <div class="row">
        {{-- Card section begins --}}
        <div class="card-group">
            @if($items)
                @foreach ($items as $item)
                    <x-product :item="$item"/>
                @endforeach
            @endif
        </div>
    </div>
       
    {{-- card section ends --}}
    
</div>
@endsection
