<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home - Diamond Blog</title>
    <!-- Css -->
    <link rel="stylesheet" href="style.css" />
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <div id="wrapper">
        <!-- header -->
        <header class="header">
            <div class="header-text">
                <h1>Alphayo Blog</h1>
                <h4>Home of verified news...</h4>
            </div>
            <div class="overlay"></div>
        </header>

        <!-- sidebar -->
        <div class="sidebar">
            <span class="closeButton">&times;</span>
            <p class="brand-title"><a href="">Alphayo Blog</a></p>

            <div class="side-links">
                <ul>
                    <li><a class="active" href="index.html">Home</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>

            <!-- sidebar footer -->
            <footer class="sidebar-footer">
                <div>
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                </div>

                <small>&copy 2021 Alphayo Blog</small>
            </footer>
        </div>
        <!-- Menu Button -->
        <div class="menuButton">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <!-- main -->
        <main class="container">
            <h2 class="header-title">Latest Blog Posts</h2>
            <section class="cards-blog latest-blog">
                <div class="card-blog-content">
                    <img src="images/pic1.jpg" alt="" />
                    <p>
                        2 hours ago
                        <span style="float: right">Written By Alphayo Wakarindi</span>
                    </p>
                    <h4 style="font-weight: bolder">
                        <a href="single-blog.html">Benefits of Getting Covid 19 Vaccination</a>
                    </h4>
                </div>

                <div class="card-blog-content">
                    <img src="images/pic2.jpg" alt="" />
                    <p>
                        23 hours ago
                        <span style="float: right">Written By Alphayo Wakarindi</span>
                    </p>
                    <h4 style="font-weight: bolder">
                        <a href="single-blog.html">Top 10 Music Stories Never Told</a>
                    </h4>
                </div>

                <div class="card-blog-content">
                    <img src="images/pic3.jpg" alt="" />
                    <p>
                        2 days ago
                        <span style="float: right">Written By Alphayo Wakarindi</span>
                    </p>
                    <h4 style="font-weight: bolder">
                        <a href="single-blog.html">WRC Safari Rally Back To Kenya After 19 Years</a>
                    </h4>
                </div>

                <div class="card-blog-content">
                    <img src="images/pic4.jpg" alt="" />
                    <p>
                        3 days ago
                        <span style="float: right">Written By Alphayo Wakarindi</span>
                    </p>
                    <h4 style="font-weight: bolder">
                        <a href="single-blog.html">Premier League 2021/2022 Fixtures</a>
                    </h4>
                </div>
            </section>
        </main>

        <!-- Main footer -->
        <footer class="main-footer">
            <div>
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
            </div>
            <small>&copy 2021 Alphayo Blog</small>
        </footer>
    </div>

    <!-- Click events to menu and close buttons using javaascript-->
    <script>
        document
            .querySelector(".menuButton")
            .addEventListener("click", function() {
                document.querySelector(".sidebar").style.width = "100%";
                document.querySelector(".sidebar").style.zIndex = "5";
            });

        document
            .querySelector(".closeButton")
            .addEventListener("click", function() {
                document.querySelector(".sidebar").style.width = "0";
            });
    </script>
</body>

</html>
