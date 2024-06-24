<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MoX</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="disney.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
        </script>
    <script>
        let showsList = [];
        let position = 0;
        function urlencode(str) {
            return encodeURIComponent(str);
        }
        function loadDoc() {
            const queryParams = new URLSearchParams(window.location.search);
            let url = `load-disney.php?pos=${urlencode(position)}&${queryParams.toString()}`;
            fetch(url)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Something went wrong!");
                    }
                    return response.json();
                })
                .then((data) => {
                    showsList = showsList.concat(data);
                    displayShows();
                    position = Number(showsList[showsList.length - 1].id) + 1;
                })
                .catch((error) => {
                });
        }
        function displayShows() {
            const container = document.getElementById('shows');
            container.innerHTML = '';
            showsList.forEach(show => {
                const div = document.createElement('div');
                div.classList.add('show-card');
                const a = document.createElement('a');
                a.href = `disney-show.php?title=${urlencode(show.title)}`;
                const img = document.createElement('img');
                img.src = show.posterPath;
                img.alt = show.title;
                a.appendChild(img);
                div.appendChild(a);
                container.appendChild(div);
            });
        }
        document.addEventListener('DOMContentLoaded', () => {
            loadDoc();
        });
        function toggleDropdown() {
            console.log("Toggled dropdown");
            document.getElementById("myDropdown").classList.toggle("show");
        }
    </script>

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
        <p>Disney+ Shows</p>
    </header>
    <div class="wrapper">
        <div class="background-wrapper-netflix">
            <img src="../Images/disney.jpg" alt="Netflix">
        </div>
        <div class="pages-buttons">
            <ul class="button-list">
                <li class="page-button"><a href="Netflix.php">Netflix</a></li>
                <li class="page-button"><a href="Disney.php">Disney</a></li>
                <li class="page-button"><a href="About.php">About</a></li>
                <li class="page-button"><a href="Help.php">Help</a></li>
            </ul>
        </div>
        <div class="search-wrapper">
                <div class="search-filters">
                    <img src="../Images/3lines.png" alt="Filters" onclick="toggleDropdown()">
                    <form action="Disney.php" method="GET">
                        <div id="myDropdown" class="dropdown">
                            <input id="clickMe" type="submit" value="Filter">
                            <p>Ratings:</p>
                            <input id="rating-pg13" type="checkbox" name="rating[0]"> PG-13</input>
                            <input id="rating-pg" type="checkbox" name="rating[1]"> PG</input>
                            <input id="rating-ma" type="checkbox" name="rating[2]"> MA</input>
                            <input id="rating-tv14" type="checkbox" name="rating[3]"> TV-14</input>
                            <input id="rating-tvy" type="checkbox" name="rating[4]"> TV-Y</input>
                            <input id="rating-tvy7" type="checkbox" name="rating[5]"> TV-Y7</input>
                            <input id="rating-g" type="checkbox" name="rating[6]"> G</input>
                            <p>Genres:</p>
                            <input id="genre-sports" type="checkbox" name="genre[0]"> Sports</input>
                            <input id="genre-action-adventure" type="checkbox" name="genre[1]"> Action & Adventure</input>
                            <input id="genre-international" type="checkbox" name="genre[2]"> International</input>
                            <input id="genre-drama" type="checkbox" name="genre[3]"> Drama</input>
                            <input id="genre-mistery" type="checkbox" name="genre[4]"> Mystery</input>
                            <input id="genre-crime" type="checkbox" name="genre[5]"> Crime</input>
                            <input id="genre-documentary" type="checkbox" name="genre[6]"> Documentary</input>
                            <input id="genre-children-family" type="checkbox" name="genre[7]"> Children & Family</input>
                            <input id="genre-horror" type="checkbox" name="genre[8]"> Horror</input>
                            <input id="genre-romance" type="checkbox" name="genre[9]"> Romance</input>
                            <input id="genre-comedy" type="checkbox" name="genre[10]"> Comedy</input>
                            <input id="genre-music" type="checkbox" name="genre[11]"> Music</input>
                            <input id="genre-scifi-fantasy" type="checkbox" name="genre[12]"> Sci-Fi & Fantasy</input>
                            <input id="genre-kids" type="checkbox" name="genre[13]"> Kids</input>
                            <input id="genre-thriller" type="checkbox" name="genre[14]"> Thriller</input>
                            <input id="genre-reality" type="checkbox" name="genre[15]"> Reality</input>
                            <input id="genre-teen" type="checkbox" name="genre[16]"> Teen</input>
                            <input id="genre-anime" type="checkbox" name="genre[17]"> Anime</input>
                            <input id="genre-classic" type="checkbox" name="genre[18]"> Classic</input>
                            <p>Type:</p>
                            <input id="type-movie" type="checkbox" name="type[0]"> Movie</input>
                            <input id="type-tv" type="checkbox" name="type[1]"> TV</input>
                        </div>
                    </form>
                </div>
                <form action="netflix-show.php" method="GET" class="search-container">
                    <input type="text" placeholder="Search..." class="search-input" name="title">
                    <button class="search-button">Go</button>
                </form>
        </div>
        <div id="shows" class="netflix-shows"></div>
        <div class="show-more">
            <button type="button" onclick="loadDoc()" value="See more shows" class="show-more-input">See more
                shows</button>
        </div>
    </div>
</body>

</html>