<?php
namespace MusicBoxApp\Controllers;

use MusicBoxApp\Models\User;

class Registration
{

    public function __construct()
    {
    }

    public function registerUser($data)
    {
        $user = new User($data);
        if (!$user->insert()) {
            echo 'User isn\'t registered!';
        }
    }
}