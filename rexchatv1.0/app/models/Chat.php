<?php

class Chat extends QueryBuilder
{
    protected $usersTable = "userdata";

    protected $table = "chats";

    protected $connected = [];//[0] = The current logged in

    function onlineUsers($currentUser)
    {  
       // $where = ["status" => 1];

        $col = ["user","id", "fname", "lname", "gender", "status", "status_msg","pic"];

        $onliners = $this->provideColumns($col, $this->usersTable, "OnlineUsers");

        $users = "<ul>";

        foreach($onliners as $user)
        {
            if (!($user->id == $currentUser))//Prevents display of the current user to avoid sending msg to oneself
            {
                if ($user->status == "0") {
                    $status = "'offline'";
                } else {
                    $status = "'online'";
                }
                $users .= "<li class = 'user'><a href='?user=".$user->id."'>".
                          "<div class='img-container'>".
                                "<img src='../uploads/profile/".$user->pic."' alt=''>".
                          "</div>".
                          "<div class='user-details center-v'>".
                            "<div>".
                                $user->user.
                                "<span class=".$status.
                                "></span>".
                                "<p class='status-msg'>".$user->status_msg."</p>".
                            "</div>".
                          "</div>".
                          "</a></li>";
            }
        }

        $users .= "</ul>";

        return $users;
    }

    function reciever()// Must be called after users() or createChatForm() 
    {  
        $where = ["id" => $this->connected[1]];

        $col = ["user","id", "fname", "lname", "gender", "status", "status_msg","pic"];

        $reciever = $this->provideColumnsWhere_IntoClass($where,$col, $this->usersTable, "OnlineUsers");

        $reciever = $reciever[0];

        if ($reciever->status == "0") 
        {
            $status = '"offline"';

        } else {

            $status = '"online"';
        }
        $user = '<div class="client-profile_picture">'.
                    '<img src="../uploads/profile/'.$reciever->pic.'" class="rounded-circle user_img_msg">'.
                '</div>'.
                '<div class="client-details">'.
                        $reciever->recieverfullname().
                        '<span class='.$status.'></span>'.
                        '<p class="status-msg">'. $reciever->status_msg .'</p>'. 
                '</div>';

        return $user;
    }

    function friendlist()
    {

    }
    
    function chatsBetween2()
    {
        // Note always call createForm() method before chatBetween2();
        $sql = "select * from `chats` WHERE ".
                "(`sender`='".$this->connected[0]."' OR `sender`='".
                $this->connected[1].
                "') AND (`reciever`='".$this->connected[0]."' OR `reciever`='".
                $this->connected[1].
                "')";

        $msgs = $this->flexyquery_IntoClass($sql,"Messages", TRUE);

        // Creates the message
        $chats = "";

        foreach($msgs as $msg)
        {
            $msg->sender = $this->provideUserFromId($msg->sender);

            $chats .= $msg->allMessages("#", $this->connected[0]);
        }

        $chats .= "";

        return $chats;
    }

    function createChatForm($me, $you)
    {
        // Note always call this method before chatBetween2();
        $this->connected[0] = $me;

        $this->connected[1] = $you;

        return '<form method="post">'.
            '<input type="hidden" name="sender" value="'.$me.'">'.
            '<input type="hidden" name="reciever" value = "'.$you.'">'.
            '<div class="textarea">'.
                '<textarea name="msg" id="" class="msg-bar"' .
                    'placeholder="Enter your message here.."></textarea>'.
            '</div>'.
            '<div class="sendbtn">'.
               '<button type="submit" class="btn btn-green" >'.
                    '<i class="icon icon-angle-double-right"></i>'.
                '</button>'.
            '</div>'.
	    '</form>';
    }

    function users($me, $you)
    {
        // Note always call this method before chatBetween2();
        $this->connected[0] = $me;

        $this->connected[1] = $you;

    } 

    public function enterData($a_arr)
    {
        $a_arr = sanitizeArr($a_arr);

        return $this->addOne($a_arr, $this->table);
    }

    function provideUserFromId($sender)
    {
        $where = ["id" => $sender];

        $col = ["user"];

        $username = $this->provideColumnsWhere($where, $col, $this->usersTable);

        if ($username)
        {
            return $username;
        }

        return [False, $sender];
    }

    function previousMsg($user)
    {
        $where = ["reciever" => $user];

        $msgs = $this->provideWhere_IntoClass($where, $this->table,"Messages");

        // Creates the message
        $message = "<ul>";

        foreach($msgs as $msg)
        {
            $msg->sender = $this->provideUserFromId($msg->sender);// To Update sender to username

            $message .= "<li class = 'messages'>".
                        $msg->allMessages().
                        "</li>";
        }

        $message .= "</ul>";

        return $message;
    }
}

?>