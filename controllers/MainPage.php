<?php

namespace MusicBoxApp\Controllers;

class MainPage
{
    public function __construct()
    {
        echo "Мы в контроллере MAIN PAGE";
    }

    public function search($num)
    {
        echo $num;
    }

    public function check()
    {
        echo " checkaem";
    }
}
