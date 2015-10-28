function ajaxObj( meth, url ) {

	var x = new XMLHttpRequest();
	x.open( meth, url, true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	return x;
}

function ajaxReturn(x){
	if(x.readyState == 4 && x.status == 200){
	   return true;	
	}
}
//added by aassou abdelilah in : 01/11/2013
 function writeInDiv(text){
    var objet = document.getElementById('ta_div');
    objet.innerHTML = text;
}

function ajax()
{
    var xhr=null;
   
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.open("GET", "ajax.php", false);
    xhr.send(null);
    writeInDiv(xhr.responseText);
        setInterval("ajax()",5000);
} 