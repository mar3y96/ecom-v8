        {{--  <div class="payment-methode">
            {{-- <div class="product">
                <div class="row">
                    <div class="col-5">
                        <img src="{{ asset('site/image/b-off-picts.png')}}" alt="item" class="img-fluid">
                    </div>
                    <div class="col-7">
                        <h5>LIGHT SHINIH SHIRT XL</h5>
                        <P>color: <span class="color-box red"></span></P>
                        <P>Size: <span class="size">X</span></P>
                    </div>
                </div>
            </div> --}}
            {{--  <div class="the-methode">
                <h4>{{ trans('site.paymentMethod') }}</h4>  --}}
                {{-- <div class="row">
                    <div class="col-6">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="customRadio" name="example1" value="customEx">
                            <label class="custom-control-label" for="customRadio">Credit/Debit Card</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <img src="{{ asset('site/image/visa.png')}}" alt="visa" class="img-fluid">
                    </div>
                </div> --}}
                {{--  <div class="row">
                    <div class="col-6">
                        <div class="custom-control custom-radio">  --}}
                            {{-- <input type="radio" class="custom-control-input" id="customRadio" name="example1" value="customEx"> --}}
                            {{--  <label class="custom-control-label" for="customRadio">{{ trans('site.cashOnDelivery') }}</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <img src="{{ asset('site/image/delivery.png')}}" alt="visa" class="img-fluid">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h5>{{ trans('site.orderTotal') }}</h5>
                    </div>
                    <div class="col-6">
                        <h5 class="price">{{ trans('site.egp') }} 
                        @if ($discount != null)
                        @if (isset($tax))
                        {{ Cart::subtotal(2,'.','')+ $tax -(int)(Cart::subtotal(2,'.','')*$discount->value/100)  }}
                        @else
                        {{ Cart::subtotal(2,'.','') -(int)(Cart::subtotal(2,'.','')*$discount->value/100) }}
                        @endif
                        @else 
                        @if (isset($tax))
                        {{ Cart::subtotal(2,'.','')+$tax }}
                        @else
                        {{ Cart::subtotal(2,'.','')}}
                        @endif 
                        @endif 
                        </h5>
                    </div>
                </div>
                
                <button type="button" class="btn check-out" onclick="this.form.submit()">{{ trans('site.placeOrder') }}</button>
            </div>
        </div>    --}}

        <div class="summary">
                <div class="title">
                    <h3>{{ trans('site.summary') }}</h3>
                </div>
                <div class="price-detail">
                    <div class="row">
                        <div class="col-6">
                            <p>{{ trans('site.subtotal') }}</p>
                        </div>
                        <div class="col-6">
                            <h5>{{ trans('site.egp') }} @if ($discount != null)    
                                    {{ Cart::subtotal(2,'.','')-(int)(Cart::subtotal(2,'.','')*$discount->value/100)  }}
                                    @else
                                    {{ Cart::subtotal(2,'.','') }}
                                    @endif</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>{{ trans('site.tax') }}</p>
                        </div>
                        <div class="col-6">
                            <h5>{{ trans('site.egp') }}
                                @if (isset($tax)){{ $tax }} @endif </h5>
                        </div>
                    </div>
                </div>
                <div class="price-total">
                    <div class="row">
                        <div class="col-6">
                            <p>{{ trans('site.orderTotal') }}</p>
                        </div>
                        <div class="col-6">
                            <h5 class="total">{{ trans('site.egp') }} @if ($discount != null)
                                    @if (isset($tax))
                                    {{ Cart::subtotal(2,'.','')+ $tax -(int)(Cart::subtotal(2,'.','')*$discount->value/100)  }}
                                    @else
                                    {{ Cart::subtotal(2,'.','') -(int)(Cart::subtotal(2,'.','')*$discount->value/100) }}
                                    @endif
                                    @else 
                                    @if (isset($tax))
                                    {{ Cart::subtotal(2,'.','')+$tax }}
                                    @else
                                    {{ Cart::subtotal(2,'.','')}}
                                    @endif 
                                    @endif 
                                </h5>
                        </div>
                    </div>
                    
                        <button type="button" class="btn check-out" onclick="this.form.submit()">{{ trans('site.gOTOCHECHOUT') }}</button>
                    
                </div>
            </div>