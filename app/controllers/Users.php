<?php
class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function register() {
        
        $userRoles = $this->userModel->findAllRoleUser();
        $data = [
            'userRoleID'  => $userRoles,
            'firstName' => '',
            'lastName' => '',
            'userTelEr' =>'',
            'userEmail' => '',
            'userEmail' => '',
            'userPassword' => '',
            'confirmPassword' => '',
            // Error message
            'userRoleError' => '',
            'firstNameError' => '',
            'lastNameError' => '',
            'userTelError' =>'',
            'userEmailError' => '',
            'useremailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'userRoleID'  =>trim($_POST['userole']),
                'firstName' =>trim($_POST['firsname']),
                'lastName' =>trim($_POST['lastname']),
                'userEmail' => trim($_POST['userEmail']),
                'userTel' => trim($_POST['userEmail']),
                'userEmail' => trim($_POST['email']),
                'userPassword' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),

                'userRoleError' => '',
                'firstNameError' => '',
                'lastNameError' => '',
                'userTelError' =>'',
                'userEmailError' => '',
                'useremailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validate userEmail on letters/numbers
            if (empty($data['userEmail']) || empty($data['firstName']) || empty($data['lastName'])) {
                $data['userEmailError'] = 'Please enter firstname, lastname and userEmail.';
            } elseif (!preg_match($nameValidation, $data['userEmail'])) {
                $data['userEmailError'] = 'Name can only contain letters and numbers.';
            }

            //Validate email
            if (empty($data['userEmail'])) {
                $data['emailError'] = 'Please enter email address.';
            } elseif (!filter_var($data['userEmail'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } else {
                //Check if email exists.
                if ($this->userModel->findUserByEmail($data['userEmail'])) {
                $data['emailError'] = 'Email is already taken.';
                }
            }

           // Validate password on length, numeric values,
            if(empty($data['userPassword'])){
                $data['passwordError'] = 'Please enter password.';
            } elseif(strlen($data['userPassword']) < 6){
                $data['passwordError'] = 'Password must be at least 8 characters';
            } elseif (preg_match($passwordValidation, $data['userPassword'])) {
                $data['passwordError'] = 'Password must be have at least one numeric value.';
            }

            //Validate confirm password
            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please enter password.';
            } else {
                if ($data['userPassword'] != $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }

            // Make sure that errors are empty
            if (empty($data['userEmailError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Hash password
                $data['userPassword'] = password_hash($data['userPassword'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->userModel->register($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/users/login');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('users/register', $data);
    }

    public function login() {
        $data = [
            
            'userEmail' => '',
            'userPassword' => '',
            'userEmailError' => '',
            'passwordError' => ''
        ];

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'userEmail' => trim($_POST['userEmail']),
                'password' => trim($_POST['userPassword']),
                'userEmailError' => '',
                'passwordError' => '',
            ];
            //Validate userEmail
            if (empty($data['userEmail'])) {
                $data['userEmailError'] = 'Please enter a userEmail.';
            }

            //Validate password
            if (empty($data['userPassword'])) {
                $data['passwordError'] = 'Please enter a password.';
            }

            //Check if all errors are empty
            if (empty($data['userEmailError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['userEmail'], $data['userPassword']); //call Methode user
                
                print_r($loggedInUser);
                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Password or userEmail is incorrect. Please try again.';
                    $this->view('users/login', $data);
                }
            }

        } else {
            $data = [
                'userEmail' => '',
                'password' => '',
                'userEmailError' => '',
                'passwordError' => ''
            ];
        }
        
        $this->view('users/login', $data);
    }

    public function createUserSession($user) {
        $_SESSION['userID'] = $user->id;
        $_SESSION['userEmail'] = $user->userEmail;
        $_SESSION['email'] = $user->email;
        header('location:' . URLROOT . '/pages/index');
    }

    public function logout() {
        unset($_SESSION['userID']);
        unset($_SESSION['userEmail']);
        unset($_SESSION['email']);
        header('location:' . URLROOT . '/users/login');
    }

}
