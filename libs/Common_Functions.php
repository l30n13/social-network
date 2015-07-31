<?php

class Common_Functions {

    public static function getAllFriends() {
        $db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
        $profile_id = Session::get('profile_id');
        $query = "SELECT * FROM friends WHERE `profile_id` = $profile_id";
        $sth = $db->query($query);
        return Common_Functions::getFriendsName($sth->fetchAll(PDO::FETCH_ASSOC));
    }

    function getFriendsName($friends_profile) {
        $db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
        $allFriendName = array();
        foreach ($friends_profile as $friend) {
            $query = "SELECT * FROM profile WHERE `profile_id` = $friend[friend_with]";
            $sth = $db->query($query);
            $name = $sth->fetch(PDO::FETCH_ASSOC);
            $friend_name = ($name['first_name'] != null) ? $name['first_name'] . " " : "";
            $friend_name .= ($name['middle_name'] != null) ? $name['middle_name'] . " " : "";
            $friend_name .= ($name['last_name'] != null) ? $name['last_name'] . " " : "";
            array_push($allFriendName,
                array(
                    'name' => $friend_name,
                    'profile_id' => $name['profile_id'],
                    'gender' => $name['gender'],
                    'profile_image' => $name['profile_image']
                ));
        }
        return $allFriendName;
    }
}