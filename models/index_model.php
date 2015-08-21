<?php

class Index_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    function  login() {
        $sth = $this->db->prepare("SELECT * FROM profile WHERE email_id = :email AND password = :password");
        $sth->execute(array(
            ':email' => filter_input(INPUT_POST, 'email'),
            ':password' => filter_input(INPUT_POST, 'pass')
        ));

        //':password' => Hash::create('sha256', filter_input(INPUT_POST,'pass'), HASH_PASSWORD_KEY)

        $data = $sth->fetch(PDO::FETCH_ASSOC);

        $name = ($data['first_name'] != null) ? $data['first_name'] . " " : "";
        $name .= ($data['middle_name'] != null) ? $data['middle_name'] . " " : "";
        $name .= ($data['last_name'] != null) ? $data['last_name'] . " " : "";

        $count = $sth->rowCount();

        if ($count > 0) {
            /* $sth = $this->db->prepare("UPDATE profile SET `logged_in` = 1 WHERE `profile_id` = $data[profile_id]");
             $sth->execute();*/
            //login
            Session::init();
            Session::set('profile_id', $data['profile_id']);
            Session::set('email', $data['email_id']);
            Session::set('name', $name);
            Session::set('image', $data['profile_image']);
            Session::set('gender', $data['gender']);
            Session::set('loggedIn', true);
            header('location:' . URL . 'home');
        } else {
            //show an error
            header('location:' . URL);
        }
        print_r($data);
    }

    function signup() {
        $f_name = filter_input(INPUT_POST, 'f_name');
        $m_name = filter_input(INPUT_POST, 'm_name');
        $l_name = filter_input(INPUT_POST, 'l_name');
        $gender = filter_input(INPUT_POST, 'gender');
        $date = filter_input(INPUT_POST, 'birth_date');
        $date = explode('-', $date);
        $birth_year = $date[0];
        $birth_month = $date[1];
        $birth_date = $date[2];
        $email = filter_input(INPUT_POST, 'email');
        $pass = filter_input(INPUT_POST, 'pass');
        $re_pass = filter_input(INPUT_POST, 're_pass');

        $data = array(
            'first_name' => $f_name,
            'middle_name' => $m_name,
            'last_name' => $l_name,
            'gender' => $gender,
            'birth_date' => $birth_date,
            'birth_month' => $birth_month,
            'birth_year' => $birth_year,
            'email_id' => $email,
            'password' => $pass
        );

        if ($pass === $re_pass) {
            $this->db->insert('profile', $data);

            echo('<script>alert("Signed up successfully");</script>');

            $aa = '' . URL . 'public/images/users/' . $this->db->lastInsertId() . '/profile_image';
            echo $aa . '<br>';
            echo $_SERVER['DOCUMENT_ROOT'] . '<br>';
            mkdir('public/images/users/' . $this->db->lastInsertId() . '/profile_image', 0777, true);
            header("location:" . URL);
        }
    }

    function search() {
        $search = filter_input(INPUT_GET, 'search');
        if ($search != null) {
            $query = "SELECT * FROM profile WHERE
                                             `first_name` LIKE '$search%' OR
                                             `middle_name` LIKE '$search%' OR
                                             `last_name` LIKE '$search%';";

            $result = $this->db->prepare($query);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            return $result->fetchAll();
        } else {
            return false;
        }
    }

    function jquery_search() {
        $search = filter_input(INPUT_GET, 'search');
        $query = "SELECT * FROM profile WHERE
                                             `first_name` LIKE '$search%' OR
                                             `middle_name` LIKE '$search%' OR
                                             `last_name` LIKE '$search%';";

        $result = $this->db->prepare($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        while ($s = $result->fetch(PDO::FETCH_ASSOC)) {
            $name = ($s['first_name'] != null) ? $s['first_name'] . " " : "";
            $name .= ($s['middle_name'] != null) ? $s['middle_name'] . " " : "";
            $name .= ($s['last_name'] != null) ? $s['last_name'] . " " : "";

            echo '<a href="#">
                    <div class="result"  onclick="goThisProfile(' . $s['profile_id'] . ')">
                        <div class="img">';
            if ($s['profile_image'] != null):
                echo '<img src="' . URL . $s['profile_image'] . '" height="60" width="60"/>';
            else :
                if ($s['gender'] === "m") :
                    echo '<img src="' . URL . 'public/images/male.png" height="60" width="60"/>';
                else :
                    echo '<img src="' . URL . 'public/images/female.png" height="60" width="60"/>';
                endif;
            endif;
            echo '</div>
                        <div class="name">' . $name . '</div>
                    </div>
                  </a>';
        }
    }

    /*<img src="<?= URL ?>public/images/404.png" width="60" height="60">*/
    /**
     * @param string $friend_id uses for adding a friend into friend list
     * @param string $date uses for remind when the friend is added
     */
    function addFriend($friend_id, $date) {
        Session::init();
        if (Session::get('loggedIn') == true) {
            $profile_id = Session::get('profile_id');
            //for inserting friend's id into current profile
            $data = array(
                'profile_id' => $profile_id,
                'friend_with' => $friend_id,
                'date_of_friendship' => $date
            );
            $this->db->insert("friends", $data);

            //for inserting current profile id into friend's profile
            $data = array(
                'profile_id' => $friend_id,
                'friend_with' => $profile_id,
                'date_of_friendship' => $date
            );
            $this->db->insert("friends", $data);

            header("Location: " . URL . "profile?id=" . $friend_id);
        } else {
            header("Location: " . URL);
        }
    }

    /**
     * @param string $friend_id uses for removing a friend from friend list
     */
    function removeFriend($friend_id) {
        Session::init();
        if (Session::get('loggedIn') == true) {
            $profile_id = Session::get('profile_id');
            $query = "DELETE FROM friends WHERE `profile_id` = '$profile_id' AND `friend_with` = '$friend_id'";
            $this->db->query($query);

            $query = "DELETE FROM friends WHERE `profile_id` = '$friend_id' AND `friend_with` = '$profile_id'";
            $this->db->query($query);

            header("Location: " . URL . "profile?id=" . $friend_id);
        } else {
            header("Location: " . URL);
        }
    }
}