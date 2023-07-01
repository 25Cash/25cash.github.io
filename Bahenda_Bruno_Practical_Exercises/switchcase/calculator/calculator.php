<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="calculator.css">
    <title>Calculator</title>
</head>
<body>
    <form method="POST">
        <center><h3>Calculator</h3></center>
        <div class="input">
            <input type="number" name="first" id="" placeholder="Enter first digit" required>
        </div>
        <select name="sign" id="">
            <option selected hidden>Select an operator</option>
            <option>+</option>
            <option>-</option>
            <option>*</option>
            <option>/</option>
            <option>%</option>
        </select>
        <div class="input">
            <input type="number" name="second" placeholder="Enter second digit" id="" required>
        </div>
        <input type="submit" name="generate" value="Calculate">
        <?php 
    if (isset($_POST['generate'])) {
        $a = $_POST['first'];
        $b = $_POST['second'];
        $sign = $_POST['sign'];
        switch ($sign) {
            case "+":
                $calc = $a+$b;
                echo '<p style="margin-left:50px">The sum is : '.$calc.'</p>';
                break;
            case "-":
                $calc = $a-$b;
                echo '<p style="margin-left:50px">The difference is : '.$calc.'</p>';
                break;
            case "*":
                $calc = $a*$b;
                echo '<p style="margin-left:50px">The product is : '.$calc.'</p>';
                break;
            case "/":
                $calc = $a/$b;
                echo '<p style="margin-left:50px">The quotient is : '.$calc.'</p>';
                break;
            case "%":
                $calc = $a%$b;
                echo '<p style="margin-left:50px">The remainder is :'.$calc.'</p>';
                break;
            default:
                echo '<p style="margin-left:50px">Enter a valid sign</p>';
                break;
        }
    }
    ?>
    </form>
</body>
</html>