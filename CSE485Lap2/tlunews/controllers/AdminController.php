<?php
require_once 'models/User.php';

class AdminController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->checkLogin($username, $password);

            if ($user && $user['role'] == 1) {
                session_start();
                $_SESSION['admin'] = $user;
                header('Location: index.php?controller=admin&action=dashboard');
            } else {
                $error = 'Sai tài khoản hoặc mật khẩu!';
            }
        }

        require_once 'views/admin/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?controller=admin&action=login');
    }

    public function dashboard() {
        session_start();
        if (!isset($_SESSION['admin'])) {
            header('Location: index.php?controller=admin&action=login');
        }

        require_once 'views/admin/dashboard.php';
    }
}
