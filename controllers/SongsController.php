<?php

namespace MusicBoxApp\Controllers;

class SongsController
{
    private int $songs_per_page = 5;

    public function __construct()
    {
    }

    public function getSongsPerPage($page_number, $songs_list): array
    {
        $start_ind = $this->songs_per_page * ($page_number - 1);
        return array_slice($songs_list, $start_ind, $this->songs_per_page);
    }

    public function getPagesCounter($songs_list): int
    {
        $pagesCount = count($songs_list) / $this->songs_per_page;
        return ceil($pagesCount);
    }
}