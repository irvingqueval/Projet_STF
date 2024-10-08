<?php

namespace Apps\Controllers;

class AuthentificationController extends Controller
{
    protected $modelName = \Apps\Models\User::class;

    public function login()
    {
        $pageTitle = "Login";

        if (!empty($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->model->findUserByEmail($email);

            if ($user && $this->model->verifyPassword($password, $user['password'])) {
                $_SESSION['user_id'] = $user['ID'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['is_member'] = $user['is_member'];
                $_SESSION['is_admin'] = $user['is_admin'];

                \Apps\Libs\Renderer::render('auth/login_success', ['pageTitle' => 'Login Successful']);
                return;
            } else {
                $errorMessage = "Incorrect email or password";
            }
        }

        \Apps\Libs\Renderer::render('auth/login', [
            'pageTitle' => $pageTitle,
            'errorMessage' => $errorMessage ?? null
        ]);
    }


    public function register()
    {
        $pageTitle = "Register";

        if (!empty($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];
            $age = $_POST['age'];

            if ($password !== $confirmPassword) {
                $errorMessage = "The passwords do not match.";
            } elseif (!ctype_digit($age) || $age < 18) {
                $errorMessage = "You must be 18 or over to register.";
            } else {
                $existingUser = $this->model->findUserByEmail($email);
                if ($existingUser) {
                    $errorMessage = "This email is already in use.";
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                    $this->model->createUser($email, $hashedPassword, $age);

                    \Apps\Libs\Renderer::render('auth/register_success', ['pageTitle' => 'Registration Successful']);
                    return;
                }
            }
        }

        \Apps\Libs\Renderer::render('auth/register', [
            'pageTitle' => $pageTitle,
            'errorMessage' => $errorMessage ?? null
        ]);
    }

    public function logout()
    {
        // Destroy session to disconnect user
        session_destroy();
        header('Location: index.php?controller=AuthentificationController&task=login');
        exit;
    }
}
