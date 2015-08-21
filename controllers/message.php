<?php

class Message extends Controller {
    function __construct() {
        parent::__construct();
        Session::init();
    }

    function index() {
        $this->view->render('header');
        $this->view->friends = Common_Functions::getAllFriends();
        if (isset($_GET['profile_id'])) {
            $this->view->result = $this->model->doChat(filter_input(INPUT_GET, 'profile_id'));
            echo "<pre>", print_r($this->view->result), "</pre>";
            foreach ($this->view->result as $result) {
                if (isset($result['user_name'])) {
                    $this->view->user_name = $result['user_name'];
                } elseif (isset($result['friend_name'])) {
                    $this->view->friend_name = $result['friend_name'];
                }
            }
        }

        $this->view->render('message/index');
        $this->view->render('footer');
    }
}