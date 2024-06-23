<?php
session_start();
function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $uname = validate($_POST['username']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: error.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: error.php?error=Password is required");
        exit();
    } else {
        include "database-connect.php";
        $sql = "SELECT * FROM accounts WHERE username=? AND password=?";
        $result = $conn->execute_query($sql, [$uname, $pass]);
        
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass) {
                echo "Logged in!";
                $_SESSION['username'] = $row['username'];
                $_SESSION['id'] = $row['id'];
                header("Location: Home.php");
                exit();
            } else {
                header("Location: error.php?error=Incorect User name or password");
                exit();

            }

        } else {
            header("Location: error.php?error=Incorect User name or password");
            exit();
        }
    }
} else {
    header("Location: error.php?All fields must be filled");
    exit();

}
?>