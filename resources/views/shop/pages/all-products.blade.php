@extends('shop/layouts/authers/_master')
@section('title',__('shop/pages/products.all_products'))
@section('content')

<div class="new-products" id="new_products">
    <div class="container">
        <div class="section-title">
            <h2 class="title">
                {{__('shop/pages/products.all_products')}}
            </h2>
        </div>
        <div class="products">
            <div class="row d-flex justify-content-center">
                @foreach($products as $product)
                <div class="col-sm-6 col-lg-3">
                    <div class="product-item">
                        <div class="item-header">
                            <div class="item-img">
                            <img class="img-fluid" src="{{$product->thumbnail()}}" alt="{{$product->title}}">
                            </div>
                        </div>
                        <div class="item-body">
                            <div class="row">
                        <div class="col-9">
                            <div class="item-rate">
                                <span class="star">
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="star">
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="star">
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="star">
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="star">
                                    <i class="fas fa-star"></i>
                                </span>
                            </div>
                            <?php $user = user($product->vendor_id) ?>
                                <div class="item-owner">
                                    <i class="fas fa-user"></i>
                                    <span class="owner-name"><a href="{{route('vendor', "$product->vendor_id")}}">{{ $user['company_name'] }}</a></span>
                            </div>
                            <a href="{{route('product-details', $product->id)}}"> <div class="item-title">{{$product->title}}</div></a>
                            <div class="item-price">
                                    <div class="price">{{$product->price}}{{__('shop/global.currency')}}</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="operations">
                            <choose-product id="{{$product->id}}" quantity=1 title="{{$product->title}}" images="{{$product->images}}"
                                colors="{{$product->colors}}" sizes="{{$product->sizes}}" price="{{$product->price}}"></choose-product>
                                <a href="{{route('add-to-wishlist',$product->id)}}">
                            <div class="wish item">
                                <i class="fas fa-heart"></i>
                            </div>
                            </a>
                            <a href="{{route('product-details',$product->id)}}">
                            <div class="info item">
                                <i class="fas fa-info"></i>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endforeach
            </div>
        </div></div></div>
@stop