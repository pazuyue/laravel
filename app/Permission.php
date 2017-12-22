<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/9
 * Time: 0:01
 */

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    use SoftDeletes;
    protected $dates = ['delete_at'];
}