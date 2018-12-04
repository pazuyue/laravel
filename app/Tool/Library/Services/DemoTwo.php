<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/30
 * Time: 15:11
 */

namespace App\Tool\Library\Services;


use App\Tool\Library\Services\Contracts\CustomServiceInterface;

class DemoTwo implements CustomServiceInterface
{

    public function doSomethingUseful()
    {
        return 'Output from DemoTwo';
    }
}