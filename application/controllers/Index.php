<?php

class IndexController extends \Core\Controller\Index {

    public function indexAction() {//默认Action
        $d = new Dtest\Demo();
        print_r($d->Run());
        $test = new TestLog\ClassTest(); //自定加载
        print_r($test->test());

        echo "-------------------------------------<br/>";

        $article = new Service\Article\QueryList();
        $all = $article->fetchAll();
        echo json_encode($all);
        die();
    }
}