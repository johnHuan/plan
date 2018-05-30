<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Author: 张桓
 * QQ: 248404941
 * Email: yz30.com@aliyun.com
 * Date: 2017/5/16
 * Time: 13:56
 */

namespace home\Controller;

use Home\Common\FilterController;
use Think\Model;
use Think\Upload;

class ShijianController extends FilterController {

    /**
     * index页 不需要， 直接重定向到overlook页面
     */
    public function index(){
        $this->redirect('overlook');
    }

    /**
     * 处理提交表单数据， 将数据写入数据库
     */
    public function indexDo(){
        if (IS_POST) {
            if($_POST['flag'] == 1){
                // B 版
                $model = M("shijian");
                $model1 = M("dagangshijianb");
                $model->startTrans();         // 开启事务
                $model1->startTrans();         // 开启事务
                $data = $_POST;
                $ccode = $data["CCode"];
                array_shift($data);
                $data["SMajor"] = substr($data["SMajor"], 4);
                $result = $model->add($data);
                $save["status"] = 1;
                $result1 = $model1->where("课程编号 = '$ccode'")->save($save);
                if ($result && $result1){
                    $model->commit();
                    $model1->commit();
                    $this->success('提交成功!', 'overlook');
                } else {
                    $model->rollback();
                    $model1->rollback();
                    $this->error('提交失败！! 失败原因： 可能数据库里没有您输入的   课程编号  ！，请检查课程编号是否正确');
                }
            }
            else if ($_POST['flag'] == 0) {
                // C 版
                $model = M("shijian");
                $model1 = M("dagangshijianc");
                $model->startTrans();         // 开启事务
                $model1->startTrans();         // 开启事务
                $data = $_POST;
                $ccode = $data["CCode"];
                array_shift($data);
                $data["SMajor"] = substr($data["SMajor"], 4);
                $result = $model->add($data);
                $save["status"] = 1;
                $result1 = $model1->where("课程编号 = '$ccode'")->save($save);
                if ($result && $result1){
                    $model->commit();
                    $model1->commit();
                    $this->success('提交成功!', 'overlook');
                } else {
                    $model->rollback();
                    $model1->rollback();
                    $this->error('提交失败！! 失败原因： 可能数据库里没有您输入的   课程编号  ！，请检查课程编号是否正确');
                }

            }

        } else {
            $this->error("非法闯入。。。");
        }
    }

    /**
     * 显示B版实践大纲
     */
    public function showb(){
        $model = M("dagangshijianb");
        if (IS_POST) {
//            $sqlCondition = " 1=1 ";
            $sqlCondition = " 课程编号 like 'B%' ";
            $SMajor = $_POST['SMajor'];
            $keywords = $_POST['keywords'];

            if ($SMajor != "") {
                $sqlCondition .= " AND (专业名称='$SMajor') ";
            }
            if ($keywords != "") {
                $sqlCondition .= " AND (课程编号 like '%$keywords%' OR 课程名称 like '%$keywords%' OR 计划批次 like '%$keywords%' OR 专业名称 like '%$keywords') ";
            }
            $where['_string'] = $sqlCondition;
            $list1=$model->field('id,计划批次, 专业名称, 课程编号, 课程名称, 学期学时, status')->where($sqlCondition)->group("课程编号")->order("课程编号")->select();
            $this->assign('data', $list1);
            $this->display();
        } else {
            $data = $model->field("id,计划批次, 专业名称, 课程编号, 课程名称, 学期学时, status")->where("课程编号 like 'B%'  ")->group("课程编号")->order("课程编号")->select();
//            dump($data);
            $this->assign('data', $data);
            $this->display();
        }
    }

    /**
     * 显示C版实践大纲
     */
    public function showc(){
        $model = M("dagangshijianc");
        if (IS_POST) {
//            $sqlCondition = " 计划批次 like '2016%' ";
            $sqlCondition = " 课程编号 like 'C%' ";
            $SMajor = $_POST['SMajor'];
            $keywords = $_POST['keywords'];

            if ($SMajor != "") {
                $sqlCondition .= " AND (专业名称='$SMajor') ";
            }
            if ($keywords != "") {
                $sqlCondition .= " AND (课程编号 like '%$keywords%' OR 课程名称 like '%$keywords%' OR 计划批次 like '%$keywords%' OR 专业名称 like '%$keywords') ";
            }
            $where['_string'] = $sqlCondition;
            $list1=$model->field('id,计划批次, 专业名称, 课程编号, 课程名称, 学期学时, status')->where($sqlCondition)->group("课程编号")->order("课程编号")->select();
            $this->assign('data', $list1);
            $this->display();
        } else {
            $data = $model->field("id,计划批次, 专业名称, 课程编号, 课程名称, 学期学时, status")->where("课程编号 like 'C%'")->group("课程编号")->order("课程编号")->select();
            $this->assign('data', $data);
            $this->display();
        }
    }

    /**
     * 显示已经提交了的数据
     * 并制作分页
     */
    public function overlook(){
        if (IS_POST) {
//            dump($_POST);
            $sqlCondition = " 1=1 ";
            $version = isset($_POST['version']) ? $_POST['version'] : null;
            $status = isset($_POST['status']) ? $_POST['status'] : null;
            $keywords = $_POST['keywords'];

            if (isset($version)){
                $sqlCondition .= " AND (CCode like '$version%')";
            }
            if (isset($status)) {
                $sqlCondition .= " AND (status=$status) ";
            }
            if ($keywords != "") {
                $sqlCondition .= " AND (CCode like '%$keywords%' OR CName like '%$keywords%') ";
            }
//            dump($sqlCondition);

            $model = M('Shijian');
            $where['_string'] = $sqlCondition;
            $list1 = $model->field('id,CName, CCode, TNum, TScore, TzhiBiRen, TTaoLunCanJia, CConductor, status')->where($sqlCondition)->order("CCode")->group("CCode")->select();

//            dump($list);
            $this->assign('list', $list1);
            $this->display();

        } else {
            $obj = M("Shijian");
            $list2 = $obj->field('id,CName, CCode, TNum, TScore, TzhiBiRen, TTaoLunCanJia, CConductor, status')->order("CCode")->group("CCode")->select();
            $this->assign('list', $list2);        // 赋值数据集
            $this->display();
        }
    }

