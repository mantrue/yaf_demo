<?php

class BlogModel extends \Core\Model\Medoo {
    public function __construct($str = '') {
        parent::__construct($str);
    }

    public function getBlogList($talbe,$field,$where) {
        return self::$_medoo->select($talbe,$field,$where);
    }
}