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
    
    }
?>