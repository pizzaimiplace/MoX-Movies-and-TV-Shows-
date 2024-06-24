<?php
    session_start();
    include "check-login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MoX</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="netflix.css">
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
            let url = `load-netflix.php?pos=${urlencode(position)}&${queryParams.toString()}`;
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
                a.href = `netflix-show.php?title=${urlencode(show.title)}`;
                const img = document.createElement('img');
                img.src = show.posterPath;
                img.alt = show.title;
                a.appendChild(img);
                div.appendChild(a);
                container.appendChild(div);
            });
        }
        function exportWebP(chartId) {
            const canvas = document.getElementById(chartId);
            const dataURL = canvas.toDataURL('image/webp');
            const link = document.createElement('a');
            link.href = dataURL;
            link.download = chartId + '.webp';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js" integrity="sha512-CQBWl4fJHWbryGE+Pc7UAxWMUMNMWzWxF4SQo9CgkJIN1kx6djDQZjh3Y8SZ1d+6I+1zze6Z7kHXO7q3UyZAWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        let netflixStatistics;
            fetch("get-statistics-netflix.php")
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Something went wrong!");
                    }
                    return response.json();
                })
                .then((data) => {
                    netflixStatistics = data;
                    console.log(netflixStatistics);

                    const ctx = document.getElementById('netflix-rating').getContext('2d');

                    const ratingChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['PG-13', 'PG/TV-PG', 'TV-MA/R', 'TV-14', 'TV-Y', 'TV-Y7', 'TV-G/G'],
                            datasets: [{
                                label: 'Rating',
                                data: [netflixStatistics.rating[0], netflixStatistics.rating[1], netflixStatistics.rating[2], netflixStatistics.rating[3], netflixStatistics.rating[4], netflixStatistics.rating[5], netflixStatistics.rating[6]],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 1)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    const ctx2 = document.getElementById('netflix-genres').getContext('2d');

                    const genresChart = new Chart(ctx2, {
                        type: 'pie',
                        data: {
                            labels: ["Sports",
                                    "Action-Adventure",
                                    "International",
                                    "Drama",
                                    "Mystery",
                                    "Crime",
                                    "Documentary",
                                    "Family",
                                    "Horror",
                                    "Romance",
                                    "Comedy",
                                    "Musical",
                                    "Sci-Fi & Fantasy",
                                    "Kids",
                                    "Thriller",
                                    "Reality",
                                    "Teen",
                                    "Anime",
                                    "Classic"],
                            datasets: [{
                                label: 'Genres',
                                data: [netflixStatistics.genres[0], netflixStatistics.genres[1], netflixStatistics.genres[2], netflixStatistics.genres[3], netflixStatistics.genres[4], netflixStatistics.genres[5], netflixStatistics.genres[6], netflixStatistics.genres[7], netflixStatistics.genres[8], netflixStatistics.genres[9], netflixStatistics.genres[10], netflixStatistics.genres[11], netflixStatistics.genres[12], netflixStatistics.genres[13], netflixStatistics.genres[14], netflixStatistics.genres[15], netflixStatistics.genres[16], netflixStatistics.genres[17], netflixStatistics.genres[18]],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(199, 199, 199, 1)',
                                    'rgba(83, 102, 255, 1)',
                                    'rgba(255, 102, 178, 1)',
                                    'rgba(102, 255, 102, 1)',
                                    'rgba(255, 102, 102, 1)',
                                    'rgba(102, 178, 255, 1)',
                                    'rgba(178, 102, 255, 1)',
                                    'rgba(255, 178, 102, 1)',
                                    'rgba(255, 255, 102, 1)',
                                    'rgba(192, 192, 192, 1)',
                                    'rgba(128, 128, 128, 1)',
                                    'rgba(102, 255, 178, 1)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    const ctx3 = document.getElementById('netflix-types').getContext('2d');

                    const typesChart = new Chart(ctx3, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                "Movie",
                                "TV Show"
                            ],
                            datasets: [{
                                label: 'Types',
                                data: [netflixStatistics.type[0], netflixStatistics.type[1]],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                        }
                    });
                })
                .catch((error) => {
                });
    </script>
    <header>
        <img class="logo" src="../Images/logo.png" alt="MoX Logo">
        <div class="pages-buttons-header">
            <ul class="button-list">
                <?php 
                session_start();
                if (!(isset($_SESSION['username']) && isset($_SESSION['id']))): ?>
                    <li class="page-button"><a href="Login.php">Login</a></li>
                <?php else: ?>
                    <li class="page-button"><a href="Logout.php">Logout</a></li>
                <?php endif; ?>
                <li class="page-button"><a href="Netflix.php">Netflix</a></li>
                <li class="page-button"><a href="Disney.php">Disney</a></li>
                <li class="page-button"><a href="About.php">About</a></li>
                <li class="page-button"><a href="Help.php">Help</a></li>
            </ul>
        </div>
        <p>Netflix Shows</p>
    </header>
    <div class="wrapper">
        <div class="background-wrapper-netflix">
            <img src="../Images/netflix.jpg" alt="Netflix">
        </div>
        <div class="pages-buttons">
            <ul class="button-list">
                <?php 
                session_start();
                if (!(isset($_SESSION['username']) && isset($_SESSION['id']))): ?>
                    <li class="page-button"><a href="Login.php">Login</a></li>
                <?php else: ?>
                    <li class="page-button"><a href="Logout.php">Logout</a></li>
                <?php endif; ?>
                <li class="page-button"><a href="Netflix.php">Netflix</a></li>
                <li class="page-button"><a href="Disney.php">Disney</a></li>
                <li class="page-button"><a href="About.php">About</a></li>
                <li class="page-button"><a href="Help.php">Help</a></li>
            </ul>
        </div>
        <div class="search-wrapper">
                <div class="search-filters">
                    <img src="../Images/3lines.png" alt="Filters" onclick="toggleDropdown()">
                    <form action="Netflix.php" method="GET">
                        <div id="myDropdown" class="dropdown">
                            <input id="clickMe" type="submit" value="Filter">
                            <p>Ratings:</p>
                            <input id="rating-pg13" type="checkbox" name="rating[0]"> PG-13
                            <input id="rating-pg" type="checkbox" name="rating[1]"> PG
                            <input id="rating-ma" type="checkbox" name="rating[2]"> MA
                            <input id="rating-tv14" type="checkbox" name="rating[3]"> TV-14
                            <input id="rating-tvy" type="checkbox" name="rating[4]"> TV-Y
                            <input id="rating-tvy7" type="checkbox" name="rating[5]"> TV-Y7
                            <input id="rating-g" type="checkbox" name="rating[6]"> G
                            <p>Genres:</p>
                            <input id="genre-sports" type="checkbox" name="genre[0]"> Sports
                            <input id="genre-action-adventure" type="checkbox" name="genre[1]"> Action & Adventure
                            <input id="genre-international" type="checkbox" name="genre[2]"> International
                            <input id="genre-drama" type="checkbox" name="genre[3]"> Drama
                            <input id="genre-mistery" type="checkbox" name="genre[4]"> Mystery
                            <input id="genre-crime" type="checkbox" name="genre[5]"> Crime
                            <input id="genre-documentary" type="checkbox" name="genre[6]"> Documentary
                            <input id="genre-children-family" type="checkbox" name="genre[7]"> Children & Family
                            <input id="genre-horror" type="checkbox" name="genre[8]"> Horror
                            <input id="genre-romance" type="checkbox" name="genre[9]"> Romance
                            <input id="genre-comedy" type="checkbox" name="genre[10]"> Comedy
                            <input id="genre-music" type="checkbox" name="genre[11]"> Music
                            <input id="genre-scifi-fantasy" type="checkbox" name="genre[12]"> Sci-Fi & Fantasy
                            <input id="genre-kids" type="checkbox" name="genre[13]"> Kids
                            <input id="genre-thriller" type="checkbox" name="genre[14]"> Thriller
                            <input id="genre-reality" type="checkbox" name="genre[15]"> Reality
                            <input id="genre-teen" type="checkbox" name="genre[16]"> Teen
                            <input id="genre-anime" type="checkbox" name="genre[17]"> Anime
                            <input id="genre-classic" type="checkbox" name="genre[18]"> Classic
                            <p>Type:</p>
                            <input id="type-movie" type="checkbox" name="type[0]"> Movie
                            <input id="type-tv" type="checkbox" name="type[1]"> TV
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
        <div class="show-more2">
            <button type="button" onclick="loadCharts()" value="See data charts" class="show-more-input">See data charts</button>
        </div>
        <div id="rating-div" class="show-more3" style="display: none">
            <canvas id="netflix-rating" style="background-color: wheat; position: relative"></canvas>
            <a href="export/netflix-csv-rating.php" class="show-more-input">Export CSV</a>
            <button type="button" onclick="exportWebP('netflix-rating')" value="See data charts" class="show-more-input">Export as WebP</button>>
        </div>
        <div id="genre-div" class="show-more3" style="display: none">
            <canvas id="netflix-genres" style="background-color: wheat; position: relative"></canvas>
            <a href="export/netflix-csv-genre.php" class="show-more-input">Export CSV</a>
            <button type="button" onclick="exportWebP('netflix-genres')" value="See data charts" class="show-more-input">Export as WebP</button>>
        </div>
        <div id="type-div" class="show-more3" style="display: none">
            <canvas id="netflix-types" style="background-color: wheat; position: relative"></canvas>
            <a href="export/netflix-csv-type.php" class="show-more-input">Export CSV</a>
            <button type="button" onclick="exportWebP('netflix-types')" value="See data charts" class="show-more-input">Export as WebP</button>>
        </div>

        <script>
            function loadCharts() {
                    var myDiv = document.getElementById('rating-div');
                    if(myDiv.style.display === "none"){
                        myDiv.style.display = "flex";
                    }
                    else{
                        myDiv.style.display = "none";
                    }
                    var myDiv2 = document.getElementById('genre-div');
                    if(myDiv2.style.display === "none"){
                        myDiv2.style.display = "flex";
                    }
                    else{
                        myDiv2.style.display = "none";
                    }
                    var myDiv3 = document.getElementById('type-div');
                    if(myDiv3.style.display === "none"){
                        myDiv3.style.display = "flex";
                    }
                    else{
                        myDiv3.style.display = "none";
                    }
            }
        </script>
    </div>
</body>
</html>