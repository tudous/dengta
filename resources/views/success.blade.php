<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title></title>
  
    <link rel="stylesheet" href="/css/weui.css">
   
   
</head>
<body>
	
<div class="weui_msg">
    <div class="weui_icon_area"><i class="weui_icon_success weui_icon_msg"></i></div>
    <div class="weui_text_area">
        <h2 class="weui_msg_title">操作成功</h2>
        
    </div>
    <div class="weui_opr_area">
        <p class="weui_btn_area">
            <a href="javascript:;" class="weui_btn weui_btn_primary" onclick="_queding()">确定</a>
           
        </p>
    </div>
    <div class="weui_extra_area">
        
    </div>
</div>



</body>
</html>
<script src="{{ asset('js/app.js') }}"></script>

<script>
        function _queding(){

            WeixinJSBridge.call('closeWindow');
        }

</script>



