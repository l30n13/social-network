<?php

class Profile_Model extends Model {
    function __construct() {
        parent::__construct();
    }

    function getDetails($id) {
        $query = "SELECT * FROM profile WHERE `profile_id` = '$id'";
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        return $sth->fetch();
    }

    function getFriends($id) {
        $query = "SELECT * FROM friends WHERE `profile_id` = $id ;";
        $sth = $this->db->prepare($query);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function saveAfterEdit($id) {
        Session::init();
        $f_name = filter_input(INPUT_POST, 'f_name');
        $m_name = filter_input(INPUT_POST, 'm_name');
        $l_name = filter_input(INPUT_POST, 'l_name');

        $day = filter_input(INPUT_POST, 'day');
        $month = filter_input(INPUT_POST, 'month');
        $year = filter_input(INPUT_POST, 'year');

        $address = filter_input(INPUT_POST, 'address');
        $contact_no = filter_input(INPUT_POST, 'contact_no');
        $email = filter_input(INPUT_POST, 'email');

        //Image upload
        $temp_image_name = basename($_FILES['image']['tmp_name']);
        $path = pathinfo($_FILES['image']['name']);
        $extension = $path['extension'];
        $t = new DateTime();
        $destination = URL . 'public/images/users/' . Session::get('profiel_id') . 'profile_image/';

        copy($temp_image_name, $destination);
        die;

        $allData = array(
            'first_name' => $f_name,
            'middle_name' => $m_name,
            'last_name' => $l_name,
            'birth_date' => $day,
            'birth_month' => $month,
            'birth_year' => $year,
            'address' => $address,
            'contact_no' => $contact_no,
            'email_id' => $email,
            'profile_image' => $image
        );

        $this->db->update('profile', $allData, "`profile_id` = {$id}");
    }


}