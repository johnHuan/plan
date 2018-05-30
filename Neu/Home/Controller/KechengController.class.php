<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Author: 张桓
 * QQ: 248404941
 * Email: yz30.com@aliyun.com
 * Date: 2017/5/16
 * Time: 13:57
 */


namespace home\Controller;


use Home\Common\FilterController;
use Think\Model;

class KechengController extends FilterController {


    /**
     * 显示B版课程大纲
     */
    public function showb(){
        $model = M("dagangkechengb");
        if (IS_POST) {
//            $sqlCondition = " 1=1 ";
            $sqlCondition = " 课程编号 like 'B%' ";
            $SMajor = trim($_POST['SMajor']);
            $keywords = trim($_POST['keywords']);
            $status = $_POST["status"];

            if ($SMajor != "") {
                $sqlCondition .= " AND (专业名称='$SMajor') ";
            }
            if ($keywords != "") {
                $sqlCondition .= " AND (课程编号 like '%$keywords%' OR 课程名称 like '%$keywords%' OR 计划批次 like '%$keywords%' OR 专业名称 like '%$keywords') ";
            }
            if (isset($status)){
                $sqlCondition .= " AND status = '$status' ";
            }
            $where['_string'] = $sqlCondition;
            $list1=$model->field('id,计划批次, 专业名称, 课程编号, 课程名称, 学期学分, 学期学时, 理论学时, 实验学时, 上机学时, status')->where($sqlCondition)->group("课程编号")->order("课程编号")->select();
            $this->assign('data', $list1);
            $this->display();
        } else {
            $data = $model->field("id,计划批次, 专业名称, 课程编号, 课程名称, 学期学分, 学期学时, 理论学时, 实验学时, 上机学时, status")->where("课程编号 like 'B%'  ")->group("课程编号")->order("课程编号")->select();
            $this->assign('data', $data);
            $this->display();
        }
    }

    /**
     * 显示C版课程大纲
     */
    public function showc(){
        $model = M("dagangkechengc");
        if (IS_POST) {
//            $sqlCondition = " 计划批次 like '2016%' ";
            $sqlCondition = " 1=1 ";
            $SMajor = trim($_POST['SMajor']);
            $keywords = trim($_POST['keywords']);
            $status = $_POST["status"];

            if ($SMajor != "") {
                $sqlCondition .= " AND (专业名称='$SMajor') ";
            }
            if ($keywords != "") {
                $sqlCondition .= " AND (课程编号 like '%$keywords%' OR 课程名称 like '%$keywords%' OR 计划批次 like '%$keywords%' OR 专业名称 like '%$keywords') ";
            }
            if (isset($status)){
                $sqlCondition .= " AND status = '$status' ";
            }
            $where['_string'] = $sqlCondition;
            $list1=$model->field('id,计划批次, 专业名称, 课程编号, 课程名称, 学期学分, 学期学时, 理论学时, 实验学时, 上机学时, status')->where($sqlCondition)->group("课程编号")->order("课程编号")->select();
            $this->assign('data', $list1);
            $this->display();
        } else {
            $data = $model->field("id,计划批次, 专业名称, 课程编号, 课程名称, 学期学分, 学期学时, 理论学时, 实验学时, 上机学时, status")->where("课程编号 like 'C%'")->group("课程编号")->order("课程编号")->select();
            $this->assign('data', $data);
            $this->display();
        }
    }

    /**
     * 添加数据
     */
    public function Index(){
        $this->redirect("overlook");
/*
        if (IS_POST) {
            $CName = trim($_POST["keywords"]);
            if ($CName == "") {
                $this->error("没有检索到任何信息， 继续添加吧");
            } else {


//            $CCode = $_POST['keywords'];

                            dump($CCode);
                            $prefix = substr($CCode, 0, 1);
                            if (preg_match('/C|B/', $prefix)) {
                                // 匹配到了C版或B版  意思就是说 用户在搜索的时候输入了B或C, 需要去掉 前缀 再查
                                $like = substr($CCode, 1);
                            } else {
                                // 用户没有输入B或C  , 直接查
                                $like = $CCode;
                            }

                $model = M("dagangshiyan");
                $where['_string'] = "课程名称 like '%$CName%'";
                $result = $model->where($where)->select();
                dump($result);
            }
//            dump();


            if ($_POST['keywords'] == ''){
                $this->error('该课程无需再次添加 :) 原因：已经被添加 或 B版和C版共享了, 请添加其他课程吧！');
            } else {
//                $this->success('还没有该课程，确实需要添加...', 'index', 3);
                $this->assign('CCode', $CCode);
                $this->display();

            }

        } else {
            $this->assign('CCode', '');
            $this->display();
        }
*/
    }

