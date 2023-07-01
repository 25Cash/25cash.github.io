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
    <div class="container">
        <form method="POST">
            <h1>Calculator</h1>
            <div class="input">
                <input type="number" name="first" id="" placeholder="Enter first digit" required>
            </div>
            <select name="sign" id="">
                <option selected hidden>Select Operator</option>
                <option>+</option>
                <option>-</option>
                <option>*</option>
                <option>/</option>
                <option>%</option>
            </select>
            <div class="input">
                <input type="number" name="second" placeholder="Enter second digit" id="" required>
            </div>
            <div class="btn">
                <button type="submit" name="generate" value="Calculate">Result</button>
            </div>
            <?php 
        if (isset($_POST['generate'])) {
            $a = $_POST['first'];
            $b = $_POST['second'];
            $sign = $_POST['sign'];
            switch ($sign) {
                case "+":
                    $calc = $a+$b;
                    echo "The sum is : $calc";
                    break;
                case "-":
                    $calc = $a-$b;
                    echo "The Difference is : $calc";
                    break;
                case "*":
                    $calc = $a*$b;
                    echo "The Product is : $calc";
                    break;
                case "/":
                    $calc = $a/$b;
                    echo "The Quotient is : $calc";
                    break;
                case "%":
                    $calc = $a%$b;
                    echo "The Remainder is : $calc";
                    break;
                default:
                    echo "Enter a valid sign";
                    break;
            }
        }
        ?>
        </form>
        </div>
</body>
</html>

<style>
    *{
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: Poppins;
    }
    .container{
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    body{  
        background: #2073c00a;
    }
    h1{
        text-align: center;
    }
    .container form{
        padding: 20px;
        width: 400px;
        border-radius: 5px;
        flex-direction: column;
        display: flex;
        font-weight: bold;
        row-gap: 10px;
        color: #185894;
        box-shadow: 0px 5px 18px rgba(0, 0, 0, 0.1)
    }
    form input{
        padding: 5px 8px;
        outline: none;
        width: 100%;
        border: 1px solid #185894;
        border-radius: 4px;
    }
    form select{
        width: 50%;
        padding: 5px;
        border: 1px solid #185894;
        color: #185894;
        border-radius: 4px;
        outline: none;
        text-align: center;
    }
    form input[type="number"]::-webkit-inner-spin-button{
        display: none;
    }
    .btn{
        display: flex;
        justify-content: center;
        margin: 5px 0;
    }
    .btn button{
        padding: 6px 15px;
        width: 50%;
        cursor: pointer;
        border: 1px solid #185894;
        border-radius: 25px;
        background: #185894;
        color: #fff;
    }
</style>