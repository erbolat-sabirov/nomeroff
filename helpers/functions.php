<?php

if(!function_exists('format_money')){        
    
    function format_money($money){
        return number_format($money, 0, ' ', ' ');
    }
}

if(!function_exists('create_dir_if_not_exists')){        
    /**
     * Create directory
     *
     * @param  string $path
     * @param  integer $chmod
     * @param  bool $recursive
     * @return void
     */
    function create_dir_if_not_exists($path, $chmod=0755, $recursive=true){
        if(!file_exists($path)){
            mkdir($path, $chmod, $recursive);
        }
    }
}

if (!function_exists('del_arr_elem_if_null')) {
    
    function del_arr_elem_if_null(array $data){
        return array_filter($data, function($value){
            return $value != null;
        });
    }
}