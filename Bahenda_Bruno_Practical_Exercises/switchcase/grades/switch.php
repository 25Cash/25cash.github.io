<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="switch.css">
    <title>Grades</title>
</head>
<body>
    <form method="POST">
        <input type="number" class="grade" name="grade" id="" placeholder="Enter your grades">
        <input type="submit" class="generate" value="result" name="generate">
    </form>
    <div class="bubble">,.</div>
    <div class="second">,.</div><?php 
        if (isset($_POST['generate'])) {
            $grade = $_POST['grade'];
            if (!empty($grade)) {
                switch ($grade) {
                    case $grade <= 100 && $grade >= 80:
                        echo '<script>alert("A")</script>';
                        break;
                    case $grade <= 79 && $grade >= 70:
                        echo '<script>alert("B")</script>';
                        break;
                    case $grade <= 69 && $grade >= 60:
                        echo '<script>alert("C")</script>';
                        break;
                    
                    case $grade <= 59 && $grade >= 50:
                        echo '<script>alert("D")</script>';
                        break;
                    
                    case $grade <= 49 && $grade >= 0:
                        echo '<script>alert("F")</script>';
                        break;
                    default:
                        echo '<p style="margin: 10px 0 0 20px; font-size: 18px;">What are your grades</p>';
                        break;
                }
            }
            else{
                echo '<p style="margin: 10px 0 0 20px; font-size: 18px;">Enter your grades</p>';
            }
        }
        ?>
</body>
</html>