@extends('layouts.app')

@section('content')
@include('layouts.menubar')

@php
$setting = DB::table('settings')->first();
$charge = $setting->shipping_chage;
$vat = $setting->vat;

	
@endphp

<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_responsive.css')}}">



        <div class="contact_form">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="contact_form_container">
                            <div class="contact_form_title text-center">ご注文内容</div>



                            <div class="cart_items">
                                <ul class="cart_list">
    
                                    @foreach ($cart as $row)
                                        
                                   
                                    <li class="cart_item clearfix">
                                        
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">

                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title"><b>商品画像</b></div>
                                                <div class="cart_item_text"><img src="{{asset($row->options->image)}}" style="width: 70px; height: 70px;" alt=""></div>
                                            </div>


                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title"><b>商品詳細</b></div>
                                                <div class="cart_item_text">{{$row->name}}</div>
                                            </div>
                                            @if ($row->options->color == NULL)
                                                
                                            @else
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title"><b>Color</b></div>
                                                <div class="cart_item_text">{{$row->options->color}}</div>
                                            </div>
                                            @endif
                                            @if ($row->options->size == NULL)
                                                
                                            @else
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title"><b>Size</b></div>
                                                <div class="cart_item_text">{{$row->options->size}}</div>
                                            </div>
                                                
                                            @endif
                                            
    
                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title"><b>数量</b></div>
                                                <div class="cart_item_text">{{$row->qty}}</div>
                                                
                                                
                                            </div>



                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title"><b>価格</b></div>
                                                <div class="cart_item_text">￥{{$row->price}}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title"><b>小計</b></div>
                                                <div class="cart_item_text">￥{{$row->price*$row->qty}}</div>
                                            </div>
    
                                           
    
    
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            
                            <ul class="list-group col-lg-8" style="float: right;">
                                @if (Session::has('coupon'))
                                <li class="list-group-item">小計:<span style="float: right;">￥{{ Session::get('coupon')['balance'] }}</span></li>
                                <li class="list-group-item">クーポン: ({{ Session::get('coupon')['name'] }})
                                <a href="{{ route('coupon.remove')}}" class="btn btn-danger btn-sm">x</a>							
                                
                                <span style="float: right;">￥{{ Session::get('coupon')['discount'] }}</span></li>
                                
                                @else
                                <li class="list-group-item">小計:<span style="float: right;">￥{{ Cart::subtotal()}}</span></li>	
                                @endif
    
                            
                            
                            <li class="list-group-item">消費税:<span style="float: right;">￥{{ $charge}}</span></li>
                            <li class="list-group-item">送料:<span style="float: right;">￥{{$vat}}</span></li>
                                @if (Session::has('coupon'))
                                <li class="list-group-item">合計:<span style="float: right;">￥{{Session::get('coupon')['balance'] + $charge + $vat}}</span></li>
    
                                        
                                    @else
                                    <li class="list-group-item">合計:<span style="float: right;">￥{{ Cart::subtotal() + $charge + $vat }}</span></li>	
                                    @endif
    
                            
    
                            
                            </ul>


                        </div>
                    </div>
















                    <div class="col-lg-5 pt-5">
                        <div class="contact_form_container">
                            <div class="contact_form_title text-center">送り先</div>
    
                            <form action="{{ route('payment.process')}}" id="contact_form" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">お名前</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="" name="name" required="">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">電話番号</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="" name="phone" required="">
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputEmail1">メールアドレス</label>
                                    <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="" name="email" required="">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">〒</label>
                                    <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="ハイフン無し"  name="zip" onKeyUp="AjaxZip3.zip2addr('zip', '', 'address', 'address');">
    
                                    
                                </div>




                                <div class="form-group">
                                    <label for="exampleInputEmail1">住所</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="" name="address" required="">
                                </div>




                                <div class="form-group">
                                    <label for="exampleInputEmail1">市区町村</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="" name="city" required="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">建物名・部屋番号など</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="" name="building">
                                </div>



                                <div class="contact_form_title text-center">決済方法</div>
                                

                              
                                <div class="form-group">
                                    <ul class="logos_list">
                                        <li>
                                            <input type="radio" name="payment" value="stripe"><img src="{{ asset('public/frontend/images/mastercard.png')}}" style="height: 80px; width: 100px;">
                                        </li>
                                       
                                        {{-- <li>
                                            <input type="radio" name="payment" value="paypal"><img src="{{ asset('public/frontend/images/paypal.png')}}" style="height: 80px; width: 100px;">
                                        </li> --}}

                                        <li>
                                            <input type="radio" name="payment" value="oncash"><img src="{{ asset('public/frontend/images/ecbzns013_002.jpg')}}" style="height: 80px; width: 100px;">
                                        </li>


                                    </ul>


                                </div>




                                

                                
                                    
                               
                                <div class="contact_form_button text-center">
                                    <button type="submit" class="btn btn-info">最終画面に進む</button>
                                </div>
                            </form>
    
                        </div>
                    </div>

                    

                </div>
            </div>
            <div class="panel"></div>
        </div>

        

@endsection
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
