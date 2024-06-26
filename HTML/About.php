<!DOCTYPE html>
<html lang="en">
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
                    <source srcset="../Images/about/gojo_and_geto_extra_slim.jpg" media="(max-aspect-ratio: 4/5)" style="width: 100%; height: 100vh;">
                    <source srcset="../Images/about/gojo_and_geto_slim.jpg" media="(max-width: 768px)" style="width: 100%; height: 100vh;">
                    <source srcset="../Images/about/gojo_and_geto_normal.png" media="(max-aspect-ratio: 3/2)" style="width: 100%; height: 100vh;">
                    <source srcset="../Images/about/gojo_and_geto_wide.png" style="width: 100%; height: 100vh;">
                    <img src="../Images/gojo_and_geto.jpg" alt="gojo_and_geto" style="width: 100%; height: 100vh;">
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
                    <h3 class="section-header">Introducere</h3>
                    <div class="section-text">
                        <p>
                            Movies and Tv Shows Explorer este un website destinat căutării de informații despre filme și seriale tv.
                            Utilizatorii vor putea căuta informații și statistici despre filmele și serialele oferite de serviciile de streaming Netflix și Disney.
                            În plus, utilizatorii vor putea descărca aceste informații în formatele CSV, WebP și SVG.
                        </p>
                    </div>
                </div>
                <div class="section" role="doc-chapter">
                    <h3 class="section-header">Tehnologii utilizate</h3>
                    <div class="section-text">
                        <p>
                            In realizarea proiectului am folosit CSS pentru realizarea design-ului responsiv, PHP a fost folosit pentru creearea serverului, MySQLi a fost folosit pentru comunicarea cu baza de date, JavaScript a fost folosit pentru creearea de functii si tehnici de programare AJAX si GuzzleHttp pentru creearea de API call-uri ce au fost utilizate in preluarea datelor suplimentare despre filme/seriale.   .
                        </p>
                    </div>
                </div>
                <div class="section" typeof="sa:AuthorList">
                    <h3 class="section-header">Autori</h3>
                    <div class="section-text">
                        <ul>
                            <li typeof="sa:ContributorRole" property="schema:author">
                                <span typeof="schema:Person" resource="https://www.facebook.com/daniel.galbeaza">
                                    <meta property="schema:givenName" content="Daniel">
                                    <meta property="schema:familyName" content="Gălbează">
                                    <a property="schema:name" href="https://github.com/pereteD">Gălbează Daniel</a>
                                </span>
                            </li>
                            <li typeof="sa:ContributorRole" property="schema:author">
                                <span typeof="schema:Person" resource="https://www.facebook.com/gabrielcatalin.dragos">
                                    <meta property="schema:givenName" content="Cătalin">
                                    <meta property="schema:additionalName" content="Gabriel">
                                    <meta property="schema:familyName" content="Dragoș">
                                    <a property="schema:name" href="https://github.com/pizzaimiplace">Dragoș Gabriel Cătălin</a>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="section" role="doc-bibliography">
                    <h3 class="section-header">Bibliografie</h3>
                    <div class="section-text">
                        <ul>
                            <li><a href="https://stackoverflow.com/">Stack overflow</a></li>
                            <li><a href="https://www.w3schools.com/">W3Schools</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>