<!-- resources/views/components/product-card.blade.php -->

@props(['item'])

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

        <div class="d-flex gap-2">

            {{-- @auth --}}
            <form method="post">
                @csrf
                <input type="hidden"  value="{{ $item->id }}" name="item_id" id="item_id">
                <input type="submit" value="Add To Cart" class="btn btn-dark"/>
            </form>
            {{-- @endauth --}}

            <a href="{{ route('items.show', ['slug' => $item->slug]) }}" class="btn btn-dark float-right" style="padding:10px;">View More</a>
        </div>
            <br>
            <p class="card-text"><small class="text-muted">Updated {{ $item->updated_at->diffForHumans() }}</small></p>
        </div>
    </div>
</div>
