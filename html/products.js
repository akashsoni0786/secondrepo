$(document).ready(function(){
    var addedProduct=[];
    var products = 
    [{"id":101,"name":"Basket Ball","image":"basketball.png","price":150},
    {"id":102,"name":"Football","image":"football.png","price":120},
    {"id":103,"name":"Soccer","image":"soccer.png","price":110},
    {"id":104,"name":"Table Tennis","image":"table-tennis.png","price":130},
    {"id":105,"name":"Tennis","image":"tennis.png","price":100}];
    var txt='';
    products.forEach(element => {
        txt += '<div id="'+element.id+'" class="product">'+
        '<img src="images/'+element.image+'">'+
        '<h3 class="title"><a href="#" id="proName">'+element.name+'</a></h3>'+
        '<span >Price: $</span><span id="prices">'+element.price+'</span>'+
        '<a class="add-to-cart" id="addToCart" href="#">Add To Cart</a>'+
        '</div>';   
    });
    $('#products').append(txt);
    var quantityVal=1;
    $(".add-to-cart").click(function(){
        var pname = $(this).parent().find('#proName').text();
        var proPrice = $(this).parent().find('#prices').text();
        var proId = $(this).closest('div')[0].id;
    
        if(addedProduct.includes(proId))
        {
        let i = addedProduct.indexOf(proId);
        var quanId = $("#addtocartTable").children().eq(i).children().eq(0).text();
        var num = $("#addtocartTable").children().eq(i).children().eq(3).text();
        k = parseInt(num)+1;
        $("#addtocartTable").children().eq(i).children().eq(3).text(k);
        }
        else
        {
        row_txt = "<tr style='text-align:center'><td>"+
                  proId+"</td><td>"+pname+
                  "</td><td>"+proPrice+
                  "</td><td class='quantity'>"+quantityVal+
                  "</td><td><a class='deleteBtn' href='#'>Delete</a></td></tr>";
        $('#addtocartTable').append(row_txt);
        addedProduct.push(proId);
        }
             
    });
    $("#addtocartTable").on('click',".deleteBtn",deleteRow);
    function deleteRow(){
        var proId = $(this).closest('tr').children().first().text();
        $(this).closest('tr').remove();
        addedProduct.splice(addedProduct.indexOf(proId),1);
        alert(addedProduct);
    }
    $("#reset").click(function(){
        $("#addtocartTable").html("");
        addedProduct=[];
        quantityVal=1;
    });
    
    
    });
    
