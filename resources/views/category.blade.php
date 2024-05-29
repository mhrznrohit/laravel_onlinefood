@extends('Layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- card section begins --}}
        <div class="card-group">
            
            @foreach ($category->items as $item)
            <div class="col-md-3" >
                <div class="card">
                    @php
                        $images = json_decode($item->image);
                    @endphp
                    @foreach($images as $img)
                       
                    <img src="{{ asset('storage/user/' . $img) }}" class="card-img-top" style="height: 300px; width: auto; padding: 10px;"/>
                    @endforeach
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <h4 class="card-title">{{ $item->category->title }}</h4>
    
                        <p class="card-text">{{ $item->description }}</p>
                        <a href="{{ route('items.show', ['slug' => $item->slug]) }}" class="btn btn-dark btn-sm float-right" style="padding:10px;">View More</a>
                        {{-- <p class="card-text"><small class="text-muted">Updated {{ $item->updated_at->diffForHumans() }}</small></p> --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
      </div>    
</div>
@endsection