<?php

use App\Helpers\coreui\CoreUIFacades;

if(!function_exists('cui')){
    function cui(){
        return app()->get('cui');
    }
}


if(!function_exists('notify')){
    function notify($type, $message, $title = null){
        toastr($message, $type);
    }
}

