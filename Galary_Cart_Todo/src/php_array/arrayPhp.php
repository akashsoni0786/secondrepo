<?php
$products = array(

    "Electronics" => array(
  
      "Television" => array(
        array(
        "id" => "PR001",
        "name" => "MAX-001",
        "brand" => "Samsung"
        ),
        array(
        "id" => "PR002",
        "name" => "BIG-301",
        "brand" => "Bravia"
        ),
        array(
        "id" => "PR003",
        "name" => "APL-02",
        "brand" => "Apple"
        )
      ),
      "Mobile" => array(
        array(
        "id" => "PR004",
        "name" => "GT-1980",
        "brand" => "Samsung"
        ),
        array(
        "id" => "PR005",
        "name" => "IG-5467",
        "brand" => "Motorola"
        ),
        array(
        "id" => "PR006",
        "name" => "IP-8930",
        "brand" => "Apple"
        )
      )
    ),
    
    "Jewelry" => array(
      "Earrings" => array(
        array(
        "id" => "PR007",
        "name" => "ER-001",
        "brand" => "Chopard"
        ),
        array(
        "id" => "PR008",
        "name" => "ER-002",
        "brand" => "Mikimoto"
        ),
        array(
        "id" => "PR009",
        "name" => "ER-003",
        "brand" => "Bvlgari"
        )
      ),
      "Necklaces" => array(
        array(
        "id" => "PR010",
        "name" => "NK-001",
        "brand" => "Piaget"
        ),
        array(
        "id" => "PR011",
        "name" => "NK-002",
        "brand" => "Graff"
        ),
        array(
        "id" => "PR012",
        "name" => "NK-003",
        "brand" => "Tiffany"
        )
      )
    )
        );

echo "<table border=1px><tr><td>Category</td><td>Subcategory</td><td>ID</td><td>Name</td><td>Brand</td></tr>";
foreach ($products as $key => $value) {
    
    foreach ($value as $sub_key => $sub_val) 
    {
        if (is_array($sub_val)) 
        {
            foreach ($sub_val as $k) {
                echo "<tr><tr><td>".$key."</td>";
                echo "<td>".$sub_key."</td>";

                foreach($k as $i){
                    echo "<td>".$i."</td>";
                }
                echo "</tr>";
            }
        } 
        else 
        {
            echo $sub_key . " = " . $sub_val . "<br>";
        }
    }
    echo "</tr></tr>";
}
echo "</table>";
echo "<br><br><br><br><br><br>";
echo "<table border=1px><tr><td>Category</td><td>Subcategory</td><td>ID</td><td>Name</td><td>Brand</td></tr>";
foreach ($products as $key => $value) {
    
    if($key == "Electronics"){
        foreach ($value as $sub_key => $sub_val) 
    {
        if($sub_key == "Mobile"){
            if (is_array($sub_val)) 
        {
            foreach ($sub_val as $k) {
                echo "<tr><tr><td>".$key."</td>";
                echo "<td>".$sub_key."</td>";

                foreach($k as $i){
                    echo "<td>".$i."</td>";
                }
                echo "</tr>";
            }
        } 
        else 
        {
            echo $sub_key . " = " . $sub_val . "<br>";
        }
        }
    }
    }
    echo "</tr></tr>";
}
echo "</table>";
echo "<br><br><br><br><br><br>";
foreach ($products as $key => $value) {
 
        foreach ($value as $sub_key => $sub_val) 
    {
            foreach ($sub_val as $k) {
                echo   $k["brand"]." :"."<br>";
                echo "Product ID: ".$k["id"]."<br>";
                echo "Product Name:".$k["name"]."<br>";
                echo "Category: ".$key."<br>";
                echo "Subcategory:".$sub_key."<br>";
                echo '<br><br><br>';
            }
    }
}
echo "<br><br><br><br><br><br>";
echo "<table border=1px><tr><td>Category</td><td>Subcategory</td><td>ID</td><td>Name</td><td>Brand</td></tr>";
foreach ($products as $key => $value) {
    
    foreach ($value as $sub_key => $sub_val) 
    {
        if (is_array($sub_val)) 
        {
            foreach ($sub_val as $k) {
                
                if($k["id"] == "PR003"){
                    unset($k);
                }
                else{
                    echo "<tr><td>$key</td><td>$sub_key</td>";
                    foreach($k as $i){
                        echo "<td>".$i."</td>";
                    }
                    echo "</tr>";
                }
               
            }
        } 
        else 
        {
            echo $sub_key . " = " . $sub_val . "<br>";
        }
    }
    echo "</tr></tr>";
}
echo "</table>";
echo "<br><br><br><br><br><br>";
echo "<table border=1px><tr><td>Category</td><td>Subcategory</td><td>ID</td><td>Name</td><td>Brand</td></tr>";
foreach ($products as $key => $value) {
    
    foreach ($value as $sub_key => $sub_val) 
    {
        if (is_array($sub_val)) 
        {
            foreach ($sub_val as $k) {
                
                echo "<tr><tr><td>".$key."</td>";
                echo "<td>".$sub_key."</td>";
                if ($k["id"] == "PR002")
                {
                    $k['name'] = "BIG-555";
                }
                foreach($k as $i){
                    echo "<td>".$i."</td>"; 
                }
                echo "</tr>";
            }
        } 
        else 
        {
            echo $sub_key . " = " . $sub_val . "<br>";
        }
    }
    echo "</tr></tr>";
}
echo "</table>";

?>
