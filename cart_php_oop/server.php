<?php
session_start();
if(!isset($_SESSION['productArray'])){
$_SESSION['productArray'] = array();}

class AddToCart
{
    public $id;
    public $name;
    public $price;
    public $quantity=0;

    function __construct($id,$name,$price,$quantity) 
      {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
      }
  
}

class ArrayOfCart{
 
    public function addToCart($object){
        // array_push($_SESSION['productArray'] ,$object);
        if(array_key_exists($object->id,$_SESSION['productArray']))
        {

        }
        else
        {
            $_SESSION['productArray'][$object->id] =$object;
        }
    }
    public function display(){
        foreach($_SESSION['productArray']  as $key => $val){
            echo '<tr style="text-align:center"><td>'.$val->id.'</td><td>'.$val->name.'</td><td>'.$val->price.'</td><td>'.$val->quantity.'</td><td><a href="#" id="deleteRow">Delete</a></td></tr>';
            
    }
    }
}

if(isset($_POST['ids'])){
    $id = $_POST['ids'];
    $pnam = $_POST['names'];
    $pric = $_POST['prices'];
    $quan = $_POST['quant'];
    $product = new AddToCart($id,$pnam,$pric,$quan);
    // echo   $product->get_id()." ".$product->get_name().' '.$product->get_price();
    $cart = new ArrayOfCart();
    $cart->addToCart($product);
    $cart->display();
}
?>