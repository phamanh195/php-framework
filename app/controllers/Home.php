<?php

    class Home extends Controller {
        public function __construct($controller, $action) {
            parent::__construct($controller, $action);
        }

        public function indexAction() {
            echo "DB<br/>";
            $db = DB::getInstance();
            $fields = [
                'fname' => 'Tony',
                'lname' => 'Parham',
                'email' => 'toni@sharklasers.com',
            ];
            $contact = $db->insert('contacts', $fields);
            dnd($contact);
            $this->view->render('home/index');
        }
    }