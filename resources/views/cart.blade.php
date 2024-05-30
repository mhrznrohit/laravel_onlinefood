@extends('layouts.app')

@section('content')

<table id="cart" class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $item)
                
                <tr rowId="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            {{-- <div class="col-sm-3 hidden-xs"><img src="{{ isset($item['poster']) ? $item['poster'] : 'N/A' }}" class="card-img-top"/></div> --}}
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $item['title'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $item['price'] }}</td>
                   
                    <td data-th="Subtotal" class="text-center">Total</td>
                    <td class="actions">
                        <a class="btn btn-outline-danger btn-sm delete-item">Delete</a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <a href="#" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <button class="btn btn-danger">Checkout</button>
            </td>
        </tr>
    </tfoot>
</table>
@endsection