<?php
namespace Service\Article;

class QueryList{

    public function fetchAll() {
        $model = new \BlogModel();
        $data = $model->getBlogList("blog",["id","title"],["id[>]"=>0]);
        return $data;
    }
}