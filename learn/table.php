<table width="500px" border="1px" cellspacing="0px">
<?php 
$value = 0;
for ($col=0; $col < 10;$col++) { 
    $value = $col;
    echo '<tr>';
    for ($row=0; $row < 10; $row++) { 
        if ($value%2 == 0) {
            echo '<td bgcolor="black" height=40px width=20px></td>';
            $value++;
        }
        else {
            echo '<td bgcolor="white" height=40px width=20px></td>';
            $value++;
        }
    }
    echo '</tr>';
}
?>
</table>