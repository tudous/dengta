<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\HomeRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index']]);
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
}
