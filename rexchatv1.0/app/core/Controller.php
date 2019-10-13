
<?php

class Controller
{
    function model($model_name)
    {
        // This would load up the model required

        $model_name = ucfirst($model_name);

        if (file_exists("../app/models/".$model_name.".php"))
        {
            require_once "../app/models/".$model_name.".php";

            $config = require "../config/dbconfig.php";

            return new $model_name(
                Connection::make($config["database"])
            );
        }

    }

    function view ($page_path, $data = [])
    {
        // This would load up the required view
        
        if (file_exists("../app/views/".$page_path.".php"))
        {
            require_once "../app/views/".$page_path.".php";
        }
    }
}

?>