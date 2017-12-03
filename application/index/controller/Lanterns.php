<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\model\Special;
use app\index\model\Brand;
use app\index\model\Lantern;

class Lanterns extends Controller
{
    public function lantern_list()
    {

        $lanternModel = new lantern;
        $list = $lanternModel->paginate(2, false, [
            'var_page' => 'page\Page',
            'list_rows' => 2,
        ]);
        $page = $list->render();
        $this->assign('list', $list);
        $this->assign('page', $page);
        return $this->fetch('lantern/lantern_index.html');

    }


    /**
     * @Description:添加加载
     * @author:lizx
     * @date:2017年12月2日
     */
    public function lantern_add()
    {

        $brandModel = new Brand();
        $brandList = $brandModel->select();
        $this->assign('brandList', $brandList);

        $specialModel = new Special();
        $specialList = $specialModel->select();
        $this->assign('specialList', $specialList);

        return $this->fetch('lantern/lantern_add.html');
    }


    /**
     * @Description:添加加载
     * @author:lizx
     * @date:2017年12月2日
     */
    public function lantern_save()
    {


        $lantern_id = $this->request->param("lantern_id");
        $brand_id = $this->request->param("brand_id");
        $special_id = $this->request->param("special_id");
        $year = $this->request->param("year");
        $lamp_status = $this->request->param("lamp_status");
        $box_status = $this->request->param("box_status");
        $num = $this->request->param("num");

        $bool = Db::table('lantern')->where(array("lantern_id"=>$lantern_id))->update(
            array(
                "brand_id" => $brand_id,
                "special_id" => $special_id,
                "year" => $year,
                "lamp_status" => $lamp_status,
                "box_status" => $box_status,
                "num" => $num,
                "create_time" => date("Y-m-d H:i:s"),
            )
        );
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
    public function lantern_load()
    {
        $lantern_id = $_REQUEST["lantern_id"];
        $lanternData = Db::table('lantern')->where(array("lantern_id" => $lantern_id))->find();
        $this->assign('lanternData', $lanternData);

        $brandModel = new Brand();
        $brandList = $brandModel->select();
        $this->assign('brandList', $brandList);


        $specialModel = new Special();
        $specialList = $specialModel->select();
        $this->assign('specialList', $specialList);



        return $this->fetch('lantern/lantern_load.html');

    }


    /**
     * @Description:添加加载
     * @author:lizx
     * @date:2017年12月2日
     */
    public function lantern_update()
    {
        $lantern_id = $_REQUEST["lantern_id"];
        $lantern_name = $_REQUEST["lantern_name"];
        $brand_id = $_REQUEST["brand_id"];
        $bool = Db::table('lantern')->where(array("lantern_id" => $lantern_id))->update(array("brand_id" => $brand_id, "lantern_name" => $lantern_name));
        if ($bool) {
            echo json_encode(array("type" => true));
        } else {
            echo json_encode(array("type" => false));
        }

    }

}
