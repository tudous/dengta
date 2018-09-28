<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>你正在{{$desk_id}}桌点餐</title>
    <link rel="stylesheet" href="/dengta/css/style.css">
    <link rel="stylesheet" href="/css/weui.css">
    <link rel="stylesheet" href="/css/book.css">
    <script type="text/javascript" src="/dengta/js/vue.min.js"></script>
</head>
<body>
<div class="header">
    <div class="content-wrapper">
        <div class="avatar">
            <img width="64" height="64" src="/dengta/img/seller_avatar_5F256px.jpg">
        </div>
        <div class="content">
            <div class="title">
                <span class="brand"></span>
                <span class="name">灯塔酒店（古尔冈）</span>
            </div>
            <div class="description">

            </div>
            <div class="support">
                <span class="icon decrease"></span>
                <span class="text"></span>
            </div>
                    </div>
                </div>
                <div class="bulletin-wrapper">
                    <!-- <span class="bulletin-title"></span><span class="bulletin-text">粥品香坊其烹饪粥料的秘方源于中国千年古法，在融和现代制作工艺，由世界烹饪大师屈浩先生领衔研发。坚守纯天然、0添加的良心品质深得消费者青睐，发展至今成为粥类的引领品牌。是2008年奥运会和2013年园博会指定餐饮服务商。</span> -->
                    <i class="icon-keyboard_arrow_right"></i>
                </div>
    <div class="background">
        <img width="100%" height="100%" src="/dengta/img/seller_avatar_5F256px.jpg">
    </div>
    <div class="detail fade-transition" style="display: none;">
        <div class="detail-wrapper clearfix">
            <div class="detail-main">
                <h1 class="name">灯塔酒店（古尔冈）</h1>
                <div class="star-wrapper">
                    <div class="star star-48">
                        <span class="star-item on"></span><span class="star-item on"></span><span class="star-item on"></span><span class="star-item on"></span><span class="star-item off"></span>
                    </div>
                </div>

                </ul>
                <div class="title">
                    <div class="line"></div>
                    <div class="text">商家公告</div>
                    <div class="line"></div>
                </div>
                <div class="bulletin">
                    <p class="content"></p>
                </div>
            </div>
        </div>
        <div class="detail-close">
            <i class="icon-close"></i>
        </div>
    </div>
    </div>
