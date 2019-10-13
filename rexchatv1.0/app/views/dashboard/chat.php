
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width; initial-scale=1.0">

    <title>Dashboard</title>
    <link href="../css/base.css" rel="stylesheet" type="text/css">
    <link href="../css/added.css" rel="stylesheet" type="text/css">
    <link href="../css/grids.css" rel="stylesheet" type="text/css">
    <link href="../css/icons.css" rel="stylesheet" type="text/css">
    <script src="../js/jquery-1.8.2.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .profile_picture {
            display: none;
        }
        nav#menu {
            position: absolute;
            top:0;
            left:0;
            height:100vh;
        }

        section#chat-app-container {
            width: 100%;
            height: 100vh;
            background-color: pink;
        }
        .chatbox-container {
            padding: 1rem;
            height:100%;
        }

        .chat-msg-container {
            background-color: grey;
            height:65%;
            overflow-y:auto;
            padding: 1rem;
            box-shadow: 0px 0px 3px grey;
        }
        .chat-msg-container .chats {
            /* background-color: lightblue; */
        }
        .you , .me {
            width:80%;
        }
        .chats div.you {
            background-color: aquamarine;
            float: left;
            padding:.8rem;
        }

        .chats div#msg div.me {
            background-color: greenyellow;
            float: right;
            padding:.8rem;
        } 

        div#msg {
            width: 100%;
            /* border: 2px solid yellow; */
            padding: 1.2rem 0;
        }

        div#msg::after {
            display: block;
            content: "";
            clear: both;
        }

        .chat-input-container {
            position: relative;
            z-index: 100;
            box-shadow: 0px -2px 3px grey;
            height: 15%;
            overflow: hidden;
        }

        .chat-input {
            height:100%;
            background-color: black;
        }

        .chat-input form {height: inherit;}
        .chat-input form .textarea , .chat-input form .sendbtn{
            float: left;
            display: block;
            border: none;
            height: inherit;
        }
        .chat-input form .textarea {
            width:80%;
            
        }
        .chat-input form div.sendbtn {
            width:20%;
        }

        .textarea textarea, .sendbtn .btn {
            width: 100%;
            height: 100%;
            border:none;
        }

        .sendbtn .btn .icon {
            width: 50%;
            height: 80%;
        }
        .textarea textarea {
            resize: none;
            font-family: inherit;
            padding: 1rem;
        }
        .client-container {
            background: cornsilk;
            height: 22%;
            padding: 1rem;
            box-shadow: 0px 2px 3px grey;
            position: relative;
            z-index: 100;
        }
        .client {}

        .client-profile_picture {
            width: 30%;
            float: left;

        }

        .client-details {
            width: 70%;
            float: left;
            font-size: 2rem;
        }

        p.status-msg {

            color:grey;
        }

        span.online {
            display: inline-block;
            width:1rem;
            height: 1rem;
            border-radius: 50%;
            background-color: green;
            margin-left: 1rem;
            vertical-align:middle;
        }

        span.offline {
            display: inline-block;
            width:10px;
            height: 10px;
            border-radius: 50%;
            background-color: red;
            margin-left: 1rem;
        }
        span.offline,span.online {
            transition: all .5s;
        }
        span.online:hover{
            background-color:greenyellow;
        } 
        
        span.offline:hover {
            background-color:maroon;
        }
        .msg_container {
            position: relative;
        }

        .msg_time {
            position: absolute;
            color: azure;
            top:95%;
            transform: translateY(50%);
            padding: .5rem;
            font-size: 1rem;
        }

        .you .msg_time {
            left:-1rem;
        }

        .me .msg_time {
            right:-1rem;
        }

        .user-client-container 
        {
            max-width:0px;
            height:100vh;
            background: rgba(128, 0, 128, 0.7);
            position: absolute;
            top:0;
            z-index: 1000;
            
            overflow-y: auto;
            opacity:0;
            transition: all 1s;
            overflow-x: hidden;
        }
        .menu-container {
            position: relative;
            width:auto;
            height:100%;
        }
        
        .menu-container ul li a {
            text-decoration: none;
        }

        li div {
            float:left;
            height:auto;
            vertical-align: middle;
        }

        li .img-container {
            width:30%;
            overflow:hidden;
            height:100%;
        }

        li .img-container img {
            width:100%;
            height:auto;
        }
        .menu-container ul li {
            height: 10rem;
            padding: .8rem 1rem;
        }

        .menu-container ul {
            width:100vw;
            padding: 1.5rem;
            list-style-type: none;
        }
        .menu-container ul li.active {
            background: rgba(128, 0, 128, 0.9);
        }

        li .user-details {
            width:65%;
            vertical-align: middle ;
            height: 100%;
        }
        li .user-details div {
            padding:2rem;
            font-size:2rem;
        }

        .menu {
            position: fixed;
            z-index: 100000;
            top:50%;
            transform: translateY(-50%);
        }

        .menu-container label input {
            display:none;
        }

        .menu-container label a.btn i.icon {
            transition: all 1s;
        }
        .menu-container label input:checked ~ a i.icon {
            transform: rotate(-180deg);
        }
        .menu-container label input:checked ~ div.user-client-container {
            max-width: 100vw;
            opacity:1;
        }
        .user-client-container h2 {
            text-align: center;
        }

    </style>
</head>     
<body>
    <nav id="menu">
        <div class="menu-container">
        <label for="ch-1">
            
            <input type="checkbox" name="" id="ch-1" class="inp-checkbox-t1">
            <a class="btn btn-green menu"><i class="icon icon-arrow-circle-right"></i></a>
            <div class="user-client-container">
                <h2> Users </h2>
                <?=$data["chat"]["onlineUsers"]?>
            </div>
        </label>
    </div>  
    </nav>

    <section id="chat-app-container">
        <div class="chatbox-container">
            <div class="client-container">
                <div class="client">
                    <?=$data["chat"]["reciever"]?>
                </div>
            </div>
            <div class="chat-msg-container">
                <div class="chats" >
                    <?=$data["chat"]["chatmsgs"]?> 
                </div>

            </div>

            <div class="chat-input-container">
                <div class="chat-input">
                    <?=$data["chat"]["chatform"]?>
                </div>
            </div>

            <script>

            $(".chat-input form button").click(function(){	
                
                var clientmsg = $(".chat-input form textarea").val();

                var sender = $("input[name='sender']").val();

                var reciever = $("input[name='reciever']").val();
                
                $.post("sendMsg", {

                    msg: clientmsg,

                    sender : sender,

                    reciever : reciever

                });	

                $(".chat-input form textarea").attr("value", "");

                return false;

            });
            
            function loadmsg(){	

                var oldscrollHeight = document.querySelector(".chat-msg-container").scrollHeight;
                
                $.ajax({

                    url: "chatAjax",

                    cache: false,

                    success: function(html){

                        $(".chats").html(html);
                        
                        var newscrollHeight = document.querySelector(".chat-msg-container").scrollHeight;

                        // console.log({
                        //     "oldscrollHeight":oldscrollHeight,
                        //     'newscrollHeight':newscrollHeight
                        // });

                        var scrollBttmCord = document.querySelector(".chat-msg-container").scrollTop;	
                        
                        if(newscrollHeight > oldscrollHeight){
                            $(".chat-msg-container").animate({ scrollTop: newscrollHeight + 100 }, 1000); //Autoscroll to bottom of div
                        }				
                    },
                });
            }

            setInterval(loadmsg, 2000);
            
            </script>
        </div>
    </section>
</body>
</html>
