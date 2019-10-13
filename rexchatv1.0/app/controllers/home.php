
<?php

class Home extends Controller 
{
    public function index($data = [])
    {
        // Sends data to model;
        session_start();
        // Loads up the appropriate Views and the models data
        $this->datafile = "";

        $this->view ("home/index", $data);

    }

    public function login($data = [])
    {
        $username = sanitize($_POST["user"]);

        $password = sanitize($_POST["pass"]);

        $user = $this->model("UserQuery");

        $userdata = $user->login($username, $password);

        if ($userdata)
        {
            session_start();

            $user->set(["id" => $userdata->id], ["status" => 1]);// Sets the status to Online

            $_SESSION["user"] = "x5".$userdata->id;//Hash this

            redirect("dashboard/index");

        }
        else
        {
            $errmsg = "err=x1";

            redirect_to_login_page($errmsg);
        }

    }

    public function signup($data = [])
    {
        $this->view ("home/signup", $data);
    }

    public function signupverification()
    {
        // take post data and sanitize
        foreach ($_POST as $key => $value)
        {
            $signupData[$key] = sanitize($value);
        }

        $errCheck = validationCheck($signupData);

        if (!$errCheck["valid"])
        {
            $errmsg = ErrorMsg::getErr($errCheck["errfield"])
                            ->msg();

            $this->signup(["errmsg" => $errmsg]);
        }
        else
        {
            foreach ($signupData as $key => $value)
            {
                $signupData[$key] = "'".$value."'";
            }
            $user = $this->model("UserQuery");

            $user->enterData($signupData);
            
            redirect_to_login_page("success=1");
        }
        


    }

}

?>