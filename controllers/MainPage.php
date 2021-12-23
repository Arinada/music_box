<?php

namespace MusicBoxApp\Controllers;

use MusicBoxApp\Models\Model;
use MusicBoxApp\Views as Views;

class MainPage
{
    private string $view_name;
    private Views\View $view;
    private Model $model;

    public function __construct($view_name)
    {
        $this->view_name = $view_name;
        $this->view = new Views\View();
        $this->model = new Model();
    }

    public function showStartPage()
    {
        $this->view->renderStartPage($this->view_name);
    }

    public function showSongsBy($params)
    {
        if ($params['condition'] == null || $params['condition'] == '') {
            $params['condition'] = 'Contain';
        }
        $condition = $params['condition'];
        $parameter = $params['parameter'];
        $page_number = $params['page'];

        $songs_list = $this->model->findSongsBy($condition, $parameter);

        $songsController = new SongsController($this->model);
        $songs_list_per_page = $songsController->getSongsPerPage($page_number, $songs_list);
        $pagesCount = $songsController->getPagesCounter($songs_list);
        $handler = 'ShowSearchedSongsOnPage';
        $this->view->renderSongs($songs_list_per_page, $pagesCount, $handler);
    }

}
