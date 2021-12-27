<?php

namespace MusicBoxApp\Controllers;

use MusicBoxApp\Models\Song;
use MusicBoxApp\Views as Views;

class SongsListPage
{
    private string $view_name;
    private Views\View $view;

    public function __construct($view_name)
    {
        $this->view_name = $view_name;
        $this->view = new Views\View();
    }

    public function showSongsListPage()
    {
        $condition = null;
        $parameter = null;
        $page_number = 1;

        $this->view->renderSongsListPage($this->view_name);

        $song_model = new Song();
        $songs_list = $song_model->getAllSongsBy($condition, $parameter);

        $songsController = new SongsController();
        $songs_list_per_page = $songsController->getSongsPerPage($page_number, $songs_list);
        $pagesCount = $songsController->getPagesCounter($songs_list);
        $this->view->renderSongs($songs_list_per_page, $pagesCount);
    }

    public function showSongsListOnPage($params)
    {
        $page_number = $params['page'];
        $condition = null;
        $parameter = null;

        $song_model = new Song();
        $songs_list = $song_model->getAllSongsBy($condition, $parameter);

        $songsController = new SongsController();
        $songs_list_per_page = $songsController->getSongsPerPage($page_number, $songs_list);
        $pagesCount = $songsController->getPagesCounter($songs_list);
        $this->view->renderSongs($songs_list_per_page, $pagesCount);
    }

}
