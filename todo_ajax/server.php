<?php
if(isset($_POST['info'])){
    $newTodo = $_POST['info'];

    $row = '<li><input type="checkbox" id="incompleteUnchecked" ><label>'.$newTodo.'</label><input type="text">
    <button class="edit" id="editTaskBtn">Edit</button><button class="delete">Delete</button></li>';
    echo $row;
}

if(isset($_POST['edit'])){
    $editTodo = $_POST['edit'];
    echo $editTodo;
}
if(isset($_POST['info2'])){
    $txt = $_POST['info2'];
    $row = '<li><input type="checkbox" checked id="completeChecked"><label>'.$txt.'</label><input type="text">
    <button class="edit" id="editTaskBtn">Edit</button><button class="delete">Delete</button></li>';
    echo $row;
}

if(isset($_POST['info3'])){
    $txt = $_POST['info3'];
    $row = '<li><input type="checkbox" id="incompleteUnchecked" ><label>'.$txt.'</label><input type="text">
    <button class="edit" id="editTaskBtn">Edit</button><button class="delete">Delete</button></li>';
    echo $row;
}
?>