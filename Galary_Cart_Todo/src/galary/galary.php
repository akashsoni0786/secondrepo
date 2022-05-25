<!DOCTYPE html>
<html>
  <head>
    <style>
      #fileChoose{
        border-radius: 10px;
        padding: 1.5%;
        font-size: 20px;
        font-weight: bold;
        background-color: yellowgreen;
        color: white;
      }
      #uploadFile{
        border-radius: 10px;
        padding: 1.5%;
        font-size: 20px;
        font-weight: bold;
        background-color: blue;
        color: white;
      }

      .galary{
        display: grid;
        grid-template-columns: repeat(3,auto);
        max-width: 100px;
      }
      .galary img{
        width: 450px;
        height: 200px;
        object-fit: cover;
      }
      @media screen and (max-width:1000px) {
        .galary{
          grid-template-columns: repeat(2,auto);
        }
      }
    </style>
  </head>
<body>

<form action="" method="post" enctype="multipart/form-data">
  <p style="font-size:60px;font-weight:bold">Image Galary</p>
  <p style="margin-top: -50px;font-size:20px">This is page to show all images.</p>
<div ><input id="fileChoose" type="file" name="fileToUpload" id="fileToUpload" >
<input id="uploadFile" type="submit" value="Upload Here" name="submit"></div>


</form>

<?php
$target_dir = "uploads/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
if (file_exists($target_file)) {
  $ak = '<script>alert("Sorry, file already exists.")</script>';
  echo $ak;
  $uploadOk = 0;
}

// Check file size
else if ($_FILES["fileToUpload"]["size"] > 500000) {
  $ak = '<script>alert("Sorry, your file is too large.")</script>';
  echo $ak;
  $uploadOk = 0;
}

// Allow certain file formats
else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $ak = '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';
  echo $ak;
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
else if ($uploadOk == 0) {
  $ak = '<script>alert("Sorry, your file was not uploaded.")</script>';
  echo $ak;
// if everything is ok, try to upload file
} 

else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $ak = '<script>alert("The file has been uploaded.")</script>';
    echo $ak;
  } 
  else {
    $ak = '<script>alert("Sorry, there was an error uploading your file.")</script>';
    echo $ak;
  }
}
}


?>

<div class="galary">
<?php
$images = glob('uploads/*.{jpg,jpeg,png,gif,webp}',GLOB_BRACE);
foreach($images as $i){
  // printf("<img src='uploads/%s'/>",basename($i));
  $img = basename($i);
  printf("<figure><img src='uploads/%s'/><figurecaption>%s</figurecaption></figure>",$img,$img);
}
?>
</div>

<script>
  window.addEventListener('load',function(){
    var image = document.querySelectorAll('.galary img');
    if(image.length>0){
      for(let i of image){
        i.addEventListener('click',function(){
          if(document.fullscreenElement){
            document.exitFullscreen();
          }
          else{
            this.requestFullscreen();
          }
          
        });
      }
    }
  });
</script>
</body>
</html>
