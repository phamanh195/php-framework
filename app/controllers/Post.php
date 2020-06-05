<?php

    class Post extends Controller {
        public function __construct($controller, $action) {
            parent::__construct($controller, $action);
        }

        public function postAction($param) {
            $post = new Posts($param);
            $this->view->post = $post;
            $this->view->render('post/post');
        }

        public function newAction() {
            if (currentUser() == null) {
                Router::redirect('');
            }
            $validation = new Validate();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $validation->check($_POST, [
                    'title' => [
                        'display' => 'Title',
                        'required' => true,
                    ],
                    'description' => [
                        'display' => 'Description',
                        'required' => true,
                    ],
                ]);
                if ($validation->passed()) {
                    $post = new Posts();
                    $post->postNewPost($_POST);
                    Router::redirect('');
                }
            }
            $this->view->displayErrors = $validation->displayErrors();
            $this->view->render('post/new');
        }

        public function deleteAction($param) {
            if (currentUser() == null | !currentUser()->isAdmin()) {
                Router::redirect('');
            }
            $post = new Posts($param);
            $post->delete();
            Router::redirect('');
        }

        public function editAction($param) {
            if (currentUser() != null && currentUser()->isAdmin()) {
                $validation = new Validate();
                $post = new Posts($param);
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $validation->check($_POST, [
                        'title' => [
                            'display' => 'Title',
                            'required' => true,
                        ],
                        'description' => [
                            'display' => 'Description',
                            'required' => true,
                        ],
                    ]);
                    if ($validation->passed()) {
                        $post->editPost($_POST);
                        Router::redirect('');
                    }
                }
                $this->view->post = $post;
                $this->view->displayErrors = $validation->displayErrors();
                $this->view->render('post/edit');
            } else {
                Router::redirect('');
            }
        }
    }
