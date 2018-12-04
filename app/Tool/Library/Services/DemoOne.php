<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/30
 * Time: 15:10
 */

namespace App\Tool\Library\Services;



use App\Tool\Library\Services\Contracts\CustomServiceInterface;

class DemoOne implements CustomServiceInterface
{

    public function doSomethingUseful()
    {
        return 'Output from DemoOne';
    }
}