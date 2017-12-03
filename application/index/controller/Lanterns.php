<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Lantern;


class Lanterns extends Controller
{
    public function lantern_list()
    {

        $lanternModel = new Lantern;
        $list = $lanternModel->paginate(2,false,[
            'var_page'  => 'page\Page',
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
    public function lantern_add(){

        $lanternModel = new Lantern;
        $lanternList=$lanternModel->select();

        $this->assign('lanternList', $lanternList);
        return $this->fetch('lantern/lantern_add.html');
    }


    /**
     * @Description:添加加载
     * @author:lizx
     * @date:2017年12月2日
     */
    public function lantern_save(){
        $lantern_id=$this->request->param("lantern_id");
        $lantern_name=$this->request->param("lantern_name");

        $bool=Db::table('lantern')->insert(array("lantern_id"=>$lantern_id,"lantern_name"=>$lantern_name,"create_time"=>date("Y-m-d H:i:s")));
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
    public function lantern_load(){
        $lantern_id=$_REQUEST["lantern_id"];
        $lantern_data=Db::table('lantern')->where(array("lantern_id"=>$lantern_id))->find();

        $lanternModel = new Brand;
        $lanternList=$lanternModel->select();

        $this->assign('lanternList', $lanternList);


        $this->assign('lantern_data', $lantern_data);

        return $this->fetch('lantern/lantern_load.html');

    }


    /**
     * @Description:添加加载
     * @author:lizx
     * @date:2017年12月2日
     */
    public function lantern_update(){
        $lantern_id=$_REQUEST["lantern_id"];
        $lantern_name=$_REQUEST["lantern_name"];
        $brand_id=$_REQUEST["brand_id"];
        $bool=Db::table('lantern')->where(array("lantern_id"=>$lantern_id))->update(array("brand_id"=>$brand_id,"lantern_name"=>$lantern_name));
        if($bool){
            echo json_encode(array("type"=>true));
        }else{
            echo json_encode(array("type"=>false));
        }

    }
}
