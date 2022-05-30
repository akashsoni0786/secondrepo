<?php

if(isset($_GET['operator']))
{
    $length = $_GET["number1"];
    $width = $_GET["number2"];
    if(is_numeric($length) && is_numeric($width)){
        $area = $length * $width;
        $perimeter =2*($length + $width);
    }
    else{
        echo "<p style='color:red'>Please enter value!</p><br>";
        $area = 0;
        $perimeter = 0;
    }
}
else
{
    $area = 0;
    $perimeter = 0;
}

?>

<form action="" method="GET">
    <table>
        <tr><td>Length: </td>
        <td><input type="number" id="n1" name="number1"></td></tr>
        <tr><td>Width:</td>
        <td><input type="number" id="n2" name="number2"></td></tr>
    </table>
    <table><tr><button name="operator" onclick="calc()" value="area">Calculate</button></tr></table>
</form> 
<br><br>

<p><span>Area &nbsp;</span><span><?php echo $area;?></span></p>
<p><span>Perimeter &nbsp;</span><span><?php echo $perimeter;?></span></p>

<script>
    function calc(){
        n1 = document.getElementById('n1').value;
        n2 = document.getElementById('n2').value;

    if(isNaN(n1) || isNaN(n2))
    {
        alert("Please enter integer");
    }
    if(n1=='' || n2=='')
    {
        alert('Field is empty');
    }
    }
    

</script>