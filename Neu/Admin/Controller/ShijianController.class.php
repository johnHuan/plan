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

namespace Admin\Controller;

use Admin\Common\FilterController;
use Think\Model;
use Think\Upload;

class ShijianController extends FilterController {

    /**
     * index页不需要，直接重定向到overlook页面
     */
    public function index(){
        $this->redirect('overlook');
    }

    /**
     * 提交后的表单数据处理操作方法
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
            $list1=$model->field('id,计划批次, 专业名称, 课程编号, 课程名称, 学期学时,实验学时,上机学时, status')->where($sqlCondition)->group("课程编号")->order("课程编号")->select();
            $this->assign('data', $list1);
            $this->display();
        } else {
            $data = $model->field("id,计划批次, 专业名称, 课程编号, 课程名称, 学期学时,实验学时,上机学时, status")->where("课程编号 like 'B%'  ")->group("课程编号")->order("课程编号")->select();
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
            $list1=$model->field('id,计划批次, 专业名称, 课程编号, 课程名称, 学期学时, 实验学时,上机学时,status')->where($sqlCondition)->group("课程编号")->order("课程编号")->select();
            $this->assign('data', $list1);
            $this->display();
        } else {
            $data = $model->field("id,计划批次, 专业名称, 课程编号, 课程名称, 学期学时, 实验学时,上机学时,status")->where("课程编号 like 'C%'")->group("课程编号")->order("课程编号")->select();
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

            $model = M('Shijian');
            $where['_string'] = $sqlCondition;
            $list1 = $model->field('id,CName, CCode, TNum, TScore, TzhiBiRen, TTaoLunCanJia, CConductor, status')->where($sqlCondition)->order("CCode")->group("CCode")->select();
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

//            dump($result);
            if($result == null){
                $this->error('非法闯入！！。。。');
            } else {
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
     * 生成word文档
     */
    public function generateWord(){
        // 导入PHPWord库
        vendor("PHPWord");

        $PHPWord = new \PHPWord();

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
            $titleValue = $data[$i]['CCode'].$data[$i]['CName'];
            $section->addTitle($titleValue, 1);

            $textrun = $section->createTextRun(array('align'=>'center', 'spaceBefore'=>100, 'spaceAfter'=>100));

            $textrun->addText($data[$i]['EName'], array('italic'=>false, 'bold'=>false, 'name'=>'Calibri', 'size'=>16));

            $section->addText('适用专业: '.$data[$i]['SMajor'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150, 'indentation'=>array('firstLine'=>420)));
            $section->addText('课程代码: '.$data[$i]['CCode'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('学时数: '.$data[$i]['TNum'].'学时', array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('学分数: '.$data[$i]['TScore'].'学分', array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('课程性质: '.$data[$i]['KeChengXingZhi'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('实践要求: '.$data[$i]['shijianYaoQiu'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('执笔人: '.$data[$i]['TzhiBiRen'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('参与讨论人: '.$data[$i]['TTaoLunCanJia'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('审核人: '.$data[$i]['CConductor'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('批准人: '.$data[$i]['Allowed'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText('一、目的与任务', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText($data[$i]['destination'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            $section->addText('二、内容与要求', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText($data[$i]["ContentRequire"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            $section->addText('三、组织方式与进度安排', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('  '.$data[$i]["progress"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            $section->addText('四、场地与设备', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText($data[$i]["Instrument"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            $section->addText('五、配套教材或指导书', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText($data[$i]['TBook'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));


            $section->addText('六、考核方式与成绩评定办法', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText($data[$i]["TEvaluate"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            $section->addText('七、其他', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText($data[$i]["TOthers"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

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
        $data = $obj->where("CCode like 'B%'")->order("CCode")->select();
        $len = $obj->where("CCode like 'B%'")->count();
        for ($i = 0; $i < $len; $i++) {

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
            $titleValue = $data[$i]['CCode'].$data[$i]['CName'];
            $section->addTitle($titleValue, 1);

            $textrun = $section->createTextRun(array('align'=>'center', 'spaceBefore'=>100, 'spaceAfter'=>100));

            $textrun->addText($data[$i]['EName'], array('italic'=>false, 'bold'=>false, 'name'=>'Calibri', 'size'=>16));

            $section->addText('适用专业: '.$data[$i]['SMajor'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150, 'indentation'=>array('firstLine'=>420)));
            $section->addText('课程代码: '.$data[$i]['CCode'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('学时数: '.$data[$i]['TNum'].'学时', array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('学分数: '.$data[$i]['TScore'].'学分', array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('课程性质: '.$data[$i]['KeChengXingZhi'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('实践要求: '.$data[$i]['shijianYaoQiu'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('执笔人: '.$data[$i]['TzhiBiRen'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('参与讨论人: '.$data[$i]['TTaoLunCanJia'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('审核人: '.$data[$i]['CConductor'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('批准人: '.$data[$i]['Allowed'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText('一、目的与任务', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText($data[$i]['destination'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            $section->addText('二、内容与要求', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText($data[$i]["ContentRequire"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));


            $section->addText('三、组织方式与进度安排', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText($data[$i]["progress"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));


            $section->addText('四、场地与设备', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText($data[$i]["Instrument"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            $section->addText('五、配套教材或指导书', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText($data[$i]['TBook'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));


            $section->addText('六、考核方式与成绩评定办法', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText('    '.$data[$i]["TEvaluate"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            $section->addText('七、其他', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText('    '.$data[$i]["TOthers"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));


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
            $titleValue = $data[$i]['CCode'].$data[$i]['CName'];
            $section->addTitle($titleValue, 1);

            $textrun = $section->createTextRun(array('align'=>'center', 'spaceBefore'=>100, 'spaceAfter'=>100));

            $textrun->addText($data[$i]['EName'], array('italic'=>false, 'bold'=>false, 'name'=>'Calibri', 'size'=>16));

            $section->addText('适用专业: '.$data[$i]['SMajor'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150, 'indentation'=>array('firstLine'=>420)));
            $section->addText('课程代码: '.$data[$i]['CCode'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('学时数: '.$data[$i]['TNum'].'学时', array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('学分数: '.$data[$i]['TScore'].'学分', array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('课程性质: '.$data[$i]['KeChengXingZhi'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('实践要求: '.$data[$i]['shijianYaoQiu'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('执笔人: '.$data[$i]['TzhiBiRen'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('参与讨论人: '.$data[$i]['TTaoLunCanJia'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('审核人: '.$data[$i]['CConductor'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText('批准人: '.$data[$i]['Allowed'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText('一、目的与任务', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText($data[$i]['destination'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            $section->addText('二、内容与要求', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText('  '.$data[$i]["ContentRequire"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            $section->addText('三、组织方式与进度安排', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText($data[$i]["progress"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            $section->addText('四、场地与设备', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText($data[$i]["Instrument"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            $section->addText('五、配套教材或指导书', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));
            $section->addText($data[$i]['TBook'], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            $section->addText('六、考核方式与成绩评定办法', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText($data[$i]["TEvaluate"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

            $section->addText('七、其他', array('name'=>'宋体', 'bold'=>true, 'italic'=>false), array('spaceBefore'=>100, 'spaceAfter'=>150));

            $section->addText($data[$i]["TOthers"], array('name'=>'宋体', 'bold'=>false, 'italic'=>false), array('spaceBefore'=>200, 'spaceAfter'=>150, 'spacing'=>150));

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
     * 所长/管理员 审核
     * @param int $id 审核的课程id
     * @param int $CCode   审核的课程编号
     * @param int $flag    传入的flag来判断点进去 还是 提交审核按钮
     */
    public function check($id=0,$CCode=0, $flag=0){
        $model = M("shijian");
        if ($flag == 0){
            $result = $model->where("id = $id")->find();

            if($result == null){
                $this->error('非法闯入！！。。。');
            } else {
                $this->assign('result', $result);
                $this->display();
            }
        }
        else if ($flag == 1) {

            $data["status"] = 2;
            $result = $model->where("id=$id")->save($data);
            if ($result) {
                $this->success("审核完成", 'overlook');
            } else {
                $this->error("审核失败");
            }
        } else {
            $this->error('非法闯入。。。');
        }
    }

    /**
     * 实践指导书 展示
     */
    public function guideBook(){
        if (IS_POST) {
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
            $this->assign('list', $list2);        // 赋值数据集
            $this->display();
        }
    }

    /**
     * 实践指导书上传
     */
    public function uploadGuideBook(){
        header("Content-type:text/html;charset=utf8");

        $CCode = $_POST["CCode"];
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
            $data["whoupload"] = session('admin_name');

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
     * 实践大纲缺   B版
     */
    public function abscentB(){
        $model = new Model();
        $xlsName = "shijianzhidaoshu";
        $xlsCell  = array(
            array('CCode','课程编号'),
            array('CName','课程名称'),
            array('TNum','学时'),
            array('TScore','学分'),
            array('SMajor','专业名称'),
            array('TzhiBiRen','执笔人'),
            array('TTaoLunCanJia','讨论参加人'),
            array('status','状态'),
        );
        $sql = "
SELECT
	z1.*
FROM
	(
		SELECT
			n.id,
			n.CCode,
			n.CName,
			n.TNum,
			n.TScore,
			n.SMajor,
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
	) z1
WHERE
	z1.CCode like 'B%' and z1.filename IS NULL
ORDER BY
z1.SMajor,z1.CCode
";
        $xlsData = $model->query($sql);
        $len = count($xlsData);
        for ($i = 0; $i<$len; $i++){
            $xlsData[$i]['status'] = "缺实践指导书";
        }

        $this->exportExce_res($xlsName,$xlsCell,$xlsData);
    }

    /**
     * 实践大纲缺   B版
     */
    public function abscentC(){
        $model = new Model();
        $xlsName = "shijianzhidaoshu";
        $xlsCell  = array(
            array('CCode','课程编号'),
            array('CName','课程名称'),
            array('TNum','学时'),
            array('TScore','学分'),
            array('SMajor','专业名称'),
            array('TzhiBiRen','执笔人'),
            array('TTaoLunCanJia','讨论参加人'),
            array('status','状态'),
        );
        $sql = "
SELECT
	z1.*
FROM
	(
		SELECT
			n.id,
			n.CCode,
			n.CName,
			n.TNum,
			n.TScore,
			n.SMajor,
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
	) z1
WHERE
	z1.CCode like 'C%' and z1.filename IS NULL
ORDER BY
z1.SMajor,z1.CCode
";
        $xlsData = $model->query($sql);
        $len = count($xlsData);
        for ($i = 0; $i<$len; $i++){
            $xlsData[$i]['status'] = "缺实践指导书";
        }

        $this->exportExce_res($xlsName,$xlsCell,$xlsData);
    }


    /**
     * 实践大纲缺   B+C版
     */
    public function abscentBC(){
        $model = new Model();
        $xlsName = "shijianzhidaoshu";
        $xlsCell  = array(
            array('CCode','课程编号'),
            array('CName','课程名称'),
            array('TNum','学时'),
            array('TScore','学分'),
            array('SMajor','专业名称'),
            array('TzhiBiRen','执笔人'),
            array('TTaoLunCanJia','讨论参加人'),
            array('status','状态'),
        );
        $sql = "
SELECT
	z1.*
FROM
	(
		SELECT
			n.id,
			n.CCode,
			n.CName,
			n.TNum,
			n.TScore,
			n.SMajor,
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
	) z1
WHERE
	z1.filename IS NULL
ORDER BY
z1.SMajor,z1.CCode
";
        $xlsData = $model->query($sql);
        $len = count($xlsData);
        for ($i = 0; $i<$len; $i++){
            $xlsData[$i]['status'] = "缺实践指导书";
        }

        $this->exportExce_res($xlsName,$xlsCell,$xlsData);
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

}