<?php

class Home extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = $this->model('user');
    }

    public function index($name = '', $mood='')
    {
        //$user = $this->model('user');
        $user = $this->user;
        $user->name = $name;
        $this->view('home/index', [
            'name' => $user->name,
            'mood' => $mood
        ]);
        //user::Find(1)->username;

    }

    public function create($username = '', $password = '', $email = '')
    {
        user::create([
            'username' => $username,
            'password' => $password,
            'email' => $email
        ]);
       /* $this->user->create([
            'username' => $username,
            'email' => $email
        ]);*/
    }

    public function login()
    {
        //$data= user::all()->where('id', 1);
        //print_r($data[0]->user);
       // die();
        $this->view('home/login','');

        if (isset($_REQUEST['login']))
        {
            if (isset($_REQUEST['username']) && isset($_REQUEST['username']))
            {
                if($_REQUEST['username'] == 'amina' && $_REQUEST['password'] == '123')
                {
                    session_start();
                    $_SESSION['username'] = $_REQUEST['username'];
                    print_r($_SESSION);
                    //echo 'login successful';
                    //include "views/home/index.php";
                    header('Location:index.php');
                }
                else
                {
                    echo 'login fail';
                }
            }

        }

    }

    public function afterlogin()
    {
        $this->view('home/afterlogin','');
    }

}