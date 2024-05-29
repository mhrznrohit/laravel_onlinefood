@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Image slider begin -->
    {{-- <div id="carouselExampleCaptions" class="carousel slide mb-5" data-ride="carousel" style="height: 550px;">
        <ol class="carousel-indicators">
            @foreach ($items as $key => $item)
                <li data-target="#carouselExampleCaptions" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($items as $key => $item)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    @php
                        $scrolls = json_decode($item->image);
                    @endphp
                    @foreach($scrolls as $scroll)
                        <img src="{{ asset('storage/user/' . $scroll) }}" style="height: 400px; width: 400px;"/>
                    @endforeach
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div> --}}
    <!-- Image slider end -->
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
                        <p class="card-text">{{ Str::limit($item->description, 10) }}</p>
                        <a href="{{ route('items.show', ['slug' => $item->slug]) }}" class="btn btn-dark btn-sm float-right" style="padding:10px;">View More</a>
                        <p class="card-text"><small class="text-muted">Updated {{ $item->updated_at->diffForHumans() }}</small></p>
                    </div>
                </div>
            </div>
            @endforeach
        
        </div>
    </div>
       <div class="">{{ $items->links() }}</div>
    {{-- card section ends --}}
    
</div>
@endsection
