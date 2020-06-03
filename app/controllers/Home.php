<?php

    class Home extends Controller {
        public function __construct($controller, $action) {
            parent::__construct($controller, $action);
        }

        public function indexAction() {
            echo "DB<br/>";
            $db = DB::getInstance();
            $contact = $db->find('contacts', [
                'conditions' => ['lname = ?'],
                'bind' => ['Anh'],
                'order' => 'lname',
                'limit' => 1,
            ]);
            dnd($contact);
            $this->view->render('home/index');
        }
    }