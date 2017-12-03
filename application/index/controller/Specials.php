<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\model\Special;
use app\index\model\Brand;

class Specials extends Controller
{
    public function special_list()
    {

        $specialModel = new Special;
        $list = $specialModel->paginate(2,false,[
            'var_page'  => 'page\Page',
            'list_rows' => 2,
        ]);
        $page = $list->render();
        $this->assign('list', $list);
        $this->assign('page', $page);
        return $this->fetch('special/special_index.html');

    }


    /**
     * @Description:添加加载
     * @author:lizx
     * @date:2017年12月2日
     */
    public function special_add(){

        $brandModel = new Brand;
        $brandList=$brandModel->select();

        $this->assign('brandList', $brandList);
        return $this->fetch('special/special_add.html');
    }


    /**
     * @Description:添加加载
     * @author:lizx
     * @date:2017年12月2日
     */
    public function special_save(){
        $grand_id=$this->request->param("brand_id");
        $special_name=$this->request->param("special_name");

        $bool=Db::table('special')->insert(array("brand_id"=>$grand_id,"special_name"=>$special_name,"create_time"=>date("Y-m-d H:i:s")));
        if($bool){
            echo json_encode(array("type"=>true));
        }else{
            echo json_encode(array("type"=>false));
        }

    }

    /**
     * @Description:添加加载
     * @author:lizx
     * @date:2017年12月2日
     */
    public function special_load(){
        $special_id=$_REQUEST["special_id"];
        $special_data=Db::table('special')->where(array("special_id"=>$special_id))->find();

        $brandModel = new Brand;
        $brandList=$brandModel->select();

        $this->assign('brandList', $brandList);


        $this->assign('special_data', $special_data);

        return $this->fetch('special/special_load.html');

    }


    /**
     * @Description:添加加载
     * @author:lizx
     * @date:2017年12月2日
     */
    public function special_update(){
        $special_id=$_REQUEST["special_id"];
        $special_name=$_REQUEST["special_name"];
        $brand_id=$_REQUEST["brand_id"];
        $bool=Db::table('special')->where(array("special_id"=>$special_id))->update(array("brand_id"=>$brand_id,"special_name"=>$special_name));
        if($bool){
            echo json_encode(array("type"=>true));
        }else{
            echo json_encode(array("type"=>false));
        }

    }

}
