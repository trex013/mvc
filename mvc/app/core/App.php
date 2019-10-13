
<?php 

class App 
{

    public static function start($route_file)
    {
        $app = new App();

        Router::load("../config/".$route_file)
        
            ->direct(Request::uri(), Request::method());

    }

}

?>