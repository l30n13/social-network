<style type="text/css" rel="stylesheet">
    .message_body {
        width: auto;
        float: left;
    }

    .friends {
        width: 300px;
        height: 600px;
        overflow: auto;
        float: left;
        border-right: 2px solid;
    }

    a {
        text-decoration: none;
        color: #000;
    }

    .friend_name {
        font-size: 20px;
        padding: 5px;
        background: #61ab81;
        margin-top: 5px;
        -webkit-transition: background .5s;
        -moz-transition: background .5s;
        -ms-transition: background .5s;
        -o-transition: background .5s;
        transition: background .5s;
    }

    .friend_name:hover {
        background: #2c5942;
        color: #f0f0f0;
    }

    .online_friends {
        float: none;
        height: 600px;
        overflow: auto;
    }

    .message {
        width: 900px;
        height: 580px;
        float: left;
        padding: 15px;
    }

    .name {
        font-size: 35px;
        float: left;
        padding-top: 18px;
    }

    .img_name {
        float: left;
        width: 100%;
        margin: 0 auto;
        background: #3897a9;
        border: 1px solid;
    }

    .main_message {
        overflow-y: scroll;
        float: left;
        width: 870px;
        height: 450px;
        padding: 10px;
    }

    .user {
        width: 800px;
        float: left;
        background: #61ab81;
        margin-top: 5px;
    }

    .user_img_name {
        float: left;
        width: auto;
        border: 1px solid;
    }

    .user_name {
        float: left;
        font-size: 20px;
        padding-top: 15px;
        padding-right: 15px;
    }

    .user_message {
        float: left;
        width: auto;
        padding: 10px;
        border: 1px solid;
    }
</style>

<?php
/*echo'<pre>';
print_r($this->friends);*/
?>

<div class="message_body">
    <div class="friends">
        <div class="online_friends">
            <div style="background: #5b8026;
                color: lightgrey;
                padding: 5px">
                <h3>Friends</h3>
            </div>
            <?php
            foreach ($this->friends as $friend) {
                echo '<a href="#" onclick="doChat(' . $friend['profile_id'] . ')">
            <div class="friend_name">
                <img src="';
                /*-----image start-------*/
                if ($friend['profile_image'] != null):
                    echo URL . $friend['profile_image'];
                else:
                    if ($friend['gender'] === "m"):
                        echo URL . 'public/images/male.png" height = "30" width = "30" ';
                    else:
                        echo URL . 'public/images/female.png" height = "30" width = "30" ';
                    endif;
                endif;
                /*-----image end-------*/
                echo '" style="float:left; margin-right:5px; border-radius: 50%;" height = "30" width = "30" />
                ' . $friend['name'] . '
            </div>
            </a>
            <div class="clear"></div>';
            }
            ?>
        </div>
    </div>


    <div class="message">
        <div class="img_name">
            <img src="<?= URL ?>public/images/404.png" width="70" height="70" style="float: left; padding: 10px;"/>

            <div class="name"><?= (isset($this->friend_name) != null) ? $this->friend_name : "Friend Name" ?></div>
        </div>


        <div class="main_message">
            <div class="user">
                <a href="#">
                    <div class="user_img_name">
                        <img src="<?= URL ?>public/images/404.png" width="40" height="40"
                             style="float: left; padding: 10px;"/>

                        <div class="user_name">Name :</div>
                    </div>
                </a>

                <div class="user_message">
                    dfkjgdfkjgn dfkgnldfgndsklg g
                    sdfsdnfsdk fndskfnds fndskfd fdsf
                </div>
            </div>
            <div class="input_massage" style="bottom: 0; position:absolute;">
                <textarea class="chat_message" placeholder="skdfn" name="message" style="width: 870px"></textarea>
            </div>
        </div>

    </div>
</div>