<h2 style="color:#fff;margin-bottom:10px;"><center>Donor registry form</center></h2>
            <form action="donors.php" method="post">
                <label for="">Firstname</label><br>
                <input type="text" name="fname" placeholder="Enter first name"><br>
                <label for="">Lastname</label><br>
                <input type="text" name="lname" placeholder="Enter last name"><br>
                <label for="">Email</label><br>
                <input type="email" name="email" placeholder="Enter your email"><br>
                <label for="">Date</label><br>
                <input type="date" name="date" id=""><br>
                <input type="radio" name="gender" id="" value="female"><span>Female</span>
                <input type="radio" name="gender" id="" value="male"><span>Male</span>
                <div class="btn">
                    <button type="submit" name="reg">Register</button>
                    <button type="reset">Cancel</button>
                </div>
            </form>
            <?php 
            if (isset($_POST['reg'])) {
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $date = $_POST['date'];
                $gender = $_POST['gender'];
                $sql = "INSERT INTO donors VALUES('','$fname','$lname','$gender','$date','$email','','')";
                $runsql = mysqli_query($con,$sql);
                if ($runsql) {
                    echo "<script>alert('donor inserted')</script>";
                }
                else {
                    echo "<script>alert('donor inserted')</script>";
                }
            }
            ?>