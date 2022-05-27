<?php
session_start();
function display(){
    $count=0;
    foreach($_SESSION['addTocart'] as $i)
    {
        $row = '<tr style="text-align:center">
                <td>'.$i['id'].'</td>
                <td>'.$i['name'].'</td>
                <td>'.$i['price'].'</td>
                <td>'.$i['quantity'].'</td>
                <td id="deleteId" name="deleteName"><a href="#">Delete</a></td>
                </tr>';
                
        $_SESSION['rows'][$count] = $row;
        $count++;
    }
}
if(isset($_GET['cartId']))
{
    $cId = $_GET['cartId'];
    $cName = $_GET['cartName'];
    $cPrice = $_GET['cartPrice'];
    $cQuantity = 1;
    $cIndex = $_GET['indexes'];
    if(array_key_exists($cIndex,$_SESSION['addTocart']))
    {
        // $index = array_search($id, array_column($_SESSION['addTocart'], 'id'));
        $x= $_SESSION['addTocart'][$cIndex]['quantity'];
         $x = $x +1;
        $rowVal = array('id'=>$cId,'name'=>$cName,'price'=>$cPrice,'quantity'=>$x);
        $_SESSION['addTocart'][$cIndex]=$rowVal;
        display();
        
    }
    else{
        $rowVal = array('id'=>$cId,'name'=>$cName,'price'=>$cPrice,'quantity'=>$cQuantity);
        $_SESSION['addTocart'][$cIndex]=$rowVal;
        display();
    }
}
if(isset($_GET['delId']))
{
    $id= $_GET['delId'];
    $index = array_search($id, array_column($_SESSION['addTocart'], 'id'));
    array_splice($_SESSION['addTocart'],$index,1);
    array_splice($_SESSION['rows'],0);
    display();
}
header('location: ./products.php');
?>