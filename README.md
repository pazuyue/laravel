# laravel
laravel

####安装步骤
######composer install //composer下载所需扩展    
######php artisan key:generate  生成APP_KEY   
######php artisan migrate 执行数据库表生成
######php artisan serve 启动项目   
#####添加User表软删除       
######use SoftDeletes;   
######protected $dates = ['delete_at'];
######位置：vendor\laravel\framework\src\Illuminate\Foundation\Auth\User.php
  
#####添加QueryList 拉取图片

