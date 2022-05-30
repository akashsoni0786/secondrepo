import {id, name, salary} from "./employeeData.js";

var table = document.getElementById('values');
var t = '<tr><td>'+id+'</td><td>'+name+'</td><td>'+salary+'</td></tr>';
table.innerHTML += t;
