<?php

class Message_Model extends Model {
    function __construct() {
        parent::__construct();
    }

    function doChat($profile_id) {
        Session::init();
        $user_id = Session::get('profile_id');

        $query = "SELECT profile.profile_id,profile.first_name,profile.middle_name,profile.last_name,chat.chat_message,chat.chat_time
                       FROM profile
                       INNER JOIN chat
                       ON `profile`.`profile_id` = `chat`.`profile_id`
                       WHERE `chat`.`chat_with` = '$profile_id'
                       OR   `chat`.`chat_with` = '$user_id';";
echo $profile_id;

        $chat = $this->db->prepare($query);
        $chat->execute();
        $result = $chat->fetchAll(PDO::FETCH_ASSOC);
        echo "<pre>";
        print_r($chat);
        print_r($result);
        $data = array();
        foreach ($result as $chat_result) {
            if ($chat_result['profile_id'] == $user_id) {
                $user_name = ($chat_result['first_name'] != null) ? $chat_result['first_name'] . " " : "";
                $user_name .= ($chat_result['middle_name'] != null) ? $chat_result['middle_name'] . " " : "";
                $user_name .= ($chat_result['last_name'] != null) ? $chat_result['last_name'] . " " : "";

                array_push($data, array(
                    'user_name' => $user_name,
                    'message' => $chat_result['chat_message'],
                    'time' => $chat_result['chat_time']
                ));

            } else {
                $friend_name = ($chat_result['first_name'] != null) ? $chat_result['first_name'] . " " : "";
                $friend_name .= ($chat_result['middle_name'] != null) ? $chat_result['middle_name'] . " " : "";
                $friend_name .= ($chat_result['last_name'] != null) ? $chat_result['last_name'] . " " : "";

                array_push($data, array(
                    'friend_name' => $friend_name,
                    'message' => $chat_result['chat_message'],
                    'time' => $chat_result['chat_time']
                ));
            }
        }

        //print_r($data);
        //die;
        return $data;
    }
}