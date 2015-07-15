<?php

class Home extends Controller {
    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');

        if ($logged == false) {
            Session::destroy();
            header('location:' . URL);
            exit;
        }
        //$this->view->js = array('home/js/search.js');
    }

    function index() {
        $this->view->title = 'Home';
        $this->view->msg = 'Welcome to your home page';

        $this->view->render('header');
        $this->view->render('home/index');
        $this->view->render('footer');
    }

    function logout() {
        Session::init();
        Session::destroy();
        header("location: " . URL);
    }

    function search() {
        $this->view->result = $this->model->search();
    }

    function jquery_search() {
        $this->model->jquery_search();
    }
}