<?php
session_start();

class AddToCart
{
    public $id;
    public $name;
    public $price;
    public $quantity=1;

    function __construct($id,$name,$price,$quantity) 
      {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
      }
  
}

class ArrayOfCart{
 
    public function addToCart($object)
    {
        if(array_key_exists($object->id,$_SESSION['productArray']))
        {
            $_SESSION['productArray'][$object->id]->quantity = $_SESSION['productArray'][$object->id]->quantity +1;
        }
        else
        {
            $_SESSION['productArray'][$object->id] =$object;
        }
    }
    public function display()
    {
        foreach($_SESSION['productArray']  as $key => $val)
        {
            echo '<tr style="text-align:center"><td>'.$val->id.'</td><td>'.$val->name.'</td><td>'.$val->price.'</td><td>'.$val->quantity.'</td><td><button id="deleteRow">Delete</button></td></tr>';
            
    }
    }
}

if(isset($_POST['ids'])){
    $id = $_POST['ids'];
    $pnam = $_POST['names'];
    $pric = $_POST['prices'];
    $quan = $_POST['quant'];
    $product = new AddToCart($id,$pnam,$pric,$quan);
    $cart = new ArrayOfCart();
    $cart->addToCart($product);
    $cart->display();
}



if(isset($_POST['delvalue']))
{
    $id = $_POST['delvalue'];
    unset($_SESSION['productArray'][$id]);
    $cart = new ArrayOfCart();
    $cart->display();
}
?>