<!DOCTYPE html>
<html lang="ro">
    <head>
        <meta charset="utf-8">
        <title>MoX</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="about.css">
    </head>
    <body>
        <div class="wrapper">
            <div class="background-wrapper">
                <picture class="background-img">
                    <source srcset="../Images/help_slim.png" media="(max-aspect-ratio: 4/5)" style="width: 100%; height: 100vh;">
                    <source srcset="../Images/help_slim.png" media="(max-width: 768px)" style="width: 100%; height: 100vh;">
                    <source srcset="../Images/help.png" media="(max-aspect-ratio: 3/2)" style="width: 100%; height: 100vh;">
                    <source srcset="../Images/help.png" style="width: 100%; height: 100vh;">
                    <img src="../Images/help.png" alt="gojo_and_geto" style="width: 100%; height: 100vh;">
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
            <div class="overlay-text">
                <div class="section" id="introduction" role="doc-introduction">
                    <h3 class="section-header">Cum se foloseste MoX?</h3>
                    <div class="section-text">
                        <p>
                           MoX are 7 pagini principale: Home, Login, Register, Netflix, Disney, About si Help. Home este pagina introductiva a site-ului unde se regasesc toate celelalte pagini. Login/Register sunt paginile cu rolul de creeare a unul cont pentru a utiliza platforma. Paginile de Netflix si Disney contin seriale si filme disponibile pe platformele lor respective. About contine detalii despre rolul si creearea site-ului.
                        </p>
                    </div>
                </div>
                <div class="section" role="doc-chapter">
                    <h3 class="section-header">Cum pot gasi un film sau serial bazat pe anumite preferinte?</h3>
                    <div class="section-text">
                        <p>
                            Paginile Netflix si Disney prezinta un sistem de filtrate a serialelor/filmelor dupa gen, rating si tipul de media(film/serial).
                        </p>
                    </div>
                </div>
                <div class="section" role="doc-chapter">
                    <h3 class="section-header">Pe ce platforme/dispozitive este MoX disponibil?</h3>
                    <div class="section-text">
                        <p>
                            MoX este disponibil pe orice browser si orice device ce are conexiune la internet.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>