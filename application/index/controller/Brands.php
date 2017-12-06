<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\model\Brand;

class Brands extends Controller
{
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->assign('active_type', "brand");


        if(empty(session("user_id"))){
            $url="/index";
            Header("Location: $url");
            exit;
        }
    }

    public function brand_list()
    {


        $brandModel = new Brand;
        $list = $brandModel->paginate(20, false, [
            'var_page' => 'page\Page',
            'list_rows' => 20,
        ]);
        $page = $list->render();
        $this->assign('list', $list);
        $this->assign('page', $page);
        return $this->fetch('brand/brand_index.html');

    }


    /**
     * @Description:添加加载
     * @author:lizx
     * @date:2017年12月2日
     */
    public function brand_add()
    {
        return $this->fetch('brand/brand_add.html');
    }


    /**
     * @Description:添加加载
     * @author:lizx
     * @date:2017年12月2日
     */
    public function brand_save()
    {
        $brand_name = $_REQUEST["brand_name"];
        $bool = Db::table('brand')->insert(array("brand_name" => $brand_name, "create_time" => date("Y-m-d H:i:s")));
        if ($bool) {
            echo json_encode(array("type" => true));
        } else {
            echo json_encode(array("type" => false));
        }

    }

    /**
     * @Description:添加加载
     * @author:lizx
     * @date:2017年12月2日
     */
    public function brand_load()
    {
        $brand_id = $_REQUEST["brand_id"];
        $brand_data = Db::table('brand')->where(array("brand_id" => $brand_id))->find();
        $this->assign('brand_data', $brand_data);

        return $this->fetch('brand/brand_load.html');

    }


    /**
     * @Description:添加加载
     * @author:lizx
     * @date:2017年12月2日
     */
    public function brand_update()
    {
        $brand_id = $_REQUEST["brand_id"];
        $brand_name = $_REQUEST["brand_name"];
        $bool = Db::table('brand')->where(array("brand_id" => $brand_id))->update(array("brand_name" => $brand_name));
        if ($bool) {
            echo json_encode(array("type" => true));
        } else {
            echo json_encode(array("type" => false));
        }

    }


    /**
     * @Description:删除
     * @author:lizx
     * @date:2017年12月2日
     */
    public function brand_delete()
    {
        $brand_id = $_REQUEST["brand_id"];
        $specials = Db::table('special')->where(array("brand_id" => $brand_id))->select();
        if (!empty($specials)) {
            echo json_encode(array("type" => false,"msg"=>"存在已有型号，请先删除灯具后再删除该品牌"));
        } else {
            $bool = Db::table('brand')->where(array("brand_id" => $brand_id))->delete();
            if($bool){
                echo json_encode(array("type" => "true","msg"=>"删除成功"));
            }else{
                echo json_encode(array("type" => "false","msg"=>"删除失败"));
            }

        }
    }

}
