<?php 

namespace App\Models;

class WXPayConfig {

        public $timestamp;
        public $nonceStr;
        public $package;
        public $signType;
        public $paySign;
        public function toJson()
        {
            return json_encode($this, JSON_UNESCAPED_UNICODE);
        }

}
