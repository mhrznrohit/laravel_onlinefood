@extends('layouts.app')


@section('content')

<div class="container">
    
    <br>
    
    <div class="row">
        {{-- Card section begins --}}
        <div class="card-group">
            @foreach ($items as $item)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    @php
                        $images = json_decode($item->image);
                    @endphp
                    @if (!empty($images))
                        <img src="{{ asset('storage/user/' . $images[0]) }}" class="card-img-top" style="height: 300px; width: auto; padding: 10px;" alt="{{ $item->title }}">
                    @else
                        <img src="{{ asset('path/to/default-image.jpg') }}" class="card-img-top" style="height: 300px; width: auto; padding: 10px;" alt="Default Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <h4 class="card-title">{{ $item->category->title }}</h4>
                        <h5 class="card-title">Rs. {{ $item->price }}</h5>
                       
                        
                        {{-- @auth --}}
                        <form method="post">
                            @csrf
                        <input type="hidden" class="product-quantity" value="{{ $item->id }}" name="item_id" id="item_id">
                        <input type="submit" value="Add To Cart" class="btn btn-dark"/>
                        {{-- @endauth --}}
                        <a href="{{ route('items.show', ['slug' => $item->slug]) }}" class="btn btn-dark  float-right" style="padding:10px;">View More</a>
                        </form>
                       
                        <br>
                        
                        <p class="card-text"><small class="text-muted">Updated {{ $item->updated_at->diffForHumans() }}</small></p>
                    </div>
                </div>
            </div>
            @endforeach
        
        </div>
    </div>
       
    {{-- card section ends --}}
    
</div>
@endsection
