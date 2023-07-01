<?php 
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/themify-icons/themify-icons.css">
    <title>Welcome to newziller</title>
</head>
<body>
    <div class="main">
        <div class="divs" id="home">
            <div class="top">
                <h3>NEWZILLER.</h3>
                <nav>
                    <a href="#home">Home</a>
                    <a href="#read">Read news</a>
                    <a href="auth/account.php">Login</a>
                    <!-- <a href="#footer">About us</a> -->
                    <a href="#contact">Contact us</a>
                </nav>
            </div>
            <div class="body">
                <div class="center">
                    <h2>Welcome to newziller homepage</h2>
                    <p>Newziller provides you the most trusted news from different corners off the world, so click the button to create an account or login if you already have an account and start reading news for free you can also, like, and comment on our contents.</p>
                    <div class="search">
                    <input type="text" name="" id="" placeholder="Search any news here....">
                    <label for="#"><i class="ti-search"></i></label>
                    </div>
                    <a href="#">Get started <i class="ti-angle-right"></i></a>
                </div>
            </div>
        </div>


        <div class="divs" id="read">
            <h1>Some off our latest upoladed contents.</h1>
            <div class="body">
                <div class="news">
                    <img src="assets/imgs/pexels-tima-miroshnichenko-5380651.jpg" alt="">
                    <div class="description">
                        <span>news 1</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi totam hic impedit ducimus.</p>
                    </div>
                </div>
                <div class="news">
                    <img src="assets/imgs/pexels-beyzaa-yurtkuran-15419725.jpg" alt="">
                    <div class="description">
                        <span>news 2</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi totam hic impedit ducimus.</p>
                    </div>
                </div>
                <div class="news">
                    <img src="assets/imgs/pexels-markus-spiske-2004161.jpg" alt="">
                    <div class="description">
                        <span>news 3</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi totam hic impedit ducimus.</p>
                    </div>
                </div>
                <div class="news">
                    <img src="assets/imgs/pexels-anni-roenkae-2832382.jpg" alt="">
                    <div class="description">
                        <span>news 4</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi totam hic impedit ducimus.</p>
                    </div>
                </div>
            </div>
            <span><a href="#">Read more news>>>>></a></span>
        </div>
        
        <div class="divs" id="contact">
        <div class="form">
            <h1>Get in touch</h1>
            <input type="text" name="" id="fname" placeholder="Firstname" autocomplete="none">
            <input type="text" name="" id="lname" placeholder="Lastname" autocomplete="none">
            <input type="email" name="" id="mail" placeholder="E-mail" autocomplete="none">
            <input type="number" name="" id="phone" placeholder="Phone" autocomplete="none">
            <input type="text" name="" id="address" placeholder="Address" autocomplete="none">
            <textarea name="" id="comment" placeholder="Type your message here" autocomplete="none"></textarea>
            <button>Submit</button>
            <p></p>
        </div>
        </div>
        <div class="footer" id="footer">
            <div class="types">
                <span>Type of news we provide :</span>
                <a href="#">> Entertainment</a>
                <a href="#">> Advertisment</a>
                <a href="#">> Blogs</a>
                <a href="#">> Music</a>
                <a href="#">> Movies</a>
                <a href="#">> Anime & cartoon</a>
                <a href="#">> Sports & Fashion</a>
                <a href="#">> Foods and drinks</a>
            </div>
            <div class="types">
                <span>Our social medias :</span>
                <a href="#"><i class="ti-instagram"></i> Instagram</a>
                <a href="#"><i class="ti-facebook"></i> Facebook</a>
                <a href="#"><i class="ti-google"></i> Google</a>
                <a href="#"><i class="ti-twitter"></i> Twitter</a>
                <a href="#"><i class="ti-skype"></i> Skype</a>
                <a href="#"><i class="ti-github"></i> Github</a>
                <a href="#"><i class="ti-youtube"></i> Youtube</a>
                <a href="#"><i class="ti-pinterest"></i> Pinterest</a>
            </div>
            <div class="types">
                <span>Copyright &copy; Bahenda bruno.</span>
            </div>
        </div>
    </div>
</body>
</html>