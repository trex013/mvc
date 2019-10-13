
<?php require_once "../app/views/partials/updatesuccessmsg.php"; ?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>Dashboard</title>
    <link href="../css/base.css" rel="stylesheet" type="text/css">
    <link href="../css/added.css" rel="stylesheet" type="text/css">
    <link href="../css/grids.css" rel="stylesheet" type="text/css">
    <link href="../css/dash.css" rel="stylesheet" type="text/css">
    <link href="../css/icons.css" rel="stylesheet" type="text/css">
    <link href="../css/setting.css" rel="stylesheet" type="text/css">
</head>
<body>
    <!--The body Begins-->

    <?php
        require "../app/views/partials/dashboard/nav.php";
    ?>
        


    <header id="dash-header">
    <div class="header-container">
        <div class="img-container">
            <img src="../uploads/profile/<?=$data->pic?>" alt="">
        </div>
        <div class="update-btn-container">
        <form method="post" name = "upload-images" action="uploadImg" enctype = "multipart/form-data">
            <div class="input">
                <label for="file-1" class="inp-file inp">
                    <input type="file" name="pic" accept="image/*" id="file-1">
                    <span class="inp-file-btn"><i class="icon icon-file-image"></i>
                        <span>Click here to update your profile picture. </span> 
                    </span>
                </label>
                <input type="submit" value="null">
            </div>
        </form>
        </div>
    </div>
    </header>


    <section id="dash-section">
    <div class="section-container">
        <div class="data-cont clearfix">
        <form action="set" method="post">
        <label>Id:</label>
            <input type="text" name="fname" id="" class="inp-group-large" placeholder="<?=$data->id ?>" disabled>
            <br>
            <label>First-Name:</label>
            <input type="text" name="fname" id="" class="inp-group-large" placeholder="<?=$data->fname ?>">
            <br>
            <label>Last-Name:</label>
            <input type="text" name="lname" id="" class="inp-group-large" placeholder="<?=$data->lname ?>">
            <br>
            <label>Other-Name:</label>
            <input type="text" name="oname" id="" class="inp-group-large" placeholder="<?=$data->oname ?>">
            <br>
            <label>User-Name:</label>
            <input type="text" name="user" id="" class="inp-group-large" placeholder="<?=$data->user ?>">
            <br>
            <label>Gender:</label>
            <input type="text" name="gender" id="" class="inp-group-large" placeholder="<?=$data->gender ?>">
            <br>
            <label>Dath-Of-Birth:</label>
            <input type="text" name="dob" id="" class="inp-group-large" placeholder="<?=$data->dob ?>">
            <br>
            <label>Email:</label>
            <input type="email" name="email" id="" class="inp-group-large" placeholder="<?=$data->email ?>">
            <br>
            <label>Password:</label>
            <input type="pass" name="pass" id="" class="inp-group-large" placeholder="<?=$data->pass ?>">
            <br>
            <input type="submit" class="btn" value="Set">
            <input type="reset" class="btn" value="Reset Form">
            </form>
            <script>
                if ('<?=$accessinfo["err"][0]?>')
                {
                    alert("Enter a Valid "+ '<?=$accessinfo["err"][0]?>');
                }
            </script>
        </div>
    </div>
    </section>
<?php
    require "../app/views/partials/dashboard/footer.php";
?>
<?php// var_dump($accessinfo); ?>