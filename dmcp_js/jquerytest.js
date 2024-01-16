$(document).ready(function(){
		
	var $div1 = document.getElementById("mydiv");
	
	function loaddata(){
	    
	$.ajax({url: "../site_includes/isset.php", success: function(result){
    
    $($div1).html(result);
  
	    
	}});
  
	}

	loaddata();
	
setInterval(function(){
    loaddata();
}, 1000);
	
});

