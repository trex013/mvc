
<?php

class Home extends Controller 
{
    public function index($data = [])
    {
        // Sends data to model;

        $user = $this->model("User");

        $user->name = $data ? $data[0]: "";

        // Loads up the appropriate Views and the models data

        $this->view ("home/index", ["name" => $user->name ]);

    }
}

?>