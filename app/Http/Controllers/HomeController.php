<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\Tool\Tool;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Tool $tool)
    {
        $this->middleware('auth');
        $this->tool = $tool;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * 添加角色
     */
    public function addRole()
    {
        $owner = new Role();
        $owner->name = 'owner';
        $owner->display_name = 'Project Owner';
        $owner->description = 'User is the owner of a given project';
        $owner->save();

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'User Administrator';
        $admin->description = 'User is allowed to manage and edit other users';
        $admin->save();
    }

    /**
     * 将角色绑定用户
     */
    public function distributionRole()
    {
        $admin = Role::where('id', '=', '2')->first();

        $user = Auth::user();
        //调用EntrustUserTrait提供的attachRole方法
        //$user->attachRole($admin); // 参数可以是Role对象，数组或id
        $user->roles()->attach(2); //只需传递id即可
        var_dump($user);
    }

    /**
     * 权限添加到角色
     */
    public function addPermission()
    {
        $owner = Role::where('id', '=', '1')->first();
        $admin = Role::where('id', '=', '2')->first();
        $createPost = new Permission();
        $createPost->name = 'create-post';
        $createPost->display_name = 'Create Posts';
        $createPost->description = 'create new blog posts';
        $createPost->save();

        $editUser = new Permission();
        $editUser->name = 'edit-user';
        $editUser->display_name = 'Edit Users';
        $editUser->description = 'edit existing users';
        $editUser->save();

        $owner->attachPermission($createPost);
        //等价于 $owner->perms()->sync(array($createPost->id));

        $admin->attachPermissions(array($createPost, $editUser));
        //等价于 $admin->perms()->sync(array($createPost->id, $editUser->id));
        var_dump("SUCCESS");
    }

    /**
     * 检测权限
     */
    public function hasRole()
    {
        $permission=Route::currentRouteName();
        var_dump($permission);
       /* $user = Auth::user();
        //$hasRole=$user->hasRole('admin');
        $hasRole=$user->hasRole(['owner', 'admin'], true);
        var_dump($hasRole);

        $permission=$user->can('create-post');*/

    }

    public function getfile_to_db(){
        set_time_limit(3600);

        $xmls=file_get_contents("file/I425_STOCK_CAP_20180306221438636.xml");
        $xml =simplexml_load_string($xmls);
        $xmljson= json_encode($xml);
        $xml=json_decode($xmljson,true);
        $xml_arr =$xml['product'];
        foreach ($xml_arr as &$value){
            $value['sku']=substr_replace($value['sku'],"",-6,3);
            $row=DB::table('stockA')->where('sku',$value['sku'])->first();
            if(empty($row->sku)){
                DB::insert('insert into stockA (sku, stock) values (?, ?)', [''.$value['sku'].'',$value['stock']]);
            }else{
                DB::table('stockA')
                    ->where('sku',$value['sku'])
                    ->update(['stock' => $row->stock+$value['stock']]);
            }

        }

     /*   $xmls=file_get_contents("file/201803071429.xml");
        $xml =simplexml_load_string($xmls);
        $xmljson= json_encode($xml);
        $xml=json_decode($xmljson,true);
        $xml_arr =$xml['RECORD'];
        $arr =array();
        foreach ($xml_arr as $key => $value){
            $arr[$key]['sku']=$value['goods_sku_sn'];
            $arr[$key]['stock']=$value['total'];
        }

        DB::table('stockB')->insert($arr);*/
        dump("ok");

    }

    public function select_rows(){
      /*  $rows = DB::select('SELECT
                                a.sku,a.stock,b.sku,b.stock,(a.stock-b.stock) as real_stock
                            FROM
                                stockA AS a
                            INNER  JOIN stockB AS b ON a.sku = b.sku
                            WHERE a.stock<> ?', [0]);

        foreach ($rows as $key=> $row){
            //$row->sku=substr_replace($row->sku,"",-6,3);
            $sku="187".substr($row->sku,-3);
            $row->sku=substr_replace($row->sku,$sku,-3,6);
            DB::insert('insert into stockC (sku, stock) values (?, ?)', [''.$row->sku.'',$row->real_stock]);
        }*/

        //$row=DB::table('stockC')->get();


        $this->tool->test();
       //$row=$this->arrayToXml($row);
        //file_put_contents("2018-03-07.xml",print_r($row,true));

    }






}
