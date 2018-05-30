<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Author: 张桓
 * QQ: 248404941
 * Email: yz30.com@aliyun.com
 * Date: 2017/5/16
 * Time: 10:53
 */

namespace Admin\Controller;


use Admin\Common\FilterController;
use Think\Model;
use Think\Upload;

class ShiyanController extends FilterController
{
    /**
     * 显示B版实验大纲课程库的数据
     */
    public function showb(){
        $model = M("dagangshiyanb");
        if (IS_POST) {
//            $sqlCondition = " 1=1 ";
            $sqlCondition = " 课程编号 like 'B%' ";
            $SMajor = ($_POST['SMajor']);
            $keywords = ($_POST['keywords']);

            if ($SMajor != "") {
                $sqlCondition .= " AND (专业名称='$SMajor') ";
            }
            if ($keywords != "") {
                $sqlCondition .= " AND (课程编号 like '%$keywords%' OR 课程名称 like '%$keywords%' OR 计划批次 like '%$keywords%' OR 专业名称 like '%$keywords') ";
            }
            $where['_string'] = $sqlCondition;
            $list1=$model->field('id,计划批次, 专业名称, 课程编号, 课程名称, 学期学时, 实验学时, 上机学时, status')->where($sqlCondition)->group("课程编号")->order("课程编号")->select();

            $this->assign('data', $list1);
            $this->display();
        } else {
            $data = $model->field("id,计划批次, 专业名称, 课程编号, 课程名称, 学期学时, 实验学时, 上机学时, status")->where("课程编号 like 'B%'  ")->group("课程编号")->order("课程编号")->select();

            $this->assign('data', $data);
            $this->display();
        }
    }

    /**
     * 显示C版实验大纲课程库的数据
     */
    public function showc(){
        $model = M("dagangshiyanc");
        if (IS_POST) {
//            $sqlCondition = " 计划批次 like '2016%' ";
            $sqlCondition = " 1=1 ";
            $SMajor = ($_POST['SMajor']);
            $keywords = ($_POST['keywords']);

            if ($SMajor != "") {
                $sqlCondition .= " AND (专业名称='$SMajor') ";
            }
            if ($keywords != "") {
                $sqlCondition .= " AND (课程编号 like '%$keywords%' OR 课程名称 like '%$keywords%' OR 计划批次 like '%$keywords%' OR 专业名称 like '%$keywords') ";
            }
            $where['_string'] = $sqlCondition;
            $list1=$model->field('id,计划批次, 专业名称, 课程编号, 课程名称, 学期学时, 实验学时, 上机学时, status')->where($sqlCondition)->group("课程编号")->order("课程编号")->select();
            $this->assign('data', $list1);
            $this->display();
        } else {
            $data = $model->field("id,计划批次, 专业名称, 课程编号, 课程名称, 学期学时, 实验学时, 上机学时, status")->where("课程编号 like 'C%'")->group("课程编号")->order("课程编号")->select();
            $this->assign('data', $data);
            $this->display();
        }
    }

    /**
     * 添加数据   废弃   静止直接添加
     * 改为从库里查出数据后再修改
     */
    public function Index(){
        /*
                if (IS_POST) {
                    $CName = ($_POST["keywords"]);
                    if ($CName == "") {
                        $this->error("没有检索到任何信息， 继续添加吧");
                    } else {
                        $model = M("dagangshiyan");
                        $where['_string'] = "课程名称 like '%$CName%'";
                        $result = $model->where($where)->select();
                        dump($result);
                    }
                } else {
                    $this->assign('CCode', '');
                    $this->display();
                }
        */
        /**
         * 直接跳转到overlook
         */
        $this->redirect('overlook');
    }

    /**
     * 下载数据，前台不给权限，只能是后台用，后期可以取消
     * @param $type
     * @param $style
     * @return array
     */
    public function download($type, $style){
        if ($type == 'c' && $style=='abscent') {
            $xlsModel = M("dagangshiyanc");
            $xlsName = "shiyandagang";
            $xlsCell  = array(
                array('专业名称','专业名称'),
                array('课程编号','课程编号'),
                array('课程名称','课程名称'),
                array('学期学时','学期学时'),
                array('理论学时','理论学时'),
                array('上机学时','上机学时'),
                array('status','状态'),
            );
            $xlsData = $xlsModel->field("专业名称,课程编号,课程名称,学期学时,理论学时,上机学时")->where("status=0")->group('课程编号')->select();
            $len = count($xlsData);
            for ($i = 0; $i<$len; $i++){
                $xlsData[$i]['status'] = "缺实验大纲";
            }

            $this->exportExce_res($xlsName,$xlsCell,$xlsData);

        }
        else if ($type == 'c' && $style=='conf'){
            $xlsModel = M("shiyan");
            $xlsName = "shiyan";
            $xlsCell  = array(
                array('CName','课程名称'),
                array('CCode','课程编号'),
                array('SMajor','适用专业'),
                array('CConductor','课程负责人'),
                array('CMaster','审核人'),
                array('status','状态'),
            );
            $xlsData = $xlsModel->field("CName,CCode,CConductor,SMajor,CMaster")->where("CCode like 'C%' AND status=0")->order("课程编号")->select();
            $len = count($xlsData);
            for ($i = 0; $i<$len; $i++){
                $xlsData[$i]['status'] = "待确认";
            }
            $this->exportExce_res($xlsName,$xlsCell,$xlsData);
        }
        else if ($type == 'c' && $style=='check') {
            $xlsModel = M("shiyan");
            $xlsName = "shiyan";
            $xlsCell  = array(
                array('CName','课程名称'),
                array('CCode','课程编号'),
                array('SMajor','适用专业'),
                array('CConductor','课程负责人'),
                array('CMaster','审核人'),
                array('status','状态'),
            );
            $xlsData = $xlsModel->field("CName,CCode,CConductor,SMajor,CMaster")->where("CCode like 'B%' AND status=1")->order("CCode")->select();
            $len = count($xlsData);
            for ($i = 0; $i<$len; $i++){
                $xlsData[$i]['status'] = "待审核";
            }

            $this->exportExce_res($xlsName,$xlsCell,$xlsData);
        }
        else if ($type == 'c' && $style=='pass') {
            $xlsModel = M("shiyan");
            $xlsName = "shiyan";
            $xlsCell  = array(
                array('CName','课程名称'),
                array('CCode','课程编号'),
                array('SMajor','适用专业'),
                array('CConductor','课程负责人'),
                array('CMaster','审核人'),
                array('status','状态'),
            );
            $xlsData = $xlsModel->field("CName,CCode,CConductor,SMajor,CMaster")->where("CCode like 'C%' AND status=2")->order("CCode")->select();
            $len = count($xlsData);
            for ($i = 0; $i<$len; $i++){
                $xlsData[$i]['status'] = "已通过";
            }

            $this->exportExce_res($xlsName,$xlsCell,$xlsData);
        }
        else if ($type == 'b' && $style== 'abscent') {
            $xlsModel = M("dagangshiyanb");
            $xlsName = "shiyandagang";
            $xlsCell  = array(
                array('专业名称','专业名称'),
                array('课程编号','课程编号'),
                array('课程名称','课程名称'),
                array('学期学时','学期学时'),
                array('理论学时','理论学时'),
                array('上机学时','上机学时'),
                array('status','状态'),
            );
            $xlsData = $xlsModel->field("专业名称,课程编号,课程名称,学期学时,理论学时,上机学时")->where("课程编号 like 'B%' AND status=0")->distinct()->group('课程编号')->order("课程编号")->select();
            $len = count($xlsData);
            for ($i = 0; $i<$len; $i++){
                $xlsData[$i]['status'] = "缺实验大纲";
            }

            $this->exportExce_res($xlsName,$xlsCell,$xlsData);

        }
        else if ($type == 'b' && $style=='conf') {
            $xlsModel = M("shiyan");
            $xlsName = "shiyan";
            $xlsCell  = array(
                array('CName','课程名称'),
                array('CCode','课程编号'),
                array('SMajor','适用专业'),
                array('CConductor','课程负责人'),
                array('CMaster','审核人'),
                array('status','状态'),
            );
            $xlsData = $xlsModel->field("CName,CCode,CConductor,SMajor,CMaster")->where("CCode like 'B%' AND status=0")->order("CCode")->select();
            $len = count($xlsData);
            for ($i = 0; $i<$len; $i++){
                $xlsData[$i]['status'] = "待确认";
            }
            $this->exportExce_res($xlsName,$xlsCell,$xlsData);
        }
        else if ($type == 'b' && $style=='check'){
            $xlsModel = M("shiyan");
            $xlsName = "shiyan";
            $xlsCell  = array(
                array('CName','课程名称'),
                array('CCode','课程编号'),
                array('SMajor','适用专业'),
                array('CConductor','课程负责人'),
                array('CMaster','审核人'),
                array('status','状态'),
            );
            $xlsData = $xlsModel->field("CName,CCode,CConductor,SMajor,CMaster")->where("CCode like 'B%' AND status=1")->order("CCode")->select();
            $len = count($xlsData);
            for ($i = 0; $i<$len; $i++){
                $xlsData[$i]['status'] = "待审核";
            }

            $this->exportExce_res($xlsName,$xlsCell,$xlsData);
        }
        else if ($type == 'b' && $style=='pass') {
            $xlsModel = M("shiyan");
            $xlsName = "shiyan";
            $xlsCell  = array(
                array('CName','课程名称'),
                array('CCode','课程编号'),
                array('SMajor','适用专业'),
                array('CConductor','课程负责人'),
                array('CMaster','审核人'),
                array('status','状态'),
            );
            $xlsData = $xlsModel->field("CName,CCode,CConductor,SMajor,CMaster")->where("CCode like 'C%' AND status=2")->order('CCode')->select();
            $len = count($xlsData);
            for ($i = 0; $i<$len; $i++){
                $xlsData[$i]['status'] = "已通过";
            }

            $this->exportExce_res($xlsName,$xlsCell,$xlsData);
        }
        else {
            $this->error('非法操作。。。');
        }
    }

