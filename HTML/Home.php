<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MoX</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <header>
        <img class="logo" src="../Images/logo.png" alt="MoX Logo">
        <div class="pages-buttons-header">
            <ul class="button-list">
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
                <source srcset="../Images/mvclip_rotated.jpg" media="(max-aspect-ratio: 4/5)"
                    style="width: 120%; height: 120vh;">
                <img src="../Images/mvclip.jpg" alt="Home Background Rotated" style="width: 120%; height: 120vh;">
            </picture>
        </div>
        <div class="pages-buttons">
            <ul class="button-list">
                <li class="page-button"><a href="Netflix.php">Netflix</a></li>
                <li class="page-button"><a href="Disney.php">Disney</a></li>
                <li class="page-button"><a href="About.php">About</a></li>
                <li class="page-button"><a href="Help.php">Help</a></li>
            </ul>
        </div>
        <div class="overlay-text">
            <h1>Just think of a movie...</h1>
            <p>And we'll tell you everything about it!</p>
        </div>
        <form action="netflix-show.php" method="GET" class="search-container">
            <input type="text" placeholder="Search..." class="search-input" name="title">
            <button class="search-button">Go</button>
        </form>
    </div>
</body>

</html>