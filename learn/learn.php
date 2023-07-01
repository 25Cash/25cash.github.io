<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning</title>
</head>
<body>
    <div class="main">
        <div class="content">
            <?php 
            for ($i=1; $i<10; $i++)
            {   
               for ($j=$i; $j<10; $j++)
                {   
                   echo $j.'&nbsp;';
            
                }
            
                echo "</br>";    
            }
            ?>
            <table width="400px" border="1px" cellspacing="0px">
                <?php
                $value = 0;
          
                for($col = 0; $col < 8; $col++) {
                    echo "<tr>";
                    $value = $col;
          
                    for($row = 0; $row < 8; $row++) {
                        if($value%2 == 0) {
                            echo "<td height=40px width=20px bgcolor=lime></td>";
                            $value++;
                        }
                        else {
                            echo "<td height=40px width=20px bgcolor=white></td>";
                            $value++;
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins';
    }
    .main{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100vh;
        user-select: none;
        background: conic-gradient(pink 0deg,pink 90deg,tomato 90deg,tomato 180deg,dodgerblue 180deg,dodgerblue 270deg,blueviolet 270deg,blueviolet 360deg);
    }
    .content{
        width: 50%;
        height: 60vh;
        background: black;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>