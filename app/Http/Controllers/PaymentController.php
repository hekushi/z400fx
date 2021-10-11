<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Cart;
use Session;
use Mail;
use App\Mail\InvoiceMail;
use App\Mail\InvoiceMail2;

class PaymentController extends Controller
{
    public function Payment(Request $request){
        $data =array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['zip'] = $request->zip;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['building'] = $request->building;
        $data['payment'] = $request->payment;
        //dd($data);

        if ($request->payment == 'stripe'){

            return view('pages.payment.stripe',compact('data'));

        }elseif ($request->payment == 'paypal'){


        }elseif ($request->payment == 'oncash'){
            return view('pages.payment.oncash',compact('data'));

        }else{
            echo "Cash On Delivery";
        }
    }

    public function StripeCharge(Request $request){
        

       
        $email = $request->ship_email;
        $total = $request->total;
         
        
       // Set your secret key: remember to change this to your live secret key in production
       // See your keys here: https://dashboard.stripe.com/account/apikeys
       \Stripe\Stripe::setApiKey('sk_test_51If3WCAd7mtRa36PHwo0eXKvMFeS4RmmTwsRQ7PsjzdW4vhxc6uNwIzBTTXi37bl5Af6Yd5Izrt9y2NwLrHKQsR200eEdv34lI');

       // Token is created using Checkout or Elements!
       // Get the payment token ID submitted by the form:
       $token = $_POST['stripeToken'];

       $charge = \Stripe\Charge::create([
           'amount' => $total*100,
           'currency' => 'usd',
           'description' => 'Udemy Ecommerce Details',
           'source' => $token,
           'metadata' => ['order_id' => uniqid()],
       ]);
       
       $data = array();
       $data['user_id'] = Auth::id() === 1;
       $data['payment_id'] = $charge->payment_method;
       $data['paying_amount'] = $charge->amount;
       $data['blnc_transection'] = $charge->balance_transaction;
       $data['stripe_order_id'] = $charge->metadata->order_id;
       $data['shipping'] = $request->shipping;
       $data['vat'] = $request->vat;
       $data['total'] = $request->total;
       $data['payment_type'] = $request->payment_type;
       $data['status_code'] = mt_rand(100000,999999);
       
       if (Session::has('coupon')){
           $data['subtotal'] = Session::get('coupon')['balance'];
       }else{
           $data['subtotal'] = Cart::Subtotal();
       }
       $data['status'] = 0;
       $data['date'] = date('y-m-d');
       $data['month'] = date('F');
       $data['year'] = date('Y');
       $order_id = DB::table('orders')->insertGetId($data);

         // Mail send to user for Invoice
        Mail::to($email)->send(new invoiceMail($data));

       /// insert shipping table

       $shipping = array();
       $shipping['order_id'] = $order_id;
       $shipping['ship_name'] = $request->ship_name;
       $shipping['ship_phone'] = $request->ship_phone;
       $shipping['ship_email'] = $request->ship_email;
       $shipping['zipcode'] = $request->zipcode;
       $shipping['ship_address'] = $request->ship_address;
       $shipping['ship_city'] = $request->ship_city;
       $shipping['ship_building'] = $request->ship_building;
       DB::table('shipping')->insert($shipping);

       ///insert order details table

       $content = Cart::content();
        $details = array();
        foreach ($content as $row) {
        $details['order_id'] = $order_id;
        $details['product_id'] = $row->id;
        $details['product_name'] = $row->name;
        $details['color'] = $row->options->color;
        $details['size'] = $row->options->size;
        $details['qty'] = $row->qty;
        $details['singleprice'] = $row->price;
        $details['totalprice'] = $row->qty*$row->price;
        DB::table('orders_details')->insert($details); 

       }

       Cart::destroy();
       if (Session::has('coupon')){
           Session::forget('coupon');
           
       }
       $notification=array(
        'messege'=>'Order Process Successfully Done',
        'alert-type'=>'success'
         );
       return Redirect()->to('/')->with($notification);

       }







       public function Oncash(Request $request){
        $email = $request->ship_email;
        $total = $request->total;
        
       
       $data = array();
       $data['user_id'] = Auth::id() === 1;
       $data['shipping'] = $request->shipping;
       $data['vat'] = $request->vat;
       $data['total'] = $request->total;
       $data['payment_type'] = $request->payment_type;
       $data['status_code'] = mt_rand(100000,999999);
       
       if (Session::has('coupon')){
           $data['subtotal'] = Session::get('coupon')['balance'];
       }else{
           $data['subtotal'] = Cart::Subtotal();
       }
       $data['status'] = 0;
       $data['date'] = date('y-m-d');
       $data['month'] = date('F');
       $data['year'] = date('Y');
       $order_id = DB::table('orders')->insertGetId($data);


       

       /// insert shipping table

       $shipping = array();
       $shipping['order_id'] = $order_id;
       $shipping['ship_name'] = $request->ship_name;
       $shipping['ship_phone'] = $request->ship_phone;
       $shipping['ship_email'] = $request->ship_email;
       $shipping['zipcode'] = $request->zipcode;
       $shipping['ship_address'] = $request->ship_address;
       $shipping['ship_city'] = $request->ship_city;
       $shipping['ship_building'] = $request->ship_building;
       DB::table('shipping')->insert($shipping);


       // Mail send to user for Invoice
       Mail::to($email)->send(new invoiceMail2($data));

       ///insert order details table

       $content = Cart::content();
        $details = array();
        foreach ($content as $row) {
        $details['order_id'] = $order_id;
        $details['product_id'] = $row->id;
        $details['product_name'] = $row->name;
        $details['color'] = $row->options->color;
        $details['size'] = $row->options->size;
        $details['qty'] = $row->qty;
        $details['singleprice'] = $row->price;
        $details['totalprice'] = $row->qty*$row->price;
        DB::table('orders_details')->insert($details); 

       }

       Cart::destroy();
       if (Session::has('coupon')){
           Session::forget('coupon');
           
       }
       $notification=array(
        'messege'=>'Order Process Successfully Done',
        'alert-type'=>'success'
         );
       return Redirect()->to('/')->with($notification);

       }







       public function SuccessList(){
           $order = DB::table('orders')->where('user_id',Auth::id())->where('status',3)->orderBy('id','DESC')->limit(5)->get();
            return view('pages.returnorder',compact('order'));


       }

       public function RequestReturn($id){
           DB::table('orders')->where('id',$id)->update(['return_order'=>1]);
           $notification=array(
            'messege'=>'Order Request Done',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);

       }


}
