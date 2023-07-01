<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Nested if</title>
</head>
<body>
    <div class="main"><form method="POST">
        <center><h3>Dormitory</h3></center>
        <select name="gender" id="">
            <option selected hidden>Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <select name="degree">
            <option selected hidden>Degree</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
        </select>
        <button type="submit" name="generate">Submit</button>
        <?php 
        if (isset($_POST['generate'])) {
            $gender = $_POST['gender'];
            $degree = $_POST['degree'];
            if ($gender == 'Female') {
                if ($degree == 1) {
                    echo 'Your request has been approved';
                }
                else{
                    echo 'Your request has been declined';
                }
            }
            else{
                echo 'Males are not allowed';
            }
        }
        ?>
    </form>
</div>
</body>
</html>