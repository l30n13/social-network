<?php

class Home extends Controller {
    function __construct() {
        parent::__construct();
    }

    function index() {
        Session::init();
        if (Session::get('loggedIn') == true) {
            $this->view->title = 'Home';
            $this->view->msg = 'Wellcom to your home page';
            $this->view->render('header');
            $this->view->render('home/index');
            $this->view->render('footer');
        } else {
            header("location: " . URL);
        }
    }

    function logout() {
        Session::init();
        Session::destroy();
        header("location: " . URL);
    }
}