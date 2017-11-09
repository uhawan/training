<?php
//require_once '../models/Applicant.php;
class home extends Controller
{

    protected $user;
    public function __construct()
    {
       // $this->User=$this->model('User');
        $this->Applicant=$this->model('Applicant');
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
    Public function add($name='',$fathers_name='',$cnic='',$gender='',$country='',$province='',$district='',$address='',$description='',$status='')
    {
       // print_r(Applicant::get());
        //die("we die here");

        if (isset($_POST["add"])) {
            $name = $_POST['name'];

            $fathers_name = $_POST['fathers_name'];
            $cnic=$_POST['cnic'];
            $gender=$_POST['gender'];
            $country=$_POST['country'];
            $province=$_POST['province'];
            $district=$_POST['district'];
            $address=$_POST['address'];
            $description=$_POST['description'];
            $status=$_POST['status'];







            Applicant::create([
                'name'=>$name,
                'fathers_name'=>$fathers_name,
                'cnic'=>$cnic,
                'gender'=>$gender,
                'coutry'=>$country,
                'province'=>$province,
                'district'=>$district,
                'address'=>$address,
                'description'=>$description,
                'status'=>$status




            ]);

            $this->view('home/view');}


           /* $applicants=Applicant::get();
            //($users->username)
            $subset = $users->map(function ($users)
            {
                $data=(collect($users->toArray()));

              //  print_r($data);
            }
            );}
*/
        else{
            $this->view('home/add');
        }


    }
    public function login($username='',$email='')
    {
        $this->view('home/login');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $users = User::where('username', $username)->get();
    //($users->username)
    $subset = $users->map(function ($users) {
        $data = (collect($users->toArray())
            ->only(['username', 'email'])
            ->all());

        if ((in_array($_REQUEST['username'], $data)) && (in_array($_REQUEST['email'], $data))) {
            //setcookie('username', $_POST['username'], time()+60*60*24*365);
            // session_start();
            //$_SESSION['username'] = $_REQUEST['username'];
            //print_r($_SESSION);
            //  $this->view('home/view');
            //die();
            //  header('Location:view.php');
            echo 'login successfully';

        } else {

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
    public function show()
    {
        $applicants=Applicant::get();
        //($users->username)
        $data=$applicants->toArray();
        $this->view('home/view',$data);
        //die();
        /*$subset = $applicants->map(function ($applicants)
        {
            $data=(collect($applicants->toArray()));

             //print_r($data);

    //echo 'good';
        }*/
    }
}
?>