<?php
session_start();
function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function validatePassword($pass)
{
    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,50}$/', $pass)) {
        return false;
    }
    return true;
}
function entryExists($result, $uname, $email)
{
    while ($row = $result->fetch_assoc()) {
        if ($row['username'] == $uname || $row['email'] == $email) {
            mysqli_data_seek($result, 0);
            return TRUE;
        }
    }
    mysqli_data_seek($result, 0);
    return FALSE;
}
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password-confirm']) && isset($_POST['email'])) {
    $uname = validate($_POST['username']);
    $pass = validate($_POST['password']);
    $passConf = validate($_POST['password-confirm']);
    $email = validate($_POST['email']);

    if (empty($uname)) {
        header("Location: error.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: error.php?error=Password is required");
        exit();
    } else if (empty($passConf)) {
        header("Location: error.php?error=Password confirmation is required");
        exit();
    } else if (empty($email)) {
        header("Location: error.php?error=Email is required");
        exit();
    } else if (filter_var($email, FILTER_VALIDATE_EMAIL)== FALSE) {
        header("Location: error.php?error=Incorrect email format");
        exit();
    } else if (!validatePassword($pass)) {
        header("Location: error.php?error=Password must be at least 8 characters long and contain a letter and a digit");
        exit();
    } else if ($pass!==$passConf) {
        header("Location: error.php?error=Passwords don't match");
        exit();
    } else {
        include "database-connect.php";
        if(!isset($conn)){
            header("Location: error.php?error=Not connected to database");
            exit();
        }
        $sqlSelect = "SELECT * FROM accounts";
        $result = $conn->query($sqlSelect);

        if (entryExists($result, $uname, $email)) {
            header("Location: error.php?error=Username or email already in use");
            exit();
        } else {
            $sqlInsert = "INSERT INTO accounts (username, password, email)
                VALUES (?, ?, ?)";
            if ($conn->execute_query($sqlInsert, [$uname, $pass, $email]) === TRUE) {
                echo "New account created successfully";
            } else {
                echo "Error: " . $sqlInsert . "<br>" . $conn->error;
            }
        }
    }

} else {
    header("Location: error.php?error=All fields must be filled");
    exit();
}
?>