    /**
     * 下载数据，前台不给权限，只能是后台用，后期可以取消
     * @param $type
     * @param $style
     * @return array
     */
    public function download(){
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
        // 查询数据
        $obj = M("kecheng");
        $teacher = session('teacher_name');
        $data = $obj->order("CCode")->where("CMaster like '$teacher'")->select();
        $len = count($data);
        if ($len < 1) {
            $this->error("您还没有自己提交过课程大纲，不能下载其他老师的大纲信息");
        }

        $obj1 = M("kecheng_table");

        for ($i = 0; $i < $len; $i++) {

            $ccode = $data[$i]['CCode'];
            $tableData = $obj1->where("CCode='$ccode'")->select();
            $len1 = $obj1->where("CCode='$ccode'")->count();


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
            $titleValue = "《".$data[$i]['CName']."》课程教学大纲";
            $section->addTitle($titleValue, 1);

            $styleTable = array(
                'borderColor'=>'000000',
                'borderSize'=>10,
                'cellMargin'=>50
            );

            $fontStyle = array('size'=>10 /*,'bold'=>true*/);
            $PHPWord->addTableStyle('myTable', $styleTable, $fontStyle);

            $styleTable = array('borderSize'=>6, 'borderColor'=>'000000', 'cellMargin'=>80);
            $styleCell = array('valign'=>'center', 'align'=>'center');
            $fontStyle = array('size'=>10 /*,'bold'=>true*/);
            $PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $fontStyle);
            $table = $section->addTable('myOwnTableStyle');

            $table->addRow(400);
            $table->addCell(1600, array('cellMerge' => 'restart', 'valign' => "center"))->addText('课程编号');
            self::_continue($table);
            $table->addCell(1600, array('cellMerge' => 'restart'))->addText($data[$i]["CCode"]);
            self::_continue($table);
            self::_continue($table);
            $table->addCell(1600, array('cellMerge' => 'restart'))->addText("课程名称");
            self::_continue($table);
            $table->addCell(1600, array('cellMerge' => 'restart'))->addText($data[$i]["CName"]);
            self::_continue($table);
            $table->addCell(1600, array('cellMerge' => 'continue'));


            self::colRow($table, '课程英文名称', $data[$i]["EName"]);

            $table->addRow();
            $table->addCell(1600)->addText('总学时数', $fontStyle, $styleCell);
            $table->addCell(1600)->addText($data[$i]["totalSNum"], $fontStyle, $styleCell);
            $table->addCell(1600, array('rowMerge' => 'restart', 'valign' => "center"))->addText('理论学时', $fontStyle, $styleCell);
            $table->addCell(1600, array('rowMerge' => 'restart', 'valign' => "center"))->addText($data[$i]["theroyNum"], $fontStyle, $styleCell);
            $table->addCell(1600, array('rowMerge' => 'restart', 'valign' => "center"))->addText('实验学时', $fontStyle, $styleCell);
            $table->addCell(1600, array('rowMerge' => 'restart', 'valign' => "center"))->addText($data[$i]["practiseNum"], $fontStyle, $styleCell);
            $table->addCell(1600, array('rowMerge' => 'restart', 'valign' => "center"))->addText('上机学时', $fontStyle, $styleCell);
            $table->addCell(1600, array('rowMerge' => 'restart', 'valign' => "center"))->addText($data[$i]["PCNum"], $fontStyle, $styleCell);
            $table->addCell(1600, array('rowMerge' => 'restart', 'valign' => "center"))->addText('本课程负责人', $fontStyle, $styleCell);
            $table->addCell(1600, array('rowMerge' => 'restart', 'valign' => "center"))->addText($data[$i]["CMaster"], $fontStyle, $styleCell);

            $table->addRow();
            $table->addCell(1600)->addText('学分', $fontStyle, $styleCell);
            $table->addCell(1600)->addText($data[$i]["TScore"], $fontStyle, $styleCell);
            self::rowMerge($table);
            self::rowMerge($table);
            self::rowMerge($table);
            self::rowMerge($table);
            self::rowMerge($table);
            self::rowMerge($table);
            self::rowMerge($table);
            self::rowMerge($table);

            $table->addRow();
            $table->addCell(1600, array('cellMerge' => 'restart', 'valign' => "center"))->addText('开课单位');
            $table->addCell(1600, array('cellMerge' => 'restart'))->addText($data[$i]["Thosted"]);
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'restart'))->addText("适用专业");
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'restart'))->addText($data[$i]["SMajor"]);
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'continue'));

            self::colRow($table, '考核方式', $data[$i]["Tassess"]);

            self::colRow($table, '先修课程', $data[$i]["TBefore"]);

            self::colRow($table, '课程类型', $data[$i]["CStyle"]);

            self::colRow($table, '选用教材', $data[$i]["TBook"]);

            self::colRow($table, '主要教学参考书', $data[$i]["TreferBook"]);

            self::colRow($table, '课程简介（300~500字）', $data[$i]["CIntroduction"]);

            self::colRow($table, '课程内容及教学目标', $data[$i]["TContent"]);

            self::colRow($table, '课程内容及教学目标', $data[$i]["TRelation"]);

            $table->addRow();
            $table->addCell(600, array('rowMerge' => 'restart', 'valign' => "center"))->addText('教学方法及学时分配');
            $table->addCell(1600, array('cellMerge'=>'restart','rowMerge' => 'restart', 'valign' => "center" ))->addText('教学内容', $fontStyle, $styleCell);
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'restart', 'valign' => "center"))->addText('学时', $fontStyle, $styleCell);
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('rowMerge' => 'restart', 'valign' => "center", 'cellMerge'=>'restart'))->addText('教学方法', $fontStyle, $styleCell);
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'continue'));

            $table->addRow();
            $table->addCell(600, array('rowMerge' => 'continue'));
            $table->addCell(600, array('rowMerge' => 'continue'));
            $table->addCell(600, array('rowMerge' => 'continue'));
            $table->addCell(600, array('rowMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'restart'))->addText("授课");
            $table->addCell(1600, array('cellMerge' => 'restart'))->addText("上机");
            $table->addCell(1600, array('cellMerge' => 'restart'))->addText("实验");
            $table->addCell(1600, array('rowMerge' => 'continue'));
            $table->addCell(1600, array('rowMerge' => 'continue'));
            $table->addCell(1600, array('rowMerge' => 'continue'));

            $length = count($tableData);
            for ($j = 0; $j < $length; $j++){


                $table->addRow();
                $table->addCell(600, array('rowMerge' => 'continue'));
                $table->addCell(600, array('cellMerge' => 'restart'))->addText($tableData[$j]["CContent"]);
                $table->addCell(600, array('cellMerge' => 'continue'));
                $table->addCell(600, array('cellMerge' => 'continue'));

                $table->addCell(600, array('rowMerge' => 'restart'))->addText($tableData[$j]["TNumTalk"]);
                $table->addCell(600, array('rowMerge' => 'restart'))->addText($tableData[$j]["TNumPC"]);
                $table->addCell(600, array('rowMerge' => 'restart'))->addText($tableData[$j]["TNumPractise"]);

                $table->addCell(600, array('cellMerge' => 'restart'))->addText($tableData[$j]["TMethods"]);
                $table->addCell(1600, array('cellMerge' => 'continue'));
                $table->addCell(1600, array('cellMerge' => 'continue'));

            }


//
//            $table->addRow();
//            $table->addCell(600, array('rowMerge' => 'restart'))->addText();
//            $table->addCell(600, array('rowMerge' => 'continue'));
//            $table->addCell(600, array('rowMerge' => 'continue'));
//            $table->addCell(600, array('rowMerge' => 'continue'));
//            $table->addCell(1600, array('cellMerge' => 'restart'))->addText("授课");
//            $table->addCell(1600, array('cellMerge' => 'restart'))->addText("上机");
//            $table->addCell(1600, array('cellMerge' => 'restart'))->addText("实验");
//            $table->addCell(600, array('rowMerge' => 'continue'));
//            $table->addCell(600, array('rowMerge' => 'continue'));
//            $table->addCell(600, array('rowMerge' => 'continue'));






            self::colRow($table, '课程的评价与持续改进机制', $data[$i]["TEvaluate"]);


            $section->addTextBreak(1); // 新起一个空白段落
        }

//        exit();

        $fileName = "课程教学大纲".date("YmdHis");
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition:attachment;filename=".$fileName.".docx");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('php://output');


    }

    /**
     * 数据处理
     * 将提交的数据写入数据库
     */
    public function IndexDo(){
        if (IS_POST) {
            $modelKeCheng = M('Kecheng');
            $modelKeChengTable = M('Kecheng_table');
            if ($_POST["flag"] == 1) {
                // B 版
                $modelKeCheng->startTrans();         // 开启事务
                $modelKeChengTable->startTrans();        // 开启事务
                $modelDBC = M('dagangkechengb');
                $modelDBC->startTrans();
//                dump($_POST);

                $kecheng['CCode'] = trim($_POST['CCode']);
                $kecheng['CName'] = trim($_POST['CName']);
                $kecheng['EName'] = trim($_POST['EName']);
                $kecheng['totalSNum'] = trim($_POST['totalSNum']);
                $kecheng['theroyNum'] = trim($_POST['theroyNum']);
                $kecheng['practiseNum'] = trim($_POST['practiseNum']);
                $kecheng['PCNum'] = trim($_POST['PCNum']);
                $kecheng['CMaster'] = trim($_POST['CMaster']);
                $kecheng['TScore'] = trim($_POST['TScore']);
                $kecheng['Thosted'] = trim($_POST['Thosted']);
                $kecheng['SMajor'] = trim($_POST['SMajor']);
                $kecheng['Tassess'] = trim($_POST['Tassess']);
                $kecheng['TBefore'] = trim($_POST['TBefore']);
                $kecheng['CStyle'] = trim($_POST['CStyle']);
                $kecheng['TBook'] = trim($_POST['TBook']);
                $kecheng['TreferBook'] = trim($_POST['TreferBook']);
                $kecheng['CIntroduction'] = trim($_POST['CIntroduction']);
                $kecheng['TContent'] = trim($_POST['TContent']);
                $kecheng['TRelation'] = trim($_POST['TRelation']);
                $kecheng['TEvaluate'] = trim($_POST['TEvaluate']);

                $table['CCode'] = $_POST['CCode'];
                $table['CContent'] = $_POST['CContent'];
                $table['TNumTalk'] = $_POST['TNumTalk'];
                $table['TNumPC'] = $_POST['TNumPC'];
                $table['TNumPractise'] = $_POST['TNumPractise'];
                $table['TMethods'] = $_POST['TMethods'];

                $codee = $table['CCode'];
                $result1 = $modelKeCheng->add($kecheng);
                $status['status'] = 1;
                $result2 = $modelDBC->where("课程编号='$codee'")->save($status);

                $tableRow = count($_POST['CContent']);
                for ($i = 0; $i < $tableRow; $i++) {
                    $temp['CCode'] = trim($_POST['CCode']);
                    $temp['CContent'] = trim($table['CContent'][$i]);
                    $temp['TNumTalk'] = trim($table['TNumTalk'][$i]);
                    $temp['TNumPC'] = trim($table['TNumPC'][$i]);
                    $temp['TNumPractise'] = trim($table['TNumPractise'][$i]);
                    $temp['TMethods'] = trim($table['TMethods'][$i]);
//                    dump($temp);
                    $result3[$i] = $modelKeChengTable->add($temp);
                }

                if ($result3[0] && $result1 && $result2) {
                    $modelDBC->commit();
                    $modelKeChengTable->commit();
                    $modelKeCheng->commit();
                    $this->success('提交成功!', 'overlook');
                }
                else {
                    $modelDBC->rollback();
                    $modelKeCheng->rollback();
                    $modelKeChengTable->rollback();
                    $this->error('提交失败！! 失败原因： 可能数据库里没有您输入的   课程编号  ！，请检查课程编号是否正确');
                }

            }
            else if ($_POST["flag"] == 0){
                // C 版
                // 2017年6月19日之前存在变量重名的现象
                $modelKeCheng->startTrans();         // 开启事务
                $modelKeChengTable->startTrans();        // 开启事务
                $modelDBC = M('dagangkechengc');
                $modelDBC->startTrans();

                $kecheng['CCode'] = trim($_POST['CCode']);
                $kecheng['CName'] = trim($_POST['CName']);
                $kecheng['EName'] = trim($_POST['EName']);
                $kecheng['totalSNum'] = trim($_POST['totalSNum']);
                $kecheng['theroyNum'] = trim($_POST['theroyNum']);
                $kecheng['practiseNum'] = trim($_POST['practiseNum']);
                $kecheng['PCNum'] = trim($_POST['PCNum']);
                $kecheng['CMaster'] = trim($_POST['CMaster']);
                $kecheng['TScore'] = trim($_POST['TScore']);
                $kecheng['Thosted'] = trim($_POST['Thosted']);
                $kecheng['SMajor'] = trim($_POST['SMajor']);
                $kecheng['Tassess'] = trim($_POST['Tassess']);
                $kecheng['TBefore'] = trim($_POST['TBefore']);
                $kecheng['CStyle'] = trim($_POST['CStyle']);
                $kecheng['TBook'] = trim($_POST['TBook']);
                $kecheng['TreferBook'] = trim($_POST['TreferBook']);
                $kecheng['CIntroduction'] = trim($_POST['CIntroduction']);
                $kecheng['TContent'] = trim($_POST['TContent']);      //  说明： 这里 2017年6月19日 之前就存在变量重复的现象，普通老师C版的课程大纲
                $kecheng['TRelation'] = trim($_POST['TRelation']);
                $kecheng['TEvaluate'] = trim($_POST['TEvaluate']);

                $table['CCode'] = $_POST['CCode'];
                $table['CContent'] = $_POST['CContent'];
                $table['TNumTalk'] = $_POST['TNumTalk'];
                $table['TNumPC'] = $_POST['TNumPC'];
                $table['TNumPractise'] = $_POST['TNumPractise'];
                $table['TMethods'] = $_POST['TMethods'];

                $codee = $table['CCode'];
                $result1 = $modelKeCheng->add($kecheng);
                $status['status'] = 1;
                $result2 = $modelDBC->where("课程编号='$codee'")->save($status);

                $tableRow = count($_POST['CContent']);
                for ($i = 0; $i < $tableRow; $i++) {
                    $temp['CCode'] = trim($_POST['CCode']);
                    $temp['CContent'] = trim($table['CContent'][$i]);
                    $temp['TNumTalk'] = trim($table['TNumTalk'][$i]);
                    $temp['TNumPC'] = trim($table['TNumPC'][$i]);
                    $temp['TNumPractise'] = trim($table['TNumPractise'][$i]);
                    $temp['TMethods'] = trim($table['TMethods'][$i]);
                    $result3[$i] = $modelKeChengTable->add($temp);
                }
                if ($result3[0] && $result1 && $result2) {
                    $modelDBC->commit();
                    $modelKeChengTable->commit();
                    $modelKeCheng->commit();
                    $this->success('提交成功!', 'overlook');
                }
                else {
                    $modelDBC->rollback();
                    $modelKeCheng->rollback();
                    $modelKeChengTable->rollback();
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
            'maxSize'=>3145728,
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
        if (IS_POST) {
            $sqlCondition = " 1=1 ";
            $version = isset($_POST['version']) ? $_POST['version'] : null;
            $status = isset($_POST['status']) ? $_POST['status'] : null;
            $SMajor = trim($_POST['SMajor']);
            $keywords = trim($_POST['keywords']);

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
            $model = M('kecheng');
            $where['_string'] = $sqlCondition;
            $list1 = $model->field('CCode,CName, totalSNum, theroyNum, practiseNum, PCNum, CMaster, TScore, Thosted, SMajor, status')->where($sqlCondition)->order("CCode")->select();
            $this->assign('list', $list1);
            $this->display();

        } else {
            $obj = M("Kecheng");
            $list2 = $obj->field('CCode,CName, totalSNum, theroyNum, practiseNum, PCNum, CMaster, TScore, Thosted, SMajor, status')->order("CCode")->select();
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
    public function edit($ccode){
        $modelKecheng = M('kecheng');
        $modelKechengTable = M('kecheng_table');
  /*      if (IS_POST) {
            $kecheng['CCode'] = trim($_POST['CCode']);
            $kecheng['CName'] = trim($_POST['CName']);
            $kecheng['EName'] = trim($_POST['EName']);
            $kecheng['totalSNum'] = trim($_POST['totalSNum']);
            $kecheng['theroyNum'] = trim($_POST['theroyNum']);
            $kecheng['practiseNum'] = trim($_POST['practiseNum']);
            $kecheng['PCNum'] = trim($_POST['PCNum']);
            $kecheng['CMaster'] = trim($_POST['CMaster']);
            $kecheng['TScore'] = trim($_POST['TScore']);
            $kecheng['Thosted'] = trim($_POST['Thosted']);
            $kecheng['SMajor'] = trim($_POST['SMajor']);
            $kecheng['Tassess'] = trim($_POST['Tassess']);
            $kecheng['TBefore'] = trim($_POST['TBefore']);
            $kecheng['CStyle'] = trim($_POST['CStyle']);
            $kecheng['TBook'] = trim($_POST['TBook']);
            $kecheng['TreferBook'] = trim($_POST['TreferBook']);
            $kecheng['CIntroduction'] = trim($_POST['CIntroduction']);
            $kecheng['TContent'] = trim($_POST['CIntroduction']);
            $kecheng['TRelation'] = trim($_POST['TRelation']);
            $kecheng['TEvaluate'] = trim($_POST['TEvaluate']);

            $table['CCode'] = $_POST['CCode'];
            $table['CContent'] = $_POST['CContent'];
            $table['TNumTalk'] = $_POST['TNumTalk'];
            $table['TNumPC'] = $_POST['TNumPC'];
            $table['TNumPractise'] = $_POST['TNumPractise'];
            $table['TMethods'] = $_POST['TMethods'];


//            $ccode = $table['CCode'];
            $modelKechengTable->startTrans();
            $modelKecheng->startTrans();
//            $status['status'] = 1;
//            $result2 = $modelKechengTable->where("课程编号='$codee'")->save($status);
//            dump($ccode);
//            dump($kecheng);

            $result1 = $modelKecheng->where("CCode = '$ccode'")->save($kecheng);
            $tableRow = count($_POST['CContent']);
            $ids = $modelKechengTable->field("id")->where("CCode = '$ccode'")->select();
//            dump($ids);
//            dump($result1);
            //            dump($_POST);
//            exit();
            $flag = false;
            for ($i = 0; $i < $tableRow; $i++) {
                $temp['CCode'] = trim($_POST['CCode']);
                $temp['CContent'] = trim($table['CContent'][$i]);
                $temp['TNumTalk'] = trim($table['TNumTalk'][$i]);
                $temp['TNumPC'] = trim($table['TNumPC'][$i]);
                $temp['TNumPractise'] = trim($table['TNumPractise'][$i]);
                $temp['TMethods'] = trim($table['TMethods'][$i]);
                $idd = $ids[$i]["id"];
                $result3[$i] = $modelKechengTable->where("id = $idd")->save($temp);
            }
            for ($j = 0; $j<$tableRow; $j++) {
                if ($result3[$j] == 1){
                    $flag = true;
                    break;
                }
            }

//            dump($_POST);
//            dump($flag);
//            dump($result1);
//            dump($result3);

            if ($flag || $result1) {
                $modelKechengTable->commit();
                $modelKecheng->commit();
                $this->success('提交成功!', "confirm?ccode=$ccode");
            } else {
                $modelKecheng->rollback();
                $modelKechengTable->rollback();
                $this->error('提交失败！失败原因：可能没有任何操作，或者其他异常信息');
            }
        }
  */
        $data = $modelKecheng->where("CCode = '$ccode'")->find();
        $dataTable = $modelKechengTable->where("CCode='$ccode'")->select();
//        dump(111);
//        dump(count($dataTable));
        $this->assign('dataTable', $dataTable);
        $this->assign('data', $data);
        $this->assign('cnt', count($dataTable));
        $this->display();
    }

    /**
     * 处理编辑提交后的保存操作
     */
    public function editDo(){
        if (IS_POST){
            $modelKecheng = M('kecheng');
            $modelKechengTable = M('kecheng_table');
            $kecheng['CCode'] = trim($_POST['CCode']);
            $kecheng['CName'] = trim($_POST['CName']);
            $kecheng['EName'] = trim($_POST['EName']);
            $kecheng['totalSNum'] = trim($_POST['totalSNum']);
            $kecheng['theroyNum'] = trim($_POST['theroyNum']);
            $kecheng['practiseNum'] = trim($_POST['practiseNum']);
            $kecheng['PCNum'] = trim($_POST['PCNum']);
            $kecheng['CMaster'] = trim($_POST['CMaster']);
            $kecheng['TScore'] = trim($_POST['TScore']);
            $kecheng['Thosted'] = trim($_POST['Thosted']);
            $kecheng['SMajor'] = trim($_POST['SMajor']);
            $kecheng['Tassess'] = trim($_POST['Tassess']);
            $kecheng['TBefore'] = trim($_POST['TBefore']);
            $kecheng['CStyle'] = trim($_POST['CStyle']);
            $kecheng['TBook'] = trim($_POST['TBook']);
            $kecheng['TreferBook'] = trim($_POST['TreferBook']);
            $kecheng['CIntroduction'] = trim($_POST['CIntroduction']);
            $kecheng['TContent'] = trim($_POST['TContent']);
            $kecheng['TRelation'] = trim($_POST['TRelation']);
            $kecheng['TEvaluate'] = trim($_POST['TEvaluate']);

            $table['CCode'] = $_POST['CCode'];
            $table['CContent'] = $_POST['CContent'];
            $table['TNumTalk'] = $_POST['TNumTalk'];
            $table['TNumPC'] = $_POST['TNumPC'];
            $table['TNumPractise'] = $_POST['TNumPractise'];
            $table['TMethods'] = $_POST['TMethods'];


            $ccode = $table['CCode'];
            $modelKechengTable->startTrans();
            $modelKecheng->startTrans();
    //            $status['status'] = 1;
    //            $result2 = $modelKechengTable->where("课程编号='$codee'")->save($status);
//                dump($ccode);
//                dump($kecheng);

            $result1 = $modelKecheng->where("CCode = '$ccode'")->save($kecheng);
            $tableRow = count($_POST['CContent']);
            $ids = $modelKechengTable->field("id")->where("CCode = '$ccode'")->select();
    //            dump($ids);
    //            dump($result1);
            //            dump($_POST);
    //            exit();
            $flag = false;
            for ($i = 0; $i < $tableRow; $i++) {
                $temp['CCode'] = trim($_POST['CCode']);
                $temp['CContent'] = trim($table['CContent'][$i]);
                $temp['TNumTalk'] = trim($table['TNumTalk'][$i]);
                $temp['TNumPC'] = trim($table['TNumPC'][$i]);
                $temp['TNumPractise'] = trim($table['TNumPractise'][$i]);
                $temp['TMethods'] = trim($table['TMethods'][$i]);
                $idd = $ids[$i]["id"];
//                dump($i);
//                dump($idd);
//                dump($temp);
                $result3[$i] = $modelKechengTable->where("id = $idd")->save($temp);
                $idd = null;
            }
            for ($j = 0; $j<$tableRow; $j++) {
                if ($result3[$j] == 1){
                    $flag = true;
                    break;
                }
            }

    //            dump($_POST);
    //            dump($flag);
    //            dump($result1);
    //            dump($result3);
//            dump($ccode);
//            dump($flag);
//            dump($temp);
//            dump($kecheng);
//            dump($result1);
            if ($flag || $result1) {
                $modelKechengTable->commit();
                $modelKecheng->commit();
//                dump("提交成功");
                $this->success('提交成功!', "confirm?ccode=$ccode");
            } else {
                $modelKecheng->rollback();
                $modelKechengTable->rollback();
//                dump("提交失败");
                $this->error('提交失败！失败原因：可能没有任何操作，或者其他异常信息');
            }

        }
        else {
            $this->error("非法操作。。。");
        }
    }

    /**
     * 添加并完善数据
     */
    public function add($id, $ccode, $flag = 0){
        if ($flag == 0 ){
            //C版
            $model = M("dagangkechengc");
            $model1 = M("bcjianjiezhongyingwen");
            $ename = $model1->field('英文名')->where("课程编号='$ccode'")->find();
            $result = $model->where("id = $id ")->find();

            $this->assign('EName', $ename["英文名"]);

            $this->assign('flag', $flag);
            $this->assign("data", $result);
            $this->display();
        }
        else if ($flag == 1){
            // B 版
            $model = M("dagangkechengb");
            $model1 = M("bcjianjiezhongyingwen");
            $ename = $model1->field('英文名')->where("课程编号='$ccode'")->find();
            $result = $model->where("id = $id ")->find();
            $this->assign('EName', $ename["英文名"]);
            $this->assign('flag', $flag);
//            dump(111);
//            dump($ename);
            $this->assign("data", $result);
            $this->display();
        }

    }

    /**
     * 私有方法 给生成word文档的方法做准备
     * @param $table
     * @param $n   名称
     * @param $d   值
     */
    private function colRow($t, $n, $d){
        $t->addRow();
        $t->addCell(1600, array('cellMerge' => 'restart', 'valign' => "center"))->addText($n);
        $t->addCell(1600, array('cellMerge' => 'restart'))->addText($d);
        $t->addCell(1600, array('cellMerge' => 'continue'));
        $t->addCell(1600, array('cellMerge' => 'continue'));
        $t->addCell(1600, array('cellMerge' => 'continue'));
        $t->addCell(1600, array('cellMerge' => 'continue'));
        $t->addCell(1600, array('cellMerge' => 'continue'));
        $t->addCell(1600, array('cellMerge' => 'continue'));
        $t->addCell(1600, array('cellMerge' => 'continue'));
        $t->addCell(1600, array('cellMerge' => 'continue'));
    }

    /**
     * 合并行
     * @param $t
     */
    private function rowMerge($t){
        $t->addCell(1600, array('rowMerge' => 'continue'));
    }

    /**
     * 合并单元格时候的 站位符
     * @param $t
     */
    private function _continue($t){
        $t->addCell(1600, array('cellMerge' => 'continue'));
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



        // 查询数据
        $obj = M("kecheng");
        $data = $obj->order("CCode")->select();
        $len = $obj->count();
        $obj1 = M("kecheng_table");

        for ($i = 0; $i < $len; $i++) {

            $ccode = $data[$i]['CCode'];
            $tableData = $obj1->where("CCode='$ccode'")->select();
            $len1 = $obj1->where("CCode='$ccode'")->count();


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
            $titleValue = "《".$data[$i]['CName']."》课程教学大纲";
            $section->addTitle($titleValue, 1);

            $styleTable = array(
                'borderColor'=>'000000',
                'borderSize'=>10,
                'cellMargin'=>50
            );

            $fontStyle = array('size'=>10 /*,'bold'=>true*/);
            $PHPWord->addTableStyle('myTable', $styleTable, $fontStyle);

            $styleTable = array('borderSize'=>6, 'borderColor'=>'000000', 'cellMargin'=>80);
            $styleCell = array('valign'=>'center', 'align'=>'center');
            $fontStyle = array('size'=>10 /*,'bold'=>true*/);
            $PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $fontStyle);
            $table = $section->addTable('myOwnTableStyle');

            $table->addRow(400);
            $table->addCell(1600, array('cellMerge' => 'restart', 'valign' => "center"))->addText('课程编号');
            self::_continue($table);
            $table->addCell(1600, array('cellMerge' => 'restart'))->addText($data[$i]["CCode"]);
            self::_continue($table);
            self::_continue($table);
            $table->addCell(1600, array('cellMerge' => 'restart'))->addText("课程名称");
            self::_continue($table);
            $table->addCell(1600, array('cellMerge' => 'restart'))->addText($data[$i]["CName"]);
            self::_continue($table);
            $table->addCell(1600, array('cellMerge' => 'continue'));


            self::colRow($table, '课程英文名称', $data[$i]["EName"]);

            $table->addRow();
            $table->addCell(1600)->addText('总学时数', $fontStyle, $styleCell);
            $table->addCell(1600)->addText($data[$i]["totalSNum"], $fontStyle, $styleCell);
            $table->addCell(1600, array('rowMerge' => 'restart', 'valign' => "center"))->addText('理论学时', $fontStyle, $styleCell);
            $table->addCell(1600, array('rowMerge' => 'restart', 'valign' => "center"))->addText($data[$i]["theroyNum"], $fontStyle, $styleCell);
            $table->addCell(1600, array('rowMerge' => 'restart', 'valign' => "center"))->addText('实验学时', $fontStyle, $styleCell);
            $table->addCell(1600, array('rowMerge' => 'restart', 'valign' => "center"))->addText($data[$i]["practiseNum"], $fontStyle, $styleCell);
            $table->addCell(1600, array('rowMerge' => 'restart', 'valign' => "center"))->addText('上机学时', $fontStyle, $styleCell);
            $table->addCell(1600, array('rowMerge' => 'restart', 'valign' => "center"))->addText($data[$i]["PCNum"], $fontStyle, $styleCell);
            $table->addCell(1600, array('rowMerge' => 'restart', 'valign' => "center"))->addText('本课程负责人', $fontStyle, $styleCell);
            $table->addCell(1600, array('rowMerge' => 'restart', 'valign' => "center"))->addText($data[$i]["CMaster"], $fontStyle, $styleCell);

            $table->addRow();
            $table->addCell(1600)->addText('学分', $fontStyle, $styleCell);
            $table->addCell(1600)->addText($data[$i]["TScore"], $fontStyle, $styleCell);
            self::rowMerge($table);
            self::rowMerge($table);
            self::rowMerge($table);
            self::rowMerge($table);
            self::rowMerge($table);
            self::rowMerge($table);
            self::rowMerge($table);
            self::rowMerge($table);

            $table->addRow();
            $table->addCell(1600, array('cellMerge' => 'restart', 'valign' => "center"))->addText('开课单位');
            $table->addCell(1600, array('cellMerge' => 'restart'))->addText($data[$i]["Thosted"]);
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'restart'))->addText("适用专业");
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'restart'))->addText($data[$i]["SMajor"]);
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'continue'));

            self::colRow($table, '考核方式', $data[$i]["Tassess"]);

            self::colRow($table, '先修课程', $data[$i]["TBefore"]);

            self::colRow($table, '课程类型', $data[$i]["CStyle"]);

            self::colRow($table, '选用教材', $data[$i]["TBook"]);

            self::colRow($table, '主要教学参考书', $data[$i]["TreferBook"]);

            self::colRow($table, '课程简介（300~500字）', $data[$i]["CIntroduction"]);

            self::colRow($table, '课程内容及教学目标', $data[$i]["TContent"]);

            self::colRow($table, '课程内容及教学目标', $data[$i]["TRelation"]);

            $table->addRow();
            $table->addCell(600, array('rowMerge' => 'restart', 'valign' => "center"))->addText('教学方法及学时分配');
            $table->addCell(1600, array('cellMerge'=>'restart','rowMerge' => 'restart', 'valign' => "center" ))->addText('教学内容', $fontStyle, $styleCell);
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'restart', 'valign' => "center"))->addText('学时', $fontStyle, $styleCell);
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('rowMerge' => 'restart', 'valign' => "center", 'cellMerge'=>'restart'))->addText('教学方法', $fontStyle, $styleCell);
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'continue'));

            $table->addRow();
            $table->addCell(600, array('rowMerge' => 'continue'));
            $table->addCell(600, array('rowMerge' => 'continue'));
            $table->addCell(600, array('rowMerge' => 'continue'));
            $table->addCell(600, array('rowMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'restart'))->addText("授课");
            $table->addCell(1600, array('cellMerge' => 'restart'))->addText("上机");
            $table->addCell(1600, array('cellMerge' => 'restart'))->addText("实验");
            $table->addCell(1600, array('rowMerge' => 'continue'));
            $table->addCell(1600, array('rowMerge' => 'continue'));
            $table->addCell(1600, array('rowMerge' => 'continue'));

            $length = count($tableData);
            for ($j = 0; $j < $length; $j++){


                $table->addRow();
                $table->addCell(600, array('rowMerge' => 'continue'));
                $table->addCell(600, array('cellMerge' => 'restart'))->addText($tableData[$j]["CContent"]);
                $table->addCell(600, array('cellMerge' => 'continue'));
                $table->addCell(600, array('cellMerge' => 'continue'));

                $table->addCell(600, array('rowMerge' => 'restart'))->addText($tableData[$j]["TNumTalk"]);
                $table->addCell(600, array('rowMerge' => 'restart'))->addText($tableData[$j]["TNumPC"]);
                $table->addCell(600, array('rowMerge' => 'restart'))->addText($tableData[$j]["TNumPractise"]);

                $table->addCell(600, array('cellMerge' => 'restart'))->addText($tableData[$j]["TMethods"]);
                $table->addCell(1600, array('cellMerge' => 'continue'));
                $table->addCell(1600, array('cellMerge' => 'continue'));

            }


//
//            $table->addRow();
//            $table->addCell(600, array('rowMerge' => 'restart'))->addText();
//            $table->addCell(600, array('rowMerge' => 'continue'));
//            $table->addCell(600, array('rowMerge' => 'continue'));
//            $table->addCell(600, array('rowMerge' => 'continue'));
//            $table->addCell(1600, array('cellMerge' => 'restart'))->addText("授课");
//            $table->addCell(1600, array('cellMerge' => 'restart'))->addText("上机");
//            $table->addCell(1600, array('cellMerge' => 'restart'))->addText("实验");
//            $table->addCell(600, array('rowMerge' => 'continue'));
//            $table->addCell(600, array('rowMerge' => 'continue'));
//            $table->addCell(600, array('rowMerge' => 'continue'));






            self::colRow($table, '课程的评价与持续改进机制', $data[$i]["TEvaluate"]);


            $section->addTextBreak(1); // 新起一个空白段落
        }

//        exit();

        $fileName = "课程教学大纲".date("YmdHis");
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
        $arr = array(0, 0, 0);
        $arr2 = 0;
        $flag = false;
        for ($i = 0; $i<count($arr); $i++) {
            if ($arr[$i] == 1){
                $flag = true;
                break;
            }
        }
        dump($flag || $arr2);

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
     * 单条确认
     * @param int $id
     * @param int $CCode
     * @param int $flag   0  表示点进去确认 的入口    1  表示进去检查后的确认保存按钮
     */
    public function confirm($ccode=0, $flag=0){
        $modelKecheng = M("kecheng");
        if ($flag == 0){
            $modelKechengTable = M('kecheng_table');
            $data = $modelKecheng->where("CCode = '$ccode'")->find();
            $temp = $data["TContent"];
            $t = preg_replace("/\r/", "<br>", $temp);
            $data["TContent"] = $t;
            $dataTable = $modelKechengTable->where("CCode = '$ccode'")->select();
            if($data == null && $dataTable == null){
                $this->error('非法操作。。。');
            } else {
                $this->assign('dataTable', $dataTable);
                $this->assign('data', $data);
                $this->assign('cnt', count($dataTable));
                $this->display();
            }
        } else if ($flag == 1) {
            $data["status"] = 1;
            $result = $modelKecheng->where("CCode = '$ccode'")->save($data);
            if ($result) {
                $this->success("确认完成", 'overlook');
            } else {
                $this->redirect("overlook");
            }
        } else {
            $this->error('非法操作');
        }
    }

    /**
     * 资源经济学的范例
     */
    public function reference(){
        $modelKeCheng = M("kecheng");
        $modelKeChengTable = M("Kecheng_table");
        $data = $modelKeCheng->where("CCode = 'B100100500'")->find();
        $temp = $data["TContent"];
        $t = preg_replace("/\r/", "<br>", $temp);
        $data["TContent"] = $t;
        $dataTable = $modelKeChengTable->where("CCode = 'B100100500'")->select();
        $this->assign('dataTable', $dataTable);
        $this->assign('data', $data);
        $this->assign('cnt', count($dataTable));
        $this->display();
    }

    /**
     * 填写表单时候的临时保存方法
     * ajax发送
     * ajax接收
     */
    public function saveTemp(){
        //dump($_POST);
        $model = M("kechengsave");
        $data["CCode"] = $_POST["CCode"];
        $data["CName"] = $_POST["CName"];
        $data['EName'] = $_POST["EName"];
        $data["totalSNum"] = $_POST["totalSNum"];
        $data["theroyNum"] = $_POST["theroyNum"];
        $data["practiseNum"] = $_POST["practiseNum"];
        $data["PCNum"] = $_POST["PCNum"];
        $data["CMaster"] = $_POST["CMaster"];
        $data["TScore"] = $_POST["TScore"];
        $data["Thosted"] = $_POST["Thosted"];
        $data["SMajor"] = $_POST["SMajor"];
        $data["Tassess"] = $_POST["Tassess"];
        $data["TBefore"] = $_POST["TBefore"];
        $data["CStyle"] = $_POST["CStyle"];
        $data["TBook"] = $_POST["TBook"];
        $data["TreferBook"] = $_POST["TreferBook"];
        $data["CIntroduction"] = $_POST["CIntroduction"];
        $data["TRelation"] = $_POST["TRelation"];
        $data["TContent"] = $_POST["TContent"];
        $data["TEvaluate"] = $_POST["TEvaluate"];
        $result = $model->add($data);
        if ($result) {
            $this->ajaxReturn('保存完成');
        } else {
            $this->ajaxReturn("保存失败");
        }
//        dump(111);
    }

    /**
     * 填写表单时候的数据恢复方法
     * ajax接收
     * ajax发送
     */
    public function reload(){
        $model = M("kechengsave");
        $ccode = $_POST["CCode"];
        $result = $model->where("CCode = '$ccode'")->order("id desc")->find();
        if ($result) {
            $this->ajaxReturn($result);
        } else {
            $this->ajaxReturn("您还没有保存过任何数据");
        }
    }

    /**
     * 按计划批次查看
     */
    public function shedual(){
        $model = new Model();
        if (IS_POST){
            $sqlCondition = " WHERE 1=1 ";
            $year = trim($_POST['year']);
            $SMajor = trim($_POST['SMajor']);
            $keywords = trim($_POST['keywords']);
//            $status = $_POST["status"];

            if ($year != "") {
                $sqlCondition .= " AND (z1.`计划批次` like '$year%') ";
            }

            if ($SMajor != "") {
                $sqlCondition .= " AND (z1.`专业名称` like '$SMajor%') ";
            }
            if ($keywords != "") {
                $sqlCondition .= " AND 
                    (
                    z1.`课程编号` like '%$keywords%' 
                    OR z1.`课程名称` like '%$keywords%' 
                    OR z1.`计划批次` like '%$keywords%' 
                    OR z1.`专业名称` like '%$keywords%'
                    )";
            }
            $sql = "
SELECT
	ku.*, ke.*
FROM
	(
		SELECT
			z1.课程编号,
			z1.计划批次,
			z1.课程名称,
			z1.专业名称
		FROM
			(
				SELECT
					c.id,
					c. STATUS,
					c.计划批次,
					c.专业名称,
					c.课程编号,
					c.课程名称,
					c.学期学分,
					c.学期学时,
					c.理论学时
				FROM
					neu_dagangkechengc c 
				UNION ALL
					SELECT
						b.id,
						b. STATUS,
						b.计划批次,
						b.专业名称,
						b.课程编号,
						b.课程名称,
						b.学期学分,
						b.学期学时,
						b.理论学时
					FROM
						neu_dagangkechengb b 
			) z1 
			".$sqlCondition."
	) ku
LEFT OUTER JOIN (
	SELECT
		k.CCode,
		k.CName,
		k.totalSNum,
		k.CMaster,
		k.SMajor
	FROM
		neu_kecheng k
) ke ON ku.课程编号 = ke.CCode
ORDER BY ku.`专业名称` desc , ke.CCode desc        
            ";
            $where['_string'] = $sqlCondition;
            $list = $model->query($sql);
            $this->assign('list', $list);
            $this->display();

        } else {
            $sql = "
SELECT
	ku.*, ke.*
FROM
	(
		SELECT
			z1.课程编号,
			z1.计划批次,
			z1.课程名称,
			z1.专业名称
		FROM
			(
				SELECT
					c.id,
					c. STATUS,
					c.计划批次,
					c.专业名称,
					c.课程编号,
					c.课程名称,
					c.学期学分,
					c.学期学时,
					c.理论学时
				FROM
					neu_dagangkechengc c 
				UNION ALL
					SELECT
						b.id,
						b. STATUS,
						b.计划批次,
						b.专业名称,
						b.课程编号,
						b.课程名称,
						b.学期学分,
						b.学期学时,
						b.理论学时
					FROM
						neu_dagangkechengb b 
			) z1		
	) ku
LEFT OUTER JOIN (
	SELECT
		k.CCode,
		k.CName,
		k.totalSNum,
		k.CMaster
	FROM
		neu_kecheng k
) ke ON ku.课程编号 = ke.CCode
ORDER BY ku.`课程编号` desc
            ";
            $list = $model->query($sql);
            $this->assign('list', $list);
            $this->display();
        }
    }



    /**
     * 简介数据展示
     */
    public function info(){
        if  (IS_POST) {
            $sqlCondition = " 1=1 ";
            $version = isset($_POST['version']) ? $_POST['version'] : null;
            $introduction = isset($_POST['introduction']) ? $_POST['introduction'] : null;
            $status = isset($_POST['status']) ? $_POST['status'] : null;
            $SMajor = trim($_POST['SMajor']);
            $keywords = trim($_POST['keywords']);

            if (isset($version)){
                $sqlCondition .= " AND (j.CCode like '$version%')";
            }
            if (isset($introduction)) {
                $sqlCondition .= " AND (j.introduction='$introduction') ";
            }
            if (isset($status)) {
                $sqlCondition .= " AND (j.status=$status) ";
            }
            if ($SMajor != "") {
                $sqlCondition .= " AND (j.SMajor='$SMajor') ";
            }
            if ($keywords != "") {
                $sqlCondition .= " AND (j.CCode like '%$keywords%' OR j.CName like '%$keywords%' OR j.SMajor like '%$keywords%' OR j.CMaster like '%$keywords%') ";
            }
            $model = new Model();
            $sql = "
            select j.* from
(	SELECT
		k.CCode,
		k.CName,
		k.EName,
		k.totalSNum,
		k.CMaster,
		k.Thosted,
		k.SMajor,
		ii.`status`,
		IF(ii.`EInfo`<>'', 1, 0) introduction
	FROM
		neu_kecheng k
	left OUTER JOIN (
		SELECT
			i.CCode,
			i.CName,
			i.EInfo,
			i.`status`
		FROM
			neu_kechenginfo i
	) ii
	 ON k.CCode = ii.CCode      
) j where 
".$sqlCondition;


            if ($_POST["style"] == '检索') {
                $list1 = $model->query($sql);
                $this->assign('list', $list1);
                $this->display();
            } else if ($_POST["style"] == "下载数据") {

                $where = " 1=1 ";
                $version = isset($_POST['version']) ? $_POST['version'] : null;
                $introduction = isset($_POST['introduction']) ? $_POST['introduction'] : null;
                $status = isset($_POST['status']) ? $_POST['status'] : null;
                $SMajor = trim($_POST['SMajor']);
                $keywords = trim($_POST['keywords']);

                if (isset($version)){
                    $where .= " AND (CCode like '$version%')";
                }
                if (isset($introduction)) {
                    $where .= " AND (introduction='$introduction') ";
                }
                if (isset($status)) {
                    $where .= " AND (status=$status) ";
                }
                if ($SMajor != "") {
                    $where .= " AND (SMajor='$SMajor') ";
                }
                if ($keywords != "") {
                    $where .= " AND (CCode like '%$keywords%' OR CName like '%$keywords%' OR SMajor like '%$keywords%' OR CMaster like '%$keywords%') ";
                }

//                dump($list1);
//                dump("下载数据");
//                dump($where);

                // 导入PHPWord库
                vendor("PHPWord");

                $PHPWord = new \PHPWord();
                $PHPWordHelper = new \PHPWord_Style_Font();
                $PHPWordPara = new \PHPWord_Style_Paragraph();
                $p = new \PHPWord_Style();


                //设置全局字体名称为 宋体

                $PHPWord->setDefaultFontName('宋体');

                // 查询数据
                $obj = M("kecheng");
                $model = M("kechenginfo");
                $data = $obj->field('CCode, CName, EName, totalSNum, CIntroduction')->where($where)->order("CCode")->select();
                $len1 = $obj->where($where)->count();
//                dump($len1);
//                dump($data1);

                for ($i = 0; $i < $len1; $i++) {
                    $ccode = $data[$i]["CCode"];
                    $EInfo = $model->field("EInfo")->where("CCode = '$ccode'")->find();
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
                    $titleValue = $data[$i]['CCode'].$data[$i]['CName'];
                    $section->addTitle($titleValue, 1);

                    $depth2 = 2;
                    $fontStyle2 = array('size'=>16, 'bold'=>'true', 'fontFamily'=>'Arial');
                    $paragraphStyle2 = array(
                        'align'=>'center',      // 对其方式
                        'spaceBefore'=>100,     // 断后间距
                        'spaceAfter'=>0,        // 段前间距
                        'spacing'=>200,         // 行高
                    );
                    $PHPWord->addTitleStyle($depth2, $fontStyle2, $paragraphStyle2);
                    $section->addTitle("东北大学本科生课程简介", 2);

                    $depth3 = 3;
                    $fontStyle3 = array('size'=>13, 'bold'=>'true', 'fontFamily'=>'Arial');
                    $paragraphStyle3 = array(
                        'align'=>'center',      // 对其方式
                        'spaceBefore'=>100,     // 断后间距
                        'spaceAfter'=>0,        // 段前间距
                        'spacing'=>200,         // 行高
                    );

                    $PHPWord->addTitleStyle($depth3, $fontStyle3, $paragraphStyle3);
                    $section->addTitle("Northeastern university，Introduction to the undergraduate courses", 3);

                    $styleTable = array(
                        'borderColor'=>'000000',
                        'borderSize'=>10,
                        'cellMargin'=>50
                    );

                    $fontStyle = array('size'=>10);
                    $PHPWord->addTableStyle('myTable', $styleTable, $fontStyle);

                    $styleTable = array('borderSize'=>6, 'borderColor'=>'000000', 'cellMargin'=>80);
                    $styleCell = array('valign'=>'center', 'align'=>'center');
                    $fontStyle = array('size'=>10);
                    $PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $fontStyle);
                    $table = $section->addTable('myOwnTableStyle');

                    $table->addRow(1200);
                    $table->addCell(3600, array('cellMerge' => 'restart', 'valign' => "center"))->addText("课程名称 \nCourse Name :\n".$data[$i]['CName']);
                    self::_continue($table);
                    $table->addCell(3600, array('cellMerge' => 'restart'))->addText("课程编号\nCourse Number ：\n".$data[$i]["CCode"]);
                    self::_continue($table);
                    $table->addCell(3600, array('cellMerge' => 'restart'))->addText("课程总学分 \nTotal credit course  ：\n ".$data[$i]["totalSNum"]);
                    self::_continue($table);

                    $table->addRow(3500);
                    $table->addCell(3600, array('cellMerge'=>'restart'))->addText("课程简介（中文）： 300-500字：\n".$data[$i]['CIntroduction']);
                    $table->addCell(1600, array('cellMerge' => 'continue'));
                    $table->addCell(1600, array('cellMerge' => 'continue'));
                    $table->addCell(1600, array('cellMerge' => 'continue'));
                    $table->addCell(1600, array('cellMerge' => 'continue'));
                    $table->addCell(1600, array('cellMerge' => 'continue'));

                    $table->addRow(5000);
                    $table->addCell(3600, array('cellMerge'=>'restart'))->addText("undergraduate courses（In English）：\n".$EInfo["EInfo"]);
                    $table->addCell(1600, array('cellMerge' => 'continue'));
                    $table->addCell(1600, array('cellMerge' => 'continue'));
                    $table->addCell(1600, array('cellMerge' => 'continue'));
                    $table->addCell(1600, array('cellMerge' => 'continue'));
                    $table->addCell(1600, array('cellMerge' => 'continue'));

                }
                $fileName = "课程简介".date("YmdHis");
                header("Content-type: application/vnd.ms-word");
                header("Content-Disposition:attachment;filename=".$fileName.".docx");
                header('Cache-Control: max-age=0');
                $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
                $objWriter->save('php://output');

            }

        } else {
            $model = new Model();
            $sql = "
SELECT
	k.CCode,
	k.CName,
	k.EName,
	k.totalSNum,
	k.CMaster,
	k.Thosted,
	k.SMajor,
	ii.`status`,
	IF(ii.`EInfo`<>'', ii.`EInfo`, 0) introduction
	FROM
	neu_kecheng k
left OUTER JOIN (
	SELECT
		i.CCode,
		i.CName,
		i.EInfo,
		i.`status`
	FROM
		neu_kechenginfo i
) ii
 ON k.CCode = ii.CCode         
            ";
            $list = $model->query($sql);
            $this->assign('list', $list);
            $this->display();
        }


    }

    /*public function info(){
        if  (IS_POST) {
            $sqlCondition = " 1=1 ";
            $version = isset($_POST['version']) ? $_POST['version'] : null;
            $introduction = isset($_POST['introduction']) ? $_POST['introduction'] : null;
            $status = isset($_POST['status']) ? $_POST['status'] : null;
            $SMajor = trim($_POST['SMajor']);
            $keywords = trim($_POST['keywords']);

            if (isset($version)){
                $sqlCondition .= " AND (j.CCode like '$version%')";
            }
            if (isset($introduction)) {
                $sqlCondition .= " AND (j.introduction='$introduction') ";
            }
            if (isset($status)) {
                $sqlCondition .= " AND (j.status=$status) ";
            }
            if ($SMajor != "") {
                $sqlCondition .= " AND (j.SMajor='$SMajor') ";
            }
            if ($keywords != "") {
                $sqlCondition .= " AND (j.CCode like '%$keywords%' OR j.CName like '%$keywords%' OR j.SMajor like '%$keywords%' OR j.CMaster like '%$keywords%') ";
            }
            $model = new Model();
            $sql = "
            select j.* from
(	SELECT
		k.CCode,
		k.CName,
		k.EName,
		k.totalSNum,
		k.CMaster,
		k.Thosted,
		k.SMajor,
		ii.`status`,
		IF(ii.`EInfo`<>'', 1, 0) introduction
	FROM
		neu_kecheng k
	left OUTER JOIN (
		SELECT
			i.CCode,
			i.CName,
			i.EInfo,
			i.`status`
		FROM
			neu_kechenginfo i
	) ii
	 ON k.CCode = ii.CCode      
) j where 
".$sqlCondition;

            $list1 = $model->query($sql);
            $this->assign('list', $list1);
        } else {
            $model = new Model();
            $sql = "
SELECT
	k.CCode,
	k.CName,
	k.EName,
	k.totalSNum,
	k.CMaster,
	k.Thosted,
	k.SMajor,
	ii.`status`,
	IF(ii.`EInfo`<>'', ii.`EInfo`, 0) introduction
	FROM
	neu_kecheng k
left OUTER JOIN (
	SELECT
		i.CCode,
		i.CName,
		i.EInfo,
		i.`status`
	FROM
		neu_kechenginfo i
) ii
 ON k.CCode = ii.CCode         
            ";
            $list = $model->query($sql);
            $this->assign('list', $list);
        }
        $this->display();

    }*/

        /**
     * 下载课程简介
     * @param int $v
     */
    public function downloadinfo($v=0){
        $version = "";
        if ($v == 'b') {
            $version = 'B';
        } else if ($v == 'c') {
            $version = "C";
        } else {
            $this->error("非法访问");
        }

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

        // 查询数据
        $obj = M("kecheng");
        $model = M("kechenginfo");
        $data = $obj->field('CCode, CName, EName, totalSNum, CIntroduction')->where("CCode like '$version%'")->order("CCode")->select();
        $len = $obj->where("CCode like '$version%'")->count();
        for ($i = 0; $i < $len; $i++) {
            $ccode = $data[$i]["CCode"];
            $EInfo = $model->field("EInfo")->where("CCode = '$ccode'")->find();
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
            $titleValue = $data[$i]['CCode'].$data[$i]['CName'];
            $section->addTitle($titleValue, 1);

            $depth2 = 2;
            $fontStyle2 = array('size'=>16, 'bold'=>'true', 'fontFamily'=>'Arial');
            $paragraphStyle2 = array(
                'align'=>'center',      // 对其方式
                'spaceBefore'=>100,     // 断后间距
                'spaceAfter'=>0,        // 段前间距
                'spacing'=>200,         // 行高
            );
            $PHPWord->addTitleStyle($depth2, $fontStyle2, $paragraphStyle2);
            $section->addTitle("东北大学本科生课程简介", 2);

            $depth3 = 3;
            $fontStyle3 = array('size'=>13, 'bold'=>'true', 'fontFamily'=>'Arial');
            $paragraphStyle3 = array(
                'align'=>'center',      // 对其方式
                'spaceBefore'=>100,     // 断后间距
                'spaceAfter'=>0,        // 段前间距
                'spacing'=>200,         // 行高
            );

            $PHPWord->addTitleStyle($depth3, $fontStyle3, $paragraphStyle3);
            $section->addTitle("Northeastern university，Introduction to the undergraduate courses", 3);

            $styleTable = array(
                'borderColor'=>'000000',
                'borderSize'=>10,
                'cellMargin'=>50
            );

            $fontStyle = array('size'=>10 /*,'bold'=>true*/);
            $PHPWord->addTableStyle('myTable', $styleTable, $fontStyle);

            $styleTable = array('borderSize'=>6, 'borderColor'=>'000000', 'cellMargin'=>80);
            $styleCell = array('valign'=>'center', 'align'=>'center');
            $fontStyle = array('size'=>10 /*,'bold'=>true*/);
            $PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $fontStyle);
            $table = $section->addTable('myOwnTableStyle');

            $table->addRow(1200);
            $table->addCell(3600, array('cellMerge' => 'restart', 'valign' => "center"))->addText("课程名称 \nCourse Name :\n".$data[$i]['CName']);
            self::_continue($table);
            $table->addCell(3600, array('cellMerge' => 'restart'))->addText("课程编号\nCourse Number ：\n".$data[$i]["CCode"]);
            self::_continue($table);
            $table->addCell(3600, array('cellMerge' => 'restart'))->addText("课程总学分 \nTotal credit course  ：\n ".$data[$i]["totalSNum"]);
            self::_continue($table);

            $table->addRow(3500);
            $table->addCell(3600, array('cellMerge'=>'restart'))->addText("课程简介（中文）： 300-500字：\n".$data[$i]['CIntroduction']);
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'continue'));

            $table->addRow(5000);
            $table->addCell(3600, array('cellMerge'=>'restart'))->addText("undergraduate courses（In English）：\n".$EInfo["EInfo"]);
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'continue'));
            $table->addCell(1600, array('cellMerge' => 'continue'));

        }
        $fileName = "课程简介".date("YmdHis");
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition:attachment;filename=".$fileName.".docx");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('php://output');


    }
	

    /**
     * 简介展示
     * @param $ccode
     */
    public function introduction($ccode){
        $model = new Model();
        $sql = "
select k.EName, k.CName, k.CCode, k.totalSNum, k.CIntroduction, i.EInfo
from 
neu_kecheng k, neu_kechenginfo i
where k.CCode = '$ccode' and i.CCode = '$ccode' 
        ";
        $data = $model->query($sql);
        $this->assign('data', $data[0]);
        $this->display();
    }

    /**
     * 保存操作
     */
    public function intrsave(){
        $model = M("kechenginfo");
        $ccode = $_POST['CCode'];
        $data['EInfo'] = $_POST['EInfo'];
        $data['status'] = 1;
        $model->startTrans();

        $result = $model->where("CCode = '$ccode'")->save($data);

        if ($result) {
            $model->commit();
//            dump("成功");
            $this->success("恭喜您， 编辑成功", "infoConfirm?ccode=$ccode");
        } else {
            $model->rollback();
//            dump('error');
            $this->error("编辑失败");
        }
    }

    public function infoConfirm($ccode) {
        $model = new Model();
        $sql = "
select k.EName, k.CName, k.CCode, k.totalSNum, k.CIntroduction, i.EInfo
from 
neu_kecheng k, neu_kechenginfo i
where k.CCode = '$ccode' and i.CCode = '$ccode' 
        ";
        $data = $model->query($sql);
//        dump($data);
        $this->assign('data', $data[0]);
        $this->display();
    }

    public function intrSubmit($ccode) {
        $model = M("kechenginfo");
        $data['status'] = 2;
        $model->startTrans();
        $result = $model->where("CCode = '$ccode'")->save($data);
        if ($result) {
            $model->commit();
            $this->success('提交成功', 'info');
        } else {
            $model->rollback();
            $this->error("提交失败");
        }
    }



}