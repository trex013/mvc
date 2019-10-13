<?php

class Request 
{
    public static function uri()
    {
        if (isset($_GET["url"]))
        {
            $uri = explode (
                "/", 

                filter_var(
                    rtrim(
                        $_GET["url"],
                        "/"
                    ),
                    FILTER_SANITIZE_URL 
                )
            );
            unset($uri[0]);

            $uri = array_values($uri);

            if (empty($uri))
            {
                return [""];
            }

            return $uri;

        }

    }

    public static function method()
    {
        return $_SERVER["REQUEST_METHOD"];
    }
}
?>