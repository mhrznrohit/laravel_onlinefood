@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('category.show', ['slug' => $item->category->slug]) }}">{{ $item->category->title }}</a></li>
           
              <li class="breadcrumb-item active" aria-current="page">{{ $item->title }}</li>
            </ol>
          </nav>
        </div>
      </div>
    <div class="row">
        <div class="col-md-5">
            <div class=" mt-0">
                <h5>ITEM DETAILS</h5>
                <hr>
                <p class="mb-0"></p>
            </div><!-- / project-info-box -->
           
                
            @if ($item)
                
            
            <div class="project-info-box">
                <p><b>Title:</b> {{ $item->title }}</p>
                <p><b>Description:</b> {!! html_entity_decode($item->description) !!}</p>
                
                <p><b>Price:</b> {{ $item->price }}</p>
                
                <p class="card-text"><small class="text-muted">Updated {{ $item->updated_at->diffForHumans() }}</small></p>
                {{-- @if(Auth::check()) --}}

                <form method="post">
                    @csrf
                <input type="hidden" class="product-quantity" value="{{ $item->id }}" name="item_id" id="item_id">
                <input type="submit" value="Add To Cart" class="btn btn-dark"/>
                  
                </form>
               {{-- @else
                  <a href="{{route ("login")}}" class="btn btn-dark">ADD TO CART</a>
                @endif   --}}
            </div><!-- / project-info-box -->
          
            @endif
        </div><!-- / column -->

        <div class="col-md-7">
           
            @php
                    $images = json_decode($item->image);
                @endphp
                @foreach($images as $img)
                    <img src="{{ asset('storage/user/' . $img) }}" class="card-img-top" class="rounded" style="height:300px; width:400px;"/>
                @endforeach
            <div class="">
                <p><b>Categories: <a href="{{ route('category.show', ['slug' => $item->category->slug]) }}" class=" float-right" style="padding:10px;">{{ $item->category->title }}</a></b> </p>
                
               
            </div><!-- / project-info-box -->
        </div><!-- / column -->
    </div>
</div>


    

@endsection