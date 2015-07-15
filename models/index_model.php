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

            header("location:" . URL);
        }
    }
}