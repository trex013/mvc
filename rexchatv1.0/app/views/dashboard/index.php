<?php

    $label = [
        "fname" => "First Name",
        "lname" => "Last Name",
        "oname" => "Other Name(s)",
        "user" => "User Name",
        "pass" => "Password",
        "email" => "Email",
        "gender" => "Gender",
        "dob" => "Date of Birth",
        "status_msg" => "Status-Message",
        "status" => "Currently"
    ];

    require "../app/views/partials/dashboard/header.php";
//dd($data);// User data

//var_dump($_SESSION);
    require "../app/views/partials/dashboard/nav.php";

?>


    <header id="dash-header">
    <div class="header-container">
        <div class="img-container">
            <img src="../uploads/profile/<?=$data->pic?>" alt="">
        </div>
    </div>
    </header>


    <section id="dash-section">
    <div class="section-container">
        <div class = "row" >
            <div class = "col-6">
                <div class = "content profile">
                    <h1>Profile</h1>

                    <?php foreach ($data as $rex => $val): ?>
                        <?php if(array_key_exists($rex, $label)): ?>
                            <div class="p-details">
                                <label><?= $label[$rex] ?></label>
                                <?php if ($rex == "status"): ?>
                                    <span><?= $val ? "Online": "Offline" ?></span>
                                <?php else:?>
                                    <span><?= $val ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endif;?>
                    <?php endforeach; ?>
                    
                </div>
            </div>
            <div class = "col-6">
                <div class = "content">
                    <div class="row1">
                        <div class="notification">
                        <div class="note-cont">
                            <h1> Notification </h1>

                            <div class="accordian-container">
                                <div class="accord-buttons-container">
                                    <div class="accord-buttons">

                                        <label for="r1" class="accord-btn-msg">
                                            <input type="radio" name="r" id="r1">
                                            
                                            <span> 
                                                <a class="btn"> News </a>
                                                <div>Verrry</div>
                                            </span>
                                        </label>
                                
                                        <label for="r2" class="accord-btn-msg">
                                            <input type="radio" name="r" id="r2">
                                            <span> 
                                                <a class="btn"> Events </a>
                                                <div>Vdfjvhkndvf</div>
                                            </span>
                                            
                                        </label>
                                
                                    </div>
                                </div>
                                <div class="msg-container">
                                    
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row2">
                        <div class="chats">
                        <!-- <div class="accord-button-2">

                            <label for="r21" class="accord-btn-msg">
                                <input type="radio" name="r3" id="r21" checked>
                                
                                <span> 
                                    <a class="btn"> News </a>
                                    <div class="current">Verrry</div>
                                </span>
                            </label>
                    
                            <label for="r22" class="accord-btn-msg">
                                <input type="radio" name="r3" id="r22">
                                <span> 
                                    <a class="btn"> Events </a>
                                    <div>Vdfjvhkndvf
                                        <table width="100%">
                                            <tr><td>vzfxvzsv</td></tr>
                                        </table>
                                    </div>
                                </span>
                                
                            </label>
                        
                        </div> -->
                        <div class="frame-container">
                            <div class="chat-container">
                                <div class="chat-text">
                                    <h1 style="text-shadow: 0px 2px 3px grey; color:gray;"> Chat </h1>
                                </div>
                                <div class="close-btn-container">
                                    <a class="close btn"><i class="icon icon-window-close"></i></a>
                                </div>
                                <div class="chat-box-container">
                                    <iframe width="100%" style="display:block;" height="100%" src="chat" name="chat_frame">
                                        <h1>Happy home</h1>
                                    </iframe>
                                </div>
                            </div>
                        </div>
                        <script>
            var chatlink = document.querySelector("a[href='chat']");
            var chatbox = document.querySelector(".frame-container");
            var closeBtn = document.querySelector("a.close");

            chatlink.addEventListener("click", function(){
                
                chatbox.style.display = "block";

                closeBtn.addEventListener("click", function(){
                    chatbox.style.display = "none";
                });

            });

            
    
                        </script>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    </section>

    <!--The body Ends-->
    
<?php

    require "../app/views/partials/dashboard/footer.php";

?>