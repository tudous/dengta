<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{

		public function store(Request $request,Cart $cart)
		{

			//验证数据

			$desk_id=$request->desk_id;
			$goods_id=$request->goods_id;
			$goods_number=$request->goods_number;
            $arr=array(1,2,3,4,5,6,7,8,9,10);
            if(!in_array($desk_id,$arr)){
                return "FWQ is error";
            }

			$cart=Cart::where([
                ['desk_id',$desk_id],
                ['goods_id',$goods_id]
            ])->first();

            if($cart==null){

            	$cart=new Cart();
                $cart->goods_id=$goods_id;
                $cart->desk_id=$desk_id;
                $cart->goods_number=$goods_number;
                $cart->save();
                //判断
            }else{

            	 $cart->goods_number +=$goods_number;
            	 $cart->save();
            }
			
			

			return array('status'=>0);
			


			
		}


		public function destroy($id)
		{
            $arr=array(1,2,3,4,5,6,7,8,9,10);
            if(!in_array($id,$arr)){
                return "FWQ is error";
            }
			$carts=Cart::where('desk_id',$id)->delete();
			return $carts;
		}


		public function index(Request $request)
		{
            $desk_id=$request->cart_id;
            $arr=array(1,2,3,4,5,6,7,8,9,10);
            if(!in_array($desk_id,$arr)){
                return "FWQ is error";
            }
    	    $carts=\DB::table('carts')->where('desk_id',$desk_id)->get();
            $carts=$carts->toArray();
            $cart=array();
            $title=0;
            foreach ($carts as $k=>$v){
               $products=Product::where('id',$v->goods_id)->select('name','id','img','price')->first();
        
                if($products!=null){

                    $products=$products->toArray();
               // echo "<pre>";
               // var_dump($products);
               //  die;
                    $cart[$k]['name']=$products['name'];
                    $cart[$k]['id']=$products['id'];
                    $cart[$k]['img']=$products['img'];
                    $cart[$k]['price']=$products['price'];
                    $cart[$k]['goods_number']=$v->goods_number;
                    $title +=$products['price']*$v->goods_number;
                }


            }
			
			return view('cart',compact('cart','title','desk_id'));
		}

        public function updatecart(Request $request)
        {
             $product_id=$request->product_id;
             $product_number=$request->product_number;
             $desk_id=$request->desk_id;
            $arr=array(1,2,3,4,5,6,7,8,9,10);
            if(!in_array($desk_id,$arr)){
                return "FWQ is error";
            }
             $cart=Cart::where('desk_id',$desk_id)->where('goods_id',$product_id)->update(['goods_number'=>$product_number]);
             if($cart){
                return "update success";
             }else{
                return "update fail";
             }  
        }

        public function delcart(Request $request)
        {
            $product_id=$request->product_id;
            $desk_id=$request->desk_id;
            $arr=array(1,2,3,4,5,6,7,8,9,10);
            if(!in_array($desk_id,$arr)){
                return "FWQ is error";
            }
            $cart=Cart::where('desk_id',$desk_id)->where('goods_id',$product_id)->delete();
             if($cart){
                return array('stuts'=>0,'msg'=>'del success');
             }else{
                return array('stuts'=>1,'msg'=>'del success');
             }  

        }

}