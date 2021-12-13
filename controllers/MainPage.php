<?php

namespace MusicBoxApp\Controllers;

use MusicBoxApp\Models\Model;
use MusicBoxApp\Views as Views;

class MainPage
{
    private string $view_name;
    private $view;

    public function __construct($view_name)
    {
        $this->view_name = $view_name;
        $this->view = new Views\View();
    }

    public function showStartPage()
    {
        $this->view->renderStartPage($this->view_name);
    }

    public function showAllSongsList()
    {
        $model = new Model();
        $songs_list = $model->getAllSongsList();
        $this->view->renderStartPage($this->view_name, $songs_list);
    }

    private function showFoundSongs()
    {
        //TODO
    }

}