    /**
     * 添加并完善数据
     */
    public function add($id, $ccode, $flag=0){
        if ($flag == 0){
            // C版
            $model = M("dagangshijianc");
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
//            dump($result);
            $this->assign('flag', $flag);
            $this->assign("data", $result);
            $this->display();
        }
        else if ($flag == 1){
            // B 版
            $model = M("dagangshijianb");
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
            $this->assign('flag', $flag);
            $this->assign('ename', $ename["英文名"]);
//            dump($result);
            $this->assign("data", $result);
            $this->display();
        }


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
     * 编辑修改已经提交的数据
     */
    public function edit($id, $ccode){
        if (IS_POST) {
            $obj = M('Shijian');
            $obj->startTrans();         // 开启事务
            $data = $_POST;
            $data["SMajor"] = substr($data["SMajor"], 4);

            $result = $obj->where("id=%d", array($id))->save($data);
            if ($result ) {
                $obj->commit();
                $this->success('提交成功!', "confirm?id=$id&CCode=$ccode");
            } else {
                $obj->rollback();
                $this->error('提交失败！可能原因：没有任何改动或其他异常');
            }
        }
        $obj = M('shijian');
        $data = $obj->where("id='$id'")->find();
        $this->assign('data', $data);
        $this->display();
    }

    /**
     * 单条确认
     * @param int $id
     * @param int $CCode
     * @param int $flag
     */
    public function confirm($id=0, $flag=0){
        $model = M("shijian");
        if ($flag == 0){
            $result = $model->where("id = $id")->find();

            $res1 = preg_split("/\d(\.|\。|\．)+/", trim($result["destination"]));
//            dump($res1);
            $lenQuan1 = count($res1);
            if ($lenQuan1 > 1) {
                for ($k = 1; $k < $lenQuan1; $k++) {
                    switch ($k) {
                        case 1:
                            $temp = "1.".$res1[$k];
                            $temp11 = preg_split("/(\n|\r|\b|\（|\()(\d)(\）|\))/", $temp);
                            $lenTemp = count($temp11);
                            $result["destination"]  = $temp11[0];
                            for ($j=1; $j <$lenTemp; $j++){
                                $result["destination"] .= "<br>　　　($j).".$temp11[$j];
                            }
//                            $result["destination"] = $temp;
                            break;
                        case 2:
                            $temp2 = "<br>　 2.".$res1[$k];
                            $temp22 = preg_split("/(\（|\()(\d)(\）|\))/", $temp2);
                            $lenTemp2 = count($temp22);
                            $result["destination"]  .= $temp22[0];
                            for ($j=1; $j <$lenTemp2; $j++){
                                $result["destination"] .= "<br>　　　($j).".$temp22[$j];
                            }
                            break;
                        case 3:
                            $temp3 = "<br>　 3.".$res1[$k];
                            $temp33 = preg_split("/(\（|\()(\d)(\）|\))/", $temp3);
                            $lenTemp3 = count($temp33);
                            $result["destination"]  .= $temp33[0];
                            for ($j=1; $j <$lenTemp3; $j++){
                                $result["destination"] .= "<br>　　　($j).".$temp33[$j];
                            }
                            break;
                    }
                }
            }

            $res2 = preg_split("/\d(\.|\。|\．)/", trim($result["ContentRequire"]));
            $lenQuan2 = count($res2);
            if ($lenQuan2 > 1) {
                for ($k = 1; $k < $lenQuan2; $k++) {
                    switch ($k) {
                        case 1:
                            $tempa1 = "　 1.".$res2[$k];
                            $tempa11 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa1);
                            $lenTempa1 = count($tempa11);
                            $result["ContentRequire"]  = $tempa11[0];
                            for ($j=1; $j <$lenTempa1; $j++){
                                $result["ContentRequire"] .= "<br>　　　($j).".$tempa11[$j];
                            }
//                            $result["destination"] = $temp;
//                            id=2&CCode=C1003050010
                            break;
                        case 2:
                            $tempa2 = "<br>　 2.".$res2[$k];
                            $tempa12 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa2);
                            $lenTempa1 = count($tempa12);
                            $result["ContentRequire"] .= $tempa12[0];
                            for ($j=1; $j <$lenTempa1; $j++){
                                $result["ContentRequire"] .= "<br>　　　($j).".$tempa12[$j];
                            }
                            break;
                        case 3:
                            $tempa3 = "<br>　 3.".$res2[$k];
                            $tempa13 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa3);
                            $lenTempa3 = count($tempa13);
                            $result["ContentRequire"] .= $tempa13[0];
                            for ($j=1; $j <$lenTempa3; $j++){
                                $result["ContentRequire"] .= "<br>　　　($j).".$tempa13[$j];
                            }
                            break;
                        case 4:
                            $tempa4 = "<br>　 4.".$res2[$k];
                            $tempa14 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa4);
                            $lenTempa4 = count($tempa14);
                            $result["ContentRequire"] .= $tempa14[0];
                            for ($j=1; $j <$lenTempa4; $j++){
                                $result["ContentRequire"] .= "<br>　　　($j).".$tempa14[$j];
                            }
                            break;
                        case 5:
                            $tempa5 = "<br>　 5.".$res2[$k];
                            $tempa15 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa5);
                            $lenTempa5 = count($tempa15);
                            $result["ContentRequire"] .= $tempa15[0];
                            for ($j=1; $j <$lenTempa5; $j++){
                                $result["ContentRequire"] .= "<br>　　　($j).".$tempa15[$j];
                            }
                            break;
                        case 6:
                            $tempa6 = "<br>　 6.".$res2[$k];
                            $tempa16 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa6);
                            $lenTempa6 = count($tempa16);
                            $result["ContentRequire"] .= $tempa16[0];
                            for ($j=1; $j <$lenTempa6; $j++){
                                $result["ContentRequire"] .= "<br>　　　($j).".$tempa16[$j];
                            }
                            break;
                    }
                }
            }

            $res3 = preg_split("/^\d(\.|\。|\．)/", trim($result["progress"]));
            $lenQuan3 = count($res3);
            if ($lenQuan3 > 1) {
                for ($k = 1; $k < $lenQuan3; $k++) {
                    switch ($k) {
                        case 1:
                            $tempb1 = "　 1.".$res3[$k];
                            $tempb11 = preg_split("/(\（|\()(\d)(\）|\))/", $tempb1);
                            $lenTempb1 = count($tempb11);
                            $result["progress"]  = $tempb11[0];
                            for ($j=1; $j <$lenTempb1; $j++){
                                $result["progress"] .= "<br>　　　($j).".$tempb11[$j];
                            }
//                            $result["destination"] = $temp;
//                            id=2&CCode=C1003050010
                            break;
                        case 2:
                            $tempa2 = "<br>　 2.".$res3[$k];
                            $tempa12 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa2);
                            $lenTempa1 = count($tempa12);
                            $result["progress"] .= $tempa12[0];
                            for ($j=1; $j <$lenTempa1; $j++){
                                $result["progress"] .= "<br>　　　($j).".$tempa12[$j];
                            }
                            break;
                        case 3:
                            $tempa3 = "<br>　 3.".$res3[$k];
                            $tempa13 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa3);
                            $lenTempa3 = count($tempa13);
                            $result["progress"] .= $tempa13[0];
                            for ($j=1; $j <$lenTempa3; $j++){
                                $result["progress"] .= "<br>　　　($j).".$tempa13[$j];
                            }
                            break;
                        case 4:
                            $tempa4 = "<br>　 4.".$res3[$k];
                            $tempa14 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa4);
                            $lenTempa4 = count($tempa14);
                            $result["progress"] .= $tempa14[0];
                            for ($j=1; $j <$lenTempa4; $j++){
                                $result["progress"] .= "<br>　　　($j).".$tempa14[$j];
                            }
                            break;
                        case 5:
                            $tempa5 = "<br>　 5.".$res3[$k];
                            $tempa15 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa5);
                            $lenTempa5 = count($tempa15);
                            $result["progress"] .= $tempa15[0];
                            for ($j=1; $j <$lenTempa5; $j++){
                                $result["progress"] .= "<br>　　　($j).".$tempa15[$j];
                            }
                            break;
                        case 6:
                            $tempa6 = "<br>　 6.".$res3[$k];
                            $tempa16 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa6);
                            $lenTempa6 = count($tempa16);
                            $result["ContentRequire"] .= $tempa16[0];
                            for ($j=1; $j <$lenTempa6; $j++){
                                $result["ContentRequire"] .= "<br>　　　($j).".$tempa16[$j];
                            }
                            break;
                    }
                }
            }

            $res4 = preg_split("/^\d(\.|\。|\．)/", trim($result["Instrument"]));
            $lenQuan4 = count($res4);
            if ($lenQuan4 > 1) {
                for ($k = 1; $k < $lenQuan4; $k++) {
                    switch ($k) {
                        case 1:
                            $tempc1 = "　 1.".$res4[$k];
                            $tempc11 = preg_split("/(\（|\()(\d)(\）|\))/", $tempc1);
                            $lenTempc1 = count($tempc11);
                            $result["Instrument"]  = $tempc11[0];
                            for ($j=1; $j <$lenTempc1; $j++){
                                $result["Instrument"] .= "<br>　　　($j).".$tempc11[$j];
                            }
                            break;
                        case 2:
                            $tempc2 = "<br>　 2.".$res4[$k];
                            $tempc12 = preg_split("/(\（|\()(\d)(\）|\))/", $tempc2);
                            $lenTempc1 = count($tempc12);
                            $result["Instrument"] .= $tempc12[0];
                            for ($j=1; $j <$lenTempc1; $j++){
                                $result["Instrument"] .= "<br>　　　($j).".$tempc12[$j];
                            }
                            break;
                        case 3:
                            $tempa3 = "<br>　 3.".$res4[$k];
                            $tempa13 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa3);
                            $lenTempa3 = count($tempa13);
                            $result["Instrument"] .= $tempa13[0];
                            for ($j=1; $j <$lenTempa3; $j++){
                                $result["Instrument"] .= "<br>　　　($j).".$tempa13[$j];
                            }
                            break;
                        case 4:
                            $tempa4 = "<br>　 4.".$res4[$k];
                            $tempa14 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa4);
                            $lenTempa4 = count($tempa14);
                            $result["Instrument"] .= $tempa14[0];
                            for ($j=1; $j <$lenTempa4; $j++){
                                $result["Instrument"] .= "<br>　　　($j).".$tempa14[$j];
                            }
                            break;
                        case 5:
                            $tempa5 = "<br>　 5.".$res4[$k];
                            $tempa15 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa5);
                            $lenTempa5 = count($tempa15);
                            $result["Instrument"] .= $tempa15[0];
                            for ($j=1; $j <$lenTempa5; $j++){
                                $result["Instrument"] .= "<br>　　　($j).".$tempa15[$j];
                            }
                            break;
                        case 6:
                            $tempa6 = "<br>　 6.".$res4[$k];
                            $tempa16 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa6);
                            $lenTempa6 = count($tempa16);
                            $result["Instrument"] .= $tempa16[0];
                            for ($j=1; $j <$lenTempa6; $j++){
                                $result["Instrument"] .= "<br>　　　($j).".$tempa16[$j];
                            }
                            break;
                    }
                }
            }

            $a = preg_replace('/\。/', '.', trim($result['TBook']));
            $b = preg_replace('/\，/', ',', $a);
            $res5 = preg_split("/\[\d\]+/", $b);
            $lenQuan5 = count($res5);
            if ($lenQuan5 > 1) {
                for ($k = 1; $k < $lenQuan5; $k++) {
                    switch ($k) {
                        case 1:
                            $result["TBook"] = '　 ['.$k.']'.$res5[$k];
                            break;
                        case 2:
                            $result["TBook"] .= '<br>　 ['.$k.']'.$res5[$k];
                            break;
                        case 3:
                            $result["TBook"] .= '<br>　 ['.$k.']'.$res5[$k];
                            break;
                        case 4:
                            $result["TBook"] .= '<br>　 ['.$k.']'.$res5[$k];
                            break;
                        case 5:
                            $result["TBook"] .= '<br>　 ['.$k.']'.$res5[$k];
                            break;
                    }

                }
            }

            $res6 = preg_split("/\d(\.|\。|\．)/", trim($result["TEvaluate"]));
            $lenQuan6 = count($res6);
            if ($lenQuan6 > 1) {
                for ($k = 1; $k < $lenQuan6; $k++) {
                    switch ($k) {
                        case 1:
                            $tempd1 = "　 1.".$res6[$k];
                            $tempd11 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd1);
                            $lenTempd1 = count($tempd11);
                            $result["TEvaluate"]  = $tempd11[0];
                            for ($j=1; $j <$lenTempd1; $j++){
                                $result["TEvaluate"] .= "<br>　　　($j).".$tempd11[$j];
                            }
                            break;
                        case 2:
                            $tempd2 = "<br>　 2.".$res6[$k];
                            $tempd12 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd2);
                            $lenTempd1 = count($tempd12);
                            $result["TEvaluate"] .= $tempd12[0];
                            for ($j=1; $j <$lenTempd1; $j++){
                                $result["TEvaluate"] .= "<br>　　　($j).".$tempd12[$j];
                            }
                            break;
                        case 3:
                            $tempd3 = "<br>　 3.".$res6[$k];
                            $tempd13 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd3);
                            $lenTempd3 = count($tempd13);
                            $result["TEvaluate"] .= $tempd13[0];
                            for ($j=1; $j <$lenTempd3; $j++){
                                $result["TEvaluate"] .= "<br>　　　($j).".$tempd13[$j];
                            }
                            break;
                        case 4:
                            $tempd4 = "<br>　 4.".$res6[$k];
                            $tempd14 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd4);
                            $lenTempd4 = count($tempd14);
                            $result["TEvaluate"] .= $tempd14[0];
                            for ($j=1; $j <$lenTempd4; $j++){
                                $result["TEvaluate"] .= "<br>　　　($j).".$tempd14[$j];
                            }
                            break;
                        case 5:
                            $tempd5 = "<br>　 5.".$res6[$k];
                            $tempd15 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd5);
                            $lenTempd5 = count($tempd15);
                            $result["Instrument"] .= $tempd15[0];
                            for ($j=1; $j <$lenTempd5; $j++){
                                $result["Instrument"] .= "<br>　　　($j).".$tempd15[$j];
                            }
                            break;
                        case 6:
                            $tempd6 = "<br>　 6.".$res6[$k];
                            $tempd16 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd6);
                            $lenTempd6 = count($tempd16);
                            $result["TEvaluate"] .= $tempd16[0];
                            for ($j=1; $j <$lenTempd6; $j++){
                                $result["TEvaluate"] .= "<br>　　　($j).".$tempd16[$j];
                            }
                            break;
                    }
                }
            }

            $res7 = preg_split("/\d(\.|\。|\．)/", trim($result["TOthers"]));
