<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

/*return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];*/


use think\Route;



Route::post([
    'to_login' => 'users/to_login',
    'logout' => 'users/logout',
]);



Route::get([
    'brand_list' => 'brands/brand_list',
    'brand_add' => 'brands/brand_add',
    'brand_load' => 'brands/brand_load',
]);
Route::post([
    'brand_save' => 'brands/brand_save',
    'brand_update' => 'brands/brand_update',
    'brand_delete' => 'brands/brand_delete',
]);






Route::get([
    'special_list' => 'specials/special_list',
    'special_add' => 'specials/special_add',
    'special_load' => 'specials/special_load',
]);
Route::post([
    'special_save' => 'specials/special_save',
    'special_update' => 'specials/special_update',
    'special_delete' => 'specials/special_delete',
]);





Route::get([
    'lantern_list' => 'lanterns/lantern_list',
    'lantern_add' => 'lanterns/lantern_add',
    'lantern_load' => 'lanterns/lantern_load',
]);
Route::post([
    'lantern_save' => 'lanterns/lantern_save',
    'lantern_update' => 'lanterns/lantern_update',
    'upload' => 'upload/one',
    'lantern_delete' => 'lanterns/lantern_delete',
]);


