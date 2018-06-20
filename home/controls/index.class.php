<?php
	class Index {
		function index(){
            // 线上的代码
            /* 判断是否是手机端 start */
            if($GLOBALS['is_mobile']){
                $this->mobile_index();
                die();
            }
            /* 判断是否是手机端 end */

            $this->display();
		}

        function mobile_index(){

            $this->display('index');
        }

        function honor(){
            $this->display();
        }

	}