<?php

declare(strict_types=1);

namespace app\Controller;

use app\model\UserModel;
use app\model\UserRoleModel;
use Exception;


use app\Model\User;

class UserController
{

    private UserModel $nutzerModel;

    public function __construct()
    {
        $this->nutzerModel = new UserModel();
    }

    /**
     * @throws Exception
     */
    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['type'] === 'register') {
            $response = ['success' => false, 'errors' => []];

            $name = $email = $password = '';
            $nameErr = $emailErr = $passwordErr = '';

            if (empty($_POST["usernameReg"])) {
                $nameErr = "Name ist ein Pflichtfeld";
                $response['errors']['usernameReg'] = $nameErr;
            } else {
                $name = $this->test_input($_POST["usernameReg"]);
                // Nutzername kann nur aus Buchstaben, Zahlen oder Bindestrich bestehen
                if (!preg_match("/^[a-zA-Z0-9-]*$/", $name)) {
                    $nameErr = "Nur Buchstaben, Zahlen und Bindestrich erlaubt.";
                    $response['errors']['usernameReg'] = $nameErr;
                }
                if (empty($_POST["emailReg"])) {
                    $emailErr = "Email ist ein Pflichtfeld";
                    $response['errors']['emailReg'] = $emailErr;
                } else {
                    $email = $this->test_input($_POST["emailReg"]);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Falsches Email Format.";
                        $response['errors']['emailReg'] = $emailErr;
                    }
                }

                if (empty($_POST["passwordReg"])) {
                    $passwordErr = "Passwort ist ein Pflichtfeld";
                    $response['errors']['passwordReg'] = $passwordErr;
                } else {
                    $password = $this->test_input($_POST["passwordReg"]);
                }

                if ($nameErr || $emailErr || $passwordErr) {
                    echo json_encode($response);
                    return;
                }

                //Passwort hashen
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
                //Nutzerdaten aus der DB holen zum Überprüfen: prüfen, ob vorhanden und zum Setzen der NutzerID in der Session
                $nutzermodel = new UserModel;

                $nutzer = $nutzermodel->getNutzerByEmail($email);
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

                $rolesModel = new UserRoleModel();
                $userRoles = $rolesModel->getUserRoles($nutzerID);

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
            return;
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



