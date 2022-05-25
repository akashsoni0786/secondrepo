<?php
session_start();

function displayTodo(){
    for($i=0;$i<count($_SESSION['todos']);$i++){
        $row = '<li id="'.$i.'"><input class="chkBox" type="checkbox"><label>'.
                $_SESSION['todos'][$i].'</label>
                <input hidden id="deleteHidden" name="deleteHiddenName">
                <button class="edit" id="editTask">Edit</button>
                <button class="delete" id="deleteTask" name="delBtn">
                <a style="text-decoration:none" href="server.php?index='.$i.'">
                Delete</a></button></li>'; 
        $_SESSION['incompleteTask'][$i]=$row;
    }
}

function displayTodoDone(){
    for($i=0;$i<count($_SESSION['todosdone']);$i++){
        $row = '<li id="'.$i.'"><input checked class="chkBoxComp" type="checkbox"><label>'.
                $_SESSION['todosdone'][$i].'</label>
                <button class="edit" id="completeEdit">Edit</button>
                <button class="delete" id="ki" name="delBtn">
                <a style="text-decoration:none" href="server.php?indexComp='.$i.'">
                Delete</a></button></li>'; 
        $_SESSION['completeTask'][$i]=$row;
    }
}


if(isset($_POST['addTask']))
{
  $newTask = $_POST['new-task'];
  if($newTask!=''){
    $_SESSION['todos'][] = $newTask;
    displayTodo();

  }
  
}
if(isset($_POST['updateTask']))
{
    $newTask = $_POST['new-task'];
   
        $index = $_POST['hiddenindex'];
        $_SESSION['todos'][$index]=$newTask;
        displayTodo();
}

if(isset($_GET['index'])){
    $index= $_GET['index'];
    array_splice($_SESSION['todos'],$index,1);
    array_splice($_SESSION['incompleteTask'],0);
    displayTodo();
}


if(isset($_GET['valText']))
{
    $index = $_GET['valText'];
    $txt = $_SESSION['todos'][$index];
    $_SESSION['todosdone'][] = $txt;
    displayTodoDone();
    array_splice($_SESSION['todos'],$index,1);
    array_splice($_SESSION['incompleteTask'],0);
    displayTodo();
    
}

if(isset($_GET['valTextComp']))
{
    $index = $_GET['valTextComp'];
    $txt = $_SESSION['todosdone'][$index];
    $_SESSION['todos'][] = $txt;
    displayTodo();
    array_splice($_SESSION['todosdone'],$index,1);
    array_splice($_SESSION['completeTask'],0);
    displayTodoDone();
    
    
}

if(isset($_POST['updateCompleteTask']))
{
    $newTask = $_POST['new-task'];
    $index = $_POST['hiddenindex'];
    $_SESSION['todosdone'][$index]=$newTask;
    displayTodoDone();
}


if(isset($_GET['indexComp']))
{
    $index= $_GET['indexComp'];
    array_splice($_SESSION['todosdone'],$index,1);
    array_splice($_SESSION['completeTask'],0);
    displayTodoDone();
}
header ('location:todo.php');
?>