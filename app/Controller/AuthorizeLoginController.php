<?php

namespace app\Controller;

class AuthorizeLoginController
{
    public function checkLogin(): void
    {
        session_start();
        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true){
            echo json_encode([
                'loggedIn' => true,
                'userId' => $_SESSION['nutzer_id'],
                'userName' => $_SESSION['username'],
                'userRoles' => $_SESSION['roles'], //enthält auch die Rechte
                'form' => file_get_contents(__DIR__ . '/../View/includes/missingFoundForm.php'),
            ]);
        } else {
            echo json_encode([
                'loggedIn' => false,
                'report' => file_get_contents(__DIR__ . '/../View/includes/missingFoundReport.php'),
            ]);
        }
    }

}