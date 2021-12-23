<?php

namespace MusicBoxApp\Controllers;

use MusicBoxApp\Models\Song;
use MusicBoxApp\Views as Views;

class MainPage
{
    private string $view_name;
    private Views\View $view;

    public function __construct($view_name)
    {
        $this->view_name = $view_name;
        $this->view = new Views\View();
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

        $song_model = new Song();
        $songs_list = $song_model->getAllSongsBy($condition, $parameter);

        $songsController = new SongsController();
        $songs_list_per_page = $songsController->getSongsPerPage($page_number, $songs_list);
        $pagesCount = $songsController->getPagesCounter($songs_list);
        $handler = 'ShowSearchedSongsOnPage';
        $this->view->renderSongs($songs_list_per_page, $pagesCount, $handler);
    }
}
