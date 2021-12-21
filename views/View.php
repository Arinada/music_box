<?php

namespace MusicBoxApp\Views;

class View
{
    private string $view_name;

    public function __construct()
    {
    }

    public function renderStartPage($view_name, $songs_list = null, $authorized = null)
    {
        $this->normalizeViewName($view_name);
        include_once VIEW_DIR_PATH . '/templates/' . $this->view_name . '.php';
    }

    private function normalizeViewName($view_name)
    {
        $normal_view_name = strtolower($view_name[0]);
        for ($i = 1; $i < mb_strlen($view_name); $i++) {
            if (ctype_upper($view_name[$i])) {
                $normal_view_name = $normal_view_name . '_';
            }
            $normal_view_name = $normal_view_name . strtolower($view_name[$i]);
        }
        $this->view_name = $normal_view_name;
    }

    public function renderErrorPage($error_message)
    {
        include_once VIEW_DIR_PATH . '/templates/error_page.php';
    }

    public function renderSongs($songs_list)
    {
        foreach ($songs_list as $song_data) {
            $audio_name = $song_data['name'] . '     ' . $song_data['author'];
            $path_to_audio = $song_data['path_on_server'];
            include VIEW_DIR_PATH . '/templates/blocks/audio_record.php';
        }
    }
}