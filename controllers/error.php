<?php

class Error extends Controller {
    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->title = '404 Error';
        $this->view->msg = '<span style="color: red; font-size: 45px;">404!!!</span><br><span style="font-size: 30px"> This page does not exists</span>';
        $this->view->render('header');
        $this->view->render('error/index');
        $this->view->render('footer');
    }
}