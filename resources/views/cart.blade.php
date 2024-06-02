@extends('layouts.app')

@section('content')
    @php
        $totalQuantity = 0;
        $totalPrice = 0;
    @endphp
    
    @if(session('cart'))
        @foreach(session('cart') as $item)
            @php
                $quantity = isset($item['quantity']) ? $item['quantity'] : 0;
                $price = isset($item['price']) ? $item['price'] : 0;
                $totalQuantity += $quantity;
                $totalPrice += $price * $quantity;
            @endphp
        @endforeach
    @endif

    <table id="cart" class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if(session('cart'))
                @foreach(session('cart') as $id => $item)
                    @php
                        $quantity = isset($item['quantity']) ? $item['quantity'] : 0;
                        $price = isset($item['price']) ? $item['price'] : 0;
                    @endphp
                    <tr rowId="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $item['title'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ $price }}</td>
                        <td data-th="Quantity">{{ $quantity }}</td>
                        <td data-th="Subtotal" class="text-center">${{ $price * $quantity }}</td>
                        <td class="actions">
                            <form method="POST" action="{{ route('cart.delete', $id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2"></td>
               
                <td class="text-center"><strong>Total Price: ${{ $totalPrice }}</strong></td>
                <td class="text-right">
                    <a href="{{ url('/') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                    @if(Auth::check())
                    <a href="{{route('checkout.index')}}"> <button class="btn btn-danger">Checkout</button></a>

                    @else

                    <a href="{{ url('/login') }}"> <button class="btn btn-danger">Checkout</button></a>
                    @endif

                </td>
            </tr>
        </tfoot>
    </table>
@endsection
