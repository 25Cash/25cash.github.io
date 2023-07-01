<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Days</title>
</head>
<body>
    <div class="conic"><form method="POST">
        <center><h3>Day of week</h3></center>
        <input type="number" class="day" name="day" placeholder="Enter day of week">
        <input type="submit" class="btn" name="generate" value="Name of day">
        <?php 
        if (isset($_POST['generate'])) {
            $day = $_POST['day'];
            if (!empty($day)) {
                if ($day == 1) {
                    echo '<p style="margin: 10px 0 0 20px; font-size: 18px;">Monday</p>';
                }
                else if ($day == 2) {
                    echo '<p style="margin: 10px 0 0 20px; font-size: 18px;">Tuesday</p>';
                }
                else if ($day == 3) {
                    echo '<p style="margin: 10px 0 0 20px; font-size: 18px;">Wednesday</p>';
                }
                else if ($day == 4) {
                    echo '<p style="margin: 10px 0 0 20px; font-size: 18px;">Thursday</p>';
                }
                else if ($day == 5) {
                    echo '<p style="margin: 10px 0 0 20px; font-size: 18px;">Friday</p>';
                }
                else if ($day == 6) {
                    echo '<p style="margin: 10px 0 0 20px; font-size: 18px;">Saturday</p>';
                }
                else if ($day ==7){
                    echo '<p style="margin: 10px 0 0 20px; font-size: 18px;">sunday</p>';
                }
                else {
                    echo '<p style="margin: 10px 0 0 20px; font-size: 18px;color: #f00;">Enter a valid day of a week</p>';
                }
            }
            else {
                echo '<p style="margin: 10px 0 0 20px; font-size: 18px;color: #f00;">Please Enter a day</p>';
            }
        }
        ?>
    </form>
</div>
</body>
</html>




