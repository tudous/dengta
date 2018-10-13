<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\HomeRequest;
use EasyWeChat\Factory;
use Log;
use EasyWeChat\Kernel\Messages\Text;
use App\Models\Cart;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','wechat','wechat1','success']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
       $desk_id= $request->desk_id;
       if (!is_numeric($desk_id)){
           return "请求失败";
       }
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
                    $cart[$k]['name']=$products['name'];
                    $cart[$k]['id']=$products['id'];
                    $cart[$k]['img']=$products['img'];
                    $cart[$k]['price']=$products['price'];
                    $cart[$k]['goods_number']=$v->goods_number;
                    $title +=$products['price']*$v->goods_number;
                }
            }

        $zhucai=Product::where('category_id',1)->get();
        $tangping=Product::where('category_id',2)->get();
        $xiaochi=Product::where('category_id',3)->get();
        $yinliao=Product::where('category_id',4)->get();
        

        return view('home',compact('zhucai','tangping','xiaochi','yinliao','desk_id','title'));
    }


    public function wechat1($desk_id)
    {
        $config = [
            'app_id' =>  env('WEIXIN_KEY', 'aaaa'),
            'secret' => env('WEIXIN_SECRET', 'aaaa'),
            'token' => 'TestToken',
            'response_type' => 'array',

            'log' => [
                'level' => 'debug',
                'file' => __DIR__.'/wechat.log',
            ],
        ];
        $app = Factory::officialAccount($config);
        $str="";
        $arr=array(1,2,3,4,5,6,7,8,9,10);
        if(!in_array($desk_id,$arr)){
            return "FWQ is error";
        }
        $deskid=$desk_id;
        if($deskid){
            $cart_items = Cart::where('desk_id', $deskid)->get();
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

        $str="$deskid.桌点餐如下:\n合计消费$title\n"; 

        foreach($cart as $cart_item){
            $str .=$cart_item['name']."    ".$cart_item['price']."元"."X".$cart_item['goods_number']."份\n";
        }       
        $message = new Text($str);
        $result = $app->customer_service->message($message)->to('o5TJ7wufUA8c7NW6zurTrM14qLQo')->send();
        //$result = $app->customer_service->message($message)->to('o5TJ7wjINSB60-Vkw_uXwfhe6rUQ')->send();
        return $result;
        }
    }

    public function wechat()
    {
        $config = [
            'app_id' =>  env('WEIXIN_KEY', 'aaaa'),
            'secret' => env('WEIXIN_SECRET', 'aaaa'),
            'token' => 'TestToken',
            'response_type' => 'array',

            'log' => [
                'level' => 'debug',
                'file' => __DIR__.'/wechat.log',
            ],
        ];
        $app = Factory::officialAccount($config);
        


        $response = $app->server->serve();
        return $response;
      
        // 将响应输出
        //$response->send(); // Laravel 里请使用：return $response;
        //return $response;
    }

   
    public function success(){
        return view('success');
    }

 

}

    


