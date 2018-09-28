<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Handlers\WXTool;
use App\Models\Order;
use Illuminate\Http\Request;
use Log;


class PayController extends Controller
{

    public function wxPay(Request $request)
   {
        $openid = $request->session()->get('openid', '');
        if($openid==""){
            $openid=WXTool::httpGet('http://'.$_SERVER['HTTP_HOST'].'/service/openid/get');
        }
        return WXTool::wxPayData('test','dasds',1,$openid);
    } 

    public function getOpenid(Request $request)
    {
            $code=$request->input('code','');
            if($code==''){
                $redirect_uri=urlencode('http://'.$_SERVER['HTTP_HOST'].'/openid/get');
                $url='http://open.weixin.qq.com/connect/oauth2/authorize'.
                    '?appid='.config('wx_config.APPID').
                    '&redirect_uri='.$redirect_uri.
                    '&response_type=code'.
                    '&scope=snsapi_userinfo'.
                    '&status=STATE'.
                    '#wechat_redirect';
                    

                    return redirect($url);
            }
            $openid=WXTool::getOpenid($code);

            $request->session()->put('openid',$openid);
            
            return $openid;
     }

     public function wxNotify() 
     {
            Log::info('微信支付回调开始');
            $return_data = file_get_contents("php://input");
            Log::info('return_data: '.$return_data);

            libxml_disable_entity_loader(true);
            $data = simplexml_load_string($return_data, 'SimpleXMLElement', LIBXML_NOCDATA);

            Log::info('return_code: '.$data->return_code);
            if($data->return_code == 'SUCCESS') {
            $order = Order::where('order_no', $data->out_trade_no)->first();
            $order->status = 2;
            $order->save();

            return "<xml>
                        <return_code><![CDATA[SUCCESS]]></return_code>
                        <return_msg><![CDATA[OK]]></return_msg>
                    </xml>";
            }

            return "<xml>
                    <return_code><![CDATA[FAIL]]></return_code>
                    <return_msg><![CDATA[FAIL]]></return_msg>
                    </xml>";

       }




}