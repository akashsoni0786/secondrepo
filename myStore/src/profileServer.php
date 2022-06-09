<?php
session_start();
include 'connection.php';
$id = $_SESSION['id'];
if(isset($_POST['info']))
{
  $link='';
  $tag='';
  if($_SESSION['id'] == 111){
    $link = 'dashboard.php';
    $tag = '@admin';
  }
  else{
    $link = 'index.php';
    $tag = '@customer';
  }
    try 
    {

      $sql = "SELECT `user_id`, `firstname`, `lastname`, `email`, `address`, `pincode`
                FROM `Users` where `user_id` = '$id' ;";


        $values = $conn->query($sql);
        $row=$values->fetchAll(PDO::FETCH_ASSOC);
        // echo json_encode($row);
        foreach($row as $key => $val)
        {
            echo '<h4 class="mb-2">'.$val['firstname'].' '.$val['lastname'].'</h4>
                    <p class="text-muted mb-4">'.$tag.' <span class="mx-2">|</span> <a
                    href="#!">'.$val['email'].'</a></p>
                    <div class="mb-4 pb-2">
                    <button type="button" class="btn btn-outline-primary btn-floating">
                    <a href="https://www.facebook.com/campaign/">
                    <i class="fab fa-facebook-f fa-lg"></i></a>
                    </button>
                    <button type="button" class="btn btn-outline-primary btn-floating">
                    <i class="fab fa-twitter fa-lg"></i>
                    </button>
                    <button type="button" class="btn btn-outline-primary btn-floating">
                    <i class="fab fa-skype fa-lg"></i>
                    </button>
                    </div><a href="'.$link.'">
                    <button  type="button" class="btn btn-primary btn-rounded btn-lg">
                    <a href="'.$link.'" 
                    
                    class="text-light" style="text-decoration:none">Go to home page</a>    
                    </button></a>
                    <div class="d-flex justify-content-between text-center mt-5 mb-2">
                    <div>
                    <p class="mb-2 h5">8471</p>
                    <p class="text-muted mb-0">Wallets Balance</p>
                    </div>
                    <div class="px-3">
                    <p class="mb-2 h5">8512</p>
                    <p class="text-muted mb-0">Income amounts</p>
                    </div>
                    <div>
                    <p class="mb-2 h5">4751</p>
                    <p class="text-muted mb-0">Total Transactions</p>
                    </div>
                    </div>';
        }
    } 
    catch(PDOException $e) 
    {
      echo "Connection failed: " . $e->getMessage();
    }
}

?>
