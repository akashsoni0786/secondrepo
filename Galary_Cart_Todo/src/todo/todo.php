<?php
session_start();
if(!isset($_SESSION['todos'])) 
{
  $_SESSION['todos']= array(); 
}
if(!isset($_SESSION['incompleteTask'])) {
    $_SESSION['incompleteTask']=array();
}

if(!isset($_SESSION['todosdone'])) 
{
    $_SESSION['todosdone']= array(); 
}
if(!isset($_SESSION['completeTask'])) {
    $_SESSION['completeTask']=array();
}

?>
<html>
    <head>
        <title>TODO List</title>
        <link href="style.css" type="text/css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>
 <form action="server.php" method="POST">
<a href="destroy.php">Empty Todo</a>
 </form> 
        <div class="container">
            <h2>TODO LIST</h2>
            <h3>Add Item</h3>
            <form action="server.php" method="POST">
            <p>
                <input name="new-task" id="newtaskTxt" type="text">
                <input id="hiddenText" name="hiddenindex" hidden>
                <button name="addTask" id="addTaskid">Add</button>
                <button name="updateTask" id="updateTaskid" hidden>Update</button>
                <button name="updateCompleteTask" id="updateCompTaskid" hidden>Update</button>
            </p>
            </form>
            <h3>Todo</h3>
      
            <ul id="incomplete-tasks">
             <?php

            for($i=0;$i<count($_SESSION['incompleteTask']);$i++)
            { 
                echo $_SESSION['incompleteTask'][$i];
            }
            ?>

                <!-- <li><input type="checkbox"><label>Go Shopping</label><input type="text" value="Go Shopping"><button class="edit">Edit</button><button class="delete">Delete</button></li> -->
            </ul>
           
            <h3>Completed</h3>
            <ul id="completed-tasks">

            <?php

            for($i=0;$i<count($_SESSION['completeTask']);$i++)
                { 
                    echo $_SESSION['completeTask'][$i];
                }
            ?>
                <!-- <li><input type="checkbox" checked><label>See the Doctor</label><input type="text"><button class="edit">Edit</button><button class="delete">Delete</button></li> -->
            </ul>
        </div>
    <script>

        $(document).ready(function(){

            $('#incomplete-tasks').on('click','#editTask',function(){
                var txt = $(this).parent().children().eq(1).text();
                var ids = $(this).parent()[0].id;
                $("#hiddenText").val(ids);
                $(this).parent().css({"background-color":"yellow"});
                $("#addTaskid").hide();
                $("#updateTaskid").show();
                $("#newtaskTxt").val(txt);
            });

            $('#incomplete-tasks').on('click','#deleteTask',function(){
                var ids = $(this).parent()[0].id;
                $("#deleteHidden").val(ids);
                
            });

            $("#incomplete-tasks").on('click','.chkBox',function()
            {
                var ids = $(this).parent()[0].id;
                var txt = $(this).parent().children().eq(1).text();
                var chk = document.querySelector('.chkBox:checked') != null;
                if(chk)
                {
                    window.location.href = "server.php?valText="+ids;
                }
              
            });
            $('#completed-tasks').on('click','#completeEdit',function(){
                var txt = $(this).parent().children().eq(1).text();
                var ids = $(this).parent()[0].id;
                $("#hiddenText").val(ids);
                $(this).parent().css({"background-color":"green"});
                $("#addTaskid").hide();
                $("#updateCompTaskid").show();
                $("#newtaskTxt").val(txt);
            });

            $("#completed-tasks").on('click','.chkBoxComp',function()
            {
                var ids = $(this).parent()[0].id;
                var txt = $(this).parent().children().eq(1).text();
                var chk = document.querySelector('.chkBoxComp:checked') != null;
                
                if(chk)
                {
                    window.location.href = "server.php?valTextComp="+ids;
                }
              
            });
         
            
        });
    </script>
    </body>
</html>