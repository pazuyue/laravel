# laravel
laravel

安装步骤
composer install //composer下载所需扩展    
php artisan key:generate  生成APP_KEY   
 php artisan migrate 执行数据库表生成
php artisan serve 启动项目   
添加User表软删除       
use SoftDeletes;   
protected $dates = ['delete_at'];
#####位置：vendor\laravel\framework\src\Illuminate\Foundation\Auth\User.php

#####位置：D:\phpStudy\WWW\laraver\pusher\config\broadcasting.php
 'pusher' => [
            'driver' => 'pusher',
            'key' => env('PUSHER_APP_KEY'),
            'secret' => env('PUSHER_APP_SECRET'),
            'app_id' => env('PUSHER_APP_ID'),
            'options' => [
                'cluster' => 'ap1',
                //'encrypted' => true,
            ],
        ],

####pusher填坑
#####位置：D:\phpStudy\WWW\laraver\pusher\vendor\laravel\framework\src\Illuminate\Broadcasting\Broadcasters\PusherBroadcaster.php
broadcast函数      
throw new BroadcastException(
                       is_bool($response['body']) ? 'Failed to connect to Pusher.' : $response['body']
                   );
                  
#####use Pusher\Pusher 改为 use Pusher         
 D:\phpStudy\WWW\laraver\pusher\vendor\laravel\framework\src\Illuminate\Broadcasting\Broadcasters\PusherBroadcaster.php      
 D:\phpStudy\WWW\laraver\pusher\vendor\laravel\framework\src\Illuminate\Broadcasting\BroadcastManager.php
BROADCAST_DRIVER=pusher 

#####位置：D:\phpStudy\WWW\laraver\pusher\vendor\laravel\framework\src\Illuminate\Broadcasting\BroadcastManager.php
修改auth方法，在其中添加类容
$pusher_config=$this->app['config']['broadcasting']['connections']['pusher'];
$pusher = new Pusher($pusher_config['key'], $pusher_config['secret'], $pusher_config['app_id'], true, "http://api.pusherapp.com");
return $pusher->socket_auth($request['channel_name'], $request['socket_id']);

#####位置： D:\phpStudy\WWW\laraver\pusher\vendor\laravel\framework\README.md
这里是Puser的说明书，有问题可以参考这里

