<?php

require "./controller/controller.php";

try {
    $action = $_GET['action'] ?? "";
    switch ($action) {
        case "something else":
            // do something;
            break;
        case "signInForm":
            showSignInForm();
            break;
        default:
            showIndex();
            break;
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
