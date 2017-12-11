<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\Lantern;
use app\index\model\Special;
use app\index\model\Brand;
class Users extends Controller
{


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
            session("user_id",$userinfo_data["user_id"]);
            session("user_name",$userinfo_data["user_name"]);
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
        $lanternModel = new lantern;
        $list = $lanternModel->paginate(20, false, [
            'var_page' => 'page\Page',
            'list_rows' => 20,
        ]);
        $page = $list->render();
        $this->assign('list', $list);
        $this->assign('page', $page);
        return $this->fetch('user/common_lantern_list.html');
    }


    /**
     * @Description:添加加载
     * @author:lizx
     * @date:2017年12月2日
     */
    public function common_lantern_view()
    {
        $lantern_id = $_REQUEST["lantern_id"];
        $lanternData = Db::table('lantern')->where(array("lantern_id" => $lantern_id))->find();
        $this->assign('lanternData', $lanternData);

        $lanternPics=json_decode($lanternData["pics"],true);
        $this->assign('lanternPics', $lanternPics);


        $brandModel = new Brand();
        $brandList = $brandModel->select();
        $this->assign('brandList', $brandList);


        $specialModel = new Special();
        $specialList = $specialModel->select();
        $this->assign('specialList', $specialList);



        return $this->fetch('user/common_lantern_view.html');

    }
}
