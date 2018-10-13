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
        <!-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> -->
        {{ csrf_field() }}


            <div class="page bk_content" style="top: 0;">
                <div class="weui_cells weui_cells_checkbox">
                   
                    @if($cart)
                    @foreach($cart as $cart)


                       <!--  <label class="chch">
                            <input name="cart_item" class="checkbox" type="checkbox" checked='checked' value="{{$cart['id']}}"
                                   name="buythis[]"/>
                            <i class="weui_icon_success"></i>
                        </label> -->


                        <div class="weui_cell_bd weui_cell_primary">
                            <div style="position: relative;">
                                <img class="bk_preview" src="{{$cart['img']}}" class="m3_preview" onclick=""/>
                                <div product_id="{{$cart['id']}}" style="position: absolute; left: 130px; right: 0; top: 5px;">
                                    <span>{{$cart['name']}}</span>
                                    <span class="price danjia">{{$cart['price']}}</span>           
                                    <input onclick="_delcart(this);" style="float: right;margin-top: 20px; margin-right:20px;padding: 5px; " class="weui_btn weui_btn_mini weui_btn_default" type="button" value="删除">
                                    <p class="bk_time" style="margin-top: 0px;">数量:
                                        <span class="bk_summary">
                                    <input class="weui_btn weui_btn_mini weui_btn_default" onclick="_jian(this)"
                                           type="button" value="-">
                                    <input disabled="disabled" name="goods_number" class="product_number weui_input"
                                           value="{{$cart['goods_number']}}" size="3"
                                           style="text-align: center;width: 20px;" type="text"/>
                                    <input class="weui_btn weui_btn_mini weui_btn_default" onclick="_jia(this)"
                                           type="button" value="+">
                                        </span>
                                    </p>
                                    <p class="bk_time">总计:
                                        <span class="bk_price pd_price">
                                        {{$cart['price'] * $cart['goods_number']}}
                                        </span>

                                    </p>

                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    @else
                    客官先点餐吧！
                    @endif
                </div>
            </div>
            
           @if($title>null)
            <div class="bk_fix_bottom">
                <div class="bk_half_area">
                    <button onclick="_gochage()" class="weui_btn weui_btn_primary" onclick="_toCharge();">请确认数量，点击通知店长></button>
                </div>
                <div class="bk_half_area">
                    <button onclick="_clear()" class="weui_btn weui_btn_default"><清空菜单</button>
                </div>
            </div>
         @endif
</div>
</body>
<script type="text/javascript" src="/dengta/js/jquery.min.js"></script>
<script type="text/javascript" src="/dengta/js/add.js"></script>
<script type="text/javascript" src="/dengta/js/vue.min.js"></script>

<script>
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
                                location.href="/home/"+desk_id;
                                //console.log(data);
                            }
                        });

                    }
                function _gochage(){
                    location.href="/order_commit/"+"{{$desk_id}}";
                }

                function _jian(a){
                    var desk_id="{{$desk_id}}";
                    var product_number=$(a).parent().find('.product_number');
                 //alert($(product_number).val());
                    if(parseInt($(product_number).val())<=1){
                        // $('.bk_toptips').show();
                        // $('.bk_toptips span').html('不能少于1');
                        // setTimeout(function() {$('.bk_toptips').hide();}, 2000);
                        alert("不能小于1");
                        return;
                    }
                    $(product_number).val(parseInt($(product_number).val())-1);
                    var danjia=$(a).parent().parent().parent().find('.danjia');
                        console.log(parseInt($(danjia).html()));
                        var title_price=$(a).parent().parent().parent().find('.bk_price');
                        console.log(parseInt($(title_price).text()));
                        $(title_price).text(parseInt($(title_price).text())-parseInt($(danjia).text()));
                        var product_id=$(a).parent().parent().parent().attr('product_id');
                        var product_number=$(a).parent().find('.product_number').val();
                        console.log(product_id,product_number,desk_id);
                        ajaxupdatedata(product_id,product_number,desk_id);
                    }


                    function _jia(a){
                        var desk_id="{{$desk_id}}";
                        var product_number=$(a).parent().find('.product_number');
                        if(parseInt($(product_number).val())>=10){
                            // $('.bk_toptips').show();
                            // $('.bk_toptips span').html('不能大于10');
                            // setTimeout(function() {$('.bk_toptips').hide();}, 2000);
                            alert("不能大于10");
                            return;
                        }
                        $(product_number).val(parseInt($(product_number).val())+1);
                        var danjia=$(a).parent().parent().parent().find('.danjia');
                        console.log(parseInt($(danjia).html()));
                        var title_price=$(a).parent().parent().parent().find('.bk_price');
                        console.log(parseInt($(title_price).text()));
                        $(title_price).text(parseInt($(title_price).text())+parseInt($(danjia).text()));
                        var product_id=$(a).parent().parent().parent().attr('product_id');
                        var product_number=$(a).parent().find('.product_number').val();
                        console.log(product_id,product_number,desk_id);
                        ajaxupdatedata(product_id,product_number,desk_id);

                    }

                      function ajaxupdatedata($gid,$gnb,$deskid){
                       $.ajax({
                          url: '/updatecart',
                          type: 'POST',
                          dataType: 'json',
                          cache: false,
                          data: {product_id:$gid,product_number:$gnb,desk_id:$deskid, _token: "{{csrf_token()}}"},
                          success:function(data){
                                console.log(data);
                          },
                      });
                   }

                   function _delcart(a)
                   {
                        var desk_id="{{$desk_id}}";
                        var product_id=$(a).parent().attr('product_id');
                        $.ajax({
                          url: '/delcart',
                          type: 'POST',
                          dataType: 'json',
                          cache: false,
                          data: {product_id:product_id,desk_id:desk_id, _token: "{{csrf_token()}}"},
                          success:function(data){
                                if(data.stuts==0){
                                    location.reload();
                                }
                          },
                      });
                        
                   }




</script>

