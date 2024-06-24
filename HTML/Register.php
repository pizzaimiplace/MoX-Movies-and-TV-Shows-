<!DOCTYPE html>
<?php
function hideError($errorType)
{
	if (!isset($_GET["error"])) {
		echo ("hidden");
	} else if ($_GET["error"] != $errorType) {
		echo ("hidden");
	}
}
function hideSuccess()
{
	if (!isset($_GET["success"])) {
		echo ("hidden");
	} else if ($_GET["success"] != "true") {
		echo ("hidden");
	}
}
?>
<html lang="ro">

<head>
    <meta charset="utf-8">
    <title>MoX</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <header>
        <img class="logo" src="../Images/logo.png" alt="MoX Logo">
        <div class="pages-buttons-header">
            <ul class="button-list">
                <li class="page-button"><a href="Home.php">Home</a></li>
                <li class="page-button"><a href="Netflix.php">Netflix</a></li>
                <li class="page-button"><a href="Disney.php">Disney</a></li>
                <li class="page-button"><a href="About.php">About</a></li>
                <li class="page-button"><a href="Help.php">Help</a></li>
            </ul>
        </div>
    </header>
    <div class="wrapper">
        <div class="background-wrapper">
            <picture class="background-img">
                <source srcset="../Images/login/check_in_extra_slim.jpg" media="(max-aspect-ratio: 4/5)"
                    style="width: 100%; height: 100vh;">
                <source srcset="../Images/login/check_in_slim.jpg" media="(max-aspect-ratio: 1/1)"
                    style="width: 100%; height: 100vh;">
                <source srcset="../Images/login/check_in_normal.jpg" media="(max-aspect-ratio: 3/2)"
                    style="width: 100%; height: 100vh;">
                <source srcset="../Images/login/check_in_wide.jpg" style="width: 100%; height: 100vh;">
                <img src="../Images/login/check_in_slim.jpg" alt="check_in" style="width: 100%; height: 100vh;">
            </picture>
        </div>
        <div class="pages-buttons">
            <ul class="button-list">
                <li class="page-button"><a href="Home.php">Home</a></li>
                <li class="page-button"><a href="Netflix.php">Netflix</a></li>
                <li class="page-button"><a href="Disney.php">Disney</a></li>
                <li class="page-button"><a href="About.php">About</a></li>
                <li class="page-button"><a href="Help.php">Help</a></li>
            </ul>
        </div>
        <div>
            <form action="register-action.php" class="authentication-block" method="POST">
                <div class="authentication-element">
                    <h1 style="text-align: center;">Autentificare</h1>
                </div>
                <div class="authentication-element">
                    <label style="padding-right: 36px;" for="username"><b>Nume cont</b></label>
                    <input type="text" placeholder="Introdu nume" id="username" name="username" required>
                </div>
                <div class="authentication-element">
                    <label style="padding-right: 8px;" for="email"><b>E-mail address</b></label>
                    <input type="text" placeholder="Introdu e-mail" id="email" name="email" required>
                </div>

                <div class="authentication-element">
                    <label style="padding-right: 68px;" for="password"><b>Parola</b></label>
                    <input type="password" placeholder="Introdu parola" id="password" name="password" required>
                </div>
                <div class="authentication-element">
                    <label for="password-confirm"><b>Confirma parola</b></label>
                    <input type="password" placeholder="Confirmă parola" id="password-confirm" name="password-confirm" required>
                </div>
                <div class="authentication-element">
                    <a href="Login.php"> Ai deja cont? Conectează-te acum!</a>
                </div>
                <div class="authentication-error" <?php hideError("req-user"); ?>>
					Username is required
				</div>
				<div class="authentication-error" <?php hideError("req-pass"); ?>>
					Password is required
				</div>
				<div class="authentication-error" <?php hideError("req-email"); ?>>
					Email is required
				</div>
				<div class="authentication-error" <?php hideError("req-pass-conf"); ?>>
					Password confirmation is required
				</div>
				<div class="authentication-error" <?php hideError("wrong-email-format"); ?>>
					Invalid email
				</div>
				<div class="authentication-error" <?php hideError("wrong-pass-format"); ?>>
                    Password must be at least 8 characters long and contain a letter and a digit
				</div>
                <div class="authentication-error" <?php hideError("pass-not-matching"); ?>>
					Passwords don't match
				</div>
                <div class="authentication-error" <?php hideError("user-or-email-in-use"); ?>>
					Username or e-mail is already used
				</div>
				<div class="authentication-error" <?php hideError("unfilled-fields"); ?>>
					All fields must be completed
				</div>
				<div class="authentication-success" <?php hideSuccess(); ?>>
                    <a href="Login.php" style="color: #00ff00;"> Te-ai inregistrat cu succes! Mergi la pagina de login.</a>
				</div>
                <div class="authentication-element">
                    <button type="submit" style="align-content: center;">Înregistrare</button>
                </div>
        </div>
    </div>
    </div>
</body>

</html>