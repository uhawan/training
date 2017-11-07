<?php

class Home extends Controller
{
    public function index($name = 'ali', $mood = 'happy')
    {
        //die();
        //echo 'hello';
        $user = $this->model('user');
        $user->name = $name;

        $this->view('home/index', [
            'name' => $user->name,
            'mood' => $mood
        ]);
    }

}