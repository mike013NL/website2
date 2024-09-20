<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Poppins, sans-serif;
        }

        .hero {
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(rgba(12, 3, 51, 0.3), rgba(12, 3, 51, 0.3));
            position: relative;
            padding: 0 5%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        nav {
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(0, 0, 0, 0.5);
            z-index: 100;
        }

        nav .logo {
            width: 60px;
            height: 60px;
            animation: rotate 10s linear infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        nav ul {
            display: flex;
            align-items: center;
        }

        nav ul li {
            list-style: none;
            margin-left: 48px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 17px;
        }

        .content {
            text-align: center;
        }

        .content h1 {
            font-size: 120px;
            color: #fff;
            font-weight: 600;
            transition: 0.5s;
        }

        .content a {
            text-decoration: none;
            display: inline-block;
            color: #fff;
            font-size: 22px;
            border: 2px solid #fff;
            padding: 14px 70px;
            border-radius: 50px;
            margin-top: 20px;
        }

        .content h1:hover {
            -webkit-text-stroke: 2px #fff;
            color: transparent;
        }

        .back-video {
            position: absolute;
            right: 0;
            bottom: 0;
            z-index: -1;
        }

        @media (min-aspect-ratio: 16/9) {
            .back-video {
                width: 100%;
                height: auto;
            }
        }

        @media (max-aspect-ratio: 16/9) {
            .back-video {
                width: auto;
                height: 100%;
            }
        }

        .footer {
            position: absolute;
            width: 103%;
            margin-left: -50px;
            margin-bottom: -300px;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            color: #fff;
            font-size: 14px;
            padding: 10px;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        section {
            background: skyblue;
            padding: 60px 20px;
            text-align: center;
        }

        section h2 {
            font-size: 50px;
            color: #333;
            margin-bottom: 20px;
        }

        section p {
            font-size: 18px;
            color: #666;
            max-width: 800px;
            margin: 0 auto;
        }

        .content h2:hover {
            -webkit-text-stroke: 2px #fff;
            color: transparent;
        }

        .circle img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
        }

        .rotate-link {
            display: inline-block;
            text-decoration: none;
            color: #000;
            transition: transform 0.3s ease;
        }

        .rotate-link:hover {
            transform: rotate(360deg);
        }

        .jump {
            display: inline-block;
            animation: jump 1s infinite;
        }

        @keyframes jump {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes fadeInOut {
            0%, 100% {
                opacity: 0;
                transform: translateY(20px);
            }
            50% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .footer {
            animation: fadeInOut 3s ease-in-out infinite;
        }


        @media only screen and (max-width: 600px) {

            h1 {
                margin-top: 50px;
            }
            .footer{
                margin-bottom: -460px;
                width: auto;
            }
        }
    </style>
</head>
<body>
<div class="hero">
    <video autoplay loop muted playsinline class="back-video">
        <source src="3326928-hd_1920_1080_24fps.mp4" type="video/mp4">
    </video>

    <nav>
        <div class="logo">
            <svg width="60" height="60" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <filter id="whiteFilter">
                        <feColorMatrix type="matrix" values="1 0 0 0 0
                                           0 1 0 0 0
                                           0 0 1 0 0
                                           0 0 0 1 0"/>
                        <feComponentTransfer>
                            <feFuncR type="table" tableValues="1 1"/>
                            <feFuncG type="table" tableValues="1 1"/>
                            <feFuncB type="table" tableValues="1 1"/>
                        </feComponentTransfer>
                    </filter>
                </defs>
                <image href="plane_9634723.png" x="0" y="0" width="60" height="60" filter="url(#whiteFilter)"/>
            </svg>
        </div>
        <ul>
            <li><a href="home.php">HOME</a></li>
            <li><a href="admin.php">GEGEVENSBEHEER</a></li>
        </ul>
    </nav>
    <div class="content">
        <h1>Book a flight</h1>
        <a class="rotate-link" href="#">Explore</a>
    </div>
</div>

<section>
    <span class="jump">
        <h2>Why Choose Us?</h2>
    </span>
    <p>
        <span class="jump">
        We provide the best flight experience with affordable prices and excellent customer service.
        Fly with us to enjoy a seamless and comfortable journey.
        Explore new destinations and make unforgettable memories with us!
            </span>
    </p>
    <div class="footer">
        <span class="footer-text">Alle rechten voorbehouden<span>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const p = document.getElementById("effect");
        const text = p.innerText;
        p.innerHTML = "";

        text.split("").forEach((char, index) => {
            const span = document.createElement("span");
            span.textContent = char;
            span.style.animationDelay = `${index * 0.2}s`;
            p.appendChild(span);
        });
    });



</script>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
</body>
</html>
