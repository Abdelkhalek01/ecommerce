@if (count($offers) > 0)
    <div class="new-products" id="offers">
        <div class="container">
            <div class="section-title">
                <h2 class="title">
                    {{ __('shop/layouts/headers/navbar.offers') }}
                </h2>
            </div>
            <div class="products">
                <div class="row d-flex justify-content-center">
                    @foreach ($offers as $product)
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item">
                                <div class="item-header">
                                    <div class="item-img">
                                        <a href="{{ route('product-details', $product->id) }}">
                                            <img class="img-fluid" src="{{ $product->thumbnail() }}"
                                                alt="{{ $product->title }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="item-body">
                                    <div class="row">
                                        <div class="col-9">
                                    
                                            <?php $user = user($product->vendor_id); ?>
                                            <div class="item-owner">
                                                <i class="fas fa-user"></i>
                                                <span class="owner-name"><a
                                                        href="{{ route('vendor', "$product->vendor_id") }}">{{ $user['company_name'] }}</a></span>
                                            </div>
                                            <a href="{{ route('product-details', $product->id) }}">
                                                <div class="item-title">{{ $product->title }}</div>
                                            </a>
                                            <div class="item-price">
                                                <span>
                                                    <div class="new-price">
                                                        {{ $product->price }}{{ __('shop/global.currency') }}</div> <del
                                                        class="old_price">{{ $product->old_price }}{{ __('shop/global.currency') }}</del>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="operations">
                                                <choose-product id="{{ $product->id }}" quantity=1
                                                    title="{{ $product->title }}" images="{{ $product->images }}"
                                                    colors="{{ $product->colors }}" sizes="{{ $product->sizes }}"
                                                    price="{{ $product->price }}"></choose-product>

                                                <a href="{{ route('add-to-wishlist', $product->id) }}">
                                                    <div class="wish item">
                                                        <i class="fas fa-heart"></i>
                                                    </div>
                                                </a>
                                                <a href="{{ route('product-details', $product->id) }}">
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
                    <div class="show-all">
                        <button type="button" class="btn btn-outline-info">
                            <a href="{{ route('all-offers') }}">
                                {{ __('shop/pages/products.show_all_offers') }}
                                <i class="fas fa-show"></i>
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif
