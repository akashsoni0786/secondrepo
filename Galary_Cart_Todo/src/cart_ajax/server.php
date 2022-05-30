<?php 

session_start();

function display()
{
    $th = '<tr style="background-color:#3e9cbf ;color: white;text-align:center;">
        <th style="width: 20%;">Id</th>
        <th style="width: 20%;">Name</th>
        <th style="width: 20%;">Price</th>
       <th style="width: 20%;">Quantity</th>
        <th style="width: 20%;">Action</th>
        </tr>';
    echo $th;
    $t='';
    foreach($_SESSION['addTocart'] as $i)
    {
       
        $t = "<tr style='text-align:center'><td style='max-width:20%'>"
                .$i['id']."</td><td style='max-width:20%'>"
                .$i['pname']."</td><td>"
                .$i['price']."</td><td style='max-width:20%' contenteditable=true>"
                .$i['quantity']."</td>
                <td style='max-width:20%'><a id='delete' href='#'>Delete</a></td></tr>";
                echo $t;
    }
     
}
if(isset($_POST['ids']))
{
    $id = $_POST['ids'];
    $name = $_POST['names'];
    $price = $_POST['prices'];
    $quantity = $_POST['quantites'];
    if(array_key_exists($id,$_SESSION['addTocart'])){
        $_SESSION['addTocart'][$id]['quantity'] = $_SESSION['addTocart'][$id]['quantity'] +1;
        display();
    }
    else{
        $_SESSION['addTocart'][$id] = array('id'=>$id,'pname'=>$name,'price'=>$price,'quantity'=>$quantity);
        display();
    }
    }

    if(isset($_POST['delId']))
    {
        $id = $_POST['delId'];
        unset($_SESSION['addTocart'][$id]);
        display();
    }
?>