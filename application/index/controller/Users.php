<?php
namespace app\index\controller;
use think\Controller;
use think\Db;


class Users extends Controller
{

    /**
     * @Description:注册
     * @author:lizx
     */
    /*public function toRegister()
    {
        $user_name="";

    }*/


    /**
     * @Description:登录
     * @author:lizx
     */
    public function login()
    {
        return $this->fetch('lantern/lantern_index.html');
    }


    /**
     * @Description:登录
     * @author:lizx
     */
    public function to_login()
    {
        $user_name= $_REQUEST["user_name"];
        if(empty($user_name)){
            echo json_encode(array('msg'=>"用户名不为空"));
        }
        $password= $_REQUEST["password"];
        if(empty($password)){
            echo json_encode(array('msg'=>"密码不为空"));
        }


        $userinfo_data= Db::table('userinfo')->where(array("user_name" => $user_name,"password"=>$password))->find();
        if(!empty($userinfo_data)){
            echo json_encode(array('msg'=>"登录成功"));
        }else{
            echo json_encode(array('msg'=>"用户不存在"));
        }
    }
}
