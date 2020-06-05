<?php

    class Register extends Controller {
        
        public function __construct($controller, $action) {
            parent::__construct($controller, $action);
            $this->load_model('Users');
            $this->view->setLayout('default');
        }

        public function loginAction() {
            $validation = new Validate();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $validation->check($_POST, [
                    'username' => [
                        'display' => 'Username',
                        'required' => true,
                    ],
                    'password' => [
                        'display' => 'Password',
                        'required' => true,
                    ],
                ]);
                if ($validation->passed()) {
                    $user = $this->UsersModel->findByUsername(Input::get('username'));
                    if ($user && password_verify(Input::get('password'), $user->password)) {
                        $remember = (isset($_POST['remember_me'])) && $_POST['remember_me'] ? true : false;
                        $user->login($remember);
                        Router::redirect('');
                    } else {
                        $validation->addError(['There is an error with your username or password.']);
                    }
                }
            }
            $this->view->displayErrors = $validation->displayErrors();
            $this->view->render('register/login');
        }

        public function logoutAction() {
            if (currentUser()) {
                currentUser()->logout();
            }
            Router::redirect('');
        }

        public function registerAction() {
            $validation = new Validate();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $validation->check($_POST, [
                    'fname' => [
                        'display' => 'First name',
                        'required' => true,
                    ],
                    'lname' => [
                        'display' => 'Last name',
                        'required' => true,
                    ],
                    'email' => [
                        'display' => 'Email',
                        'required' => true,
                        'max' => 150,
                        'valid_email' => true,
                    ],
                    'username' => [
                        'display' => 'Username',
                        'required' => true,
                        'unique' => 'users',
                        'min' => 6,
                        'max' => 150,
                    ],
                    'password' => [
                        'display' => 'Password',
                        'required' => true,
                        'min' => 6,
                    ],
                    'cpassword' => [
                        'display' => 'Confirm Password',
                        'required' => true,
                        'matches' => 'password',
                    ],
                ]);
                if ($validation->passed()) {
                    $newUser = new Users();
                    $newUser->registerNewUser($_POST);
                    Router::redirect('register/login');
                }
            }
            $this->view->displayErrors = $validation->displayErrors();
            $this->view->render('register/register');
        }
    }