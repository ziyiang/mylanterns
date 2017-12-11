<?php
namespace app\index\controller;
use think\Controller;
use think\Db;


class Admins extends Controller
{



    /**
     * @Description:登录
     * @author:lizx
     */
    public function login()
    {
        return $this->fetch('admin/to_login.html');
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


        $userinfo_data= Db::table('userinfo')->where(array("user_name" => $user_name,"password"=>$password,"is_admin"=>"Y"))->find();
        if(!empty($userinfo_data)){
            session("admin_user_id",$userinfo_data["user_id"]);
            session("admin_user_name",$userinfo_data["user_name"]);
            echo json_encode(array('type'=>'true','msg'=>"登录成功"));
        }else{
            echo json_encode(array('type'=>'false','msg'=>"用户不存在"));
        }
    }


    /**
     * @Description:退出
     * @author:lizx
     */
    public function logout()
    {
        $user_id=session("user_id");
        $userinfo_data= Db::table('userinfo')->where(array("user_id" =>$user_id))->find();
        if(!empty($userinfo_data)){
            session_unset("user_id",$userinfo_data["user_id"]);
            session_unset("user_name",$userinfo_data["user_name"]);
            echo json_encode(array('type'=>'true','msg'=>"登录成功"));
        }else{
            echo json_encode(array('type'=>'false','msg'=>"用户不存在"));
        }
    }


    public function common_lantern_list(){
        dump(222);exit;
    }
}