    /**
     * 数据处理
     * 将提交的数据写入数据库
     */
    public function IndexDo(){
        if (IS_POST) {
            $obj = M('Shiyan');
            if ($_POST["flag"] == 1) {
                // B 版
                $obj->startTrans();         // 开启事务
                $obj1 = M('Shiyan_table');
                $obj1->startTrans();        // 开启事务
                $obj2 = M('dagangshiyanb');
                $obj2->startTrans();

                $shiyan['CName'] = $_POST['CName'];
                $shiyan['EName'] = $_POST['EName'];
                $shiyan['CCode'] = ($_POST['CCode']);
                $shiyan['TNum'] = ($_POST['TNum']);
                $shiyan['shiYanYaoQiu'] = ($_POST['shiYanYaoQiu']);
                $shiyan['SMajor'] = substr(($_POST['SMajor']), 4);

                $shiyan['KeChengXingZhi'] = ($_POST['KeChengXingZhi']);
                $shiyan['CConductor'] = ($_POST['CConductor']);
                $shiyan['CMaster'] = ($_POST['CMaster']);
                $shiyan['Allowed'] = ($_POST['Allowed']);
                $shiyan['destination'] = ($_POST['destination']);
                $shiyan['BasicRequire'] = ($_POST['BasicRequire']);
                $shiyan['StyleRequire'] = ($_POST['StyleRequire']);
                $shiyan['TAddress'] = ($_POST['TAddress']);
                $shiyan['TInstrument'] = ($_POST['TInstrument']);
                $shiyan['TEvaluate'] = ($_POST['TEvaluate']);
                $shiyan['TBook'] = ($_POST['TBook']);
                $shiyan['whoSubmit'] = session('teacher_name');

                $table['CCode'] = $_POST['CCode'];
                $table['TestNum'] = $_POST['TestNum'];
                $table['TestName'] = $_POST['TestName'];
                $table['TestBasicContent'] = $_POST['TestBasicContent'];
                $table['TestXueShi'] = $_POST['TestXueShi'];
                $table['TestPerTeam'] = $_POST['TestPerTeam'];
                $table['TestRequire'] = $_POST['TestRequire'];
                $table['TestStyle'] = $_POST['TestStyle'];


                $tableRow = count($_POST['TestNum']);
                for ($i = 0; $i < $tableRow; $i++) {
                    $temp['CCode'] = ($_POST['CCode']);
                    $temp['TestNum'] = ($table['TestNum'][$i]);
                    $temp['TestName'] = ($table['TestName'][$i]);
                    $temp['TestBasicContent'] = ($table['TestBasicContent'][$i]);
                    $temp['TestXueShi'] = ($table['TestXueShi'][$i]);
                    $temp['TestPerTeam'] = ($table['TestPerTeam'][$i]);
                    $temp['TestRequire'] = ($table['TestRequire'][$i]);
                    $temp['TestStyle'] = ($table['TestStyle'][$i]);
                    $result[$i] = $obj1->add($temp);
                }

                $codee = $table['CCode'];
                $result1 = $obj->add($shiyan);
                $status['status'] = 1;
                $result2 = $obj2->where("课程编号='$codee'")->save($status);

                if ($result[0] && $result1 && $result2) {
                    $obj->commit();
                    $obj1->commit();
                    $obj2->commit();

                    $this->success('提交成功!', 'overlook');
                }
                else {
                    $obj->rollback();
                    $obj1->rollback();
                    $obj2->rollback();
                    $this->error('提交失败！! 失败原因： 可能数据库里没有您输入的   课程编号  ！，请检查课程编号是否正确');

                }
            }
            else if ($_POST["flag"] == 0){
                // C 版
                $obj->startTrans();         // 开启事务
                $obj1 = M('Shiyan_table');
                $obj1->startTrans();        // 开启事务
                $obj2 = M('dagangshiyanc');
                $obj2->startTrans();

                $shiyan['CName'] = ($_POST['CName']);
                $shiyan['EName'] = ($_POST['EName']);
                $shiyan['CCode'] = ($_POST['CCode']);
                $shiyan['TNum'] = ($_POST['TNum']);
                $shiyan['shiYanYaoQiu'] = ($_POST['shiYanYaoQiu']);
                $shiyan['SMajor'] = substr(($_POST['SMajor']), 4);

                $shiyan['KeChengXingZhi'] = ($_POST['KeChengXingZhi']);
                $shiyan['CConductor'] = ($_POST['CConductor']);
                $shiyan['CMaster'] = ($_POST['CMaster']);
                $shiyan['Allowed'] = ($_POST['Allowed']);
                $shiyan['destination'] = ($_POST['destination']);
                $shiyan['BasicRequire'] = ($_POST['BasicRequire']);
                $shiyan['StyleRequire'] = ($_POST['StyleRequire']);
                $shiyan['TAddress'] = ($_POST['TAddress']);
                $shiyan['TInstrument'] = ($_POST['TInstrument']);
                $shiyan['TEvaluate'] = ($_POST['TEvaluate']);
                $shiyan['TBook'] = ($_POST['TBook']);
                $shiyan['whoSubmit'] = session('teacher_name');

                $table['CCode'] = $_POST['CCode'];
                $table['TestNum'] = $_POST['TestNum'];
                $table['TestName'] = $_POST['TestName'];
                $table['TestBasicContent'] = $_POST['TestBasicContent'];
                $table['TestXueShi'] = $_POST['TestXueShi'];
                $table['TestPerTeam'] = $_POST['TestPerTeam'];
                $table['TestRequire'] = $_POST['TestRequire'];
                $table['TestStyle'] = $_POST['TestStyle'];


                $tableRow = count($_POST['TestNum']);
                for ($i = 0; $i < $tableRow; $i++) {
                    $temp['CCode'] = ($_POST['CCode']);
                    $temp['TestNum'] = ($table['TestNum'][$i]);
                    $temp['TestName'] = ($table['TestName'][$i]);
                    $temp['TestBasicContent'] = ($table['TestBasicContent'][$i]);
                    $temp['TestXueShi'] = ($table['TestXueShi'][$i]);
                    $temp['TestPerTeam'] = ($table['TestPerTeam'][$i]);
                    $temp['TestRequire'] = ($table['TestRequire'][$i]);
                    $temp['TestStyle'] = ($table['TestStyle'][$i]);
                    $result[$i] = $obj1->add($temp);
                }

//            dump($temp);
//            dump($shiyan);
                $codee = $table['CCode'];
                $result1 = $obj->add($shiyan);
                $status['status'] = 1;
                $result2 = $obj2->where("课程编号='$codee'")->save($status);

                if ($result[0] && $result1 && $result2) {
                    $obj->commit();
                    $obj1->commit();
                    $obj2->commit();

                    $this->success('提交成功!', 'overlook');
                }
                else {
                    $obj->rollback();
                    $obj1->rollback();
                    $obj2->rollback();
                    $this->error('提交失败！! 失败原因： 可能数据库里没有您输入的   课程编号  ！，请检查课程编号是否正确');

                }
            }

        } else {
            $this->error('非法闯入。。。');
        }

    }

