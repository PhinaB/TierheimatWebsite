<?php

declare(strict_types=1);

namespace app\Controller;

use app\Model\Entity\User;
use app\model\UserModel;
use app\model\UserRoleModel;
use Exception;


class UserController {
    private UserModel $nutzerModel;
    private UserRoleModel $userRoleModel;

    public function __construct()
    {
        $this->nutzerModel = new UserModel();
        $this->userRoleModel = new UserRoleModel();
    }

    /**
     * @throws Exception
     */
    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['type'] === 'register') {
            $response = ['success' => false, 'errors' => []];

            $name = $email = $password = '';

            if (empty($_POST["usernameReg"])) {
                $response['errors']['usernameReg'] = "Name ist ein Pflichtfeld";
            } else {
                $name = $this->test_input($_POST["usernameReg"]);
                if (strlen($name) < 3 || strlen($name) > 10) {
                    $response['errors']['usernameReg'] = "Name muss mindestens drei Zeichen lang sein.";
                }
                elseif (!preg_match("/^[a-zA-Z0-9-]*$/", $name)) {
                    $response['errors']['usernameReg'] = "Nur Buchstaben, Zahlen und Bindestrich erlaubt.";
                }
            }

            if (empty($_POST["emailReg"])) {
                $response['errors']['emailReg'] = "Email ist ein Pflichtfeld";
            } else {
                $email = $this->test_input($_POST["emailReg"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $response['errors']['emailReg'] = "Falsches Email Format.";
                }
            }

            if (empty($_POST["passwordReg"])) {
                $response['errors']['passwordReg'] = "Passwort ist ein Pflichtfeld";
            } else {
                $password = $this->test_input($_POST["passwordReg"]);
                if(strlen($password) < 6 || strlen($password) > 30) {
                    $response['errors']['passwordReg'] = "Das Passwort muss mindestens 6 Zeichen lang sein.";
                }
            }

            if (!empty($response['errors'])) {
                echo json_encode($response);
                exit();
            }

            $password = password_hash($password, PASSWORD_DEFAULT);

            $nutzer = new User($name, $email, $password);

            try {
                $this->nutzerModel->insertNutzer($nutzer);
                $response['success'] = true;
            } catch (Exception $e) {
                $response['success'] = false;
                $response['errors']['general'] = "Fehler bei Registrierung: " . $e->getMessage();
            }

            echo json_encode($response);
            exit();
        }
    }

    function test_input($data): string
    {
        $data = trim($data);
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }

    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['type'] === 'login') {
            $response = ['success' => false, 'errors' => []];

            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;

            if (!$email) {
                $response['errors']['email'] = 'Email ist ein Pflichtfeld';
            }

            if (!$password) {
                $response['errors']['password'] = 'Passwort ist ein Pflichtfeld';
            }

            if (!empty($response['errors'])) {
                echo json_encode($response);
                return;
            }

            try {
                $nutzer = $this->nutzerModel->getNutzerByEmail($email);
                $nutzerID = $nutzer['NutzerID'];

                if (!$nutzer) {
                    $response['errors']['email'] = 'Email nicht gefunden oder nicht korrekt';
                    echo json_encode($response);
                    return;
                }
                if (!password_verify($password, $nutzer['Passwort'])) {
                    $response['errors']['general'] = 'Passwort ist falsch.';
                    echo json_encode($response);
                    return;
                }

                $userRoles = $this->userRoleModel->getUserRoles($nutzerID);

                session_start();
                $_SESSION['nutzer_id'] = $nutzer['NutzerID'];
                $_SESSION['username'] = $nutzer['Name'];
                $_SESSION['loggedIn'] = true;
                $_SESSION['roles'] = $userRoles;

                $response['success'] = true;
            } catch (Exception $e) {
                $response['errors']['general'] = "Fehler beim Login:" . $e->getMessage();
            }

            echo json_encode($response);
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: ../public/');
        exit;
    }
}



