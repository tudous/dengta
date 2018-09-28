<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Desk;
use App\Models\WXJsConfig;
use App\Handlers\WXTool;

class OrderController extends Controller
{
	public function toOrderCommit(Request $request)
	{
		$desk_id=$request->cart_id;
		$cart_items = Cart::where('desk_id', $desk_id)->get();
		$cart=array();
		$title=0;
		foreach($cart_items as $k=>$v){
			 $goods=Product::where('id',$v['goods_id'])->select('name','id','img','price')->first();
			if($goods!=null){

                    $goods=$goods->toArray();
                    $cart[$k]['name']=$goods['name'];
                    $cart[$k]['id']=$goods['id'];
                    $cart[$k]['img']=$goods['img'];
                    $cart[$k]['price']=$goods['price'];
                    $cart[$k]['goods_number']=$v->goods_number;
                    $title +=$goods['price']*$v->goods_number;
			}
		}

		// JSSDK 相关
	    $access_token = WXTool::getAccessToken();
	    $jsapi_ticket = WXTool::getJsApiTicket($access_token);
	    $noncestr = WXTool::createNonceStr();
	    $timestamp = time();
	    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	    // 签名
	    $signature = WXTool::signature($jsapi_ticket, $noncestr, $timestamp, $url);
	    // 返回微信参数
	    $wx_js_config = new WXJsConfig;
	    $wx_js_config->appId = config('wx_config.APPID');
	    $wx_js_config->timestamp = $timestamp;
	    $wx_js_config->nonceStr = $noncestr;
	    $wx_js_config->signature = $signature;

		
		               
		$total_price=$title;
		$name="222";
		$order_no=124143;
		return view('order_commit',compact('cart','total_price','name','order_no','desk_id','wx_js_config'));
	}
}