<div class="main">
    <div class="left-menu"  id="left">
        <ul>
            <li><span>主菜</span></li>
            <li><span>汤品</span></li>
            <li><span>小吃</span></li>
            <li><span>饮料</span></li>

        </ul>
    </div>
    <div class="con">
        <div class="right-con con-active" style="display: none;">
            <ul>
            @foreach($zhucai as $v)
                <li>
                    <div class="menu-img"><img src="{{$v->img}}" width="45" height="45"></div>
                    <div name="{{$v->id}}" class="menu-txt">
                        <h4 data-icon="00">{{$v->name}}</h4>
                        <!-- <p class="list1">家常菜</p> -->
                        <p class="list2">
                            <b>￥</b><b>{{$v->price}}</b>
                        </p><div class="btn">
                        <button class="minus">
                            <strong></strong>
                        </button>
                        <i>0</i>
                        <button class="add">
                            <strong></strong>
                        </button>
                        <i class="price">{{$v->price}}</i>
                    </div>

                    </div>
                </li>
        @endforeach

            </ul>
        </div>
        <div class="right-con con-active" style="display: none;">
            <ul>
                 @foreach($tangping as $v)
                <li>
                    <div class="menu-img"><img src="{{$v->img}}" width="45" height="45"></div>
                    <div name="{{$v->id}}" class="menu-txt">
                        <h4 data-icon="10">{{$v->name}}</h4>
                       <!--  <p class="list1">家常菜</p> -->
                        <p class="list2">
                            <b>￥</b><b>{{$v->price}}</b>
                        </p><div class="btn">
                        <button class="minus">
                            <strong></strong>
                        </button>
                        <i>0</i>
                        <button class="add">
                            <strong></strong>
                        </button>
                        <i class="price">{{$v->price}}</i>
                    </div>

                    </div>
                </li>
                    @endforeach

            </ul>
        </div>
        <div class="right-con con-active" style="display: none;">
            <ul>

                 @foreach($xiaochi as $v)
                <li>
                    <div class="menu-img"><img src="{{$v->img}}" width="45" height="45"></div>
                    <div name="{{$v->id}}" class="menu-txt">
                        <h4 data-icon="10">{{$v->name}}</h4>
                       <!--  <p class="list1">家常菜</p> -->
                        <p class="list2">
                            <b>￥</b><b>{{$v->price}}</b>
                        </p><div class="btn">
                        <button class="minus">
                            <strong></strong>
                        </button>
                        <i>0</i>
                        <button class="add">
                            <strong></strong>
                        </button>
                        <i class="price">{{$v->price}}</i>
                    </div>

                    </div>
                </li>
                @endforeach


            </ul>
        </div>
        <div class="right-con con-active" style="display: none;">
            <ul>

                 @foreach($yinliao as $v)
                <li>
                    <div class="menu-img"><img src="{{$v->img}}" width="45" height="45"></div>
                    <div name="{{$v->id}}" class="menu-txt">
                        <h4 data-icon="10">{{$v->name}}</h4>
                       <!--  <p class="list1">家常菜</p> -->
                        <p class="list2">
                            <b>￥</b><b>{{$v->price}}</b>
                        </p><div class="btn">
                        <button class="minus">
                            <strong></strong>
                        </button>
                        <i>0</i>
                        <button class="add">
                            <strong></strong>
                        </button>
                        <i class="price">{{$v->price}}</i>
                    </div>

                    </div>
                </li>
                @endforeach




            </ul>
        </div>
    </div>
    <div class="up1"></div>
    <div class="shopcart-list fold-transition" style="">
        <div class="list-header">
            <h1 class="title">购物车</h1>
            <span class="empty">清空</span>
        </div>
        <div class="list-content">
            <ul></ul>
        </div>
    </div>
    <div class="footer">
        <div class="left">你正在点单中
       　总计：￥<span id="">{{$title}}</span></span>元
        </div>
        <div class="left" >
            <!-- <a   class="xhlbtn" href="javascript:void(0)" >清空</a>   -->
        </div>
        <div class="right">
            <a onclick="_tocharge()" id="btnselect" class="xhlbtn" href="javascript:void(0)">查看订单></a>
        </div>
    </div>
</div>
<div class="subFly">
    <div class="up"></div>
    <div class="down">
        <a class="close" href="javascript:">
            <img src="/dengta/img/close.png" alt="">
        </a>
        <dl class="subName">
            <dt>
                <img class="imgPhoto" src="" alt="">
            </dt>
            <dd>

                <p data-icon=""></p>
                <p><span>¥ </span><span class="pce" style="font-size: 16px;font-weight: bold"></span></p>
                <p>
                    <!-- <span>已选：“</span>
                    <span class="choseValue"></span>
                    <span>”</span> -->
                </p>
            </dd>
        </dl>
        <dl class="subChose">
            <textarea style="margin-top:3px;width:100%" name="" placeholder="备注"></textarea>
            <!-- <dt>口味</dt>
            <dd class="m-active">辣味</dd>
            <dd>酸甜</dd> -->
        </dl>
        <input class="goods_id" type="hidden" name="goods_id" value="">
        <dl class="subCount">
            <dt>购买数量：</dt>
            <p class="bk_time" style="margin-top: 15px;">
                                        <span class="bk_summary">
                                    <input class="weui_btn weui_btn_mini weui_btn_default" onclick="_jian(this)"
                                           type="button" value="-">
                                    <input disabled="disabled" name="goods_number" class="product_number weui_input"
                                           value="1" size="3"
                                           style="text-align: center;width: 20px;" type="text"/>
                                    <input class="weui_btn weui_btn_mini weui_btn_default" onclick="_jia(this)"
                                           type="button" value="+">
                                        </span>
                                    </p>
                            </dl>

            <div class="bk_fix_bottom">
                <div class="bk_half_area">
                    <button class="weui_btn weui_btn_primary" onclick="_addCart();">加入购物车</button>
                </div>
            </div>

    </div>

