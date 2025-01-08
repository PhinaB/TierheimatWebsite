<?php

namespace app\Controller;

class AuthorizeLoginController
{
    public function checkLogin(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true){

            echo json_encode([
                'loggedIn' => true,
                'userId' => $_SESSION['nutzer_id'],
                'userName' => $_SESSION['username'],
                'userRoles' => $_SESSION['roles'],
                'formMissing' => file_get_contents(__DIR__ . '/../View/includes/missingFoundForm.php'),
                'formHelp' => file_get_contents(__DIR__ . '/../View/includes/helpForm.php'),
            ]);
        } else {
            echo json_encode([
                'loggedIn' => false,
                'report' => file_get_contents(__DIR__ . '/../View/includes/missingFoundReport.php'),
                'reportHelp' => file_get_contents(__DIR__ . '/../View/includes/helpReport.php'),
            ]);
        }
    }

}