//            dump($res7);
            $lenQuan7 = count($res7);
            if ($lenQuan7 > 1) {
                for ($k = 1; $k < $lenQuan7; $k++) {
                    switch ($k) {
                        case 1:
                            $tempe1 = "　 1.".$res7[$k];
                            $tempe11 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe1);
                            $lenTempe1 = count($tempe11);
                            $result["TOthers"]  = $tempe11[0];
                            for ($j=1; $j <$lenTempe1; $j++){
                                $result["TOthers"] .= "<br>　　　($j).".$tempe11[$j];
                            }
                            break;
                        case 2:
                            $tempe2 = "<br>　 2.".$res7[$k];
                            $tempe12 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe2);
                            $lenTempe1 = count($tempe12);
                            $result["TOthers"] .= $tempe12[0];
                            for ($j=1; $j <$lenTempe1; $j++){
                                $result["TOthers"] .= "<br>　　　($j).".$tempe12[$j];
                            }
                            break;
                        case 3:
                            $tempe3 = "<br>　 3.".$res7[$k];
                            $tempe13 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe3);
                            $lenTempe3 = count($tempe13);
                            $result["TOthers"] .= $tempe13[0];
                            for ($j=1; $j <$lenTempe3; $j++){
                                $result["TOthers"] .= "<br>　　　($j).".$tempe13[$j];
                            }
                            break;
                        case 4:
                            $tempe4 = "<br>　 4.".$res7[$k];
                            $tempe14 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe4);
                            $lenTempe4 = count($tempe14);
                            $result["TOthers"] .= $tempe14[0];
                            for ($j=1; $j <$lenTempe4; $j++){
                                $result["TOthers"] .= "<br>　　　($j).".$tempe14[$j];
                            }
                            break;
                        case 5:
                            $tempe5 = "<br>　 5.".$res7[$k];
                            $tempe15 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe5);
                            $lenTempe5 = count($tempe15);
                            $result["TOthers"] .= $tempe15[0];
                            for ($j=1; $j <$lenTempe5; $j++){
                                $result["TOthers"] .= "<br>　　　($j).".$tempe15[$j];
                            }
                            break;
                        case 6:
                            $tempe6 = "<br>　 6.".$res7[$k];
                            $tempe16 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe6);
                            $lenTempe6 = count($tempe16);
                            $result["TOthers"] .= $tempe16[0];
                            for ($j=1; $j <$lenTempe6; $j++){
                                $result["TOthers"] .= "<br>　　　($j).".$tempe16[$j];
                            }
                            break;
                    }
                }
            }




            if($result == null){
                $this->error('非法闯入！！。。。');
            } else {
                $this->assign('result', $result);
                $this->display();
            }
        }
        else if ($flag == 1) {
//            dump($id);
//            dump($CCode);
//            dump($flag);
//            $model = M("shiyan");
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
     * 下载数据
     * @param $type
     * @param $style
     */
    public function download($type, $style){
        if ($type == 'c' && $style == 'abscent') {
            //  C版缺大纲
            $model = M("dagangshijianc");
            $xlsName = "shijiandagang";
            $xlsCell  = array(
                array('专业名称','专业名称'),
                array('课程编号','课程编号'),
                array('课程名称','课程名称'),
                array('学期学时','学期学时'),
                array('status','状态'),
            );
            $xlsData = $model->field("专业名称,课程编号,课程名称,学期学时")->where(" status=0 AND 课程编号 like 'C%' ")->group('课程编号')->order("课程编号")->select();
            $len = count($xlsData);
            for ($i = 0; $i<$len; $i++){
                $xlsData[$i]['status'] = "C版缺实践大纲";
            }

            $this->exportExce_res($xlsName,$xlsCell,$xlsData);
        }
        else if ($type == 'c' && $style == 'conf'){
            //  C版待确认
            $xlsModel = M("shijian");
            $xlsName = "shijian";
            $xlsCell  = array(
                array('CName','课程名称'),
                array('CCode','课程编号'),
                array('TNum','学时数'),
                array('TzhiBiRen','执笔人'),
                array('CConductor','审核人'),
                array('status','状态'),
            );
            $xlsData = $xlsModel->field("CName,CCode,TNum,TzhiBiRen,CConductor")->where("CCode like 'C%' AND status=0")->order("CCode")->select();
            $len = count($xlsData);
            for ($i = 0; $i<$len; $i++){
                $xlsData[$i]['status'] = "待确认";
            }
            $this->exportExce_res($xlsName,$xlsCell,$xlsData);
        }
        else if ($type == 'c' && $style == 'check'){
            // C版待审核
            $xlsModel = M("shijian");
            $xlsName = "shijian";
            $xlsCell  = array(
                array('CName','课程名称'),
                array('CCode','课程编号'),
                array('TNum','学时数'),
                array('TzhiBiRen','执笔人'),
                array('CConductor','审核人'),
                array('status','状态'),
            );
            $xlsData = $xlsModel->field("CName,CCode,TNum,TzhiBiRen,CConductor")->where("CCode like 'C%' AND status=1")->order("CCode")->select();
            $len = count($xlsData);
            for ($i = 0; $i<$len; $i++){
                $xlsData[$i]['status'] = "待审核";
            }
            $this->exportExce_res($xlsName,$xlsCell,$xlsData);
        }
        else if ($type == 'c' && $style == 'pass') {
            //  B版缺大纲
            $xlsModel = M("shijian");
            $xlsName = "shijian";
            $xlsCell  = array(
                array('CName','课程名称'),
                array('CCode','课程编号'),
                array('TNum','学时数'),
                array('TzhiBiRen','执笔人'),
                array('CConductor','审核人'),
                array('status','状态'),
            );
            $xlsData = $xlsModel->field("CName,CCode,TNum,TzhiBiRen,CConductor")->where("CCode like 'C%' AND status=2")->order("CCode")->select();
            $len = count($xlsData);
            for ($i = 0; $i<$len; $i++){
                $xlsData[$i]['status'] = "已完成";
            }
            $this->exportExce_res($xlsName,$xlsCell,$xlsData);
        }
        else if ($type == 'b' && $style == 'abscent') {
            // B 版缺大纲
            $model = M("dagangshijianb");
            $xlsName = "shijiandagang";
            $xlsCell  = array(
                array('专业名称','专业名称'),
                array('课程编号','课程编号'),
                array('课程名称','课程名称'),
                array('学期学时','学期学时'),
                array('status','状态'),
            );
            $xlsData = $model->field("专业名称,课程编号,课程名称,学期学时")->where("status=0")->group('课程编号')->order("课程编号")->select();
            $len = count($xlsData);
            for ($i = 0; $i<$len; $i++){
                $xlsData[$i]['status'] = "B版缺实践大纲";
            }

            $this->exportExce_res($xlsName,$xlsCell,$xlsData);
        }
        else if ($type == 'b' && $style == 'conf'){
            //  B版待确认
            $xlsModel = M("shijian");
            $xlsName = "shijian";
            $xlsCell  = array(
                array('CName','课程名称'),
                array('CCode','课程编号'),
                array('TNum','学时数'),
                array('TzhiBiRen','执笔人'),
                array('CConductor','审核人'),
                array('status','状态'),
            );
            $xlsData = $xlsModel->field("CName,CCode,TNum,TzhiBiRen,CConductor")->where("CCode like 'B%' AND status=0")->order("CCode")->select();
            $len = count($xlsData);
            for ($i = 0; $i<$len; $i++){
                $xlsData[$i]['status'] = "待确认";
            }
            $this->exportExce_res($xlsName,$xlsCell,$xlsData);
        }
        else if ($type == 'b' && $style == 'check'){
            // B版待审核
            $xlsModel = M("shijian");
            $xlsName = "shijian";
            $xlsCell  = array(
                array('CName','课程名称'),
                array('CCode','课程编号'),
                array('TNum','学时数'),
                array('TzhiBiRen','执笔人'),
                array('CConductor','审核人'),
                array('status','状态'),
            );
            $xlsData = $xlsModel->field("CName,CCode,TNum,TzhiBiRen,CConductor")->where("CCode like 'B%' AND status=1")->order("CCode")->select();
            $len = count($xlsData);
            for ($i = 0; $i<$len; $i++){
                $xlsData[$i]['status'] = "待审核";
            }
            $this->exportExce_res($xlsName,$xlsCell,$xlsData);
        }
        else if ($type == 'b' && $style == 'pass') {
            // B 版已通过
            $xlsModel = M("shijian");
            $xlsName = "shijian";
            $xlsCell  = array(
                array('CName','课程名称'),
                array('CCode','课程编号'),
                array('TNum','学时数'),
                array('TzhiBiRen','执笔人'),
                array('CConductor','审核人'),
                array('status','状态'),
            );
            $xlsData = $xlsModel->field("CName,CCode,TNum,TzhiBiRen,CConductor")->where("CCode like 'B%' AND status=2")->order("CCode")->select();
            $len = count($xlsData);
            for ($i = 0; $i<$len; $i++){
                $xlsData[$i]['status'] = "已完成";
            }
            $this->exportExce_res($xlsName,$xlsCell,$xlsData);
        }
        else {
            $this->error("非法操作。。。");
        }
    }

    /**
     * 生成word文档的方法 B+C版
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
        $obj = M("Shijian");
        $data = $obj->order("CCode")->select();
        $len = $obj->count();
        for ($i = 0; $i < $len; $i++) {

            $ccode = $data[$i]['CCode'];
//            $tableData = $obj1->where("CCode='$ccode'")->select();
//            $len1 = $obj1->where("CCode='$ccode'")->count();

            /**
             * 标题生成结束
             */
            $depth = 1;
            $fontStyle = array('size'=>22, 'bold'=>'true');              // 18号字体 即 二号
            $paragraphStyle = array(
                'align'=>'center',      // 对其方式
                'spaceBefore'=>100,     // 断后间距
                'spaceAfter'=>0,        // 段前间距
                'spacing'=>100,         // 行高
            );
            $PHPWord->addTitleStyle($depth, $fontStyle, $paragraphStyle); // 给标题添加样式
            $section = $PHPWord->createSection();
            $titleValue = $data[$i]['CName'];
            $section->addTitle($titleValue, 1);

            $textrun = $section->createTextRun(array('align'=>'center', 'spaceBefore'=>100, 'spaceAfter'=>100));

//            $textrun->addText('Experiment Syllabus of ', array('italic'=>false, 'bold'=>false, 'name'=>'Times New Roman', 'size'=>18));
            $textrun->addText($data[$i]['EName'], array('italic'=>false, 'bold'=>false, 'name'=>'Calibri', 'size'=>16));

            $section->addText('  适用专业: '.$data[$i]['SMajor'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150, 'indentation'=>array('firstLine'=>420)));
            $section->addText('  课程代码: '.$data[$i]['CCode'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  学时数: '.$data[$i]['TNum'].'学时', array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  学分数: '.$data[$i]['TScore'].'学分', array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  讨论参加人: '.$data[$i]['TTaoLunCanJia'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  审核人: '.$data[$i]['CConductor'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  批准人: '.$data[$i]['Allowed'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText('一、实验目的', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $res0 = preg_split("/\d(\.|\。)/", trim($data[$i]["destination"]));
//            $res0 = preg_split("/①|②|③|④|⑤|⑥|⑦|⑧+/", trim($data[$i]['destination']));
            $lenQuan0 = count($res0);
            if ($lenQuan0 > 1 ){
                for ($k=1; $k < $lenQuan0; $k++) {
//                    dump($k.$res[$k]);
                    switch ($k){
                        case 1:
                            $temp0 = "1.".$res0[$k];
                            $temp00 = preg_split("/(\（|\()(\d)(\）|\))/", $temp0);
                            $section->addText('  '.$temp00[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTemp = count($temp00);
                            for ($j=1; $j <$lenTemp; $j++){
                                $section->addText("   ($j).".$temp00[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 2:
                            $temp2 = "2.".$res0[$k];
                            $temp22 = preg_split("/(\（|\()(\d)(\）|\))/", $temp2);
                            $section->addText('  '.$temp22[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTemp2 = count($temp22);
                            for ($j=1; $j <$lenTemp2; $j++){
                                $section->addText("   ($j).".$temp22[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 3:
                            $temp3 = "3.".$res0[$k];
                            $temp33 = preg_split("/(\（|\()(\d)(\）|\))/", $temp3);
                            $section->addText('  '.$temp33[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTemp3 = count($temp33);
                            for ($j=1; $j <$lenTemp3; $j++){
                                $section->addText("   ($j).".$temp33[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                    }
                }
            } else {
                $section->addText('    '.$data[$i]['destination'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));
            }

            $section->addText('二、内容与要求', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $res2 = preg_split("/\d(\.|\。)/", trim($data[$i]["ContentRequire"]));
            $lenQuan2 = count($res2);
            if ($lenQuan2 > 1) {
                for ($k = 1; $k < $lenQuan2; $k++) {
                    switch ($k) {
                        case 1:
                            $tempa1 = "1.".$res2[$k];
                            $tempa11 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa1);
                            $section->addText('  '.$tempa11[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempa1 = count($tempa11);
                            for ($j=1; $j <$lenTempa1; $j++){
                                $section->addText("   ($j).".$tempa11[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 2:
                            $tempa2 = "2.".$res2[$k];
                            $tempa12 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa2);
                            $section->addText('  '.$tempa12[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempa2 = count($tempa12);
                            for ($j=1; $j <$lenTempa2; $j++){
                                $section->addText("   ($j).".$tempa12[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 3:
                            $tempa3 = "3.".$res2[$k];
                            $tempa13 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa3);
                            $section->addText('  '.$tempa13[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempa3 = count($tempa13);
                            for ($j=1; $j <$lenTempa3; $j++){
                                $section->addText("   ($j).".$tempa13[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 4:
                            $tempa4 = "4.".$res2[$k];
                            $tempa44 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa4);
                            $section->addText('  '.$tempa44[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempa4 = count($tempa44);
                            for ($j=1; $j <$lenTempa4; $j++){
                                $section->addText("   ($j).".$tempa44[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 5:
                            $tempa5 = "5.".$res2[$k];
                            $tempa55 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa5);
                            $section->addText('  '.$tempa55[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempa5 = count($tempa55);
                            for ($j=1; $j <$lenTempa5; $j++){
                                $section->addText("   ($j).".$tempa55[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 6:
                            $tempa6 = "6.".$res2[$k];
                            $tempa66 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa6);
                            $section->addText('  '.$tempa66[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempa6 = count($tempa66);
                            for ($j=1; $j <$lenTempa6; $j++){
                                $section->addText("   ($j).".$tempa66[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                    }
                }

            } else {
                $section->addText('    '.$data[$i]["ContentRequire"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            }

            $section->addText('三、组织方式与进度安排', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $res3 = preg_split("/\d(\.|\。)/", trim($data[$i]["progress"]));
            $lenQuan3 = count($res3);
            if ($lenQuan3 > 1) {
                for ($k = 1; $k < $lenQuan3; $k++) {
                    switch ($k) {
                        case 1:
                            $tempc1 = "1.".$res3[$k];
                            $tempc11 = preg_split("/(\（|\()(\d)(\）|\))/", $tempc1);
                            $section->addText('  '.$tempc11[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempc1 = count($tempc11);
                            for ($j=1; $j <$lenTempc1; $j++){
                                $section->addText("   ($j).".$tempc11[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 2:
                            $tempc2 = "2.".$res3[$k];
                            $tempc12 = preg_split("/(\（|\()(\d)(\）|\))/", $tempc2);
                            $section->addText('  '.$tempc12[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempc2 = count($tempc12);
                            for ($j=1; $j <$lenTempc2; $j++){
                                $section->addText("   ($j).".$tempc12[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 3:
                            $tempc3 = "3.".$res3[$k];
                            $tempc13 = preg_split("/(\（|\()(\d)(\）|\))/", $tempc3);
                            $section->addText('  '.$tempc13[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempc3 = count($tempc13);
                            for ($j=1; $j <$lenTempc3; $j++){
                                $section->addText("   ($j).".$tempc13[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 4:
                            $tempc4 = "4.".$res3[$k];
                            $tempc44 = preg_split("/(\（|\()(\d)(\）|\))/", $tempc4);
                            $section->addText('  '.$tempc44[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempc4 = count($tempc44);
                            for ($j=1; $j <$lenTempc4; $j++){
                                $section->addText("   ($j).".$tempc44[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 5:
                            $tempc5 = "5.".$res3[$k];
                            $tempc55 = preg_split("/(\（|\()(\d)(\）|\))/", $tempc5);
                            $section->addText('  '.$tempc55[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempc5 = count($tempc55);
                            for ($j=1; $j <$lenTempc5; $j++){
                                $section->addText("   ($j).".$tempc55[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 6:
                            $tempc6 = "6.".$res3[$k];
                            $tempc66 = preg_split("/(\（|\()(\d)(\）|\))/", $tempc6);
                            $section->addText('  '.$tempc66[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempc6 = count($tempc66);
                            for ($j=1; $j <$lenTempc6; $j++){
                                $section->addText("   ($j).".$tempc66[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                    }
                }
            } else {
                $section->addText('    '.$data[$i]["progress"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            }

            $section->addText('四、场地与设备', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $res4 = preg_split("/\d(\.|\。)/", trim($data[$i]["Instrument"]));
            $lenQuan4 = count($res4);
            if ($lenQuan4 > 1) {
                for ($k = 1; $k < $lenQuan4; $k++) {
                    switch ($k) {
                        case 1:
                            $tempd1 = "1.".$res4[$k];
                            $tempd11 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd1);
                            $section->addText('  '.$tempd11[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempd1 = count($tempd11);
                            for ($j=1; $j <$lenTempd1; $j++){
                                $section->addText("   ($j).".$tempd11[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 2:
                            $tempd2 = "2.".$res4[$k];
                            $tempd12 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd2);
                            $section->addText('  '.$tempd12[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempd2 = count($tempd12);
                            for ($j=1; $j <$lenTempd2; $j++){
                                $section->addText("   ($j).".$tempd12[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 3:
                            $tempd3 = "3.".$res4[$k];
                            $tempd13 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd3);
                            $section->addText('  '.$tempd13[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempd3 = count($tempd13);
                            for ($j=1; $j <$lenTempd3; $j++){
                                $section->addText("   ($j).".$tempd13[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 4:
                            $tempd4 = "4.".$res4[$k];
                            $tempd44 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd4);
                            $section->addText('  '.$tempd44[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempd4 = count($tempd44);
                            for ($j=1; $j <$lenTempd4; $j++){
                                $section->addText("   ($j).".$tempd44[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 5:
                            $tempd5 = "5.".$res4[$k];
                            $tempd55 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd5);
                            $section->addText('  '.$tempd55[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempd5 = count($tempd55);
                            for ($j=1; $j <$lenTempd5; $j++){
                                $section->addText("   ($j).".$tempd55[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 6:
                            $tempd6 = "6.".$res4[$k];
                            $tempd66 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd6);
                            $section->addText('  '.$tempd66[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempd6 = count($tempd66);
                            for ($j=1; $j <$lenTempd6; $j++){
                                $section->addText("   ($j).".$tempd66[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                    }
                }
            } else {
                $section->addText('    '.$data[$i]["Instrument"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            }

            $section->addText('五、配套教材或指导书', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $a = preg_replace('/\。/', '.', trim($data[$i]['TBook']));
            $b = preg_replace('/\，/', ',', $a);
            $res5 = preg_split("/\[\d\]+/", $b);
            $lenQuan5 = count($res5);
            if ($lenQuan5 > 1) {
                for ($k = 1; $k < $lenQuan5; $k++) {
                    $section->addText("   [$j]".$res5[$k], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                }
            } else {
                $section->addText('    '.$data[$i]["TBook"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));
            }

            $section->addText('六、考核方式与成绩评定办法', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $res6 = preg_split("/\d(\.|\。)/", trim($data[$i]["TEvaluate"]));
            $lenQuan6 = count($res6);
            if ($lenQuan6 > 1) {
                for ($k = 1; $k < $lenQuan6; $k++) {
                    switch ($k) {
                        case 1:
                            $tempe1 = "1.".$res6[$k];
                            $tempe11 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe1);
                            $section->addText('  '.$tempe11[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempe1 = count($tempe11);
                            for ($j=1; $j <$lenTempe1; $j++){
                                $section->addText("   ($j).".$tempe11[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 2:
                            $tempe2 = "2.".$res6[$k];
                            $tempe12 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe2);
                            $section->addText('  '.$tempe12[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempe2 = count($tempe12);
                            for ($j=1; $j <$lenTempe2; $j++){
                                $section->addText("   ($j).".$tempe12[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 3:
                            $tempe3 = "3.".$res6[$k];
                            $tempe13 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe3);
                            $section->addText('  '.$tempe13[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempe3 = count($tempe13);
                            for ($j=1; $j <$lenTempe3; $j++){
                                $section->addText("   ($j).".$tempe13[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 4:
                            $tempe4 = "4.".$res6[$k];
                            $tempe44 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe4);
                            $section->addText('  '.$tempe44[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempe4 = count($tempe44);
                            for ($j=1; $j <$lenTempe4; $j++){
                                $section->addText("   ($j).".$tempe44[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 5:
                            $tempe5 = "5.".$res6[$k];
                            $tempe55 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe5);
                            $section->addText('  '.$tempe55[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempe5 = count($tempe55);
                            for ($j=1; $j <$lenTempe5; $j++){
                                $section->addText("   ($j).".$tempe55[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 6:
                            $tempe6 = "6.".$res6[$k];
                            $tempe66 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe6);
                            $section->addText('  '.$tempe66[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempe6 = count($tempe66);
                            for ($j=1; $j <$lenTempe6; $j++){
                                $section->addText("   ($j).".$tempe66[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                    }
                }
            } else {
                $section->addText('    '.$data[$i]["TEvaluate"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            }


            $section->addText('七、其他', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $res7 = preg_split("/\d(\.|\。)/", trim($data[$i]["TOthers"]));
            $lenQuan7 = count($res7);
            if ($lenQuan7 > 1) {
                for ($k = 1; $k < $lenQuan7; $k++) {
                    switch ($k) {
                        case 1:
                            $tempf1 = "1.".$res7[$k];
                            $tempf11 = preg_split("/(\（|\()(\d)(\）|\))/", $tempf1);
                            $section->addText('  '.$tempf11[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempf1 = count($tempf11);
                            for ($j=1; $j <$lenTempf1; $j++){
                                $section->addText("   ($j).".$tempf11[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 2:
                            $tempf2 = "2.".$res7[$k];
                            $tempf12 = preg_split("/(\（|\()(\d)(\）|\))/", $tempf2);
                            $section->addText('  '.$tempf12[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempf2 = count($tempf12);
                            for ($j=1; $j <$lenTempf2; $j++){
                                $section->addText("   ($j).".$tempf12[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 3:
                            $tempf3 = "3.".$res7[$k];
                            $tempf13 = preg_split("/(\（|\()(\d)(\）|\))/", $tempf3);
                            $section->addText('  '.$tempf13[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempf3 = count($tempf13);
                            for ($j=1; $j <$lenTempf3; $j++){
                                $section->addText("   ($j).".$tempf13[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 4:
                            $tempf4 = "4.".$res7[$k];
                            $tempf44 = preg_split("/(\（|\()(\d)(\）|\))/", $tempf4);
                            $section->addText('  '.$tempf44[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempf4 = count($tempf44);
                            for ($j=1; $j <$lenTempf4; $j++){
                                $section->addText("   ($j).".$tempf44[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 5:
                            $tempf5 = "5.".$res7[$k];
                            $tempf55 = preg_split("/(\（|\()(\d)(\）|\))/", $tempf5);
                            $section->addText('  '.$tempf55[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempf5 = count($tempf55);
                            for ($j=1; $j <$lenTempf5; $j++){
                                $section->addText("   ($j).".$tempf55[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 6:
                            $tempf6 = "6.".$res7[$k];
                            $tempf66 = preg_split("/(\（|\()(\d)(\）|\))/", $tempf6);
                            $section->addText('  '.$tempf66[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempf6 = count($tempf66);
                            for ($j=1; $j <$lenTempf6; $j++){
                                $section->addText("   ($j).".$tempf66[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                    }
                }
            } else {
                $section->addText('    '.$data[$i]["TOthers"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            }


            // 生成   专业负责人签字：   教学院长签字

//            $textrun1 = $section->createTextRun(array('align'=>'left', 'spaceBefore'=>100, 'spaceAfter'=>100));

//            $textrun->addText('Experiment Syllabus of ', array('italic'=>false, 'bold'=>false, 'name'=>'Times New Roman', 'size'=>18));
            $section->addText("");
            $section->addText("");
            $section->addText("专业负责人签字：　　　　　　　　　　教学院长签字：", array('italic'=>false, 'bold'=>false, 'name'=>'宋体', 'size'=>12));
//            $textrun1->addText("教学院长签字：", array('italic'=>false, 'bold'=>false, 'name'=>"宋体", 'size'=>16));


            $section->addTextBreak(1); // 新起一个空白段落
        }


        $fileName = "实践教学大纲".date("YmdHis");
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition:attachment;filename=".$fileName.".docx");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('php://output');

    }

    /**
     * 生成word文档的方法 B版
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
        $obj = M("Shijian");
        $data = $obj->order("CCode")->where("CCode like 'B%'")->select();
        $len = $obj->where("CCode like 'B%'")->count();
        for ($i = 0; $i < $len; $i++) {

            $ccode = $data[$i]['CCode'];
//            $tableData = $obj1->where("CCode='$ccode'")->select();
//            $len1 = $obj1->where("CCode='$ccode'")->count();

            /**
             * 标题生成结束
             */
            $depth = 1;
            $fontStyle = array('size'=>22, 'bold'=>'true');              // 18号字体 即 二号
            $paragraphStyle = array(
                'align'=>'center',      // 对其方式
                'spaceBefore'=>100,     // 断后间距
                'spaceAfter'=>0,        // 段前间距
                'spacing'=>100,         // 行高
            );
            $PHPWord->addTitleStyle($depth, $fontStyle, $paragraphStyle); // 给标题添加样式
            $section = $PHPWord->createSection();
            $titleValue = $data[$i]['CName'];
            $section->addTitle($titleValue, 1);

            $textrun = $section->createTextRun(array('align'=>'center', 'spaceBefore'=>100, 'spaceAfter'=>100));

//            $textrun->addText('Experiment Syllabus of ', array('italic'=>false, 'bold'=>false, 'name'=>'Times New Roman', 'size'=>18));
            $textrun->addText($data[$i]['EName'], array('italic'=>false, 'bold'=>false, 'name'=>'Calibri', 'size'=>16));

            $section->addText('  适用专业: '.$data[$i]['SMajor'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150, 'indentation'=>array('firstLine'=>420)));
            $section->addText('  课程代码: '.$data[$i]['CCode'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  学时数: '.$data[$i]['TNum'].'学时', array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  学分数: '.$data[$i]['TScore'].'学分', array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  讨论参加人: '.$data[$i]['TTaoLunCanJia'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  审核人: '.$data[$i]['CConductor'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  批准人: '.$data[$i]['Allowed'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText('一、实验目的', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $res0 = preg_split("/\d(\.|\。)/", trim($data[$i]["destination"]));
//            $res0 = preg_split("/①|②|③|④|⑤|⑥|⑦|⑧+/", trim($data[$i]['destination']));
            $lenQuan0 = count($res0);
            if ($lenQuan0 > 1 ){
                for ($k=1; $k < $lenQuan0; $k++) {
//                    dump($k.$res[$k]);
                    switch ($k){
                        case 1:
                            $temp0 = "1.".$res0[$k];
                            $temp00 = preg_split("/(\（|\()(\d)(\）|\))/", $temp0);
                            $section->addText('  '.$temp00[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTemp = count($temp00);
                            for ($j=1; $j <$lenTemp; $j++){
                                $section->addText("   ($j).".$temp00[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 2:
                            $temp2 = "2.".$res0[$k];
                            $temp22 = preg_split("/(\（|\()(\d)(\）|\))/", $temp2);
                            $section->addText('  '.$temp22[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTemp2 = count($temp22);
                            for ($j=1; $j <$lenTemp2; $j++){
                                $section->addText("   ($j).".$temp22[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 3:
                            $temp3 = "3.".$res0[$k];
                            $temp33 = preg_split("/(\（|\()(\d)(\）|\))/", $temp3);
                            $section->addText('  '.$temp33[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTemp3 = count($temp33);
                            for ($j=1; $j <$lenTemp3; $j++){
                                $section->addText("   ($j).".$temp33[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                    }
                }
            } else {
                $section->addText('    '.$data[$i]['destination'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));
            }

            $section->addText('二、内容与要求', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $res2 = preg_split("/\d(\.|\。)/", trim($data[$i]["ContentRequire"]));
            $lenQuan2 = count($res2);
            if ($lenQuan2 > 1) {
                for ($k = 1; $k < $lenQuan2; $k++) {
                    switch ($k) {
                        case 1:
                            $tempa1 = "1.".$res2[$k];
                            $tempa11 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa1);
                            $section->addText('  '.$tempa11[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempa1 = count($tempa11);
                            for ($j=1; $j <$lenTempa1; $j++){
                                $section->addText("   ($j).".$tempa11[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 2:
                            $tempa2 = "2.".$res2[$k];
                            $tempa12 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa2);
                            $section->addText('  '.$tempa12[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempa2 = count($tempa12);
                            for ($j=1; $j <$lenTempa2; $j++){
                                $section->addText("   ($j).".$tempa12[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 3:
                            $tempa3 = "3.".$res2[$k];
                            $tempa13 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa3);
                            $section->addText('  '.$tempa13[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempa3 = count($tempa13);
                            for ($j=1; $j <$lenTempa3; $j++){
                                $section->addText("   ($j).".$tempa13[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 4:
                            $tempa4 = "4.".$res2[$k];
                            $tempa44 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa4);
                            $section->addText('  '.$tempa44[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempa4 = count($tempa44);
                            for ($j=1; $j <$lenTempa4; $j++){
                                $section->addText("   ($j).".$tempa44[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 5:
                            $tempa5 = "5.".$res2[$k];
                            $tempa55 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa5);
                            $section->addText('  '.$tempa55[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempa5 = count($tempa55);
                            for ($j=1; $j <$lenTempa5; $j++){
                                $section->addText("   ($j).".$tempa55[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 6:
                            $tempa6 = "6.".$res2[$k];
                            $tempa66 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa6);
                            $section->addText('  '.$tempa66[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempa6 = count($tempa66);
                            for ($j=1; $j <$lenTempa6; $j++){
                                $section->addText("   ($j).".$tempa66[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                    }
                }

            } else {
                $section->addText('    '.$data[$i]["ContentRequire"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            }

            $section->addText('三、组织方式与进度安排', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $res3 = preg_split("/\d(\.|\。)/", trim($data[$i]["progress"]));
            $lenQuan3 = count($res3);
            if ($lenQuan3 > 1) {
                for ($k = 1; $k < $lenQuan3; $k++) {
                    switch ($k) {
                        case 1:
                            $tempc1 = "1.".$res3[$k];
                            $tempc11 = preg_split("/(\（|\()(\d)(\）|\))/", $tempc1);
                            $section->addText('  '.$tempc11[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempc1 = count($tempc11);
                            for ($j=1; $j <$lenTempc1; $j++){
                                $section->addText("   ($j).".$tempc11[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 2:
                            $tempc2 = "2.".$res3[$k];
                            $tempc12 = preg_split("/(\（|\()(\d)(\）|\))/", $tempc2);
                            $section->addText('  '.$tempc12[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempc2 = count($tempc12);
                            for ($j=1; $j <$lenTempc2; $j++){
                                $section->addText("   ($j).".$tempc12[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 3:
                            $tempc3 = "3.".$res3[$k];
                            $tempc13 = preg_split("/(\（|\()(\d)(\）|\))/", $tempc3);
                            $section->addText('  '.$tempc13[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempc3 = count($tempc13);
                            for ($j=1; $j <$lenTempc3; $j++){
                                $section->addText("   ($j).".$tempc13[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 4:
                            $tempc4 = "4.".$res3[$k];
                            $tempc44 = preg_split("/(\（|\()(\d)(\）|\))/", $tempc4);
                            $section->addText('  '.$tempc44[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempc4 = count($tempc44);
                            for ($j=1; $j <$lenTempc4; $j++){
                                $section->addText("   ($j).".$tempc44[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 5:
                            $tempc5 = "5.".$res3[$k];
                            $tempc55 = preg_split("/(\（|\()(\d)(\）|\))/", $tempc5);
                            $section->addText('  '.$tempc55[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempc5 = count($tempc55);
                            for ($j=1; $j <$lenTempc5; $j++){
                                $section->addText("   ($j).".$tempc55[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 6:
                            $tempc6 = "6.".$res3[$k];
                            $tempc66 = preg_split("/(\（|\()(\d)(\）|\))/", $tempc6);
                            $section->addText('  '.$tempc66[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempc6 = count($tempc66);
                            for ($j=1; $j <$lenTempc6; $j++){
                                $section->addText("   ($j).".$tempc66[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                    }
                }
            } else {
                $section->addText('    '.$data[$i]["progress"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            }

            $section->addText('四、场地与设备', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $res4 = preg_split("/\d(\.|\。)/", trim($data[$i]["Instrument"]));
            $lenQuan4 = count($res4);
            if ($lenQuan4 > 1) {
                for ($k = 1; $k < $lenQuan4; $k++) {
                    switch ($k) {
                        case 1:
                            $tempd1 = "1.".$res4[$k];
                            $tempd11 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd1);
                            $section->addText('  '.$tempd11[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempd1 = count($tempd11);
                            for ($j=1; $j <$lenTempd1; $j++){
                                $section->addText("   ($j).".$tempd11[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 2:
                            $tempd2 = "2.".$res4[$k];
                            $tempd12 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd2);
                            $section->addText('  '.$tempd12[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempd2 = count($tempd12);
                            for ($j=1; $j <$lenTempd2; $j++){
                                $section->addText("   ($j).".$tempd12[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 3:
                            $tempd3 = "3.".$res4[$k];
                            $tempd13 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd3);
                            $section->addText('  '.$tempd13[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempd3 = count($tempd13);
                            for ($j=1; $j <$lenTempd3; $j++){
                                $section->addText("   ($j).".$tempd13[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 4:
                            $tempd4 = "4.".$res4[$k];
                            $tempd44 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd4);
                            $section->addText('  '.$tempd44[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempd4 = count($tempd44);
                            for ($j=1; $j <$lenTempd4; $j++){
                                $section->addText("   ($j).".$tempd44[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 5:
                            $tempd5 = "5.".$res4[$k];
                            $tempd55 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd5);
                            $section->addText('  '.$tempd55[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempd5 = count($tempd55);
                            for ($j=1; $j <$lenTempd5; $j++){
                                $section->addText("   ($j).".$tempd55[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 6:
                            $tempd6 = "6.".$res4[$k];
                            $tempd66 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd6);
                            $section->addText('  '.$tempd66[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempd6 = count($tempd66);
                            for ($j=1; $j <$lenTempd6; $j++){
                                $section->addText("   ($j).".$tempd66[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                    }
                }
            } else {
                $section->addText('    '.$data[$i]["Instrument"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            }

            $section->addText('五、配套教材或指导书', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $a = preg_replace('/\。/', '.', trim($data[$i]['TBook']));
            $b = preg_replace('/\，/', ',', $a);
            $res5 = preg_split("/\[\d\]+/", $b);
            $lenQuan5 = count($res5);
            if ($lenQuan5 > 1) {
                for ($k = 1; $k < $lenQuan5; $k++) {
                    $section->addText("   [$j]".$res5[$k], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                }
            } else {
                $section->addText('    '.$data[$i]["TBook"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));
            }

            $section->addText('六、考核方式与成绩评定办法', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $res6 = preg_split("/\d(\.|\。)/", trim($data[$i]["TEvaluate"]));
            $lenQuan6 = count($res6);
            if ($lenQuan6 > 1) {
                for ($k = 1; $k < $lenQuan6; $k++) {
                    switch ($k) {
                        case 1:
                            $tempe1 = "1.".$res6[$k];
                            $tempe11 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe1);
                            $section->addText('  '.$tempe11[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempe1 = count($tempe11);
                            for ($j=1; $j <$lenTempe1; $j++){
                                $section->addText("   ($j).".$tempe11[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 2:
                            $tempe2 = "2.".$res6[$k];
                            $tempe12 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe2);
                            $section->addText('  '.$tempe12[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempe2 = count($tempe12);
                            for ($j=1; $j <$lenTempe2; $j++){
                                $section->addText("   ($j).".$tempe12[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 3:
                            $tempe3 = "3.".$res6[$k];
                            $tempe13 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe3);
                            $section->addText('  '.$tempe13[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempe3 = count($tempe13);
                            for ($j=1; $j <$lenTempe3; $j++){
                                $section->addText("   ($j).".$tempe13[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 4:
                            $tempe4 = "4.".$res6[$k];
                            $tempe44 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe4);
                            $section->addText('  '.$tempe44[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempe4 = count($tempe44);
                            for ($j=1; $j <$lenTempe4; $j++){
                                $section->addText("   ($j).".$tempe44[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 5:
                            $tempe5 = "5.".$res6[$k];
                            $tempe55 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe5);
                            $section->addText('  '.$tempe55[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempe5 = count($tempe55);
                            for ($j=1; $j <$lenTempe5; $j++){
                                $section->addText("   ($j).".$tempe55[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 6:
                            $tempe6 = "6.".$res6[$k];
                            $tempe66 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe6);
                            $section->addText('  '.$tempe66[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempe6 = count($tempe66);
                            for ($j=1; $j <$lenTempe6; $j++){
                                $section->addText("   ($j).".$tempe66[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                    }
                }
            } else {
                $section->addText('    '.$data[$i]["TEvaluate"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            }


            $section->addText('七、其他', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $res7 = preg_split("/\d(\.|\。)/", trim($data[$i]["TOthers"]));
            $lenQuan7 = count($res7);
            if ($lenQuan7 > 1) {
                for ($k = 1; $k < $lenQuan7; $k++) {
                    switch ($k) {
                        case 1:
                            $tempf1 = "1.".$res7[$k];
                            $tempf11 = preg_split("/(\（|\()(\d)(\）|\))/", $tempf1);
                            $section->addText('  '.$tempf11[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempf1 = count($tempf11);
                            for ($j=1; $j <$lenTempf1; $j++){
                                $section->addText("   ($j).".$tempf11[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 2:
                            $tempf2 = "2.".$res7[$k];
                            $tempf12 = preg_split("/(\（|\()(\d)(\）|\))/", $tempf2);
                            $section->addText('  '.$tempf12[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempf2 = count($tempf12);
                            for ($j=1; $j <$lenTempf2; $j++){
                                $section->addText("   ($j).".$tempf12[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 3:
                            $tempf3 = "3.".$res7[$k];
                            $tempf13 = preg_split("/(\（|\()(\d)(\）|\))/", $tempf3);
                            $section->addText('  '.$tempf13[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempf3 = count($tempf13);
                            for ($j=1; $j <$lenTempf3; $j++){
                                $section->addText("   ($j).".$tempf13[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 4:
                            $tempf4 = "4.".$res7[$k];
                            $tempf44 = preg_split("/(\（|\()(\d)(\）|\))/", $tempf4);
                            $section->addText('  '.$tempf44[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempf4 = count($tempf44);
                            for ($j=1; $j <$lenTempf4; $j++){
                                $section->addText("   ($j).".$tempf44[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 5:
                            $tempf5 = "5.".$res7[$k];
                            $tempf55 = preg_split("/(\（|\()(\d)(\）|\))/", $tempf5);
                            $section->addText('  '.$tempf55[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempf5 = count($tempf55);
                            for ($j=1; $j <$lenTempf5; $j++){
                                $section->addText("   ($j).".$tempf55[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 6:
                            $tempf6 = "6.".$res7[$k];
                            $tempf66 = preg_split("/(\（|\()(\d)(\）|\))/", $tempf6);
                            $section->addText('  '.$tempf66[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempf6 = count($tempf66);
                            for ($j=1; $j <$lenTempf6; $j++){
                                $section->addText("   ($j).".$tempf66[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                    }
                }
            } else {
                $section->addText('    '.$data[$i]["TOthers"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            }


            // 生成   专业负责人签字：   教学院长签字

//            $textrun1 = $section->createTextRun(array('align'=>'left', 'spaceBefore'=>100, 'spaceAfter'=>100));

//            $textrun->addText('Experiment Syllabus of ', array('italic'=>false, 'bold'=>false, 'name'=>'Times New Roman', 'size'=>18));
            $section->addText("");
            $section->addText("");
            $section->addText("专业负责人签字：　　　　　　　　　　教学院长签字：", array('italic'=>false, 'bold'=>false, 'name'=>'宋体', 'size'=>12));
//            $textrun1->addText("教学院长签字：", array('italic'=>false, 'bold'=>false, 'name'=>"宋体", 'size'=>16));


            $section->addTextBreak(1); // 新起一个空白段落
        }


        $fileName = "实践教学大纲".date("YmdHis");
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition:attachment;filename=".$fileName.".docx");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('php://output');

    }

    /**
     * 生成word文档的方法  C版
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
        $obj = M("Shijian");
        $data = $obj->where("CCode like 'C%'")->order("CCode")->select();
        $len = $obj->where("CCode like 'C%'")->count();
        for ($i = 0; $i < $len; $i++) {

            $ccode = $data[$i]['CCode'];
//            $tableData = $obj1->where("CCode='$ccode'")->select();
//            $len1 = $obj1->where("CCode='$ccode'")->count();

            /**
             * 标题生成结束
             */
            $depth = 1;
            $fontStyle = array('size'=>22, 'bold'=>'true');              // 18号字体 即 二号
            $paragraphStyle = array(
                'align'=>'center',      // 对其方式
                'spaceBefore'=>100,     // 断后间距
                'spaceAfter'=>0,        // 段前间距
                'spacing'=>100,         // 行高
            );
            $PHPWord->addTitleStyle($depth, $fontStyle, $paragraphStyle); // 给标题添加样式
            $section = $PHPWord->createSection();
            $titleValue = $data[$i]['CName'];
            $section->addTitle($titleValue, 1);

            $textrun = $section->createTextRun(array('align'=>'center', 'spaceBefore'=>100, 'spaceAfter'=>100));

//            $textrun->addText('Experiment Syllabus of ', array('italic'=>false, 'bold'=>false, 'name'=>'Times New Roman', 'size'=>18));
            $textrun->addText($data[$i]['EName'], array('italic'=>false, 'bold'=>false, 'name'=>'Calibri', 'size'=>16));

            $section->addText('  适用专业: '.$data[$i]['SMajor'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150, 'indentation'=>array('firstLine'=>420)));
            $section->addText('  课程代码: '.$data[$i]['CCode'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  学时数: '.$data[$i]['TNum'].'学时', array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  学分数: '.$data[$i]['TScore'].'学分', array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  讨论参加人: '.$data[$i]['TTaoLunCanJia'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  审核人: '.$data[$i]['CConductor'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  批准人: '.$data[$i]['Allowed'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText('一、实验目的', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $res0 = preg_split("/\d(\.|\。)/", trim($data[$i]["destination"]));
//            $res0 = preg_split("/①|②|③|④|⑤|⑥|⑦|⑧+/", trim($data[$i]['destination']));
            $lenQuan0 = count($res0);
            if ($lenQuan0 > 1 ){
                for ($k=1; $k < $lenQuan0; $k++) {
//                    dump($k.$res[$k]);
                    switch ($k){
                        case 1:
                            $temp0 = "1.".$res0[$k];
                            $temp00 = preg_split("/(\（|\()(\d)(\）|\))/", $temp0);
                            $section->addText('  '.$temp00[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTemp = count($temp00);
                            for ($j=1; $j <$lenTemp; $j++){
                                $section->addText("   ($j).".$temp00[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 2:
                            $temp2 = "2.".$res0[$k];
                            $temp22 = preg_split("/(\（|\()(\d)(\）|\))/", $temp2);
                            $section->addText('  '.$temp22[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTemp2 = count($temp22);
                            for ($j=1; $j <$lenTemp2; $j++){
                                $section->addText("   ($j).".$temp22[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 3:
                            $temp3 = "3.".$res0[$k];
                            $temp33 = preg_split("/(\（|\()(\d)(\）|\))/", $temp3);
                            $section->addText('  '.$temp33[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTemp3 = count($temp33);
                            for ($j=1; $j <$lenTemp3; $j++){
                                $section->addText("   ($j).".$temp33[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                    }
                }
            } else {
                $section->addText('    '.$data[$i]['destination'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));
            }

            $section->addText('二、内容与要求', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $res2 = preg_split("/\d(\.|\。)/", trim($data[$i]["ContentRequire"]));
            $lenQuan2 = count($res2);
            if ($lenQuan2 > 1) {
                for ($k = 1; $k < $lenQuan2; $k++) {
                    switch ($k) {
                        case 1:
                            $tempa1 = "1.".$res2[$k];
                            $tempa11 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa1);
                            $section->addText('  '.$tempa11[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempa1 = count($tempa11);
                            for ($j=1; $j <$lenTempa1; $j++){
                                $section->addText("   ($j).".$tempa11[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 2:
                            $tempa2 = "2.".$res2[$k];
                            $tempa12 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa2);
                            $section->addText('  '.$tempa12[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempa2 = count($tempa12);
                            for ($j=1; $j <$lenTempa2; $j++){
                                $section->addText("   ($j).".$tempa12[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 3:
                            $tempa3 = "3.".$res2[$k];
                            $tempa13 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa3);
                            $section->addText('  '.$tempa13[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempa3 = count($tempa13);
                            for ($j=1; $j <$lenTempa3; $j++){
                                $section->addText("   ($j).".$tempa13[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 4:
                            $tempa4 = "4.".$res2[$k];
                            $tempa44 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa4);
                            $section->addText('  '.$tempa44[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempa4 = count($tempa44);
                            for ($j=1; $j <$lenTempa4; $j++){
                                $section->addText("   ($j).".$tempa44[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 5:
                            $tempa5 = "5.".$res2[$k];
                            $tempa55 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa5);
                            $section->addText('  '.$tempa55[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempa5 = count($tempa55);
                            for ($j=1; $j <$lenTempa5; $j++){
                                $section->addText("   ($j).".$tempa55[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 6:
                            $tempa6 = "6.".$res2[$k];
                            $tempa66 = preg_split("/(\（|\()(\d)(\）|\))/", $tempa6);
                            $section->addText('  '.$tempa66[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempa6 = count($tempa66);
                            for ($j=1; $j <$lenTempa6; $j++){
                                $section->addText("   ($j).".$tempa66[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                    }
                }

            } else {
                $section->addText('    '.$data[$i]["ContentRequire"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            }

            $section->addText('三、组织方式与进度安排', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $res3 = preg_split("/\d(\.|\。)/", trim($data[$i]["progress"]));
            $lenQuan3 = count($res3);
            if ($lenQuan3 > 1) {
                for ($k = 1; $k < $lenQuan3; $k++) {
                    switch ($k) {
                        case 1:
                            $tempc1 = "1.".$res3[$k];
                            $tempc11 = preg_split("/(\（|\()(\d)(\）|\))/", $tempc1);
                            $section->addText('  '.$tempc11[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempc1 = count($tempc11);
                            for ($j=1; $j <$lenTempc1; $j++){
                                $section->addText("   ($j).".$tempc11[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 2:
                            $tempc2 = "2.".$res3[$k];
                            $tempc12 = preg_split("/(\（|\()(\d)(\）|\))/", $tempc2);
                            $section->addText('  '.$tempc12[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempc2 = count($tempc12);
                            for ($j=1; $j <$lenTempc2; $j++){
                                $section->addText("   ($j).".$tempc12[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 3:
                            $tempc3 = "3.".$res3[$k];
                            $tempc13 = preg_split("/(\（|\()(\d)(\）|\))/", $tempc3);
                            $section->addText('  '.$tempc13[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempc3 = count($tempc13);
                            for ($j=1; $j <$lenTempc3; $j++){
                                $section->addText("   ($j).".$tempc13[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 4:
                            $tempc4 = "4.".$res3[$k];
                            $tempc44 = preg_split("/(\（|\()(\d)(\）|\))/", $tempc4);
                            $section->addText('  '.$tempc44[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempc4 = count($tempc44);
                            for ($j=1; $j <$lenTempc4; $j++){
                                $section->addText("   ($j).".$tempc44[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 5:
                            $tempc5 = "5.".$res3[$k];
                            $tempc55 = preg_split("/(\（|\()(\d)(\）|\))/", $tempc5);
                            $section->addText('  '.$tempc55[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempc5 = count($tempc55);
                            for ($j=1; $j <$lenTempc5; $j++){
                                $section->addText("   ($j).".$tempc55[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 6:
                            $tempc6 = "6.".$res3[$k];
                            $tempc66 = preg_split("/(\（|\()(\d)(\）|\))/", $tempc6);
                            $section->addText('  '.$tempc66[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempc6 = count($tempc66);
                            for ($j=1; $j <$lenTempc6; $j++){
                                $section->addText("   ($j).".$tempc66[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                    }
                }
            } else {
                $section->addText('    '.$data[$i]["progress"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            }

            $section->addText('四、场地与设备', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $res4 = preg_split("/\d(\.|\。)/", trim($data[$i]["Instrument"]));
            $lenQuan4 = count($res4);
            if ($lenQuan4 > 1) {
                for ($k = 1; $k < $lenQuan4; $k++) {
                    switch ($k) {
                        case 1:
                            $tempd1 = "1.".$res4[$k];
                            $tempd11 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd1);
                            $section->addText('  '.$tempd11[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempd1 = count($tempd11);
                            for ($j=1; $j <$lenTempd1; $j++){
                                $section->addText("   ($j).".$tempd11[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 2:
                            $tempd2 = "2.".$res4[$k];
                            $tempd12 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd2);
                            $section->addText('  '.$tempd12[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempd2 = count($tempd12);
                            for ($j=1; $j <$lenTempd2; $j++){
                                $section->addText("   ($j).".$tempd12[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 3:
                            $tempd3 = "3.".$res4[$k];
                            $tempd13 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd3);
                            $section->addText('  '.$tempd13[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempd3 = count($tempd13);
                            for ($j=1; $j <$lenTempd3; $j++){
                                $section->addText("   ($j).".$tempd13[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 4:
                            $tempd4 = "4.".$res4[$k];
                            $tempd44 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd4);
                            $section->addText('  '.$tempd44[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempd4 = count($tempd44);
                            for ($j=1; $j <$lenTempd4; $j++){
                                $section->addText("   ($j).".$tempd44[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 5:
                            $tempd5 = "5.".$res4[$k];
                            $tempd55 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd5);
                            $section->addText('  '.$tempd55[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempd5 = count($tempd55);
                            for ($j=1; $j <$lenTempd5; $j++){
                                $section->addText("   ($j).".$tempd55[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 6:
                            $tempd6 = "6.".$res4[$k];
                            $tempd66 = preg_split("/(\（|\()(\d)(\）|\))/", $tempd6);
                            $section->addText('  '.$tempd66[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempd6 = count($tempd66);
                            for ($j=1; $j <$lenTempd6; $j++){
                                $section->addText("   ($j).".$tempd66[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                    }
                }
            } else {
                $section->addText('    '.$data[$i]["Instrument"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            }

            $section->addText('五、配套教材或指导书', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $a = preg_replace('/\。/', '.', trim($data[$i]['TBook']));
            $b = preg_replace('/\，/', ',', $a);
            $res5 = preg_split("/\[\d\]+/", $b);
            $lenQuan5 = count($res5);
            if ($lenQuan5 > 1) {
                for ($k = 1; $k < $lenQuan5; $k++) {
                    $section->addText("   [$j]".$res5[$k], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                }
            } else {
                $section->addText('    '.$data[$i]["TBook"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));
            }

            $section->addText('六、考核方式与成绩评定办法', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $res6 = preg_split("/\d(\.|\。)/", trim($data[$i]["TEvaluate"]));
            $lenQuan6 = count($res6);
            if ($lenQuan6 > 1) {
                for ($k = 1; $k < $lenQuan6; $k++) {
                    switch ($k) {
                        case 1:
                            $tempe1 = "1.".$res6[$k];
                            $tempe11 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe1);
                            $section->addText('  '.$tempe11[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempe1 = count($tempe11);
                            for ($j=1; $j <$lenTempe1; $j++){
                                $section->addText("   ($j).".$tempe11[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 2:
                            $tempe2 = "2.".$res6[$k];
                            $tempe12 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe2);
                            $section->addText('  '.$tempe12[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempe2 = count($tempe12);
                            for ($j=1; $j <$lenTempe2; $j++){
                                $section->addText("   ($j).".$tempe12[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 3:
                            $tempe3 = "3.".$res6[$k];
                            $tempe13 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe3);
                            $section->addText('  '.$tempe13[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempe3 = count($tempe13);
                            for ($j=1; $j <$lenTempe3; $j++){
                                $section->addText("   ($j).".$tempe13[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 4:
                            $tempe4 = "4.".$res6[$k];
                            $tempe44 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe4);
                            $section->addText('  '.$tempe44[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempe4 = count($tempe44);
                            for ($j=1; $j <$lenTempe4; $j++){
                                $section->addText("   ($j).".$tempe44[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 5:
                            $tempe5 = "5.".$res6[$k];
                            $tempe55 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe5);
                            $section->addText('  '.$tempe55[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempe5 = count($tempe55);
                            for ($j=1; $j <$lenTempe5; $j++){
                                $section->addText("   ($j).".$tempe55[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 6:
                            $tempe6 = "6.".$res6[$k];
                            $tempe66 = preg_split("/(\（|\()(\d)(\）|\))/", $tempe6);
                            $section->addText('  '.$tempe66[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempe6 = count($tempe66);
                            for ($j=1; $j <$lenTempe6; $j++){
                                $section->addText("   ($j).".$tempe66[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                    }
                }
            } else {
                $section->addText('    '.$data[$i]["TEvaluate"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            }


            $section->addText('七、其他', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $res7 = preg_split("/\d(\.|\。)/", trim($data[$i]["TOthers"]));
            $lenQuan7 = count($res7);
            if ($lenQuan7 > 1) {
                for ($k = 1; $k < $lenQuan7; $k++) {
                    switch ($k) {
                        case 1:
                            $tempf1 = "1.".$res7[$k];
                            $tempf11 = preg_split("/(\（|\()(\d)(\）|\))/", $tempf1);
                            $section->addText('  '.$tempf11[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempf1 = count($tempf11);
                            for ($j=1; $j <$lenTempf1; $j++){
                                $section->addText("   ($j).".$tempf11[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 2:
                            $tempf2 = "2.".$res7[$k];
                            $tempf12 = preg_split("/(\（|\()(\d)(\）|\))/", $tempf2);
                            $section->addText('  '.$tempf12[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempf2 = count($tempf12);
                            for ($j=1; $j <$lenTempf2; $j++){
                                $section->addText("   ($j).".$tempf12[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 3:
                            $tempf3 = "3.".$res7[$k];
                            $tempf13 = preg_split("/(\（|\()(\d)(\）|\))/", $tempf3);
                            $section->addText('  '.$tempf13[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempf3 = count($tempf13);
                            for ($j=1; $j <$lenTempf3; $j++){
                                $section->addText("   ($j).".$tempf13[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 4:
                            $tempf4 = "4.".$res7[$k];
                            $tempf44 = preg_split("/(\（|\()(\d)(\）|\))/", $tempf4);
                            $section->addText('  '.$tempf44[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempf4 = count($tempf44);
                            for ($j=1; $j <$lenTempf4; $j++){
                                $section->addText("   ($j).".$tempf44[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 5:
                            $tempf5 = "5.".$res7[$k];
                            $tempf55 = preg_split("/(\（|\()(\d)(\）|\))/", $tempf5);
                            $section->addText('  '.$tempf55[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempf5 = count($tempf55);
                            for ($j=1; $j <$lenTempf5; $j++){
                                $section->addText("   ($j).".$tempf55[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                        case 6:
                            $tempf6 = "6.".$res7[$k];
                            $tempf66 = preg_split("/(\（|\()(\d)(\）|\))/", $tempf6);
                            $section->addText('  '.$tempf66[0], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            $lenTempf6 = count($tempf66);
                            for ($j=1; $j <$lenTempf6; $j++){
                                $section->addText("   ($j).".$tempf66[$j], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>100, 'spacing'=>100));
                            }
                            break;
                    }
                }
            } else {
                $section->addText('    '.$data[$i]["TOthers"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            }


            // 生成   专业负责人签字：   教学院长签字

//            $textrun1 = $section->createTextRun(array('align'=>'left', 'spaceBefore'=>100, 'spaceAfter'=>100));

//            $textrun->addText('Experiment Syllabus of ', array('italic'=>false, 'bold'=>false, 'name'=>'Times New Roman', 'size'=>18));
            $section->addText("");
            $section->addText("");
            $section->addText("专业负责人签字：　　　　　　　　　　教学院长签字：", array('italic'=>false, 'bold'=>false, 'name'=>'宋体', 'size'=>12));
//            $textrun1->addText("教学院长签字：", array('italic'=>false, 'bold'=>false, 'name'=>"宋体", 'size'=>16));


            $section->addTextBreak(1); // 新起一个空白段落
        }


        $fileName = "实践教学大纲".date("YmdHis");
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition:attachment;filename=".$fileName.".docx");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('php://output');

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
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', "实践大纲");//向合并后的单元格中写入表头
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
     * 显示实验指导书
     */
    /**
     * 实践指导书 展示
     */
    public function guideBook(){
        if (IS_POST) {
//            dump($_POST);
            $sqlCondition = " 1=1 ";
            $version = isset($_POST['version']) ? $_POST['version'] : null;
            $uploadStatus = isset($_POST["uploadStatus"]) ? $_POST['uploadStatus'] : null;
            $SMajor = trim($_POST['SMajor']);
            $keywords = trim($_POST['keywords']);

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
                $sqlCondition .= " AND (z1.CCode like '%$keywords%' OR z1.CName like '%$keywords%' OR z1.TzhiBiRen like '%$keywords%' OR z1.TTaoLunCanJia like '%$keywords%') ";
            }

            $model = new Model();
            $sql = "
select z1.*
FROM
(SELECT
	n.id,
	n.CCode,
	n.CName,
	n.TNum,
	n.TScore,
	n.TzhiBiRen,
	n.TTaoLunCanJia,
	n.SMajor,
	b.filename
FROM
	neu_shijian n
LEFT OUTER JOIN neu_shijianguidebook b ON n.CCode = b.CCode
GROUP BY
	n.CCode
ORDER BY
	n.CCode) z1
where ".$sqlCondition;
            $list1 = $model->query($sql);

            $this->assign('list', $list1);
            $this->display();

        } else {
            $model = new Model();
            $sql = "
SELECT
	n.id,
	n.CCode,
	n.CName,
	n.TNum,
	n.TScore,
	n.TzhiBiRen,
	n.TTaoLunCanJia,
	n.SMajor,
	b.filename
FROM
	neu_shijian n
LEFT OUTER JOIN neu_shijianguidebook b ON n.CCode = b.CCode
GROUP BY
	n.CCode
ORDER BY
	n.CCode
";
            $list2 = $model->query($sql);
//            dump(111);
//            dump($list2);
            $this->assign('list', $list2);        // 赋值数据集
            $this->display();
        }
    }
    public function guideBook1(){
        if (IS_POST) {
//            dump($_POST);
            $sqlCondition = " 1=1 ";
            $version = isset($_POST['version']) ? $_POST['version'] : null;
            $keywords = trim($_POST['keywords']);

            if (isset($version)){
                $sqlCondition .= " AND (z1.CCode like '$version%')";
            }

            if ($keywords != "") {
                $sqlCondition .= " AND (z1.CCode like '%$keywords%' OR z1.CName like '%$keywords%' OR z1.TzhiBiRen like '%$keywords%' OR z1.TTaoLunCanJia like '%$keywords%') ";
            }

            $model = new Model();
            $sql = "
select z1.*
FROM
(SELECT
	n.id,
	n.CCode,
	n.CName,
	n.TNum,
	n.TScore,
	n.TzhiBiRen,
	n.TTaoLunCanJia,
	b.filename
FROM
	neu_shijian n
LEFT OUTER JOIN neu_shijianguidebook b ON n.CCode = b.CCode
GROUP BY
	n.CCode
ORDER BY
	n.CCode) z1
where ".$sqlCondition;
            $list1 = $model->query($sql);

            $this->assign('list', $list1);
            $this->display();

        } else {
            $model = new Model();
            $sql = "
SELECT
	n.id,
	n.CCode,
	n.CName,
	n.TNum,
	n.TScore,
	n.TzhiBiRen,
	n.TTaoLunCanJia,
	b.filename
FROM
	neu_shijian n
LEFT OUTER JOIN neu_shijianguidebook b ON n.CCode = b.CCode
GROUP BY
	n.CCode
ORDER BY
	n.CCode
";
            $list2 = $model->query($sql);
//            dump(111);
//            dump($list2);
            $this->assign('list', $list2);        // 赋值数据集
            $this->display();
        }
    }

    /**
     * 上传实验指导书
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
        $upload->maxSize = 553145728;     // 设置附件上传大小
        $upload->exts = array('pdf');
        $upload->autoSub = false;
        $upload->saveName = $CCode;
        $upload->rootPath = './Uploads/shijian/';
        $info = $upload->upload();

        if ($info) {
            $file_name = './Uploads/shijian/'.$info['mypic']['savepath'].$info['mypic']['savename'];
            $model = M("shijianguidebook");
            $data["CCode"] = $CCode;
            $data["filename"] = $file_name;
            $data["uploadTime"] = date("Y-m-d: H:i:s");
            $data["ip"] = get_client_ip();
            $data["whoupload"] = session('teacher_name');

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


}