</div>
<script type="text/javascript" src="/dengta/js/jquery.min.js"></script>
<script type="text/javascript" src="/dengta/js/add.js"></script>
<script type="text/javascript" src="/dengta/js/vue.min.js"></script>
<script>

       function _jian(a){
                 var product_number=$(a).parent().find('.product_number');
                 //alert($(product_number).val());
                    if(parseInt($(product_number).val())<=0){
                        // $('.bk_toptips').show();
                        // $('.bk_toptips span').html('不能少于1');
                        // setTimeout(function() {$('.bk_toptips').hide();}, 2000);
                        return;
                    }
                    $(product_number).val(parseInt($(product_number).val())-1);
                    var price=$(a).parent().parent().parent().find('.price');
                    var title_price=$(a).parent().parent().parent().find('.bk_price');
                    $(title_price).text(parseInt($(title_price).text())-parseInt($(price).text()));
                    var product_id=$(a).parent().parent().parent().attr('product_id');
                    var product_number=$(a).parent().find('.product_number').val();
                    console.log(product_number,price);
                    }


                    function _jia(a){
                        var product_number=$(a).parent().find('.product_number');
                        if(parseInt($(product_number).val())>=10){
                            // $('.bk_toptips').show();
                            // $('.bk_toptips span').html('不能大于10');
                            // setTimeout(function() {$('.bk_toptips').hide();}, 2000);
                            return;
                        }
                        $(product_number).val(parseInt($(product_number).val())+1);
                        var price=$(a).parent().parent().parent().find('.price');
                        var title_price=$(a).parent().parent().parent().find('.bk_price');
                        $(title_price).text(parseInt($(title_price).text())+parseInt($(price).text()));
                        var product_id=$(a).parent().parent().parent().attr('product_id');
                        var product_number=$(a).parent().find('.product_number').val();
                        // console.log(product_number,price);
                        //ajaxupdateCart(product_id,product_number);

                    }


            function _addCart(){
                    var desk_id="{{$desk_id}}";
                    var goods_id= $(".goods_id").val();
                    var goods_number=$(".product_number").val();
                    console.log(goods_id,goods_number,desk_id);


                    $.ajax({
                    type: "POST",
                    url: '/addcart',
                    dataType: 'json',
                    cache: false,
                    data: {desk_id: desk_id, goods_id: goods_id, goods_number: goods_number, _token: "{{csrf_token()}}"},
                    success: function(data) {
                        /*if(data == null) {
                            $('.bk_toptips').show();
                            $('.bk_toptips span').html('服务端错误');
                            setTimeout(function() {$('.bk_toptips').hide();}, 2000);
                            return;
                        }*/
                        location.reload();
                        //console.log(data);
                    }
                });

            }
            function _clear(){
                var desk_id="{{$desk_id}}";
                $.ajax({
                    type: "GET",
                    url: 'clear/'+desk_id,
                    dataType: 'json',
                    cache: false,
                    success: function(data) {
                        /*if(data == null) {
                            $('.bk_toptips').show();
                            $('.bk_toptips span').html('服务端错误');
                            setTimeout(function() {$('.bk_toptips').hide();}, 2000);
                            return;
                        }*/
                        location.reload();
                        //console.log("123");
                    }
                });

            }

            function _tocharge(){
                location.href="/tocart"+"/{{$desk_id}}";
            }

           /*  $(function(){
                    //判断页面是否是在微信浏览器打开
                    //对浏览器的UserAgent进行正则匹配，不含有微信独有标识的则为其他浏览器
                    var useragent = navigator.userAgent;
                    if (useragent.match(/MicroMessenger/i) != 'MicroMessenger') {
                        window.location.href = "wxError.html";//若不是微信浏览器，跳转到温馨error页面
                    }
                }); */




</script>
</body>
</html>
