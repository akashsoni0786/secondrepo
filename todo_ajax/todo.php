<html>
    <head>
        <title>TODO List</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="style.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h2>TODO LIST</h2>
            <h3>Add Item</h3>
            <p>
                <input id="new-task" type="text"><button id="addBtn">Add</button>
            </p>
            <h3>Todo</h3>
            <ul id="incomplete-tasks" class=<?php  echo $idIN ?>>
            </ul>
    <div id="CompleteTasks">
            <h3>Completed</h3>
            <ul id="completed-tasks">
                <li><input type="checkbox" checked id="completeChecked"><label>See the Doctor</label><input type="text">
                <button class="edit" id="editTaskBtn">Edit</button><button class="delete">Delete</button></li>
            </ul></div>
        </div>
    <script>
        $(document).ready(function(){
            $('#addBtn').click(function(){
                let newTodoTxt = $("#new-task").val();
                if(newTodoTxt!=""){
                    $.ajax({
                    url:'server.php',
                    type:'post',
                    data:{info : newTodoTxt},
                    success:function(result){
                        $('#incomplete-tasks').append(result);
                        $("#addBtn").html("Add");
                        $("#new-task").val("");
                    }
                });
                }
                else{
                    alert("Field is empty!");
                }
                
            });
            $('.container').on('click','.edit',function(){
                $(this).parent().remove();
                var editTodoTxt = $(this).parent().children().eq(1).text();
                $.ajax({
                    url:'server.php',
                    type:'post',
                    data:{edit : editTodoTxt},
                    success:function(result){
                        $('#new-task').val(result);
                        $("#addBtn").html("Update");
                    }
                });
            });
            $('.container').on('click','#incompleteUnchecked',function(){
               var txt = $(this).parent().children().eq(1).text();
               $.ajax({
                    url:'server.php',
                    type:'post',
                    data:{info2 : txt},
                    success:function(result){
                        $('#completed-tasks').append(result);
                    }
                });
                $(this).parent().remove();
                
            });
            $('.container').on('click','#completeChecked',function(){
               var txt = $(this).parent().children().eq(1).text();
               $.ajax({
                    url:'server.php',
                    type:'post',
                    data:{info3 : txt},
                    success:function(result){
                        $('#incomplete-tasks').append(result);
                    }
                });
                $(this).parent().remove();
                
            });
            $('.container').on('click','.delete',function(){
                $(this).parent().remove();
            });


        });
    </script>
    </body>
</html>