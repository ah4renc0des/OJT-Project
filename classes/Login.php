<?php
require_once '../config.php';

class Login extends DBConnection {
    private $settings;

    public function __construct(){
        global $_settings;
        $this->settings = $_settings;
        parent::__construct();
        ini_set('display_error', 1);
    }

    public function __destruct(){
        parent::__destruct();
    }

    public function index(){
        echo "<h1>Access Denied</h1> <a href='".base_url."'>Go Back.</a>";
    }

    public function login(){
        extract($_POST);

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $password = md5($password);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $user = $result->fetch_assoc();
            foreach($user as $k => $v){
                if(!is_numeric($k) && $k != 'password'){
                    $this->settings->set_userdata($k, $v);
                }
            }

            // Set the login type based on the user type from the database
            $this->settings->set_userdata('login_type', $user['type']);

            // Check user type for redirection
            if ($user['type'] == 1) {
                // Admin user
                return json_encode(['status' => 'success', 'redirect' => 'admin/index.php']);
            } elseif ($user['type'] == 2) {
                // Regular user
                return json_encode(['status' => 'success', 'redirect' => 'index.php']);
            }
        } else {
            return json_encode([
                'status' => 'incorrect',
                'msg' => "Incorrect username or password"
            ]);
        }
    }

    public function logout(){
        if($this->settings->sess_des()){
            redirect('/login.php');
        }
    }

    public function login_user(){
        extract($_POST);
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ? AND `password` = ? AND `type` = 2 ");
        $password = md5($password);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $user = $result->fetch_assoc();
            foreach($user as $k => $v){
                $this->settings->set_userdata($k, $v);
            }
            $this->settings->set_userdata('login_type', 2);

            // Return success with redirect URL
            return json_encode(['status' => 'success', 'redirect' => 'index.php']);
        } else {
            return json_encode(['status' => 'failed', 'msg' => 'Incorrect Email or Password']);
        }
    }

    public function logout_user(){
        if($this->settings->sess_des()){
            redirect('index.php');
        }
    }
}

$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$auth = new Login();
switch ($action) {
    case 'login':
        echo $auth->login();
        break;
    case 'logout':
        echo $auth->logout();
        break;
    case 'login_user':
        echo $auth->login_user();
        break;
    case 'logout_user':
        echo $auth->logout_user();
        break;
    default:
        echo $auth->index();
        break;
}
