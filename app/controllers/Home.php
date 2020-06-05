<?php

    class Home extends Controller {
        public function __construct($controller, $action) {
            parent::__construct($controller, $action);
        }

        public function indexAction() {
            $posts = new Posts();

            $this->view->posts = $posts->paginate();
            $this->view->render('home/index');
        }

        public function postAction($params) {
            dnd($params);
        }
    }