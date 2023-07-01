<?php 
include 'conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/courses.css">
    <title>Favorites</title>
</head>
<body>
    <div class="main">
        <div class="top">
            <h1>E-learning</h1>
        </div>
        <form class="bottom" method="POST">
            <span>Choose your domain from below</span>
            <div class="domains">
                <label for="#" id="sod" value="Software development" name="sod">Software development</label>
                <label for="#" id="coa" value="computer app" name="coa">Computer application</label>
                <label for="#" id="cst" value="computer sy" name="csy">Computer system</label>
                <label for="#" id="mas" value="maso" name="mas">Masonry</label>
                <label for="#" id="rct" value="road" name="rct">Road construction</label>
            </div>
            <div class="title" id="demo"><h2>Choose courses you like from below</h2></div>
            <div class="courses">
                <div class="software">
                    <?php 
                        $sod = mysqli_query($con,"SELECT * FROM courses WHERE domain='software development'");
                        if (mysqli_num_rows($sod) > 0) {
                            while ($fetch_software = mysqli_fetch_assoc($sod)) {
                    ?>
                    <div class="choice">
                        <label id="sof"><?=$fetch_software['course_name']?>&nbsp;&nbsp;<input type="checkbox" name="course" id="sof" value="<?=$fetch_software['course_name'];?>"></label>
                    </div>
                    <?php 
                } 
                }
                else {
                    echo "<span class='msg'>There aren't any courses yet.</span>";
                }
                ?>
                </div>
                <div class="capp">
                    <?php 
                        $coa = mysqli_query($con,"SELECT * FROM courses WHERE domain='computer application'");
                        if (mysqli_num_rows($coa) > 0) {
                            while ($fetch_computer_application = mysqli_fetch_assoc($coa)) {
                    ?>
                    <div class="choice">
                        <label id="cap"><?=$fetch_computer_application['course_name']?>&nbsp;&nbsp;<input type="checkbox" name="course" id="cap" value="<?=$fetch_computer_application['course_name']?>"></label>
                    </div>
                    <?php 
                } 
                }
                else {
                    echo "<span class='msg'>There aren't any courses yet.</span>";
                }
                ?>
                </div>
                <div class="cst">
                    <?php 
                        $csy = mysqli_query($con,"SELECT * FROM courses WHERE domain='computer system'");
                        if (mysqli_num_rows($csy) > 0) {
                            while ($fetch_computer_system = mysqli_fetch_assoc($csy)) {
                    ?>
                    <div class="choice">
                        <label id="syst"><?=$fetch_computer_system['course_name']?>&nbsp;&nbsp;<input type="checkbox" name="course" id="syst" value="troubleshooting"></label>
                    </div>
                    <?php 
                } 
                }
                else {
                    echo "<span class='msg'>There aren't any courses yet.</span>";
                }
                ?>
                </div>
                <div class="mas">
                    <?php 
                        $mas = mysqli_query($con,"SELECT * FROM courses WHERE domain='masonry'");
                        if (mysqli_num_rows($mas) > 0) {
                            while ($fetch_masonry = mysqli_fetch_assoc($mas)) {
                    ?>
                    <div class="choice">
                        <label id="maso"><?=$fetch_masonry['course_name']?>&nbsp;&nbsp;<input type="checkbox" name="course" id="maso" value="workshop"></label>
                    </div>
                    <?php 
                    } 
                }
                else {
                    echo "<span class='msg'>There aren't any courses yet.</span>";
                }
                ?>
                </div>
                <div class="rct">
                    <?php 
                        $rct = mysqli_query($con,"SELECT * FROM courses WHERE domain='road_construction'");
                        if (mysqli_num_rows($rct) > 0) {
                            while ($fetch_road_construction = mysqli_fetch_assoc($rct)) {
                    ?>
                    <div class="choice">
                        <label id="dra"><?=$fetch_road_construction['course_name']?>&nbsp;&nbsp;<input type="checkbox" name="course" id="dra" value="drainage"></label>
                    </div>
                    <?php 
                } 
                }
                else {
                    echo "<span class='msg'>There aren't any courses yet.</span>";
                }
                ?>
                </div>
            </div>
            <script>
                let soft =  document.querySelector('.software');
                let coa =  document.querySelector('.capp');
                let cst =  document.querySelector('.cst');
                let mas =  document.querySelector('.mas');
                let rct =  document.querySelector('.rct');
                let title = document.querySelector('#demo');
                let sod = document.querySelector('#sod').addEventListener('click',()=>{
                    soft.classList.toggle('active');
                    coa.classList.remove('active');
                    cst.classList.remove('active');
                    mas.classList.remove('active');
                    rct.classList.remove('active');
                    title.innerHTML = "Software Development courses";
                });
                let computerapplication = document.querySelector('#coa').addEventListener('click',()=>{
                    soft.classList.remove('active');
                    coa.classList.toggle('active');
                    cst.classList.remove('active');
                    mas.classList.remove('active');
                    rct.classList.remove('active');
                    title.innerHTML = "Computer application courses";
                });
                let computer_system = document.querySelector('#cst').addEventListener('click',()=>{
                    soft.classList.remove('active');
                    coa.classList.remove('active');
                    cst.classList.toggle('active');
                    mas.classList.remove('active');
                    rct.classList.remove('active');
                    title.innerHTML = "Computer System courses";
                });
                let masonry = document.querySelector('#mas').addEventListener('click',()=>{
                    soft.classList.remove('active');
                    coa.classList.remove('active');
                    cst.classList.remove('active');
                    mas.classList.toggle('active');
                    rct.classList.remove('active');
                    title.innerHTML = "Masonry courses";
                });
                let road = document.querySelector('#rct').addEventListener('click',()=>{
                    soft.classList.remove('active');
                    coa.classList.remove('active');
                    cst.classList.remove('active');
                    mas.classList.remove('active');
                    rct.classList.toggle('active');
                    title.innerHTML = "Road constuction courses";
                });
            </script>
            <div class="top">
                <button name="submit">Continue</button>
                <a href="course.html?mod=<?=$_GET['id']?>" class="skip">Skip</a>
                <?php 
                if (isset($_POST['submit'])) {
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $courseName = $_POST['course'];
                        $fetch_id = mysqli_query($con,"SELECT id FROM courses WHERE course_name='$courseName'");
                        if (mysqli_num_rows($fetch_id) > 0) {
                            $fetch = mysqli_fetch_assoc($fetch_id);
                            $fetched_id = $fetch['id'];
                            $updateUsers = mysqli_query($con,"UPDATE users SET course_id='$fetched_id' WHERE id='$id'");
                            if ($updateUsers) {
                                echo "<script>alert('success')</script>";
                            }else{
                                echo "<script>alert('failed')</script>";
                            }
                        }
                    }
                }
                ?>
        </form>
        </div>
    </div>
</body>
</html>