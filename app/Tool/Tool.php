<?php

namespace App\Tool;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/7
 * Time: 16:39
 */
class Tool
{

    /**根据数组转成字符串
     * @param $arr
     * @return string
     */
    public function arrayToXml($arr){

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .='<brandcode>';
        foreach ($arr as $key=>$val){
            $xml .=' <product>';
            $xml.="<sku>{$val->sku}</sku>";
            $xml.="<stock>{$val->stock}</stock>";
            $xml .=' </product>';
        }
        $xml.="</brandcode>";

        return $xml;
    }

    public function test(){
        dump(123);
    }

}