<?php


    $accessinfo = "";

    if (isset($_GET["err"]))
    {    
        switch ($_GET["err"]) {
            case "x1":
                $accessinfo = "Username or Password incorrect";
                break;
            case "x2":
                $accessinfo = "X2 error";
                break;
            case "x3":
                $accessinfo = "x3 error";
                break;
            default:
                $accessinfo = "An Error has occured";
        } 
    }

    if (isset($_GET["success"]))
    {    
        switch ($_GET["success"]) {
            case "1":
                $accessinfo = "Sign up Successful....Log in Please";
                break;

            case "2":
                $accessinfo = "Your Data has been updated successfully....";
                break;
            default:
                $accessinfo = "An Error has occured";
        } 
    }

?>