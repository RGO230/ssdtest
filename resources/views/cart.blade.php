@extends('layouts.app')

@section('content')
@if(count($products))
@php
$cartCost=0;
@endphp
<div class="hero-wrap hero-bread" style="background-image: url('{{ asset('assets/images/bg_6.jpg') }}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Cart</span></p>
                <h1 class="mb-0 bread">My Cart</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            @foreach($products as $product)
                            @php
                            $itemPrice=$product->price;
                            $itemQuantity=$product->pivot->quantity;
                            $itemCost=$itemPrice*$itemQuantity;
                            $cartCost=$cartCost+$itemCost;
                            @endphp
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a>
                                </td>

                                <td class="image-prod">
                                    <div class="img" style="background-image:url({{$product->cover}});"></div>
                                </td>

                                <td class="product-name">
                                    <h3>{{$product->title}}</h3>
                                </td>

                                <td class="price">{{$itemPrice}}</td>

                                <td class="quantity">
                                    <div class="input-group mb-3">
                                        <input type="text" name="quantity" class="quantity form-control input-number" value="{{$itemQuantity}}" min="1" max="100">
                                    </div>
                                </td>
                                @endforeach
                                <td class="total">{{$cartCost}}/td>
                            </tr><!-- END TR-->
                            @else
                            <p> Корзина пуста </p>
                            @endif

                            <a href="/cart/checkout" class="btn btn-primary py-3 px-4">Proceed to Checkout</a>
                            </p>
                </div>
            </div>
        </div>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        var quantitiy = 0;
        $('.quantity-right-plus').click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            // If is not undefined
            $('#quantity').val(quantity + 1);
            // Increment
        });

        $('.quantity-left-minus').click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            // If is not undefined
            // Increment
            if (quantity > 0) {
                $('#quantity').val(quantity - 1);
            }
        });

    });
</script>
@endsection