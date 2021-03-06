<?php
namespace Admin\Logic;

/**
 * 文档模型子模型 - 单页模型
 */
class SingleLogic extends BaseLogic{
    /* 自动验证规则 */
    protected $_validate = array(
        array('content', 'getContent', '内容不能为空！', self::MUST_VALIDATE , 'callback', self::MODEL_BOTH),
    );

    /**
     * 获取文章的详细内容
     * @return boolean
     * @author huajie <banhuajie@163.com>
     */
    protected function getContent(){
        $type = I('post.type');
        $content = I('post.content');
        if($type > 1){//主题和段落必须有内容
            if(empty($content)){
                return false;
            }
        }else{  //目录没内容则生成空字符串
            if(empty($content)){
                $_POST['content'] = ' ';
            }
        }
        return true;
    }

}
