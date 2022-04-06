<?php

namespace Controller;

use Core\ControllerAbstract;

class News extends ControllerAbstract
{

    public function index()
    {
        self::all();
    }

    public function show($slug)
    {
        $new = new \Model\News();
        $new->loadBySlug($slug);
        $this->twig->display('news/single.html.twig', ['new' => $new]);
    }

    public function all()
    {
        $news = new \Model\Collections\News();
        $news->filter('active', 1);
        $news->order('views', 'ASC');
        $news->limit(2);
        $this->twig->display('news/all.html.twig', ['news' => $news->get()]);
    }
}