    /**
     * 上传Excel文件
     */
    public function dealExcel(){
//        sleep(3);
//        dump($_FILES);
//        $this->ajaxReturn($_FILES);
//        $this->ajaxReturn($_POST);

        $config = array(
            'maxSize'=> 553145728,
            'savePath/',
        );
//         上传
        $upload = new Upload($config);
        $info = $upload->upload();
        if ($info) {
            $file_name = './Uploads/'.$info['mypic']['savepath'].$info['mypic']['savename'];
            vendor("PHPExcel");
            $objReader = \PHPExcel_IOFactory::createReader('Excel5');
            $objPHPExcel = $objReader->load($file_name, $encode = 'utf-8');
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();          // 取得总行数
//            $highestColumn = $sheet->getHighestColumn();    // 取得总列数
            $obj = M('shiyan_table');
            for ($i = 0;  $i<$highestRow - 1;   $i++)    {
                $data[$i]['TestNum'] = $objPHPExcel->getActiveSheet()->getCell("A".($i+2))->getValue();
                $data[$i]['TestName'] = $objPHPExcel->getActiveSheet()->getCell("B".($i+2))->getValue();
                $data[$i]['TestBasicContent'] = $objPHPExcel->getActiveSheet()->getCell("C".($i+2))->getValue();
                $data[$i]['TestXueShi'] = $objPHPExcel->getActiveSheet()->getCell("D".($i+2))->getValue();
                $data[$i]['TestPerTeam'] = $objPHPExcel->getActiveSheet()->getCell("E".($i+2))->getValue();
                $data[$i]['TestRequire'] = $objPHPExcel->getActiveSheet()->getCell("F".($i+2))->getValue();
                $data[$i]['TestStyle'] = $objPHPExcel->getActiveSheet()->getCell("G".($i+2))->getValue();
                $result = $obj->add($data[$i]);
            }
            if ($result) {
                $this->ajaxReturn('上传并写入成功!');
            }
        } else {
            $this->ajaxReturn('上传失败:'.$upload->getError());
        }
    }

    /**
     * 显示已经提交了的数据
     * 并制作分页
     */
    public function overlook(){
        $model = new Model();
        if (IS_POST) {
            $sqlCondition = " 1=1 ";
            $version = isset($_POST['version']) ? $_POST['version'] : null;
            $status = isset($_POST['status']) ? $_POST['status'] : null;
            $SMajor = ($_POST['SMajor']);
            $keywords = ($_POST['keywords']);

            if (isset($version)){
                $sqlCondition .= " AND (CCode like '$version%')";
            }
            if (isset($status)) {
                $sqlCondition .= " AND (status=$status) ";
            }

            if ($SMajor != "") {
                $sqlCondition .= " AND (SMajor='$SMajor') ";
            }
            if ($keywords != "") {
                $sqlCondition .= " AND (CCode like '%$keywords%' OR CName like '%$keywords%' OR SMajor like '%$keywords%' OR CMaster like '%$keywords%') ";
            }

            $where['_string'] = $sqlCondition;

            $sql = "
SELECT
	r.*
FROM
	(
		SELECT
			s.id,
			s.CCode,
			s.CName,
			s.CMaster,
			s.TNum,
			s.SMajor,
			s.status,
			s.CConductor
		FROM
			neu_shiyan s
	) r
WHERE            
            ".$sqlCondition;
            $list1 = $model->query($sql);
            $this->assign('list', $list1);
            $this->display();

        } else {

            $sql = "
SELECT
	s.id,
	s.CCode,
	s.CName,
	s.CMaster,
	s.TNum,
	s.SMajor,
	s.status,
	s.CConductor
FROM
	neu_shiyan s
GROUP BY
s.CCode
ORDER BY
s.CCode          
            ";
            $list2 = $model->query($sql);
            $this->assign('list', $list2);        // 赋值数据集
            $this->display();
        }
    }

    /**
     * 删除操作暂时还没有做
     * @param $id
     * @param $ccode
     */
    public function delete($id, $ccode){
        dump($id);
        dump($ccode);
        $this->error('暂时不支持删除, 请等待后续版本,如实在需要删除，请点击下方的给我写信  说明操作');
    }

    /**
     * 下载选中项
     * 暂时废弃不用
     */
    public function downloadSelected (){
        dump($_POST);
    }

    /**
     * 编辑修改已经提交的数据
     */
    public function edit($id, $ccode){
//        dump(111);
        if (IS_POST) {
            $obj = M('Shiyan');
            $obj->startTrans();         // 开启事务
            $obj1 = M('Shiyan_table');
            $obj1->startTrans();        // 开启事务
            $id = $_POST["id"];
            $ccode = $_POST["CCode"];
            $shiyan['CName'] = ($_POST['CName']);
            $shiyan['EName'] = ($_POST['EName']);
            $shiyan['CCode'] = ($_POST['CCode']);
            $shiyan['TNum'] = ($_POST['TNum']);
            $shiyan['shiYanYaoQiu'] = ($_POST['shiYanYaoQiu']);
            $shiyan['SMajor'] = substr(($_POST['SMajor']), 4);

            $shiyan['KeChengXingZhi'] = ($_POST['KeChengXingZhi']);
            $shiyan['CConductor'] = ($_POST['CConductor']);
            $shiyan['CMaster'] = ($_POST['CMaster']);
            $shiyan['Allowed'] = ($_POST['Allowed']);
            $shiyan['destination'] = ($_POST['destination']);
            $shiyan['BasicRequire'] = ($_POST['BasicRequire']);
            $shiyan['StyleRequire'] = ($_POST['StyleRequire']);
            $shiyan['TAddress'] = ($_POST['TAddress']);
            $shiyan['TInstrument'] = ($_POST['TInstrument']);
            $shiyan['TEvaluate'] = ($_POST['TEvaluate']);
            $shiyan['TBook'] = ($_POST['TBook']);
            $shiyan['whoSubmit'] = session('teacher_name');

            $table['CCode'] = $_POST['CCode'];
            $table['TestNum'] = $_POST['TestNum'];
            $table['TestName'] = $_POST['TestName'];
            $table['TestBasicContent'] = $_POST['TestBasicContent'];
            $table['TestXueShi'] = $_POST['TestXueShi'];
            $table['TestPerTeam'] = $_POST['TestPerTeam'];
            $table['TestRequire'] = $_POST['TestRequire'];
            $table['TestStyle'] = $_POST['TestStyle'];

            $tableRow = count($_POST['TestNum']);
            $ids = $obj1->where("CCode='$ccode'")->order("TestNum")->select();
//            $id0 = $ids['id'];
//            dump($ids);
            $flag = false;
            for ($i = 0; $i < $tableRow; $i++) {
                $temp['CCode'] = ($_POST['CCode']);
                $temp['TestNum'] = ($table['TestNum'][$i]);
                $temp['TestName'] = ($table['TestName'][$i]);
                $temp['TestBasicContent'] = ($table['TestBasicContent'][$i]);
                $temp['TestXueShi'] = ($table['TestXueShi'][$i]);
                $temp['TestPerTeam'] = ($table['TestPerTeam'][$i]);
                $temp['TestRequire'] = ($table['TestRequire'][($i+1)]);
                $temp['TestStyle'] = ($table['TestStyle'][($i+1)]);
//                $id0 = null;
                $id0 = $ids[$i]["id"];
                $result[$i] = $obj1->where("id='$id0'")->save($temp);
                $id0 = null;
                $temp = null;
            }

            $result1 = $obj->where("id=%d", array($id))->save($shiyan);
            for($j = 0; $j < $tableRow; $j++ ){
                if ($result[$j] == 1) {
                    $flag = true;
                    break;
                }
            }

            if ($flag || $result1) {
                $obj->commit();
                $obj1->commit();
                $this->success('提交成功!', "confirm?id=$id&CCode=$ccode");
            } else {
                $obj->rollback();
                $obj1->rollback();
                $this->error('提交失败！失败原因：可能没有任何操作，或者其他异常信息');

            }



        }
        $obj = M('shiyan');
        $obj1 = M('shiyan_table');
        $data = $obj->where("id=%d", array($id))->find();
        $dataTable = $obj1->where("CCode='%s'", array($ccode))->order("TestNum")->select();
//        dump($data);
//        dump($dataTable);
        $this->assign('dataTable', $dataTable);
        $this->assign('data', $data);
        $this->display();
    }

