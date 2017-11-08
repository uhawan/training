<?php
class home extends Controller
{

    protected $user;
    public function __construct()
    {
        $this->User=$this->model('User');
    }

    public function index($name='')
    {
      $user= $this->user;

      //$user->name=$name;
         // echo $user->name
        // echo $name.' '.$othername;

        $this->view('home/index',['name'=> $user->name]);

        /*user::create(
            [
                'username'=>'alex',
                'email'=>'alex@ii.com'

            ]);
    */

    }
    /*

    Public function create($username='',$email='')
    {
        User::create([
           'username'=>$username,
            'email'=>$email
        ]);


    }
    */
    Public function add($username='',$email='')
    {
        if (isset($_POST["add"])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            User::create([
                'username'=>$username,
                'email'=>$email
            ]);
            $this->view('home/view');
        }else{
            $this->view('home/add');
        }


    }
    public function login($username='',$email='')
    {
        $this->view('home/login');

if (isset($_POST['login']))
{
    $username=$_POST['username'];
    $email=$_POST['email'];
$users=User::where('username',$username)->get();
    //($users->username)
    $subset = $users->map(function ($users) {
        $data=(collect($users->toArray())
        ->only(['username','email'])
            ->all());

        if((in_array($_REQUEST['username'],$data))&&(in_array($_REQUEST['email'],$data)))
        {
            setcookie('username', $_POST['username'], time()+60*60*24*365);
           // session_start();
            //$_SESSION['username'] = $_REQUEST['username'];
            //print_r($_SESSION);
          //  $this->view('home/view');
            //die();
          //  header('Location:view.php');
        echo 'login successfully';

        }
        else
        {

            echo 'login fail';
        }



    }

    );





}

/*
        if (isset($_POST['login']))
        {
            $username=$_POST['username'];
            $email=$_POST['email'];
            if ($username=='ali'&&$email=='jg')
            {
               echo 'good';
            }
            else
                {
                    echo 'bad';
                }
        }

*/
    }
    
    }
?>