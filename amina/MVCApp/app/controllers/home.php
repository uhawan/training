<?php

class Home extends Controller
{
    protected $user;
    protected $applicant;
    protected $incidence;

    public function __construct()
    {
        $this->user = $this->model('user');
        $this->applicant = $this->model('applicant');
        $this->incidence = $this->model('incidence');

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
        $this->view('home/login', '');
        if (isset($_REQUEST['login']))
        {
            if (isset($_REQUEST['username']) && isset($_REQUEST['password']))
            {
                $username = $_REQUEST['username'];
                $password = $_REQUEST['password'];
                $users = User::get()->where('username' ,'=',$username);
                $subset = $users->map(function ($users) {
                    $data = ( collect($users->toArray())
                        ->only(['username', 'password'])
                        ->all());
                    if((in_array($_REQUEST['username'],$data)) && (in_array($_REQUEST['password'],$data))) {

                        if (isset($_POST['rememberme']) && $_POST['rememberme'] == 'Remember Me') {
                            /* Set cookie to last 1 year */
                            setcookie('username', $_REQUEST['username'], time() + 60 * 60 * 24 * 365);
                            setcookie('password', $_REQUEST['password'], time() + 60 * 60 * 24 * 365);
                        }
                        else {
                            /* Cookie expires when browser closes */
                            setcookie('username', $_POST['username'], false);
                            setcookie('password', $_POST['password'], false);
                        }
                        session_start();
                        $_SESSION['username'] = $_REQUEST['username'];
                        header('Location:afterlogin');
                    }
                    else
                    {
                        echo 'login fail';
                    }
                });
            }
        }
    }

    public function afterlogin()
    {
        $this->view('home/afterlogin','');
        //session destroy
        if (isset($_REQUEST['logout']))
        {
            session_destroy();
            header('Location:login');
        }

    }

    public function applicantsData()
    {
        //$this->view('home/applicantsData','');

        //Applicant::find(1)->incidence;
        $applicants = Applicant::with('incidences')->get();

        print_r($applicants);
        die();
        $this->view('home/applicantsData', $applicants);
    }
}