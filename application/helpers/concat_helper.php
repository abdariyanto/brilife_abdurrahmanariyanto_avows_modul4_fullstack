<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');

    function concat($array)
    {
        $data = '';
        if(count($array) > 1){
            foreach($array as $index => $value){
                if($index == 0){
                    $data .= $value;
                }else{
                    $data .= ' , ' . $value;
                }
            }
        }else{
            $data = $array[0];
        }

        return $data;
    }
