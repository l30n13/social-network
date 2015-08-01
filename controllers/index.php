<?php

class Index extends Controller {
    protected $connect = null;

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->create_db();
        Session::init();
        $logged = Session::get('loggedIn');

        if ($logged == true) {
            header('location:' . URL . "home");
        } else {
            $this->view->render('header');
            $this->view->render('index/index');
            $this->view->render('footer');
        }
    }

    function login() {
        $this->model->login();
    }

    function  signup() {
        $this->model->signup();
    }

    function create_db() {
        $this->connect = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASS);
        $a = $this->connect->query("SELECT
                                      TABLE_NAME
                                    FROM information_schema.TABLES
                                    WHERE
                                      TABLE_TYPE='BASE TABLE'
                                      AND TABLE_SCHEMA='" . DB_NAME . "';");
        if ($a->rowCount() <= 0) {
            $sql = file_get_contents(URL . "public/sql/tables.sql");
            $this->connect->exec($sql);
        }
        $a->closeCursor();

    }

    function search() {
        $this->view->result = $this->model->search();
        $this->view->render('header');
        $this->view->friends = Common_Functions::getAllFriends();
        $this->view->render('online_friend');
        $this->view->render('search_result/index');
        $this->view->render('footer');

    }

    function jquery_search() {
        $this->model->jquery_search();
    }

    function addFriend() {
        $this->model->addFriend(filter_input(INPUT_GET, 'id'), filter_input(INPUT_GET, 'date'));
    }

    function removeFriend() {
        $this->model->removeFriend(filter_input(INPUT_GET, 'id'));
    }
}