    /**
     * 添加并完善数据
     */
    public function add($id, $ccode, $flag = 0){
        if ($flag == 0 ){
            //C版
            $model = M("dagangshiyanc");
            $model1 = M("bcjianjiezhongyingwen");
            $ename = $model1->field('英文名')->where("课程编号='$ccode'")->find();
            $result = $model->where("id = $id ")->find();
            if ($result["上机学时"] !=0 && $result["实验学时"] != 0) {
                $result["学时数"] = $result['实验学时']+$result["上机学时"]."学时　　　(实验学时：".$result['实验学时']."; 上机学时：".$result['上机学时'].")";
            }
            if ($result['上机学时'] == 0 && $result["实验学时"] != 0){
                $result["学时数"] = $result["实验学时"];
            }
            if ($result['上机学时'] != 0 && $result["实验学时"] == 0) {
                $result['学时数'] = $result["上机学时"];
            }
            $this->assign('ename', $ename["英文名"]);
            $this->assign('flag', $flag);
            $this->assign("data", $result);
            $this->display();
        }
        else if ($flag == 1){
            // B 版
            $model = M("dagangshiyanb");
            $model1 = M("bcjianjiezhongyingwen");
            $ename = $model1->field('英文名')->where("课程编号='$ccode'")->find();
            $result = $model->where("id = $id ")->find();
            if ($result["上机学时"] !=0 && $result["实验学时"] != 0) {
                $result["学时数"] = $result['实验学时']+$result["上机学时"]."学时　　　(实验学时：".$result['实验学时']."; 上机学时：".$result['上机学时'].")";
            }
            if ($result['上机学时'] == 0 && $result["实验学时"] != 0){
                $result["学时数"] = $result["实验学时"];
            }
            if ($result['上机学时'] != 0 && $result["实验学时"] == 0) {
                $result['学时数'] = $result["上机学时"];
            }
            $this->assign('ename', $ename["英文名"]);
            $this->assign('flag', $flag);
            $this->assign("data", $result);
            $this->display();
        }

    }

