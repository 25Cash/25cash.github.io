<?php 
session_start();
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="fontsawesome/all.min.css">
    <link rel="stylesheet" href="fontsawesome/fontawesome.min.css">
    <link rel="shortcut icon" href="img/faceboo.png">
    <title>Facebook</title>
</head>
<body>
    <div class="main">
        <div class="navigator">
            <div class="search">
                <i class="fa-brands fa-facebook"></i>
                <input type="text" name="" id="" placeholder="Search Facebook">
            </div>
            <div class="icons">
                <a href="home.html"><i class="fa-solid fa-house"></i></a>
                <a href="friends.html"><i class="fa-solid fa-people-roof"></i></a>
                <a href="video.html"><i class="fa-solid fa-video"></i></a>
                <a href="groups.html"><i class="fa-solid fa-people-group"></i></a>
                <a href="games.html"><i class="fa-solid fa-gamepad"></i></a>
            </div>
            <div class="right">
                <i class="fa-sharp fa-solid fa-bars" id="bars"></i>
                <i class="fa-solid fa-message" id="msg"></i><sup>3</sup>
                <i class="fa-solid fa-bell" id="bell"></i><sup class="bell">3</sup>
                <img src="img/pexels-rakicevic-nenad-1274260.jpg" alt="">
            </div>
        </div>
        <div class="zucker">
            <div class="left-nav">
                <div class="choices">
                    <div class="mini-navs">
                        <a href="#"><img src="./img/pexels-rakicevic-nenad-1274260.jpg" alt=""></a>
                        <a href=""><?php echo $_SESSION['username'];?></a>
                    </div>
                    <div class="mini-nav">
                        <a href="#"><i class="fa-solid fa-people-group" style="color : #1586f7"></i></a>
                        <a href="">Find friends</a>
                    </div>
                    <div class="mini-nav">
                        <a href="#"><i class="fa-solid fa-clock" style="color : #1586f7"></i></a>
                        <a href="">Most Recent</a>
                    </div>
                    <div class="mini-nav">
                        <a href="#"><i class="fa-solid fa-user-group" style="color : #1586f7"></i></a>
                        <a href="">Groups</a>
                    </div>
                    <div class="mini-nav">
                        <a href="#"><i class="fa-solid fa-video" style="color : #1586f7"></i></a>
                        <a href="">Watch</a>
                    </div>
                    <div class="mini-nav">
                        <a href="#"><i class="fa-solid fa-clock" style="color : #1586f7"></i></a>
                        <a href="">Memories</a>
                    </div>
                    <div class="mini-nav">
                        <a href="#"><i class="fa-sharp fa-solid fa-bookmark" style="color : violet"></i></a>
                        <a href="">Saved</a>
                    </div>
                    <div class="mini-nav">
                        <a href="#"><i class="fa-solid fa-folder" style="color : #000"></i></a>
                        <a href="">Events</a>
                    </div>
                    <div class="mini-nav">
                        <a href="#"><i class="fa-solid fa-flag" style="color : orangered"></i></a>
                        <a href="">Pages</a>
                    </div>
                    <div class="mini-nav">
                        <a href="#"><i class="fa-solid fa-star" style="color : yellow"></i></a>
                        <a href="">Favorites</a>
                    </div>
                    <div class="mini-nav">
                        <a href="#"><i class="fa-solid fa-level-up" style="color : #1586f7"></i></a>
                        <a href="">Ads Manager</a>
                    </div>
                    <!-- 
                     -->
                </div>
            </div>
            <!-------------center------------>

            <div class="center">
                <div class="stories">
                    <div class="top">
                        <div class="links">
                        <a href="#"><i class="fa-sharp fa-solid fa-book-open"></i>&nbsp;Stories</a>
                        <a href="#"><i class="fa-sharp fa-solid fa-tv"></i>&nbsp;Reels</a>
                        </div>
                        <hr>
                        <div class="picture" id="picture">
                            <div class="left">
                                <img src="img/pexels-rakicevic-nenad-1274260.jpg" alt="">
                                <i class="fa-sharp fa-solid fa-plus"></i>
                                <p>Create story</p>
                            </div>
                            <div class="right">
                                <p><i class="fa-sharp fa-solid fa-comment"></i>&nbsp;Share everyday moments with friends and family.</p>
                                <p><i class="fa-sharp fa-solid fa-comment"></i>&nbsp;Stories disappear after 24 hours.</p>
                                <p><i class="fa-sharp fa-solid fa-comment"></i>&nbsp;Repliesand reactions are private.</p>
                                <span><i class="fa-sharp fa-solid fa-angle-right"></i></span>
                            </div>
                        </div>
                        <div class="reels" id="reels">
                            <div class="left">
                                <img src="img/pexels-rakicevic-nenad-1274260.jpg" alt="">
                                <i class="fa-sharp fa-solid fa-plus"></i>
                                <p>Create reel</p>
                            </div>
                            <div class="right">
                                <p><i class="fa-sharp fa-solid fa-comment"></i>&nbsp;Share everyday moments with friends and family.</p>
                                <p><i class="fa-sharp fa-solid fa-comment"></i>&nbsp;Share reels everyday with your friends.</p>
                                <p><i class="fa-sharp fa-solid fa-comment"></i>&nbsp;Replies and reactions are private.</p>
                                <span><i class="fa-sharp fa-solid fa-angle-right"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="remember">
                    <img src="/img/lo.jpg" alt="">
                    <i class="fa fa-multiply" id="close"></i>
                    <div class="bottom">
                        <h3>Remember Password</h3>
                        <p>Next time you log in on this browser, just click your profile picture instead of typing a password.</p>
                        <button type="submit" class="ok">OK</button>
                        <button type="reset" class="cancel">Not Now</button>
                    </div>
                </div>
                <div class="mind">
                    <div class="top">
                        <img src="img/pexels-rakicevic-nenad-1274260.jpg" alt="">
                        <input type="text" name="" id="" placeholder="What's on your mind, Precious?">
                        <hr>
                        <div class="bottom">
                            <p><i class="fa-solid fa-video"></i>Live video</p>
                            <p><i class="fa-solid fa-video"></i>Photo/video</p>
                            <p><i class="fa-solid fa-video"></i>Feeling/activity</p>
                        </div>
                    </div>
                </div>
                <div class="post">
                    <p class="suggest">suggested for you</p>
                    <hr>
                    <div class="holder">
                        <div class="up">
                            <img src="img/pexels-rakicevic-nenad-1274260.jpg" alt="" draggable="false">
                            <h4>Dgungu Mike</h4>
                            <span>February 14 at 6:49 PM .</span>
                            <i class="fa-sharp fa-solid fa-ellipsis"></i>
                            <i class="fa fa-multiply" id="close"></i>
                            <p>The hunter will be hunted</p>
                        </div>
                        <div class="middle">
                            <img src="img/pexels-eberhard-grossgasteiger-1366907.jpg" alt="" draggable="false">
                        </div>
                        <div class="down">
                            <p class="likes"><i class="fa-regular fa-thumbs-up"></i>&nbsp;168k</p>
                            <p class="comment">9.1k&nbsp;<i class="fa-regular fa-message"></i></p>
                            <p class="share">6.4k&nbsp;<i class="fa-solid fa-share"></i></p>
                            <hr>
                            <p class="likee"><i class="fa-regular fa-thumbs-up"></i>&nbsp;Like</p>
                            <p class="commentt"><i class="fa-regular fa-message"></i>&nbsp;Comment</p>
                            <p class="sharee"><i class="fa-solid fa-share"></i>&nbsp;Share</p>
                        </div>
                    </div>
                </div>
                <div class="people">
                    <div class="description">
                        <p>People You May Know</p>
                        <i class="fa-sharp fa-solid fa-ellipsis"></i>
                    </div>



                    <!-------------------------------------------
                        div slider
                    --------------------------------------------->
                <div class="profiles">
                    <div class="card-holder">
                        <div class="card">
                            <div class="image-holder">
                               <img src="img/pexels-jill-evans-15228124.jpg"> 
                            </div>
                            <div class="card-content">
                                <h6>Hitler w'irwanda</h6>
                                <p>8 mutual friends</p>
                                <button><i class="fa-solid fa-user-plus"></i> Add friend</button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="image-holder">
                               <img src="img/pexels-anthony-nguyen-7305714.jpg"> 
                            </div>
                            <div class="card-content">
                                <h6>Semali official</h6>
                                <p>5 mutual friends</p>
                                <button><i class="fa-solid fa-user-plus"></i> Add friend</button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="image-holder">
                               <img src="img/pexels-misael-garcia-1707820.jpg"> 
                            </div>
                            <div class="card-content">
                                <h6>Umusaza the 1st</h6>
                                <p>10 mutual friends</p>
                                <button><i class="fa-solid fa-user-plus"></i> Add friend</button>
                            </div>
                        </div>
                    </div>
                </div>

                    
               


                    <!-------------------------------------------
                        div slider
                    --------------------------------------------->


                    <div class="see">
                        <p><a href="">see all</a></p>
                    </div>
                </div>
            </div>
            <!------------right------------>
        </div>
        
