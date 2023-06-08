@extends('layouts.app')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{ asset('assets/images/bg_6.jpg') }}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span class="mr-2"><a href="/">Product</a></span> <span>Product Single</span></p>
                <h1 class="mb-0 bread">Product Single</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="{{ asset('assets/images/menu-2.jpg') }}" class="image-popup"><img src="{{ $product->cover }}" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3>{{$product->title}}</h3>
                <div class="rating d-flex">
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2">5.0</a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                    </p>
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
                    </p>
                    <p class="text-left">
                        <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
                    </p>
                </div>
                <p class="price"><span>{{$product->price}}</span></p>
                <p>{{$product->descr}}
                </p>
                <div class="row mt-4">
                    <div class="col-md-6">
                        @if($product->category->title=="Одежда")
                        <div class="form-group d-flex">
                            <div class="select-wrap">
                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                <select name="" id="" class="form-control">
                                    <option value="">Small</option>
                                    <option value="">Medium</option>
                                    <option value="">Large</option>
                                    <option value="">Extra Large</option>
                                </select>
                            </div>
                        </div>
                        @else
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$product->size}}" name="size" style="margin-bottom:30px;width:400px">
                        </div>
                        @endif
                    </div>
                    <div class="w-100"></div>
    
                    <div class="w-100"></div>
        
                </div>
                <div class="col-md-6">
                    <p>Цена: {{ number_format($product->price, 2, '.', '') }}</p>
                    <!-- Форма для добавления товара в корзину -->
                    <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="post" class="form-inline" style="width:600px">
                        @csrf
                        <label for="input-quantity">Количество</label>
                        <div class="input-group col-md-6 d-flex mb-3" style="width:500px">
                        <span class="input-group-btn mr-2">
                            <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                <i class="ion-ios-remove"></i>
                            </button>
                        </span>
                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                        <span class="input-group-btn ml-2">
                            <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                <i class="ion-ios-add"></i>
                            </button>
                        </span>
                    </div>
                        <button type="submit" class="btn btn-success" style="margin-bottom: 15px;">Добавить в корзину</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container" style="text-align:center">
        <p style="font-size:30px;margin-bottom:40px"> Изображения</p>

        <div class="row">
            @foreach($product->photoes as $photo)
            <div class="col-md-4">

                <img src="{{$photo->path}}" style="width:200px;height:150px" alt="#">

            </div>
            @endforeach
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