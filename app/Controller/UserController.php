<?php

namespace app\Controller;

use app\model\UserModel;
use Exception;

require_once '../Model/UserModel.php';

use app\Model\User;

class UserController
{

    private UserModel $nutzerModel;

    /**
     * @param $nutzerModel
     */
    public function __construct()
    {
        $this->nutzerModel = new UserModel();
    }

    /**
     * @throws Exception
     */
    public function register(): void
    {
        $name = $email = "";
        $nameErr = $emailErr = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['type'] === 'register') {
            if (empty($_POST["usernameReg"])) {
                $nameErr = "Name ist ein Pflichtfeld";
            } else {
                $name = $this->test_input($_POST["usernameReg"]);
                // Nutzername kann nur aus Buchstaben, Zahlen oder Bindestrich bestehen
                if (!preg_match("/^[a-zA-Z0-9-]*$/", $name)) {
                        $nameErr = "Nur Buchstaben, Zahlen und Bindestrich erlaubt.";
                }
            }

            if (empty($_POST["emailReg"])) {
                $emailErr = "Email ist ein Pflichtfeld";
            } else {
                $email = $this->test_input($_POST["emailReg"]);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Falsches Email Format.";
                }
            }

            if (empty($_POST["passwordReg"])) {
                $emailErr = "Passwort ist ein Pflichtfeld";
            } else {
                $password = $this->test_input($_POST["passwordReg"]);
            }

            //Passwort hashen
            $password = password_hash($password, PASSWORD_DEFAULT);

            $nutzer = new User($name, $email, $password);

            try {
                $this->nutzerModel->insertNutzer($nutzer);
                header ('Location: ');//TODO: Weiterleitung zur Loginseite
                exit;
            }catch (Exception $e){
                echo "Fehler bei der Registrierung: ".$e->getMessage();
            }
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['type']=== 'login') {
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;

            if (!$email || !$password) {
                throw new Exception("Füllen Sie die Pflichtfelder aus!");
            }

            try {
                //Nutzerdaten aus der DB holen zum Überprüfen: prüfen, ob vorhanden und zum Setzen der NutzerID in der Session
                $nutzermodel = new UserModel;

                $nutzer = $nutzermodel->getNutzerByEmail($email);

                if (!$nutzer|| password_verify($password, $nutzer['PasswordHash'])) {
                    throw new Exception("Email oder Passwort ist falsch.");
                }

                session_start();
                $_SESSION['nutzer_id'] = $nutzer['NutzerID'];
                $_SESSION['username'] = $nutzer['Name'];

                header('Location: '); //TODO: Loginseite
                exit;
            }catch (Exception $e){
                echo "Fehler beim Login: ".$e->getMessage();
            }
        }
    }
}