<div class="right-nav">
    <div class="contents">
        <div class="sponsored">
            <h4>Sponsored</h4>
            <div class="images">
                <img src="img/pexels-rakicevic-nenad-1274260.jpg" alt="">
                <h5>DROP 1</h5>
                <p>triangl.com</p>
            </div>
            <div class="images">
                <img src="img/pexels-rakicevic-nenad-1274260.jpg" alt="">
                <h5>Study engineering in france</h5>
                <p>engineering.ecamlasalle.com</p>
            </div>
        </div>
            <hr>
            <div class="friend-request">
                <h5>Friend requests</h5>
                <a href="#">See all</a>
                <div class="friends">
                    <img src="./img/pexels-rakicevic-nenad-1274260.jpg" alt="">
                    <div class="buttons">
                        <h5>Nol Arnold</h5>
                        <p>2W <i class="fa-sharp fa-solid fa-circle"></i></p>
                        <button type="submit" class="confirm">Confirm</button>
                        <button type="submit" class="delete">Delete</button>
                    </div>
                </div>
            </div>
            <hr>
            <div class="chats">
                <div class="title">
                    <h5>Contacts</h5>
                    <div class="icons">
                        <i class="fa-sharp fa-solid fa-video"></i>
                        <i class="fa-solid fa-search"></i>
                        <i class="fa-sharp fa-solid fa-ellipsis"></i>
                    </div>
                </div>
                    <div class="chatting">
                        <img src="./img/pexels-rakicevic-nenad-1274260.jpg" alt="">
                        <a href="#">Meghan Mcp</a>
                        <img src="./img/pexels-rakicevic-nenad-1274260.jpg" alt="">
                        <a href="#">Mwiza Peace</a>
                        <img src="./img/pexels-rakicevic-nenad-1274260.jpg" alt="">
                        <a href="#">Bahenda Bruno</a>
                    </div>
            </div>
    </div>
</div>
        </div>
    </div>
</body>
</html>

<style>
  
</style>