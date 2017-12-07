<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2017 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace app\index\controller;

use think\Controller;
use think\Db;

class Uploads extends Controller
{

    public function upload(){
        $typeArr = array("jpg", "png", "gif");//允许上传文件格式
        $path = "upload/";//上传路径

        if (isset($_POST)) {
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $name_tmp = $_FILES['file']['tmp_name'];
            if (empty($name)) {
                echo json_encode(array("error"=>"您还未选择图片"));
                exit;
            }
            $type = strtolower(substr(strrchr($name, '.'), 1)); //获取文件类型

            if (!in_array($type, $typeArr)) {
                echo json_encode(array("error"=>"清上传jpg,png或gif类型的图片！"));
                exit;
            }
            if ($size > (500 * 1024)) {
                echo json_encode(array("error"=>"图片大小已超过500KB！"));
                exit;
            }

            $pic_name = time() . rand(10000, 99999) . "." . $type;//图片名称
            $pic_url = $path . $pic_name;//上传后图片路径+名称
            if (move_uploaded_file($name_tmp, $pic_url)) { //临时文件转移到目标文件夹
                echo json_encode(array("error"=>"0","pic"=>$pic_url,"name"=>$pic_name));
            } else {
                echo json_encode(array("error"=>"上传有误，清检查服务器配置！"));
            }
        }
    }


    public function up(){
        header('content-type:text/html charset:utf-8');
        $dir_base = "./files/";     //文件上传根目录
        //没有成功上传文件，报错并退出。
        $output = "<textarea>";
        $index = 0;        //$_FILES 以文件name为数组下标，不适用foreach($_FILES as $index=>$file)
        foreach($_FILES as $file){
            $upload_file_name = 'upload_file' . $index;        //对应index.html FomData中的文件命名
            $filename = $_FILES[$upload_file_name]['name'];
            $gb_filename = iconv('utf-8','gb2312',$filename);    //名字转换成gb2312处理
            //文件不存在才上传
            if(!file_exists($dir_base.$gb_filename)) {
                $isMoved = false;  //默认上传失败
                $MAXIMUM_FILESIZE = 1 * 1024 * 1024;     //文件大小限制    1M = 1 * 1024 * 1024 B;
                $rEFileTypes = "/^\.(jpg|jpeg|gif|png){1}$/i";
                if ($_FILES[$upload_file_name]['size'] <= $MAXIMUM_FILESIZE &&
                    preg_match($rEFileTypes, strrchr($gb_filename, '.'))) {
                    $isMoved = @move_uploaded_file ( $_FILES[$upload_file_name]['tmp_name'], $dir_base.$gb_filename);        //上传文件
                }
            }else{
                $isMoved = true;    //已存在文件设置为上传成功
            }
            if($isMoved){
                //输出图片文件<img>标签
                //注：在一些系统src可能需要urlencode处理，发现图片无法显示，
                //请尝试 urlencode($gb_filename) 或 urlencode($filename)，不行请查看HTML中显示的src并酌情解决。
                $output .= "<img src='{$dir_base}{$filename}' title='{$filename}' alt='{$filename}'/>";
            }else {
                //上传失败则把error.jpg传回给前端
                $output .= "<img src='{$dir_base}error.jpg' title='{$filename}' alt='{$filename}'/>";
            }
            $index++;
        }
        echo $output."</textarea>";
    }


}
