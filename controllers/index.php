<?php

class Index extends Controller {
    protected $connect = null;

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->create_db();
        $this->view->title = 'Home';
        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }

    function login() {
        $this->model->login();
    }

    function  signup() {
        $this->model->signup();
    }

    function create_db() {
        $this->connect = new PDO("mysql:host=localhost; dbname=" . DB_NAME, DB_USER, DB_PASS);
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
}