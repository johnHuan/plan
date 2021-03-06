<?php
/**
 * Created by PhpStorm.
 * User: 张桓
 * develope Administrator
 * Date: 2016/11/18
 * Time: 19:38
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

namespace Home\Model;
use Think\Model;

/**
 * 教师数据表对应的模型
 * Class teacherModel
 * @package Home\Model
 */
class teacherModel extends Model{
    /**
     * 获取教师数据
     * @param $teacher_num
     * @param $teacher_name
     * @return int|mixed
     */
    public function getData($teacher_num, $teacher_name){
        $info = $this->where("t_num = '$teacher_num'")->find();
        if ($info){
            if (trim($info['t_name']) == trim($teacher_name)){
                return $info;
            } else {
                return -1;
            }
        } else {
            return 0;
        }
    }

}
  