<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Author: 张桓
 * QQ: 248404941
 * Email: yz30.com@aliyun.com
 * Date: 2017/5/12
 * Time: 15:48
 */
namespace home\Controller;

class DemoController extends EmptyController {

    public function demo1(){
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
        $xlsData = $xlsModel->field("CName,CCode,CConductor,SMajor,CMaster")->where("CCode like 'C%' AND status=0")->select();
        $len = count($xlsData);
        dump($xlsData);
    }

    public function demo(){
        $model = M("fteachers");
        $modelDb = M("teacher");
        $result = $model->select();
        $len = $model->count();
        for ($i = 0; $i < $len; $i++){
            $temp[$i] = preg_split('/\;|\；/',$result[$i]["任课教师"]);
            $age[$i] = [];
            $level[$i] = [];
            $len2 = count($temp[$i]);
            for ($j = 0; $j < $len2; $j++) {
                $t_name = $temp[$i][$j];
                $rowData = $modelDb->where("t_name = '$t_name'")->find();
                array_push($age[$i], (2017-($rowData["t_birthYear"])));
                array_push($level[$i], $rowData["t_level"]);
            }
            $nianling[$i]['年龄'] = (implode(';', $age[$i]));
            $nianling[$i]['职称'] = implode(';', $level[$i]);

        }

//        dump($nianling);
//        exit();
//        dump($zhicheng);
        $xlsName = "shiyan";
        $xlsCell  = array(
            array('年龄','年龄'),
            array('职称','职称'),
//            array('职称','职称'),
        );
        $this->exportExce_res($xlsName,$xlsCell,$nianling);


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


    public function index () {
        header("text/html;charset=gbk");

        vendor("PHPWord");

        $PHPWord = new \PHPWord();
        $section = $PHPWord->createSection();

        /*
         $section = $phpWord->createSection();
         $section->addText('hello world');
         $section->addText('Hello world! I am formatted.', array('name'=>'Tahoma', 'size'=>16, 'bold'=>true));

         $phpWord->addFontStyle('myOwnStyle', array('name'=>'Verdana', 'size'=>14, 'color'=>'1B2232'));

         $section->addText('Hello world! I am formatted by a user defined style', 'myOwnStyle');

         // You can also putthe appended element to local object an call functions like this:
 //        $myTextElement = $section->addText('Hello World!');
 //                $myTextElement->setBold();
 //        $myTextElement->setName('Verdana');
 //        $myTextElement->setSize(22);

         // At least write the document to webspace:
         $objWriter = \PHPWord_IOFactory::createWriter($phpWord, 'Word2007');
         $objWriter->save('helloWorld.docx');



        $styleTable = array('borderColor'=>'006699',
            'borderSize'=>6,
            'cellMargin'=>50);
        $styleFirstRow = array('bgColor'=>'66BBFF');
        $PHPWord->addTableStyle('myTable', $styleTable, $styleFirstRow);

        $table = $section->addTable('myTable');
        $table->addRow(400);
        $table->addCell(2000)->addText('Cell 1');
        $table->addCell(2000)->addText('Cell 2');
        $table->addCell(2000)->addText('Cell 3');
        $table->addRow(1000);
        $table->addCell(2000)->addText('Cell 4');
        $table->addCell(2000)->addText('Cell 5');
        $table->addCell(2000)->addText('Cell 6');


        $PHPWord->addFontStyle('rStyle', array('bold'=>false, 'italic'=>false,
            'size'=>16));
        $PHPWord->addParagraphStyle('pStyle', array('align'=>'center',
            'spaceAfter'=>100));
        $c = "john";
        $section->addText($c, 'rStyle', 'pStyle');

        $styleTable = array('borderSize'=>6, 'borderColor'=>'006699',
            'cellMargin'=>80);
        $styleFirstRow = array('borderBottomSize'=>18,
            'borderBottomColor'=>'0000FF', 'bgColor'=>'66BBFF');

        // Define cell style arrays
        $styleCell = array('valign'=>'center');
        // Define font style for first row
        $fontStyle = array('bold'=>true, 'align'=>'center');
        //设置标题
        $PHPWord->addFontStyle('rStyle', array('bold'=>true, 'italic'=>true,
            'size'=>16));
        $PHPWord->addParagraphStyle('pStyle', array('align'=>'center',
            'spaceAfter'=>100));

        // Add table style
        $PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);

        // Add table
        $table = $section->addTable('myOwnTableStyle');

        // Add row设置行高
        $table->addRow(500);

        $table->addCell(2300, $styleCell)->addText('aa', $fontStyle);
        $table->addCell(2300, $styleCell)->addText('bb', $fontStyle);
        $table->addCell(2300, $styleCell)->addText('cc', $fontStyle);
        $table->addCell(2300, $styleCell)->addText('dd', $fontStyle);

        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save('helloWorld.docx');


        // Save File
//        $fileName = "word报表".date("YmdHis");
//        header("Content-type: application/vnd.ms-word");
//        header("Content-Disposition:attachment;filename=".$fileName.".docx");
//        header('Cache-Control: max-age=0');
//        $objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
//        $objWriter->save('php://output');

            */

//        $document = $PHPWord->loadTemplate('tableTpl.docx');
//        $tpl->setValue('{Value1}','Sun');
//        $tpl->setValue('{Value1}','SNK');
//        $tpl->setValue('Value3','MArs');
//        $tpl->setValue('Value4','Earth');
//        $tpl->setValue('Value5','Uranus');
//        $tpl->setValue('Value6','Pluto');
//        $tpl->setValue('Value7','Neptun');
//        $tpl->setValue('Value8','Mercury');
//        $tpl->setValue('Value9','Jupiter');

        //保存文件

//        $tpl->save('FromTemplate.docx');
//
        $document = $PHPWord->loadTemplate('source.docx');


        // simple parsing
        $document->setValue('{var1}', '张桓');
        $document->setValue('{var2}', '常雨晶');
        $document->setValue('{var3}', '陈凯');
//        $document->setValue('{var4}', 'yu');
//        $document->setValue('{var5}', 'jing', 1);

        // prepare data for tables
        $data1 = array(
            'num' => array(1,2,3),
            'color' => array('red', 'blue', 'green'),
            'code' => array('ff0000','0000ff','00ff00')
        );
        $data2 = array(
            'val1' => array(1,2,3),
            'val2' => array('red', 'blue', 'green'),
            'val3' => array('a','b','c')
        );
        $data3 = array(
            'day' => array('Mon','Tue','Wed','Thu','Fri'),
            'dt' => array(12,14,13,11,10),
            'nt' => array(0,2,1,2,-1),
            'dw' => array('SSE at 3 mph', 'SE at 2 mph', 'S at 3 mph', 'S at 1 mph', 'Calm'),
            'nw' => array('SSE at 1 mph', 'SE at 1 mph', 'S at 1 mph', 'Calm', 'Calm')
        );
        $data4 = array(
            'val1' => array('blue 1', 'blue 2', 'blue 3'),
            'val2' => array('green 1', 'green 2', 'green 3'),
            'val3' => array('red 1', 'red 2', 'red 3')
        );

        // clone rows
        $document->cloneRow('TBL1', $data1);
        $document->cloneRow('TBL2', $data2);
        $document->cloneRow('DATA3', $data3);
        $document->cloneRow('T4', $data4);
        $document->cloneRow('DinamicTable', $data4);

        // save file
        $tmp_file = 'result.docx';
        $document->save($tmp_file);

        print date("Y-m-d H:i:s") . " <br>";
        print "source.docx &rarr; result.docx <br>";
        print "complete.";

    }

}