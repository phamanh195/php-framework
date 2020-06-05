<?php

    class Home extends Controller {
        public function __construct($controller, $action) {
            parent::__construct($controller, $action);
        }

        public function indexAction($param=1) {
            $posts = new Posts();

            $this->view->pointer = $param;
            $this->view->totalPages = round($posts->totalPostsNumber() / DEFAULT_POSTS_PER_PAGE) + 1;
            $this->view->posts = $posts->paginate($param);
            $this->view->render('home/index');
        }

        public function postAction($params) {
            dnd($params);
        }
    }