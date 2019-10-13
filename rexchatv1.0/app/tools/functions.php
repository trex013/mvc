<?php

function a_arr2and_str($data){
  $output = "";
  foreach ($data as $key => $val){
    if ( strstr($key, "id") ){
      $output .= " and `{$key}` = {$val}";
    } else {
      $output .= " and `{$key}` = '{$val}'";
    }
  }
  $output = substr($output, 4);
  return $output;
}

function arr2coma_str($data){
  $output = "";
  foreach($data as $val){
    $output .= ", `{$val}`";
  }
  $output = substr($output, 1);
  return $output;
}

function a_arr2key_equal_val_coma_str($data){
  $output = "";
  foreach($data as $key => $val){   
    $output .= ", `{$key}`={$val}";   
  } 
  $output = substr($output, 1); 
  return $output;
}

function a_arr2key_val_coma_str($data){ 
  $output = "";
  $output1 = "";
  $output2 = "";
  foreach($data as $key => $val){   
    $output1 .= ", `{$key}` ";   
    $output2 .= ", {$val}";   
  }  
  $output1 = substr($output1, 1);  
  $output2 = substr($output2, 1);
  $output = [$output1, $output2];
  return $output;
}


function dd($var) 
{
  echo "<pre>";
  die(var_dump($var));
  echo "</pre>";
}

function mapper( $var1, $var2)
{

  $i = 0;

  $output = [];

  if (count($var1) != count($var2)){

      return false;

  }

  foreach ($var1 as $x){

      $output[$x] = $var2[$i] ;

      $i++;

  }

  return $output;
}

function redirect_to_login_page($m){

  if (!isset($_SESSION["user"])){

      header("Location: ../?".$m);
  
      exit();
  
    }

}

function redirect($page) {

  header ("location: ../{$page}");

  exit();

}

function sanitize($data) {

  $data = trim($data);

  $data = stripslashes($data);

  $data = htmlspecialchars($data);

  return $data;
}

function validate($data,$id){
  $ans = False;
  if ($id == "email"){
      if (!empty($data) && filter_var($data, FILTER_VALIDATE_EMAIL)){
          $ans = True;
      }

  } elseif ($id == "dob"){
      if (!empty($data) && preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $data)) {
          $ans = True;
      }
  
  } elseif ($id == "phone"){
      if (!empty($data) && preg_match("/^(\+|0)[0-9]{2,14}$/", $data)) {
          $ans = True;
      }
     
  } elseif ($id == "uname"){
      if (!empty($data) && preg_match('/^[-!#$%&\’*+\\.0-9=?A-Z^_`a-z{|}~]+/', $data)) {
          $ans =True; 
      }
  } elseif ($id == "pass"){
      if (!empty($data) && preg_match('/^[-!#$%&\’*+\\.0-9=?A-Z^_`a-z{|}~]+/', $data)) {   
          $ans = TRUE;
      }
  } elseif ($id == "fname"){
      if (!empty($data) && ctype_alpha($data)) {  
          $ans = True;
      }
  } elseif ($id == "lname"){
      if (!empty($data) && ctype_alpha($data)) {  
          $ans = True;
      }
  } elseif ($id == "oname"){
      if (empty($data)) {  
          $ans = True;
      } else {
          if (ctype_alpha($data)){
              $ans = True;
          }
      }

  } elseif ($id == "gender"){
      if (!empty($data) && ctype_alpha($data)) {  
          $ans = True;
      }
  } else {
      $ans = False;
  }

  return $ans;
}


function validateArr($a_arr)
{
  
  foreach ($a_arr as $name => $value)
  {
    $valid[$name] = false;

    switch ($name) 
    {
      case 'fname':
        if (!empty($value) && ctype_alpha($value)) 
        {  
          $valid[$name] = True;
        }
        else
        {
          $valid[$name] = False;
        }
       break ;
      
      case 'lname':
        if (!empty($value) && ctype_alpha($value)) 
        {  
          $valid[$name] = True;
        }
        else
        {
          $valid[$name] = False;
        }
        break;  
      
      case 'oname':
        if (!empty($value) && ctype_alpha($value)) 
        {  
          $valid[$name] = True;
        }
        else
        {
          $valid[$name] = False;
       
        }

        break;
        
      case 'user':
        if (!empty($value) && preg_match('/^[*+\\.0-9=?A-Z^_`a-z{|}~]+/', $value)) 
        {
          $valid[$name] = True; 
        }
        else
        {
          $valid[$name] = False;
        }
        break;  

      case 'pass':
        if (!empty($value) && preg_match('/^[-!#$%&\’*+\\.0-9=?A-Z^_`a-z{|}~]+/', $value)) 
        {   
          $valid[$name] = TRUE;
        }
        else
        {
          $valid[$name] = False;
        
        } break; 
        
      case 'email':
        if (!empty($value) && filter_var($value, FILTER_VALIDATE_EMAIL))
        {
          $valid[$name] = True;
        }
        else
        {
          $valid[$name] = False;
       
       } break;
      
      case 'dob':
        if (!empty($value) && preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $value)) 
        {
          $valid[$name] = True;
        }
        else
        {
          $valid[$name] = False;
       
       } break;
          
      case 'gender':
        if (!empty($value) && ctype_alpha($value)) 
        {  
          $valid[$name] = True;
        }
        else
        {
          $valid[$name] = False;
       
       } break;
        
      default:
       $valid[$name] = false;
       break;
    }
  }

  return $valid;
}


function validationCheck($a_arr)
{
  $valid = validateArr($a_arr);

  $err = ["errfield" => [], "valid" => true ];

  foreach ($valid as $key => $value) 
  {
    if ($value == false)
    {
      // Normally All the error 
      $err["valid"] = false;

      array_push($err["errfield"], $key);
      
    }
  }

  return $err;
}

function sanitizeArr($a_arr)
{
  foreach ($a_arr as $key => $value) {
    $a_arr[$key] = sanitize($value);
  }

  return $a_arr;
}
?>