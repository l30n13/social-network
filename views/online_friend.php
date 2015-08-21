<style type="text/css" rel="stylesheet">
    a {
        text-decoration: none;
        color: #000;
    }

    .friend_name {
        font-size: 20px;
        padding: 5px;
        background: #61ab81;
        margin-top: 5px;
        -webkit-transition: background 1s;
        -moz-transition: background 1s;
        -ms-transition: background 1s;
        -o-transition: background 1s;
        transition: background 1s;
    }

    .friend_name:hover {
        background: #2c5942;
        color: #f0f0f0;
    }
</style>

<div class="online_friends">
    <div style="background: #5b8026;
                color: lightgrey;
                padding: 5px">
        <h3>Friends</h3>
    </div>
    <?php
    foreach ($this->friends as $friend) {
        echo '<a href="' . URL . 'profile?id=' . $friend['profile_id'] . '">
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