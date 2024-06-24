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
            let url = `load-netflix.php?pos=${urlencode(position)}`;
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
        document.addEventListener('DOMContentLoaded', () => {
            loadDoc();
        });
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
        <p>Netflix Shows</p>
    </header>
    <div class="wrapper">
        <div class="background-wrapper-netflix">
            <img src="../Images/netflix.jpg" alt="Netflix">
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
                <img src="../Images/3lines.png" alt="Filters">
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