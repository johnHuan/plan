<?php
/**
 * Created by PhpStorm.
 * User: 张桓
 * develope Administrator
 * Date: 2016/11/22
 * Time: 18:43
 * john_3 web俱乐部
 * supporter: yun
 * author: john
 * ============================================================================
 * 版权所有 2016-2026 john_3网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.John_3.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 *
 */
  namespace home\Controller;
  use Home\Common\FilterController;
  use Tools\PPage;

  class TaskController extends FilterController
  {


      //展示教学任务书
      public function showTaskInfo($v = 0)
      {
          $this->assign('version', $v);
          session("version", $v);
          $obj = M("jiaoxuerenwu");
          if (IS_POST) {
              $sqlCondition = " 学期=".$v;
              $status = isset($_POST["status"]) ? $_POST["status"] : null;
              $object = isset($_POST["上课对象"]) ? $_POST["上课对象"] : null;
              $keywords = trim($_POST['keywords']);
              if (isset($status)) {
                  $sqlCondition .= " AND (status = $status) ";
              }
              if ($object != "") {
                  $sqlCondition .= " AND (上课对象 like '%$object%') ";
              }
              if ($keywords != "") {
                  $sqlCondition .= " AND (课程名称 like '%$keywords%' OR 课程编号 like '%$keywords%' OR 任课教师 like '%$keywords%') ";
              }
              $where['_string'] = $sqlCondition;
              $data = $obj->field("status,任务号,课程编号,课程名称,任课教师,学时分配,助课,外聘,双语,选课低于10人不开课,学期学时,理论学时,周学时,开课周,实验学时,实验周,上课对象,学生数,试验场所名称,上课时间,上课地点,实验任课教师,上机学时,上机周,学分,课程类型,备注,课群,参与选课,考核方式,开课模式,合班数,参与排课,总学时,不生成成绩名单,指定节次")->where($where)
                  ->order("选课低于10人不开课 ASC, 课程编号 DESC, 实验学时 ASC")
                  ->select();

              $len = count($data);
              $modelTeacher = M("teacher");
              for ($i = 0; $i < $len; ++$i) {
                  $arrayTeacher = mb_split(";", $data[$i]["任课教师"]);
                  $arrayTage[$i] = "";
                  $arrayTLevel[$i] = "";
                  foreach ($arrayTeacher as $k => $v) {
                      $ageAndLevel = $modelTeacher->field("t_birthYear, t_level")->where("t_name = '$v'")->find();
                      $arrayTage[$i] .= date("Y") - $ageAndLevel["t_birthYear"] . ";";
                      $arrayTLevel[$i] .= $ageAndLevel["t_level"] . ";";
                  }
                  $arrayTage[$i] = rtrim($arrayTage[$i], ';');
                  $arrayTLevel[$i] = rtrim($arrayTLevel[$i], ';');
                  $data[$i]["年龄"] = $arrayTage[$i];
                  $data[$i]["职称"] = $arrayTLevel[$i];
              }

              $this->assign('data', $data);
              $this->display();
          } else {
              $data = $obj->field("status,任务号,课程编号,课程名称,任课教师,学时分配,助课,外聘,双语,选课低于10人不开课,学期学时,理论学时,周学时,开课周,实验学时,实验周,上课对象,学生数,试验场所名称,上课时间,上课地点,实验任课教师,上机学时,上机周,学分,课程类型,备注,课群,参与选课,考核方式,开课模式,合班数,参与排课,总学时,不生成成绩名单,指定节次")
                  ->where("学期=$v")
                  ->order("选课低于10人不开课 ASC, 课程编号 DESC, 实验学时 ASC")
                  ->select();

              $len = count($data);
              $modelTeacher = M("teacher");
              for ($i = 0; $i < $len; ++$i) {
                  $arrayTeacher = mb_split(";", $data[$i]["任课教师"]);
                  $arrayTage[$i] = "";
                  $arrayTLevel[$i] = "";
                  foreach ($arrayTeacher as $k => $v) {
                      $ageAndLevel = $modelTeacher->field("t_birthYear, t_level")->where("t_name = '$v'")->find();

                      $arrayTage[$i] .= date("Y") - $ageAndLevel["t_birthYear"] . ";";
                      $arrayTLevel[$i] .= $ageAndLevel["t_level"] . ";";
                  }
                  $arrayTage[$i] = rtrim($arrayTage[$i], ';');
                  $arrayTLevel[$i] = rtrim($arrayTLevel[$i], ';');
                  $data[$i]["年龄"] = $arrayTage[$i];
                  $data[$i]["职称"] = $arrayTLevel[$i];
              }

              $this->assign('data', $data);
              $this->display();
          }
      }

      public function edit($num)
      {
          $model = M("jiaoxuerenwu");
          $data = $model->where("任务号 = $num")->find();
          $this->assign($data);
          $this->assign("version", session("version"));
          $this->display();

      }

      public function editDo()
      {
          $model = M("jiaoxuerenwu");
          $num = $_POST["任务号"];

          $data["课程编号"] = $_POST["课程编号"];
          $data["课程名称"] = $_POST["课程名称"];
          $data["任课教师"] = $_POST["任课教师"];
          $data["学时分配"] = $_POST["学时分配"];
          $data["助课"] = $_POST["助课"];
          $data["外聘"] = $_POST["外聘"];
          $data["双语"] = $_POST["双语"];
          $data["选课低于10人不开课"] = $_POST["选课低于10人不开课"];
          $data["学期学时"] = $_POST["学期学时"];
          $data["理论学时"] = $_POST["理论学时"];
          $data["周学时"] = $_POST["周学时"];
          $data["开课周"] = $_POST["开课周"];
          $data["实验学时"] = $_POST["实验学时"];
          $data["实验周"] = $_POST["实验周"];
          $data["上课对象"] = $_POST["上课对象"];
          $data["学生数"] = $_POST["学生数"];
          $data["试验场所名称"] = $_POST["试验场所名称"];
          $data["上课时间"] = $_POST["上课时间"];
          $data["上课地点"] = $_POST["上课地点"];
          $data["实验任课教师"] = $_POST["实验任课教师"];
          $data["上机学时"] = $_POST["上机学时"];
          $data["上机周"] = $_POST["上机周"];
          $data["学分"] = $_POST["学分"];
          $data["上机周"] = $_POST["上机周"];
          $data["课程类型"] = $_POST["课程类型"];
          $data["备注"] = $_POST["备注"];
          $data["课群"] = $_POST["课群"];
          $data["参与选课"] = $_POST["参与选课"];
          $data["开课模式"] = $_POST["开课模式"];
          $data["合班数"] = $_POST["合班数"];
          $data["参与排课"] = $_POST["参与排课"];
          $data["总学时"] = $_POST["总学时"];
          $data["不生成成绩名单"] = $_POST["不生成成绩名单"];
          $data["指定节次"] = $_POST["指定节次"];
          $data["status"] = 1;
          $result = $model->where("任务号 = $num")->data($data)->save();
          if ($result) {
              $year = session("version");
              $this->success("恭喜您！编辑成功完成!", "showTaskInfo?v=$year");
          } else {


              $this->error("很遗憾， 提交失败， 可能没有任何操作，请修改后重试");
          }

      }


      //打印预览
      public function printLook()
      {
          $obj = M("Planes");
          $list = $obj->select();
          $this->assign('list', $list);
          $this->display();
      }

      //完善信息
      public function Writes()
      {
          $rid = $_GET['rid'];
          if (IS_POST) {
              $obj = M("Planes");
              $rseult = $obj->where("rid = '$rid'")->save($_POST);
              if ($rseult) {
                  $this->success("提交成功！请稍后", "showTaskInfo");
              } else {
                  $this->error("提交失败！请重试");
              }
          } else {
              $obj = D("Planes");
              $list = $obj->where("rid = '$rid'")->find();

              $this->assign('list', $list);
              $this->display();
          }
      }

      //ajax自动获取教师职称年龄
      public function get_tage()
      {
          $tv_name = $_POST['tv_name'];
          $arr = explode(' ', $tv_name);
          $tv_name = $arr[count($arr) - 2];
          $obj = M("Teacher");
          $condition["t_name"] = array('like', '%' . $tv_name);
          $condition['_logic'] = 'OR';
          $teac = $obj->where("t_name like '$tv_name'")->find();
          $this->ajaxReturn($teac);
      }

      /**
       * @param $expTitle
       * @param $expCellName
       * @param $expTableData
       * 写入数据库里
       */
      public function exportExcel($expTitle, $expCellName, $expTableData)
      {
          $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
          $fileName = $_SESSION['account'] . date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
          $cellNum = count($expCellName);
          $dataNum = count($expTableData);
          vendor("PHPExcel");
          $objPHPExcel = new \PHPExcel();
//          $cellName = array('A','B','C','D','E','F','G','H');
          $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO');

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

      //下载数据
      public function downloadData()
      {
          set_time_limit(0);
          $xlsName = "task";
          $xlsCell = array(
              array('r_num', '序号'),
              array('task_id', '任务号'),
              array('course_num', '课程编号'),
              array('course_name', '课程名称'),
              array('course_peroid', '0'),
              array('course_score', '0'),
              array('week_time', '0'),
              array('start_week', '0'),
              array('deadline', '0'),
              array('lilun_time', '0'),
              array('r_num', '0'),
              array('practise_timie', '0'),
              array('pc_time', '0'),
              array('outside', '0'),
              array('course_group', '0'),
              array('course_style', '0'),
              array('exam_style', '0'),
              array('majors', '0'),
              array('years', '0'),
              array('have_class', '0'),
              array('sum_stu', '0'),
              array('study_room', '0'),
              array('merge_class', '0'),
              array('tv_name', '0'),
              array('tv_level', '0'),
              array('tv_age', '0'),
              array('ts_name', '0'),
              array('ts_level', '0'),
              array('ts_age', '0'),
              array('is_twai', '0'),
              array('t_assist', '0'),
              array('is_biling', '0'),
              array('classroom_style', '0'),
              array('practise_week', '0'),
              array('practise_wtime', '0'),
              array('practise_group', '0'),
              array('practise_addr', '0'),
              array('have_mweek', '0'),
              array('memo', '0')
          );
          $xlsModel = M('Planes');

          $xlsData = $xlsModel->Field('r_num,task_id,course_num,course_name,course_peroid,course_score,week_time,start_week,deadline,lilun_time,practise_timie,pc_time,outside,course_group,course_style,exam_style,majors,years,have_class,sum_stu,study_room,merge_class,tv_name,tv_level,tv_age,ts_name,ts_level,ts_age,is_twai,t_assist,is_biling,classroom_style,practise_week,practise_wtime,practise_group,practise_addr,have_mweek,memo')->select();
//          $xlsData  = $xlsModel->Field('r_num,task_id,course_num,course_name,course_peroid,course_score,week_time,start_week,deadline,lilun_time,practise_timie,pc_time')->select();

          $this->exportExcel($xlsName, $xlsCell, $xlsData);
      }

      /**
       * 新版下载数据
       */
      public function excel()
      {
          set_time_limit(0);
          $xlsName = "task";
          $xlsCell = array(
              array('序', '序'),
              array('任务号', '任务号'),
              array('课程编号', '课程编号'),
              array('课程名称', '课程名称'),
              array('任课教师', '任课教师'),
              array('职称', '职称'),
              array('年龄', '年龄'),
              array('助课', '助课'),
              array('外聘', '外聘'),
              array('双语', '双语'),
              array('学期学时', '学期学时'),
              array('理论学时', '理论学时'),
              array('周学时', '周学时'),
              array('开课周', '开课周'),
              array('实验学时', '实验学时'),
              array('实验周', '实验周'),
              array('上课对象', '上课对象'),
              array('学生数', '学生数'),
              array('试验场所名称', '试验场所名称'),
              array('上课时间', '上课时间'),
              array('上课地点', '上课地点'),
              array('实验任课教师', '实验任课教师'),
              array('上机学时', '上机学时'),
              array('上几周', '上几周'),
              array('学分', '学分'),
              array('课程类型', '课程类型'),
              array('备注', '备注'),
              array('课群', '课群'),
              array('参与选课', '参与选课'),
              array('考核方式', '考核方式'),
              array('开课模式', '开课模式'),
              array('合班数', '合班数'),
              array('参与排课', '参与排课'),
              array('总学时', '总学时'),
              array('不生成成绩单', '不生成成绩单'),
              array('指定节次', '指定节次'),
          );

          $model = new Model("jiaoxuerenwu");
          $data = $model->field("status,任务号,课程编号,课程名称,任课教师,助课,外聘,双语,选课低于10人不开课,学期学时,理论学时,周学时,开课周,实验学时,实验周,上课对象,学生数,试验场所名称,上课时间,上课地点,实验任课教师,上机学时,上机周,学分,课程类型,备注,课群,参与选课,考核方式,开课模式,合班数,参与排课,总学时,不生成成绩名单,指定节次,序")
              ->order("选课低于10人不开课 ASC, 课程编号 DESC, 实验学时 ASC")
              ->select();

          $len = count($data);
          $modelTeacher = M("teacher");
          for ($i = 0; $i < $len; ++$i) {
              $arrayTeacher = mb_split(";", $data[$i]["任课教师"]);
              $arrayTage[$i] = "";
              $arrayTLevel[$i] = "";
              foreach ($arrayTeacher as $k => $v) {
                  $ageAndLevel = $modelTeacher->field("t_birthYear, t_level")->where("t_name = '$v'")->find();

                  $arrayTage[$i] .= date("Y") - $ageAndLevel["t_birthYear"] . ";";
                  $arrayTLevel[$i] .= $ageAndLevel["t_level"] . ";";
              }
              $arrayTage[$i] = rtrim($arrayTage[$i], ';');
              $arrayTLevel[$i] = rtrim($arrayTLevel[$i], ';');
              $data[$i]["年龄"] = $arrayTage[$i];
              $data[$i]["职称"] = $arrayTLevel[$i];
          }

          $this->exportExcel($xlsName, $xlsCell, $data);
      }


  }