    /**
     * 生成word文档并下载
     * 1、查询出数据
     * 2、按照格式设置排版
     */
    public function generateWord(){
        // 导入PHPWord库
        vendor("PHPWord");

        $PHPWord = new \PHPWord();
        $PHPWordHelper = new \PHPWord_Style_Font();
        $PHPWordPara = new \PHPWord_Style_Paragraph();
        $p = new \PHPWord_Style();

        /**
         * 设置全局字体名称为 宋体
         */
        $PHPWord->setDefaultFontName('宋体');

        /**
         * 设置全局字体大小为12 即 小四
         */
        $PHPWord->setDefaultFontSize(12);

        /**
         * 设置二号宋体字体到：SongTi 字体大小为：22即二号 留着给大纲的标题使用
         */
        $PHPWord->addFontStyle('SongTi', array('name'=>'宋体', 'size'=>22));

        /**
         * 设置 大纲的英语名称字体为 Times New Roman， 字体大小为18即小二
         */
        $PHPWord->addFontStyle('NewRoman', array('name'=>'Times New Roman', 'size'=>18, 'italic'=>false));
        $PHPWord->addFontStyle('NewRomanItalic', array('name'=>'Times New Roman', 'size'=>18, 'italic'=>true));

        /**
         * 设置每一级的标题 大小为宋体 小四 加粗
         */
        $PHPWord->addFontStyle('SongTiBold', array('name'=>'宋体', 'size'=>18, 'bold'=>'true'));

        // 添加段落样式到Normal以备下面使用
        $PHPWord->addParagraphStyle(
            'EName',
            array(
                'align'=>'center',
                'spaceBefore'=>3,
                'spaceAfter'=>3,
                'indentation'=>array(
                    'firstLine'=>2,
                )
            )
        );


        // 查询数据
        $obj = M("Shiyan");
        $data = $obj->order("CCode")->select();
        $len = $obj->count();
        $obj1 = M("Shiyan_table");


        for ($i = 0; $i < $len; $i++) {

            $ccode = $data[$i]['CCode'];
            $tableData = $obj1->where("CCode='$ccode'")->order("TestNum")->select();
            $len1 = $obj1->where("CCode='$ccode'")->count();

            /**
             * 标题生成结束
             */
            $depth = 1;
            $fontStyle = array('size'=>22, 'bold'=>'true');              // 18号字体 即 二号
            $paragraphStyle = array(
                'align'=>'center',      // 对其方式
                'spaceBefore'=>100,     // 断后间距
                'spaceAfter'=>0,        // 段前间距
                'spacing'=>200,         // 行高
            );
            $PHPWord->addTitleStyle($depth, $fontStyle, $paragraphStyle); // 给标题添加样式
            $section = $PHPWord->createSection();
            $titleValue = $data[$i]['CCode']."《".$data[$i]['CName']."》实验教学大纲";
            $section->addTitle($titleValue, 1);

            $textrun = $section->createTextRun(array('align'=>'center', 'spaceBefore'=>200, 'spaceAfter'=>200));

            $textrun->addText('Experiment Syllabus of ', array('italic'=>false, 'bold'=>false, 'name'=>'Times New Roman', 'size'=>18));
            $textrun->addText($data[$i]['EName'], array('italic'=>true, 'bold'=>false, 'name'=>'Times New Roman', 'size'=>18));

            $section->addText('  课程代码: '.$data[$i]['CCode'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150, 'indentation'=>array('firstLine'=>420)));
            $section->addText('  学时数: '.$data[$i]['TNum'].'学时', array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  实验要求: '.$data[$i]['shiYanYaoQiu'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  适用专业: '.$data[$i]['SMajor'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  课程性质: '.$data[$i]['KeChengXingZhi'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  课程负责人: '.$data[$i]['CMaster'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  审核人: '.$data[$i]['CConductor'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  批准人: '.$data[$i]['Allowed'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('一、实验目的与基本要求', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('1.实验目的', array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText($data[$i]['destination'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));
            $section->addText('2.基本要求', array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText($data[$i]['BasicRequire'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));
            $section->addText('二、实验方式与要求', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText($data[$i]['StyleRequire'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150, 'spacing'=>150));
            $section->addText('三、实验项目及教学安排', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150, 'spacing'=>150));

            $styleTable = array('borderColor'=>'000000',
                'borderSize'=>6,
                'cellMargin'=>50);
            $styleFirstRow = array('bgColor'=>'ffffff');
            $PHPWord->addTableStyle('myTable', $styleTable, $styleFirstRow);

            $table = $section->addTable('myTable');

            $table->addRow();
            $cell = $table->addCell(2000);
            $cell->addText('序号', array('bold'=>true));
            $cell = $table->addCell(2000);
            $cell->addText('实验名称', array('bold'=>true));
            $cell = $table->addCell(2000);
            $cell->addText('基本内容', array('bold'=>true));
            $cell = $table->addCell(2000);
            $cell->addText('实验学时', array('bold'=>true));
            $cell = $table->addCell(2000);
            $cell->addText('每组人数', array('bold'=>true));
            $cell = $table->addCell(2000);
            $cell->addText('实验要求', array('bold'=>true));
            $cell = $table->addCell(2000);
            $cell->addText('实验类型', array('bold'=>true));
            for ($j = 0; $j < $len1; $j++) {
                $tableValue = $tableData[$j];
//                dump($tableValue);
                $table->addRow();
                $cell = $table->addCell(200);
                $cell->addText($tableValue['TestNum'], array('bold'=>false));
                $cell = $table->addCell(3500);
                $cell->addText($tableValue['TestName'], array('bold'=>false));
                $cell = $table->addCell(5000);
                $cell->addText($tableValue['TestBasicContent'], array('bold'=>false));
                $cell = $table->addCell(600);
                $cell->addText($tableValue['TestXueShi'], array('bold'=>false));
                $cell = $table->addCell(200);
                $cell->addText($tableValue['TestPerTeam'], array('bold'=>false));
                $cell = $table->addCell(200);
                $cell->addText($tableValue['TestRequire'], array('bold'=>false));
                $cell = $table->addCell(200);
                $cell->addText($tableValue['TestStyle'], array('bold'=>false));

            }

            $section->addText('四、场地与设备', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('1.场地： '.$data[$i]['TAddress'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('2.主要仪器设备： '.$data[$i]['TInstrument'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('五、考核方式与成绩评定办法', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText($data[$i]['TEvaluate'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150, 'spacing'=>150));

            $section->addText('六、实验教材及参考书', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText($data[$i]['TBook'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150, 'spacing'=>150));

            $section->addTextBreak(1); // 新起一个空白段落
        }


        $fileName = "实验教学大纲".date("YmdHis");
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition:attachment;filename=".$fileName.".docx");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('php://output');

    }

    /**
     * 生成wordB文档并下载
     * 1、查询出数据
     * 2、按照格式设置排版
     */
    public function generateWordB(){
        // 导入PHPWord库
        vendor("PHPWord");

        $PHPWord = new \PHPWord();
        $PHPWordHelper = new \PHPWord_Style_Font();
        $PHPWordPara = new \PHPWord_Style_Paragraph();
        $p = new \PHPWord_Style();

        /**
         * 设置全局字体名称为 宋体
         */
        $PHPWord->setDefaultFontName('宋体');

        /**
         * 设置全局字体大小为12 即 小四
         */
        $PHPWord->setDefaultFontSize(12);

        /**
         * 设置二号宋体字体到：SongTi 字体大小为：22即二号 留着给大纲的标题使用
         */
        $PHPWord->addFontStyle('SongTi', array('name'=>'宋体', 'size'=>22));

        /**
         * 设置 大纲的英语名称字体为 Times New Roman， 字体大小为18即小二
         */
        $PHPWord->addFontStyle('NewRoman', array('name'=>'Times New Roman', 'size'=>18, 'italic'=>false));
        $PHPWord->addFontStyle('NewRomanItalic', array('name'=>'Times New Roman', 'size'=>18, 'italic'=>true));

        /**
         * 设置每一级的标题 大小为宋体 小四 加粗
         */
        $PHPWord->addFontStyle('SongTiBold', array('name'=>'宋体', 'size'=>18, 'bold'=>'true'));

        // 添加段落样式到Normal以备下面使用
        $PHPWord->addParagraphStyle(
            'EName',
            array(
                'align'=>'center',
                'spaceBefore'=>3,
                'spaceAfter'=>3,
                'indentation'=>array(
                    'firstLine'=>2,
                )
            )
        );


        // 查询数据
        $obj = M("Shiyan");
        $data = $obj->where("CCode like 'B%'")->order("CCode")->select();
        $len = $obj->where("CCode like 'B%' ")->count();
        $obj1 = M("Shiyan_table");


        for ($i = 0; $i < $len; $i++) {

            $ccode = $data[$i]['CCode'];
            $tableData = $obj1->where("CCode='$ccode'")->order("TestNum")->select();
            $len1 = $obj1->where("CCode='$ccode'")->count();

            /**
             * 标题生成结束
             */
            $depth = 1;
            $fontStyle = array('size'=>22, 'bold'=>'true');              // 18号字体 即 二号
            $paragraphStyle = array(
                'align'=>'center',      // 对其方式
                'spaceBefore'=>100,     // 断后间距
                'spaceAfter'=>0,        // 段前间距
                'spacing'=>200,         // 行高
            );
            $PHPWord->addTitleStyle($depth, $fontStyle, $paragraphStyle); // 给标题添加样式
            $section = $PHPWord->createSection();
            $titleValue = $data[$i]['CCode']."《".$data[$i]['CName']."》实验教学大纲";
            $section->addTitle($titleValue, 1);

            $textrun = $section->createTextRun(array('align'=>'center', 'spaceBefore'=>200, 'spaceAfter'=>200));

            $textrun->addText('Experiment Syllabus of ', array('italic'=>false, 'bold'=>false, 'name'=>'Times New Roman', 'size'=>18));
            $textrun->addText($data[$i]['EName'], array('italic'=>true, 'bold'=>false, 'name'=>'Times New Roman', 'size'=>18));

            $section->addText('  课程代码: '.$data[$i]['CCode'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150, 'indentation'=>array('firstLine'=>420)));
            $section->addText('  学时数: '.$data[$i]['TNum'].'学时', array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  实验要求: '.$data[$i]['shiYanYaoQiu'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  适用专业: '.$data[$i]['SMajor'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  课程性质: '.$data[$i]['KeChengXingZhi'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  课程负责人: '.$data[$i]['CMaster'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  审核人: '.$data[$i]['CConductor'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  批准人: '.$data[$i]['Allowed'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('一、实验目的与基本要求', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('1.实验目的', array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText($data[$i]['destination'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));
            $section->addText('2.基本要求', array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText($data[$i]['BasicRequire'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));
            $section->addText('二、实验方式与要求', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText($data[$i]['StyleRequire'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150, 'spacing'=>150));
            $section->addText('三、实验项目及教学安排', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150, 'spacing'=>150));

            $styleTable = array('borderColor'=>'000000',
                'borderSize'=>6,
                'cellMargin'=>50);
            $styleFirstRow = array('bgColor'=>'ffffff');
            $PHPWord->addTableStyle('myTable', $styleTable, $styleFirstRow);

            $table = $section->addTable('myTable');

            $table->addRow();
            $cell = $table->addCell(2000);
            $cell->addText('序号', array('bold'=>true));
            $cell = $table->addCell(2000);
            $cell->addText('实验名称', array('bold'=>true));
            $cell = $table->addCell(2000);
            $cell->addText('基本内容', array('bold'=>true));
            $cell = $table->addCell(2000);
            $cell->addText('实验学时', array('bold'=>true));
            $cell = $table->addCell(2000);
            $cell->addText('每组人数', array('bold'=>true));
            $cell = $table->addCell(2000);
            $cell->addText('实验要求', array('bold'=>true));
            $cell = $table->addCell(2000);
            $cell->addText('实验类型', array('bold'=>true));
            for ($j = 0; $j < $len1; $j++) {
                $tableValue = $tableData[$j];
//                dump($tableValue);
                $table->addRow();
                $cell = $table->addCell(200);
                $cell->addText($tableValue['TestNum'], array('bold'=>false));
                $cell = $table->addCell(3500);
                $cell->addText($tableValue['TestName'], array('bold'=>false));
                $cell = $table->addCell(5000);
                $cell->addText($tableValue['TestBasicContent'], array('bold'=>false));
                $cell = $table->addCell(600);
                $cell->addText($tableValue['TestXueShi'], array('bold'=>false));
                $cell = $table->addCell(200);
                $cell->addText($tableValue['TestPerTeam'], array('bold'=>false));
                $cell = $table->addCell(200);
                $cell->addText($tableValue['TestRequire'], array('bold'=>false));
                $cell = $table->addCell(200);
                $cell->addText($tableValue['TestStyle'], array('bold'=>false));

            }

            $section->addText('四、场地与设备', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('1.场地： '.$data[$i]['TAddress'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('2.主要仪器设备： '.$data[$i]['TInstrument'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('五、考核方式与成绩评定办法', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText($data[$i]['TEvaluate'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150, 'spacing'=>150));

            $section->addText('六、实验教材及参考书', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText($data[$i]['TBook'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150, 'spacing'=>150));

            $section->addTextBreak(1); // 新起一个空白段落
        }


        $fileName = "实验教学大纲".date("YmdHis");
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition:attachment;filename=".$fileName.".docx");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('php://output');

    }

    /**
     * 生成wordC文档并下载
     * 1、查询出数据
     * 2、按照格式设置排版
     */
    public function generateWordC(){
        // 导入PHPWord库
        vendor("PHPWord");

        $PHPWord = new \PHPWord();
        $PHPWordHelper = new \PHPWord_Style_Font();
        $PHPWordPara = new \PHPWord_Style_Paragraph();
        $p = new \PHPWord_Style();

        /**
         * 设置全局字体名称为 宋体
         */
        $PHPWord->setDefaultFontName('宋体');

        /**
         * 设置全局字体大小为12 即 小四
         */
        $PHPWord->setDefaultFontSize(12);

        /**
         * 设置二号宋体字体到：SongTi 字体大小为：22即二号 留着给大纲的标题使用
         */
        $PHPWord->addFontStyle('SongTi', array('name'=>'宋体', 'size'=>22));

        /**
         * 设置 大纲的英语名称字体为 Times New Roman， 字体大小为18即小二
         */
        $PHPWord->addFontStyle('NewRoman', array('name'=>'Times New Roman', 'size'=>18, 'italic'=>false));
        $PHPWord->addFontStyle('NewRomanItalic', array('name'=>'Times New Roman', 'size'=>18, 'italic'=>true));

        /**
         * 设置每一级的标题 大小为宋体 小四 加粗
         */
        $PHPWord->addFontStyle('SongTiBold', array('name'=>'宋体', 'size'=>18, 'bold'=>'true'));

        // 添加段落样式到Normal以备下面使用
        $PHPWord->addParagraphStyle(
            'EName',
            array(
                'align'=>'center',
                'spaceBefore'=>3,
                'spaceAfter'=>3,
                'indentation'=>array(
                    'firstLine'=>2,
                )
            )
        );


        // 查询数据
        $obj = M("Shiyan");
        $data = $obj->where("CCode like 'C%'")->order("CCode")->select();
        $len = $obj->where("CCode like 'C%' ")->count();
        $obj1 = M("Shiyan_table");


        for ($i = 0; $i < $len; $i++) {

            $ccode = $data[$i]['CCode'];
            $tableData = $obj1->where("CCode='$ccode'")->order("TestNum")->select();
            $len1 = $obj1->where("CCode='$ccode'")->count();

            /**
             * 标题生成结束
             */
            $depth = 1;
            $fontStyle = array('size'=>22, 'bold'=>'true');              // 18号字体 即 二号
            $paragraphStyle = array(
                'align'=>'center',      // 对其方式
                'spaceBefore'=>100,     // 断后间距
                'spaceAfter'=>0,        // 段前间距
                'spacing'=>200,         // 行高
            );
            $PHPWord->addTitleStyle($depth, $fontStyle, $paragraphStyle); // 给标题添加样式
            $section = $PHPWord->createSection();
            $titleValue = $data[$i]['CCode']."《".$data[$i]['CName']."》实验教学大纲";
            $section->addTitle($titleValue, 1);

            $textrun = $section->createTextRun(array('align'=>'center', 'spaceBefore'=>200, 'spaceAfter'=>200));

            $textrun->addText('Experiment Syllabus of ', array('italic'=>false, 'bold'=>false, 'name'=>'Times New Roman', 'size'=>18));
            $textrun->addText($data[$i]['EName'], array('italic'=>true, 'bold'=>false, 'name'=>'Times New Roman', 'size'=>18));

            $section->addText('  课程代码: '.$data[$i]['CCode'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150, 'indentation'=>array('firstLine'=>420)));
            $section->addText('  学时数: '.$data[$i]['TNum'].'学时', array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  实验要求: '.$data[$i]['shiYanYaoQiu'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  适用专业: '.$data[$i]['SMajor'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  课程性质: '.$data[$i]['KeChengXingZhi'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  课程负责人: '.$data[$i]['CMaster'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  审核人: '.$data[$i]['CConductor'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  批准人: '.$data[$i]['Allowed'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('一、实验目的与基本要求', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('1.实验目的', array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText($data[$i]['destination'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));
            $section->addText('2.基本要求', array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText($data[$i]['BasicRequire'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));
            $section->addText('二、实验方式与要求', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText($data[$i]['StyleRequire'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150, 'spacing'=>150));
            $section->addText('三、实验项目及教学安排', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150, 'spacing'=>150));

            $styleTable = array('borderColor'=>'000000',
                'borderSize'=>6,
                'cellMargin'=>50);
            $styleFirstRow = array('bgColor'=>'ffffff');
            $PHPWord->addTableStyle('myTable', $styleTable, $styleFirstRow);

            $table = $section->addTable('myTable');

            $table->addRow();
            $cell = $table->addCell(2000);
            $cell->addText('序号', array('bold'=>true));
            $cell = $table->addCell(2000);
            $cell->addText('实验名称', array('bold'=>true));
            $cell = $table->addCell(2000);
            $cell->addText('基本内容', array('bold'=>true));
            $cell = $table->addCell(2000);
            $cell->addText('实验学时', array('bold'=>true));
            $cell = $table->addCell(2000);
            $cell->addText('每组人数', array('bold'=>true));
            $cell = $table->addCell(2000);
            $cell->addText('实验要求', array('bold'=>true));
            $cell = $table->addCell(2000);
            $cell->addText('实验类型', array('bold'=>true));
            for ($j = 0; $j < $len1; $j++) {
                $tableValue = $tableData[$j];
//                dump($tableValue);
                $table->addRow();
                $cell = $table->addCell(200);
                $cell->addText($tableValue['TestNum'], array('bold'=>false));
                $cell = $table->addCell(3500);
                $cell->addText($tableValue['TestName'], array('bold'=>false));
                $cell = $table->addCell(5000);
                $cell->addText($tableValue['TestBasicContent'], array('bold'=>false));
                $cell = $table->addCell(600);
                $cell->addText($tableValue['TestXueShi'], array('bold'=>false));
                $cell = $table->addCell(200);
                $cell->addText($tableValue['TestPerTeam'], array('bold'=>false));
                $cell = $table->addCell(200);
                $cell->addText($tableValue['TestRequire'], array('bold'=>false));
                $cell = $table->addCell(200);
                $cell->addText($tableValue['TestStyle'], array('bold'=>false));

            }

            $section->addText('四、场地与设备', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('1.场地： '.$data[$i]['TAddress'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('2.主要仪器设备： '.$data[$i]['TInstrument'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('五、考核方式与成绩评定办法', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText($data[$i]['TEvaluate'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150, 'spacing'=>150));

            $section->addText('六、实验教材及参考书', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText($data[$i]['TBook'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150, 'spacing'=>150));

            $section->addTextBreak(1); // 新起一个空白段落
        }


        $fileName = "实验教学大纲".date("YmdHis");
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition:attachment;filename=".$fileName.".docx");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('php://output');

    }

    /**
     * 测试方法
     */
    /**
    字号‘八号’对应磅值5
    字号‘七号’对应磅值5.5
    字号‘小六’对应磅值6.5
    字号‘六号’对应磅值7.5
    字号‘小五’对应磅值9
    字号‘五号’对应磅值10.5
    字号‘小四’对应磅值12
    字号‘四号’对应磅值14
    字号‘小三’对应磅值15
    字号‘三号’对应磅值16
    字号‘小二’对应磅值18
    字号‘二号’对应磅值22
    字号‘小一’对应磅值24
    字号‘一号’对应磅值26
    字号‘小初’对应磅值36
    字号‘初号’对应磅值42
     */
    public function Demo(){

    }

    /**
     * 退出
     */
    public function logout(){
        session('tid', null);
        session('teacher_name', null);
        session('teacher_level', null);
        session('teacher_age', null);
        $this->success('退出成功', U('Index/Index'));
    }

    /**
     * 从数据库里读取数据并写入Excel表中
     * @param $expTitle
     * @param $expCellName
     * @param $expTableData
     */
    public function exportExce_res($expTitle,$expCellName,$expTableData){
        set_time_limit(0);

        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = $_SESSION['teacher_name'].date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        vendor("PHPExcel");
        $objPHPExcel = new \PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H');
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(25);
        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        $objPHPExcel->getActiveSheet(0)->getStyle('A1')->getFont()->setName('黑体')->setSize(16)->setBold(true);
        $objPHPExcel->getActiveSheet(0)->getStyle('A1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet(0)->getStyle('A1')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet(0)->getStyle('D')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);//总分左对齐
        $objPHPExcel->getActiveSheet(0)->getStyle('E')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);//参评人数左对齐
        $objPHPExcel->getActiveSheet(0)->getStyle('F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);//平均分左对齐
        $objPHPExcel->getActiveSheet(0)->getStyle('G')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);//平均分左对齐
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID);
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setRGB('FCF7B6');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', "实验大纲");//向合并后的单元格中写入表头
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
        }
        for($i=0; $i<$dataNum; $i++){
            for($j=0; $j<$cellNum; $j++){
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
            }
        }
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

    /**
     * 单条审核
     * @param $id
     */
    public function check($id=0,$CCode=0, $flag=0){
        $model = M("shiyan");
        if ($flag == 0){
            $model1 = M('shiyan_table');
            $result = $model->where("id = $id")->find();

            $tableData = $model1->where("CCode = '$CCode'")->order("TestNum")->select();

            if($result == null && $tableData == null){
                $this->error('非法操作。。。');
            } else {
                $this->assign('data', $tableData);
                $this->assign('result', $result);
                $this->display();
            }
        }
        else if ($flag == 1) {
//            dump($id);
//            dump($CCode);
//            dump($flag);
//            $model = M("shiyan");
            $data["status"] = 2;
            $result = $model->where("id=$id")->save($data);
            if ($result) {
                $this->success("审核完成", 'overlook');
            } else {
                $this->error("审核失败");
            }
        } else {
            $this->error('非法操作。。。');
        }
    }

    /**
     * 单条确认
     * @param int $id
     * @param int $CCode
     * @param int $flag
     */
    public function confirm($id=0, $CCode=0, $flag=0){
        $model = M("shiyan");
        if ($flag == 0){
            $model1 = M('shiyan_table');
            $result = $model->where("id = $id")->find();

            $tableData = $model1->where("CCode = '$CCode'")->order("TestNum")->select();
//            dump($tableData);

            if($result == null && $tableData == null){
                $this->error('非法操作。。。');
            } else {
                $this->assign('data', $tableData);
                $this->assign('result', $result);
                $this->display();
            }
        }
        else if ($flag == 1) {
            $data["status"] = 1;
            $result = $model->where("id=$id")->save($data);
            if ($result) {
                $this->success("确认完成", 'overlook');
            } else {
                $this->error("确认失败");
            }
        } else {
            $this->error('非法操作。。。');
        }
    }

    /**
     * 实验指导书 展示
     */
    public function guideBook(){
        $model = new Model();
        if (IS_POST) {
            // 检索 的
            $sqlCondition = " 1=1 ";
            $version = isset($_POST['version']) ? $_POST['version'] : null;
            $uploadStatus = isset($_POST["uploadStatus"]) ? $_POST['uploadStatus'] : null;
            $SMajor = ($_POST['SMajor']);
            $keywords = ($_POST['keywords']);


            if (isset($version)){
                $sqlCondition .= " AND (z1.CCode like '$version%')";
            }
            if (isset($uploadStatus)) {
                if ($uploadStatus == "needed"){
                    $sqlCondition .= " AND z1.filename is null";
                } else if ($uploadStatus == 'finished'){
                    $sqlCondition .= " AND z1.filename is not null";
                }
            }
            if ($SMajor != "") {
                $sqlCondition .= " AND (z1.SMajor='$SMajor') ";
            }
            if ($keywords != "") {
                $sqlCondition .= " AND (z1.CCode like '%$keywords%' OR z1.CName like '%$keywords%' OR z1.SMajor like '%$keywords%' OR z1.CMaster like '%$keywords%') ";
            }

            $where['_string'] = $sqlCondition;
            $sql = "
            select z1.* from
(SELECT
	n.id,
	n.CCode,
	n.CName,
	n.CMaster,
	n.TNum,
	n.SMajor,
	n.CConductor,
	b.filename
FROM
	neu_shiyan n
LEFT OUTER JOIN neu_shiyanguidebook b ON n.CCode = b.CCode
GROUP BY
	n.CCode
ORDER BY
	n.CCode)
 z1
where ".$sqlCondition;
            $list1 = $model->query($sql);
            $this->assign('list', $list1);
            $this->display();
        }
        else {

            $sql = "
SELECT
	n.id,
	n.CCode,
	n.CName,
	n.CMaster,
	n.TNum,
	n.SMajor,
	n.CConductor,
	b.filename
FROM
	neu_shiyan n
LEFT OUTER JOIN neu_shiyanguidebook b ON n.CCode = b.CCode
GROUP BY
	n.CCode
ORDER BY
	n.CCode
";
            $list2 = $model->query($sql);
            $this->assign('list', $list2);        // 赋值数据集
            $this->display();
        }


    }

    /**
     * 实验指导书 上传
     */
    public function uploadGuideBook(){
        header("Content-type:text/html;charset=utf8");

        $CCode = $_POST["CCode"];
//        $model = M("shiyan");
//        $result = $model->where("CCode = '$CCode'")->find();
//        $CName = $result["CName"];
//        $CMaster = $result["CMaster"];

//         上传
        $upload = new Upload();
        $upload->maxSize =  553145728;     // 设置附件上传大小  500M
        $upload->exts = array('pdf');
        $upload->autoSub = false;
        $upload->saveName = $CCode;
        $upload->rootPath = './Uploads/shiyan/';

        $info = $upload->upload();

        if ($info) {
            $file_name = './Uploads/shiyan/'.$info['mypic']['savepath'].$info['mypic']['savename'];
            $model = M("shiyanguidebook");
            $data["CCode"] = $CCode;
            $data["filename"] = $file_name;
            $data["uploadTime"] = date("Y-m-d: H:i:s");
            $data["ip"] = get_client_ip();
            $data["whoupload"] = session("admin_name");


            $result = $model->add($data);
            if ($result) {
                $this->ajaxReturn('上传成功!写入数据库成功!!');
            } else {
                $this->ajaxReturn('上传成功，但写入数据库失败!!  请从下方的 <b>给我写信</b>及时联系我们');
            }

        } else {
            $this->ajaxReturn('上传失败:'.$upload->getError().'请从下方的 <b>给我写信</b>及时联系我们');
        }

    }

    /**
     * 授权使其能够修改
     */
    public function auth($ccode=0){
        $model = M("shiyan");
//        $data = $model->where("CCode = '$ccode'")->find();
        $status["status"] = 0;
        $result = $model->where("CCode = '$ccode'")->save($status);
        if ($result) {
//            dump("授权成功");
            $this->success("授权成功");
        } else {
//            dump("授权失败");
            $this->error("授权失败");
        }
    }

    /**
     * 实验大纲缺   B版
     */
    public function abscentB(){
        $model = new Model();
        $xlsName = "shiyanzhidaoshu";
        $xlsCell  = array(
            array('CCode','课程编号'),
            array('CName','课程名称'),
            array('CMaster','课程负责人'),
            array('TNum','学时数'),
            array('SMajor','专业名称'),
            array('CConductor','审核人'),
            array('status','状态'),
        );
        $sql = "
select z1.*
from
(
SELECT
	n.id,
	n.CCode,
	n.CName,
	n.CMaster,
	n.TNum,
	n.SMajor,
	n.CConductor,
	b.filename
FROM
	neu_shiyan n
LEFT OUTER JOIN neu_shiyanguidebook b ON n.CCode = b.CCode 
GROUP BY
	n.CCode
ORDER BY
n.SMajor,
n.CCode
)
z1
where z1.filename is null 
and z1.CCode like 'B%'
";
        $xlsData = $model->query($sql);
        $len = count($xlsData);
        for ($i = 0; $i<$len; $i++){
            $xlsData[$i]['status'] = "缺实验指导书";
        }

        $this->exportExce_res($xlsName,$xlsCell,$xlsData);
    }

    /**
     * 实验大纲缺  C版
     */
    public function abscentC(){
        $model = new Model();
        $xlsName = "shiyanzhidaoshu";
        $xlsCell  = array(
            array('CCode','课程编号'),
            array('CName','课程名称'),
            array('CMaster','课程负责人'),
            array('TNum','学时数'),
            array('SMajor','专业名称'),
            array('CConductor','审核人'),
            array('status','状态'),
        );
        $sql = "
select z1.*
from
(
SELECT
	n.id,
	n.CCode,
	n.CName,
	n.CMaster,
	n.TNum,
	n.SMajor,
	n.CConductor,
	b.filename
FROM
	neu_shiyan n
LEFT OUTER JOIN neu_shiyanguidebook b ON n.CCode = b.CCode 
GROUP BY
	n.CCode
ORDER BY
n.SMajor,
n.CCode
)
z1
where z1.filename is null 
and z1.CCode like 'C%'
";
        $xlsData = $model->query($sql);
        $len = count($xlsData);
        for ($i = 0; $i<$len; $i++){
            $xlsData[$i]['status'] = "缺实验指导书";
        }

        $this->exportExce_res($xlsName,$xlsCell,$xlsData);
    }

    /**
     * 实验大纲缺 BC一起
     */
    public function abscentBC(){
        $model = new Model();
        $xlsName = "shiyanzhidaoshu";
        $xlsCell  = array(
            array('CCode','课程编号'),
            array('CName','课程名称'),
            array('CMaster','课程负责人'),
            array('TNum','学时数'),
            array('SMajor','专业名称'),
            array('CConductor','审核人'),
            array('status','状态'),
        );
        $sql = "
select z1.*
from
(
SELECT
	n.id,
	n.CCode,
	n.CName,
	n.CMaster,
	n.TNum,
	n.SMajor,
	n.CConductor,
	b.filename
FROM
	neu_shiyan n
LEFT OUTER JOIN neu_shiyanguidebook b ON n.CCode = b.CCode 
GROUP BY
	n.CCode
) z1
where z1.filename is null
ORDER BY  z1.SMajor, z1.CCode
";
        $xlsData = $model->query($sql);
        $len = count($xlsData);
        for ($i = 0; $i<$len; $i++){
            $xlsData[$i]['status'] = "缺实验指导书";
        }
//dump($xlsData);
//        exit();
        $this->exportExce_res($xlsName,$xlsCell,$xlsData);
    }

    public function generateExcel($v=0){
        $xlsModel = M("shiyan");
        $xlsName = "shiyan";
        $xlsCell  = array(
            array('CName','课程名称'),
            array('CCode','课程编号'),
            array('SMajor','适用专业'),
            array('CConductor','课程负责人'),
            array('CMaster','审核人'),
        );
        if ($v == 'B' || $v == 'C'){
            $xlsData = $xlsModel->field("CName,CCode,CConductor,SMajor,CMaster")->where("CCode like '$v%'")->order('CCode')->select();
        } else {
            $this->error("不是点进来的吧！乱传参，大哥你想干什么？？？   :(   ");
        }
        $this->exportExce_res_bc($v, $xlsName,$xlsCell,$xlsData);
    }

    /**
     * 从数据库里读取数据并写入Excel表中
     * @param $expTitle
     * @param $expCellName
     * @param $expTableData
     */
    public function exportExce_res_bc($v, $expTitle,$expCellName,$expTableData){
        set_time_limit(0);

        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = $v.'版实验大纲';//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        vendor("PHPExcel");
        $objPHPExcel = new \PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H', 'I', 'J');
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(25);
        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        $objPHPExcel->getActiveSheet(0)->getStyle('A1')->getFont()->setName('黑体')->setSize(16)->setBold(true);
        $objPHPExcel->getActiveSheet(0)->getStyle('A1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet(0)->getStyle('A1')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet(0)->getStyle('D')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);//总分左对齐
        $objPHPExcel->getActiveSheet(0)->getStyle('E')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);//参评人数左对齐
        $objPHPExcel->getActiveSheet(0)->getStyle('F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);//平均分左对齐
        $objPHPExcel->getActiveSheet(0)->getStyle('G')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);//平均分左对齐
        $objPHPExcel->getActiveSheet(0)->getStyle('H')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);//平均分左对齐
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID);
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setRGB('FCF7B6');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $v."版实验大纲 Excel 目录");//向合并后的单元格中写入表头
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
        }
        for($i=0; $i<$dataNum; $i++){
            for($j=0; $j<$cellNum; $j++){
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
            }
        }
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

    public function uploadCard()
    {
        header("Content-type:text/html;charset=utf8");

        $idAndCCode = $_POST["id"];
        $id = mb_split("&", $idAndCCode)[0];
        $CCode = mb_split("&", $idAndCCode)[1];

//         上传
        $upload = new Upload();
        $upload->maxSize = 553145728;     // 设置附件上传大小   500M
        $upload->exts = array('docx', 'doc');
        $upload->autoSub = false;
        $upload->saveName = $CCode."&".$id;
        $upload->rootPath = './Uploads/cards/';

        $info = $upload->upload();

        if ($info) {
            $file_name = './Uploads/cards/' . $info['mypic']['savepath'] . $info['mypic']['savename'];
            $model = M("shiyancard");
            $model->startTrans();         // 开启事务
            $data["pid"] = $id;
            $data["CCode"] = $CCode;
            $data["filename"] = $file_name;
            $data["uploadTime"] = date("Y-m-d: H:i:s");
            $data["ip"] = get_client_ip();
            $data["whoupload"] = session("teacher_name");

            $model1 = M("shiyan_table");
            $model1->startTrans();         // 开启事务
            $result = $model->add($data);
            $card["card"] = 1;
            $result1 = $model1->where("id = $id")->save($card);

            if ($result && $result1) {
                $model->commit();
                $model1->commit();
                $this->ajaxReturn('上传成功!写入数据库成功!!');
            } else {
                $model->rollback();
                $model1->rollback();
                $this->ajaxReturn('上传成功，但写入数据库失败!!  请从下方的 <b>给我写信</b>及时联系我们');
            }

        } else {
            $this->ajaxReturn('上传失败:' . $upload->getError() . '请从下方的 <b>给我写信</b>及时联系我们');
        }

    }

    /**
     * 实验课程明细
     */
    public function detail(){
        $model = new Model();
        if (IS_POST) {
            $sqlCondition = " WHERE 1=1 ";
            $version = isset($_POST['version']) ? $_POST['version'] : null | "";
            $year = $_POST['year'];
            $keywords = trim($_POST['keywords']);
            $card = isset($_POST['card']) ? $_POST["card"] : null;

            if ($version != "" || !isset($version)) {
                $sqlCondition .= " AND (z1.CCode like '$version%') ";
            }

            if (isset($card)) {
                $sqlCondition .= " AND (card=$card) ";
            }

            if ($year  != "") {
                $sqlCondition .= " AND (z1.学期 = '$year') ";
            }
            if ($keywords != "" || !isset($keywords)) {
                $sqlCondition .= " AND
                    (
                    z1.CCode like '%$keywords%' 
                    OR z1.CName like '%$keywords%' 
                    OR z1.`CMaster` like '%$keywords%' 
                    )";
            }
            $sql = "
SELECT *
FROM
  (
    SELECT
  a1.*,
  b1.*
FROM (
       SELECT
         z.*,
         b.CMaster,
         b.TNum,
         b.CName
       FROM
         (
           SELECT
             s.id,
             s.CCode,
             s.TestStyle,
             s.TestName,
             s.TestXueShi,
             s.card,
             aa.*
           FROM neu_shiyan_table s
             LEFT OUTER JOIN
             (
               SELECT
                 filename,
                 pid
               FROM neu_shiyancard
             ) aa
               ON aa.pid = s.id
         ) z
         LEFT OUTER JOIN
         (
           SELECT
             CCode,
             CName,
             CMaster,
             TNum
           FROM neu_shiyan
         ) b
           ON z.CCode = b.CCode
     ) a1
  LEFT OUTER JOIN
  (
    SELECT
      课程编号,
      上课对象,
      学期
    FROM neu_jiaoxuerenwu
  ) b1
    ON a1.CCode = b1.课程编号
ORDER BY a1.CCode ASC
  ) z1             
                ".$sqlCondition;
            $data = $model->query($sql);
            if ($_POST["style"] == "检索"){
                $this->assign("list", $data);
                $this->display();
            } else if ($_POST["style"] == "下载数据"){
                $xlsName = "task";
                $xlsCell = array(
                    array('id', '编号'),
                    array('CCode', '课程编号'),
                    array('CName', '课程名称'),
                    array('TestStyle', '实验类型'),
                    array('TestName', '实验项目名称'),
                    array('TestStyle', '实验项目类型'),
                    array('TestXueShi', '实验学时'),
                    array('CMaster', '实验教师'),
                    array('TNum', '实验总学时'),
                    array('上课对象', '上课对象'),
                );

                $this->exportExcel($xlsName, $xlsCell, $data);
            } else if ($_POST["style"] == "同课程名合并后下载") {
                $sql1 = $sql." group by CName";
                $data1 = $model->query($sql1);
                $xlsName = "task";
                $xlsCell = array(
                    array('id', '编号'),
                    array('CCode', '课程编号'),
                    array('CName', '课程名称'),
                    array('TestStyle', '实验类型'),
                    array('TestName', '实验项目名称'),
                    array('TestStyle', '实验项目类型'),
                    array('TestXueShi', '实验学时'),
                    array('CMaster', '实验教师'),
                    array('TNum', '实验总学时'),
                    array('上课对象', '上课对象'),
                );

//                dump($data1);
//                die();
                $this->exportExcel($xlsName, $xlsCell, $data1);
            }
        } else {

            $sql = "
SELECT
  a1.*,
  b1.*
FROM (
       SELECT
         z.*,
         b.CMaster,
         b.TNum,
         b.CName
       FROM
         (
           SELECT
             s.id,
             s.CCode,
             s.TestStyle,
             s.TestName,
             s.TestXueShi,
             s.card,
             aa.*
           FROM neu_shiyan_table s
             LEFT OUTER JOIN
             (
               SELECT
                 filename,
                 pid
               FROM neu_shiyancard
             ) aa
               ON aa.pid = s.id
         ) z
         LEFT OUTER JOIN
         (
           SELECT
             CCode,
             CName,
             CMaster,
             TNum
           FROM neu_shiyan
         ) b
           ON z.CCode = b.CCode
     ) a1
  LEFT OUTER JOIN
  (
    SELECT
      课程编号,
      上课对象,
      学期
    FROM neu_jiaoxuerenwu
  ) b1
    ON a1.CCode = b1.课程编号
    ORDER BY a1.CCode ASC
        ";
            $list = $model->query($sql);
            $this->assign("list", $list);
            $this->display();
        }
    }


    public function exportExcel($expTitle, $expCellName, $expTableData)
    {
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = $_SESSION['admin_name'] . date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        vendor("PHPExcel");
        $objPHPExcel = new \PHPExcel();
        $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', "AP", "AQ", "AR", "AS", "AT", "AU", "AV", "AW");
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(26);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(25);
        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        $objPHPExcel->getActiveSheet(0)->getStyle('A1')->getFont()->setName('黑体')->setSize(16)->setBold(true);
        $objPHPExcel->getActiveSheet(0)->getStyle('A1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet(0)->getStyle('A1')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet(0)->getStyle('D')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);//总分左对齐
        $objPHPExcel->getActiveSheet(0)->getStyle('E')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);//参评人数左对齐
        $objPHPExcel->getActiveSheet(0)->getStyle('F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);//平均分左对齐
        $objPHPExcel->getActiveSheet(0)->getStyle('G')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);//平均分左对齐
        $objPHPExcel->getActiveSheet(0)->getStyle('H')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);//平均分左对齐
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID);
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setRGB('FCF7B6');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', "实验课程明细");//向合并后的单元格中写入表头
        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:' . $cellName[$cellNum - 1] . '1');//合并单元格

        for ($i = 0; $i < $cellNum; $i++) {
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i] . '2', $expCellName[$i][1]);
        }
        for ($i = 0; $i < $dataNum; $i++) {
            for ($j = 0; $j < $cellNum; $j++) {
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j] . ($i + 3), $expTableData[$i][$expCellName[$j][0]]);
            }
        }

        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $xlsTitle . '.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }


}


