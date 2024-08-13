<?php

namespace Apps\Controllers;

use Apps\Models\User;
use Apps\Libs\Renderer;

class AuthentificationController extends Controller
{
    protected $modelName = User::class;

    public function login()
    {
        $pageTitle = "Login";

        if (!empty($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->model->findUserByEmail($email);

            if ($user && $this->model->verifyPassword($password, $user['password'])) {
                $_SESSION['user_id'] = $user['ID'];
                $_SESSION['email'] = $user['email'];  // Stocker l'email dans la session
                $_SESSION['is_member'] = $user['is_member'];
                $_SESSION['is_admin'] = $user['is_admin'];

                // Redirection vers la page de succès après la connexion
                Renderer::render('auth/login_success', ['pageTitle' => 'Login Successful']);
                return;
            } else {
                $errorMessage = "Email ou mot de passe incorrect";
            }
        }

        Renderer::render('auth/login', [
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
                $errorMessage = "Les mots de passe ne correspondent pas.";
            } elseif (!ctype_digit($age) || $age < 18) {
                $errorMessage = "Vous devez avoir 18 ans ou plus pour vous inscrire.";
            } else {
                $existingUser = $this->model->findUserByEmail($email);
                if ($existingUser) {
                    $errorMessage = "Cet email est déjà utilisé.";
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                    $this->model->createUser($email, $hashedPassword, $age);

                    // Redirection vers la page de succès après l'inscription
                    Renderer::render('auth/register_success', ['pageTitle' => 'Registration Successful']);
                    return;
                }
            }
        }

        Renderer::render('auth/register', [
            'pageTitle' => $pageTitle,
            'errorMessage' => $errorMessage ?? null
        ]);
    }


    public function logout()
    {
        // Détruire la session pour déconnecter l'utilisateur
        session_destroy();
        header('Location: index.php?controller=AuthentificationController&task=login');
        exit;
    }
}
