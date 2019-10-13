<?php
    var_dump($data);
?>

<h1>Sign - Up </h1>

<form action="signupverification" method="post">
    <label>First-Name:</label>
    <input type="text" name="fname" id="">
    <br>
    <label>Last-Name:</label>
    <input type="text" name="lname" id="">
    <br>
    <label>Other-Name:</label>
    <input type="text" name="oname" id="">
    <br>
    <label>User-Name:</label>
    <input type="text" name="user" id="">
    <br>
    <label>Gender:</label>
    <input type="text" name="gender" id="">
    <br>
    <label>Dath-Of-Birth:</label>
    <input type="text" name="dob" id="" placeholder = "e.g. 1999-01-09">
    <br>
    <label>Email:</label>
    <input type="email" name="email" id="">
    <br>
    <label>Password:</label>
    <input type="pass" name="pass" id="">
    <br>
    <input type="submit" value="Sign-Up">
    <input type="reset" value="Reset Form">
</form>
