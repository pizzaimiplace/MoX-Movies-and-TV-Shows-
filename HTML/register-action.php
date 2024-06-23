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
        header("Location: Register.php?error=req-user");
        exit();
    } else if (empty($pass)) {
        header("Location: Register.php?error=req-pass");
        exit();
    } else if (empty($passConf)) {
        header("Location: Register.php?error=req-pass-conf");
        exit();
    } else if (empty($email)) {
        header("Location: Register.php?error=req-email");
        exit();
    } else if (filter_var($email, FILTER_VALIDATE_EMAIL)== FALSE) {
        header("Location: Register.php?error=wrong-email-format");
        exit();
    } else if (!validatePassword($pass)) {
        header("Location: Register.php?error=wrong-pass-format");
        exit();
    } else if ($pass!==$passConf) {
        header("Location: Register.php?error=pass-not-matching");
        exit();
    } else {
        include "database-connect.php";
        $sqlSelect = "SELECT * FROM accounts";
        $result = $conn->query($sqlSelect);

        if (entryExists($result, $uname, $email)) {
            header("Location: Register.php?error=user-or-email-in-use");
            exit();
        } else {
            $sqlInsert = "INSERT INTO accounts (username, password, email)
                VALUES (?, ?, ?)";
            if ($conn->execute_query($sqlInsert, [$uname, $pass, $email]) !== TRUE) {
                header("Location: Register.php?success=true");
                exit();
            } else {
                echo "Error: " . $sqlInsert . "<br>" . $conn->error;
            }
        }
    }

} else {
    header("Location: Register.php?error=unfilled-fields");
    exit();
}
?>