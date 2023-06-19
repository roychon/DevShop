<?php
session_start();

require "./controller/controller.php";
require "./controller/projectcontroller.php";

try {
    $action = $_GET['action'] ?? "";
    switch ($action) {
            // TODO: link add project btn to "index.php?action=add_project"
        case "add_project":
            addProject();
            break;
            
        case "add_user":
            addUser();
            break;


            // CREATING A NEW USER 
        case "createUser":
            $username = $_POST['username'] ?? "";
            $email = $_POST['email'] ?? "";
            $password = $_POST['password'] ?? "";
            $password_confirm = $_POST['password_confirm'] ?? "";
            // TODO: Check password confirm
            // 

            if ($username and $email and $password and $password_confirm and $password === $password_confirm) {
                createUser($username, $email, $password, $password_confirm);
            } else {
                // throw new Exception("Couldn't create your account, missing required information.");
                // TODO: NEEDS TO GO BACK TO SIGN UP PAGE WITH ERROR MESSAGE
                $message = urlencode("Sign up failed");
                header("Location: index.php?action=signInForm&error=true&message=$message");
            }
            break;

        case "signInForm":
            showSignInForm();
            break;

        case "logOut":
            logOut();
            break;
        case "logIn":
            $username = $_POST['username'] ?? "";
            $password = $_POST['password'] ?? "";
            if ($username and $password) {
                logIn($username, $password);
            }
            break;

            // FOR EDITING A USER
        case "editUser":
            $username = $_SESSION['username'] ?? "";
            $email = $_SESSION['email'] ?? "";
            $password = $_SESSION['password'] ?? "";
            $id = $_GET['id'] ?? "";
            if ($id and $username and $email and $password) {

                editUser($username, $email, $password);
            }

            // EDITING THE USER
        case "submitEditedUser":
            $id = $_POST['id'] ?? "";
            $first_name = $_POST['firstName'] ?? "";
            $last_name = $_POST['lastName'] ?? "";
            $username = $_POST['username'] ?? "";
            $email = $_POST['email'] ?? "";
            $password = $_POST['password'] ?? "";
            $profile_image = $_POST['profileImage'] ?? "";
            $bio = $_POST['bio'] ?? "";
            $linked_in = $_POST['linkedIn'] ?? "";
            $git_hub = $_POST['gitHub'] ?? "";
            if (
                // 'OR' IS USED SO THAT A USER CAN EDIT ANY PIECE OF 
                // INFORMATION THEY WANT
                $id or
                $first_name or
                $last_name or
                $username or
                $email or
                $password or
                $profile_image or
                $bio or
                $linked_in or
                $git_hub
            ) {
                submitEditedUser(
                    $id,
                    $first_name,
                    $last_name,
                    $username,
                    $email,
                    $password,
                    $profile_image,
                    $bio,
                    $linked_in,
                    $git_hub
                );
            }
            break;

        default:
            displayCards();
            break;
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
