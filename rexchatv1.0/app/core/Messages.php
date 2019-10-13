<?php

class Messages
{
    public function msgdisp($owner, $msg, $picsrc = '#', $timestamp = '9:00 AM, Today')
    {
        $output = '<div id="msg">'.
                '<div class="'.$owner.'">'.
                '<div class="profile_picture">'.
                   '<img src="'.$picsrc .
                    '" class="rounded-circle user_img_msg">'.
               ' </div>'.
                '<div class="msg_container">'.
                    $msg.
                    '<span class="msg_time">'.$timestamp.'</span>'.
                '</div>'.
                '</div>'.
            '</div>';

            return $output;
    }
    public function allMessages($picsrc = "#", $me = 0)
    {
        
        if(!$this->sender[0]){

            $unknown = $this->sender[0];

            $this->sender = " Unknown User ";

        } else {
            $unknown = "";

            $this->sender = $this->sender[0]->user;
        }

        if ($me == $this->reciever)
        {
            return $this->msgdisp('you', $this->msg);
        }
        return $this->msgdisp('me', $this->msg);
    }

}


?>