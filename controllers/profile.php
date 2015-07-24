<?php

class Profile extends Controller {
    function __construct() {
        parent::__construct();
        Session::init();
        $session = Session::get('loggedIn');
        if ($session == false) {
            Session::destroy();
            header("location: " . URL);
            exit;
        }
        $this->view->js = array("");
    }

    function index() {
        $details = $this->model->getDetails(filter_input(INPUT_GET, 'id'));
        $friends = $this->model->getFriends(Session::get('profile_id'));
        /*echo '<pre>';
        print_r($friends);*/
        if (isset($friends)) {
            foreach ($friends as $f) {
                if (in_array(filter_input(INPUT_GET, 'id'), $f)) {
                    $this->view->is_friend = true;
                    break;
                } else {
                    $this->view->is_friend = false;
                }
            }
        }
        //die;
        $name = ($details['first_name'] != null) ? $details['first_name'] . " " : "";
        $name .= ($details['middle_name'] != null) ? $details['middle_name'] . " " : "";
        $name .= ($details['last_name'] != null) ? $details['last_name'] . " " : "";
        $this->view->name = $name;
        $this->view->id = $details['profile_id'];
        $this->view->bd = $details['birth_date'] . "-" . $details['birth_month'] . "-" . $details['birth_year'];
        $this->view->address = $details['address'];
        $this->view->contact_no = $details['contact_no'];
        $this->view->email_id = $details['email_id'];
        $this->view->profile_image = $details['profile_image'];

        $this->view->render('header');
        $this->view->render('profile/index');
        $this->view->render('footer');
    }

    function edit() {
        $details = $this->model->getDetails(filter_input(INPUT_GET, 'id'));

        $this->view->f_name = $details['first_name'];
        $this->view->m_name = $details['middle_name'];
        $this->view->l_name = $details['last_name'];

        $this->view->id = $details['profile_id'];

        $this->view->day = $details['birth_date'];
        $this->view->month = $details['birth_month'];
        $this->view->year = $details['birth_year'];

        $this->view->address = $details['address'];
        $this->view->contact_no = $details['contact_no'];
        $this->view->email_id = $details['email_id'];
        $this->view->profile_image = $details['profile_image'];

        $this->view->render('header');
        $this->view->render('profile/edit');
        $this->view->render('footer');
    }

    function saveAfterEdit() {
        $id = Session::get('profile_id');
        $this->model->saveAfterEdit($id);
        header('location:' . URL . 'profile/?id=' . $id);
    }
}