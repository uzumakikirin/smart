<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        if (isLoggedIn()) {
            redirect('pages/index');
        }
        if (isset($_POST['register'])) {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'full_name' => trim($_POST['full_name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'password2' => trim($_POST['password2']),
                'password_error' => '',
                'error' => '',
            ];

            if ($this->userModel->checkUser($data['email'])) {
                //user found
                $data['error'] = 'Email is already taken.';
            }

            if (strlen($data['password']) < 8) {
                $data['password_error'] = 'Password must be 8 digit or more ';
            } else {
                if ($data['password'] != $data['password2']) {
                    $data['password_error'] =  'Password does not match';
                }
            }

            if (empty($_POST['agree'])) {
                $data['error'] = 'Please check the agree to terms and condition.';
            }

            if (empty($data['error']) && empty($data['password_error'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if ($this->userModel->register($data)) {

                    flash('register_success', 'Registration Completed');
                    redirect('users/login');
                } else {
                    die('Something Went Wrong');
                }
            } else {
                $this->view('users/register', $data);
            }
        } else {

            $data = [
                'full_name' =>'',
                'email' => '',
                'password' => '',
                'password2' => '',
            ];
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        if (isLoggedIn()) {
            redirect('pages/index');
        }

        if (isset($_POST['login'])) {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'error' => '',
            ];
            if (!$this->userModel->checkUser($data['email'])) {
                $data['error'] = 'Email address does not exist.';
            }

            if (empty($data['error'])) {

                //check and set the login user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                //create session
                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                    if (!empty($_POST['remember'])) {
                        setcookie("email", $data['email'], time() + (10 * 365 * 24 * 60 * 60));
                    } else {
                        if (isset($_COOKIE["email"])) {
                            setcookie("email", "");
                        }
                    }
                } else {
                    $data['error'] = 'Invalid password';
                    $this->view('users/login', $data);
                }
            } else {
                $this->view('users/login', $data);
            }
        } else {

            $data = [
                'email' => '',
                'password' => '',
            ];
            $this->view('users/login', $data);
        }
    }

    public function changepassword($user_id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        if (isset($_POST['changepassword'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'user_id' => $user_id,
                'currentpassword' => trim($_POST['currentpassword']),
                'newpassword' => trim($_POST['newpassword']),
                'newpassword2' => trim($_POST['newpassword2']),
                'error' => ''
            ];

            if ($data['newpassword'] !== $data['newpassword2']) {
                $data['error'] = 'New Password does not match';
            } else {
                if (strlen($data['newpassword']) < 8) {
                    $data['error'] = 'Password must be 8 digit';
                }
            }
            if (empty($data['error'])) {
                $data['newpassword'] = password_hash($data['newpassword'], PASSWORD_DEFAULT);
                if ($this->userModel->changePassword($data)) {
                    flash('password_change_success', 'Password Succesfully Changed');
                    redirect('users/changepassword/' . $user_id);
                } else {
                    flash('password_change_failure', 'Password does not match');
                    redirect('users/changepassword/' . $user_id);
                }
            } else {
                $this->view('users/changepassword', $data);
            }
        } else {
            $data = [
                'user_id' => '',
                'currentpassword' => '',
                'newpassword' => '',
                'newpassword2' => '',

            ];
            $this->view('users/changepassword', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['email'] = $user->email;
        $_SESSION['full_name'] = $user->full_name;
        $_SESSION['type'] = $user->type;
        $redirectpage = $_SESSION['url'];
        redirect($redirectpage);
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['full_name']);
        unset($_SESSION['type']);
        session_destroy();
        redirect('users/login');
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

    public function profile($id)
    {
        if (!isLoggedIn()) {
            redirect('pages/index');
        }
        $user = $this->userModel->getUser($id);
        $data = [
            'user' => $user,
        ];
        $this->view('users/profile', $data);
    }

    public function profileupdate($id)
    {
        if (!isLoggedIn()) {
            redirect('pages/index');
        }
        $user = $this->userModel->getUser($id);
        if (isset($_POST['updateprofile'])) {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'user_id'=> $id,
                'full_name' => trim($_POST['full_name']),
                'dob' => trim($_POST['dob']),
                'address' => trim($_POST['address']),
                'contact' => trim($_POST['contact']),
                'gender' => trim($_POST['gender']),
                'image'=>$_FILES['image'],
                'old_image_name'=>$user->image_name,
                'image_name' => '' ,
                'error' => '',
            ];
            if ($data['image']['error'] === 0 && $data['image']['size'] !== 0) {
                if (is_uploaded_file($data['image']['tmp_name']) === true) {
                    $image_info = getimagesize($data['image']['tmp_name']);
                    $image_mine =  $image_info['mime'];

                    if ($data['image']['size'] > 1048576) {
                        $data['error'] = "アップロードできる画像のサイズは、1 MB です";
                    } elseif (preg_match('/^image\/p?jpeg$/i', $image_mine) === 0) {
                        $data['error'] = 'アップロードできる画像形式は JPEG形式だけです';
                    } elseif (move_uploaded_file($data['image']['tmp_name'], './image/upload/'. $user->full_name . time() . '.jpg') === true) {
                        $data['image_name'] = $user->full_name . time() . '.jpg';
                    } else {
                        $data['image_name'] = 'avatar.jpg';
                    }
                }
            }

            if (empty($data['error'])) {
                if ($this->userModel->editUser($data)) {
                    flash('profile_update_success', 'Succcessfully Updated');
                    redirect('users/profileupdate/'. $id);
                }  else {
                    die(var_dump(($data)));
                }
            }else{   
            $this->view('users/profileupdate', $data);
            }
        } else {
            $data = [
                'user' => $user,
            ];
            $this->view('users/profileupdate', $data);
        }
    }
}
