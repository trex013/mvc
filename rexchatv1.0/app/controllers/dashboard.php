
<?php

class Dashboard extends Controller 
{
    protected $userdata;

    public function index($data)
    {
        session_start();

        $id = explode("x5", $_SESSION["user"])[1];// Unhash

        $user = $this->model("UserQuery");

        $this->userdata = $user->getUserData(["id" => $id], "UserData");

        $this->view ("dashboard/index", $this->userdata);
        
    }

    public function logout()
    {

        session_start();

        $id = explode("x5", $_SESSION["user"])[1];

        session_unset();

        session_destroy();

        $user = $this->model("UserQuery");

        $user->set(["id" => $id], ["status" => 0]);

        redirect("../public");
    }

    public function settings($data = [])
    {
        if($data == [])
        {
            session_start();
        }

        $id = explode("x5", $_SESSION["user"])[1];

        $user = $this->model("UserQuery");

        $this->userdata = $user->getUserData(["id" => $id], "UserData");

        $this->view ("dashboard/settings", ["data" => $this->userdata, "msg" => $data]);

    }

    public function set()
    {
        session_start();

        // Checks for data entered to prevent empty update data
        foreach ($_POST as $key => $value)
        {
            if (empty($value))
            {
                continue;
            }
            
            $updateData[$key] = sanitize($value);
        }

        if(isset($updateData))
        {
            $errCheck = validationCheck($updateData);

            // Check for errors in the updatedata
            if (!$errCheck["valid"])
            {
                $errmsg = ErrorMsg::getErr($errCheck["errfield"])
                                ->msg();

                $this->settings(["err" => $errmsg]);

            } else {

                // Prepares the data for updating
                foreach ($updateData as $key => $value)
                {
                    $updateData[$key] = "'".$value."'";
                }

                // Changes data in database
                $id = explode("x5", $_SESSION["user"])[1];

                $user = $this->model("UserQuery");

                $user->set(["id" => $id], $updateData);

                $this->settings(["success" => "true"]);
              
            }

        } else {

            redirect("dashboard/settings");

        }
        
    }

    public function chat($data = [])
    {
        session_start();

        $chatBuildingblocks = [];

        $id = explode("x5", $_SESSION["user"])[1];

        $chat = $this->model("Chat");

        $chatBuildingblocks["onlineUsers"] = $chat->onlineUsers($id);

        $chatBuildingblocks["prevMsg"] = $chat->previousMsg($id);// $id is me the reciever

        if (isset($_GET["user"]))
        {
            $_SESSION["reciever"] = $_GET["user"];
            //
        }
        if (isset($_SESSION["reciever"]))
        {
            $chatBuildingblocks["chatform"] = $chat->createChatForm($id, $_SESSION["reciever"]);

            $chatBuildingblocks["reciever"] = $chat->reciever();

            $chatBuildingblocks["chatmsgs"] = $chat->chatsBetween2();
        }
        else
        {
            $chatBuildingblocks["chatform"] = "";

            $chatBuildingblocks["chatmsgs"] = "";
        }
        
        $this->view ("dashboard/chat", ["chat" => $chatBuildingblocks, "msg" => $data]);

    }

    public function chatAjax($data = [])
    {
        session_start();

        $chatBuildingblocks = [];

        $id = explode("x5", $_SESSION["user"])[1];

        $chat = $this->model("Chat");

        if (isset($_SESSION["reciever"]))
        {
            $chat->users($id, $_SESSION["reciever"]);

            $chatBuildingblocks["chatmsgs"] = $chat->chatsBetween2();
        }
        else
        {

            $chatBuildingblocks["chatmsgs"] = "";
        }

        echo $chatBuildingblocks["chatmsgs"];//$chat->chatsBetween2();

    }

    public function sendMsg()
    {
        $message = [];

        foreach ($_POST as $key => $value)
        {
            $message[$key] = "'".$value."'";
        }
        
        $user = $this->model("Chat");

        if (!$user->enterData($message))
        {
            echo "<script>alert('Failed');</script>";
        }

    }

    function uploadImg()
    {
        session_start();

        $id = explode("x5", $_SESSION["user"])[1];
      
        $pic = "pic";
      
        $filesize = $_FILES[$pic]["size"];
      
        $filetype = $_FILES[$pic]["type"];
      
        $filename = $_FILES[$pic]["name"];
      
        $filetmpname = $_FILES[$pic]["tmp_name"];
      
        $fileErr = $_FILES[$pic]["error"];
      
        if (!empty($filename) && $fileErr == 0) {
      
          if (substr_count($filetype, "image")){
      
            if ($filesize < 1000000){
      
              move_uploaded_file($filetmpname, "uploads/profile/".$filename);

              $user = $this->model("UserQuery");

              $user->set(["id" => $id], ["pic" => "'".$filename."'"]);
      
            //   $query->update_data(
                  
            //     $_SESSION["id"],
                
            //     ["ppicture" => $filename],
                
            //     "userdata"
              
             // );
              
             $this->settings(["success" => "true"]);
      
            } else {
              $err = 1; //"File is too large";
            }
          } else {
            $err = 2; //"File is not an image";
          }
        } else {
          $err = 3; //"You havent chosen any file";
        }
        
        $this->settings(["success" => "false-".$err]);
       
    }
}

?>