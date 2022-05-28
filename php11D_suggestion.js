function showHint(str) { 
	if (str.length == 0) { 
	//Code 4a 
    document.getElementById("txtHint").innerHTML="";
    // document.getElementById("txthint").style.border="0px";
    return;	
	} 
	var xhttp = new XMLHttpRequest(); 
	//Code 4b 
  	xhttp.onreadystatechange = function() {
	    if (this.readyState==4 && this.status==200) {
	      document.getElementById("txtHint").innerHTML=this.responseText;
	      // document.getElementById("txthint").style.border="1px solid #A5ACB2";
	    }
  	}

	xhttp.open("GET", "php11D_gethint.php?keyword="+str, true); 
	xhttp.send(); 
}
