  <!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
<title>你正在{{$desk_id}}桌点餐</title>
    <link rel="stylesheet" href="/dengta/css/style.css">
    <link rel="stylesheet" href="/css/weui.css">
    <link rel="stylesheet" href="/css/book.css">
</head>
<body>
  <div class="page bk_content" style="top: 0;">
    <div class="weui_cells">
        @foreach($cart as $cart_item)
        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <p class="bk_summary">{{$cart_item['name']}}</p>
            </div>
            <div class="weui_cell_ft">
              <span class="bk_price">{{$cart_item['price']}}</span>
              <span> x </span>
              <span class="bk_important">{{$cart_item['goods_number']}}</span>
            </div>
        </div>
        @endforeach
    </div>
    <!-- <div class="weui_cells_title">支付方式</div>
    <div class="weui_cells">
        <div class="weui_cell weui_cell_select">
            <div class="weui_cell_bd weui_cell_primary">
                <select class="weui_select" name="payway">
                    <option selected="" value="1">支付宝</option>
                    <option value="2">微信</option>
                </select>
            </div>
        </div>
    </div> -->

    <form action="/service/alipay" id="alipay" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="total_price" value="{{$total_price}}" />
      <input type="hidden" name="name" value="{{$name}}" />
      <input type="hidden" name="order_no" value="{{$order_no}}" />
    </form>
@if($total_price>null)
    <div class="weui_cells">
        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <p>总计:</p>
            </div>
            <div class="weui_cell_ft bk_price" style="font-size: 25px;">￥ {{$total_price}}</div>
        </div>
    </div>
  </div>
  <div class="bk_fix_bottom">
    <div class="bk_btn_area">
      <button class="weui_btn weui_btn_primary" onclick="_onPay();">通知店长</button>
    </div>
  </div>
  @else
  请先点单！
@endif

</body>
</html>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" charset="utf-8"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">

        

        function _onPay()
        {
            if(confirm('确认通知店长将清空菜单，请确认？')){
                $.ajax({
                type:"GET",
                url:"/wechat/"+{{$desk_id}},
                success:function(data){
                    if(data.errcode==0){
                       _clear(); 
                   }else{
                       alert("通知店长失败，请联系店长！");
                   }
                    
                }
             });
                 
            }
            
            
            
        }

        function _clear(){
                var desk_id="{{$desk_id}}";
                $.ajax({
                    type: "GET",
                    url: '/clear/'+desk_id,
                    dataType: 'json',
                    cache: false,
                    success: function(data) {
                        /*if(data == null) {
                            $('.bk_toptips').show();
                            $('.bk_toptips span').html('服务端错误');
                            setTimeout(function() {$('.bk_toptips').hide();}, 2000);
                            return;
                        }*/
                        location.href = "/success";
                        //WeixinJSBridge.call('closeWindow');
                        //console.log(data);
                    }
                });

            }


        

</script>