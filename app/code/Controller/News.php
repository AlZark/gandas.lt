<?php

namespace Controller;

use Core\ControllerAbstract;

class News extends ControllerAbstract
{
    public function show($slug){
        $new = new \Model\News();
        $new->loadBySlug($slug);
        $this->twig->display('news/single.html.twig',['new' => $new]);
    }

    public function all(){
        $news = new \Model\News();
        $articles = $news->getAllNews();
        $this->twig->display('news/all.html.twig',['news' => $articles]);
    }
}