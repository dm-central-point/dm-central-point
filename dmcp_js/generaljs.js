
$(document).ready( function(){
    
$("#content").load('managelist1.php');

});

$("ul#nav li a").click(function(){
    
   var page = $(this).attr('href');
   
   $("#content").load(page +'.php');
  
  return false;
   
});


$(document).ready( function(){
    
$("#content2").load('managearchivedlist1.php');

});

$("ul#nav2 li a").click(function(){
    
   var page = $(this).attr('href');
   
   $("#content2").load(page +'.php');
  
  return false;
   
});


$(document).ready(function(){
    $("div.clickable").on('click', function () {
        alert('Click');
    });
});

function loadForm(){
      
var x = document.getElementById('accformgeneral');
        if (x.style.display === "none") {
        x.style.display = "block";
        } else {
        x.style.display = "none";
        } 
    } 

function loadFormKhm(){
      
var x = document.getElementById('accformkhm');
        if (x.style.display === "none") {
        x.style.display = "block";
        } else {
        x.style.display = "none";
        } 
    }

    
 
    $(function(){           
        if (!Modernizr.inputtypes.date) {
            $('input[type=date]').datepicker({
                  dateFormat : 'yy-mm-dd'
                }
             );
        }
    });  



function showMenu(){

    var x = document.getElementById('mobmenu');

    if (x.style.display === "none") {
    x.style.display = "block";
    } else {
    x.style.display = "none";
    } 
    } 

function loadpic(){
    var pic;
    var randm;
    pic = document.getElementById('dynamicpics');
    randm = Math.floor((Math.random() * 5) + 1);
    pic.src = 'images/'+ randm +'.jpg';
    }
loadpic();
