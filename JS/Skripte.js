
function mouseOverMenu(id){
    var x = document.getElementById(id);
    x.style.display = "block";
}

function mouseOverMenu1(id1, id2){
    var x = document.getElementById(id1);
	var y = document.getElementById(id2);
    x.style.display = "block";
	y.setAttribute("style","filter:grayscale(" + 0 + "%)");
}

function mouseOutMenu(id){
    var x = document.getElementById(id);
    x.style.display = "none";
}

function mouseOutMenu1(id1, id2){
    var x = document.getElementById(id1);
	var y = document.getElementById(id2);
    x.style.display = "none";
	y.setAttribute("style","filter:grayscale(" + 100 + "%)");
}

function validacijaForme() {
	
	document.getElementById('errorName').innerHTML="";
	document.getElementById('errorMail').innerHTML="";
	document.getElementById('errorGrad').innerHTML="";
	document.getElementById('errorPoruka').innerHTML="";
	document.getElementById('errorPB').innerHTML="";
	if (document.forms["contactforma"]["contactIme"].value.length>20) {
        document.getElementById('errorName').innerHTML+="Name too long";
		document.getElementById('errorName').setAttribute("style", "background-image: url('inputerror.jpg');background-repeat: no-repeat;background-size: 25px 21px");
            return false; 
      }
	  
	  if (document.forms["contactforma"]["contactIme"].value=="") {
        document.getElementById('errorName').innerHTML+="Name not entered";
		document.getElementById('errorName').setAttribute("style", "background-image: url('inputerror.jpg');background-repeat: no-repeat;background-size: 25px 21px");
            return false; 
      }
	   
	var emailRegEx = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	if (!emailRegEx.test(document.forms["contactforma"]["contactEmail"].value)) {
		document.getElementById('errorMail').innerHTML+="Wrong mail format";
		document.getElementById('errorMail').setAttribute("style", "background-image: url('inputerror.jpg');background-repeat: no-repeat;background-size: 25px 21px"); 
		return false;
	}
	
	if (document.forms["contactforma"]["contactGrad"].value=="") {
        document.getElementById('errorGrad').innerHTML+="City not entered";
		document.getElementById('errorGrad').setAttribute("style", "background-image: url('inputerror.jpg');background-repeat: no-repeat;background-size: 25px 21px");
            return false; 
      }
	  
	  if (document.forms["contactforma"]["contactPB"].value=="") {
        document.getElementById('errorPB').innerHTML+="Postal code not entered";
		document.getElementById('errorPB').setAttribute("style", "background-image: url('inputerror.jpg');background-repeat: no-repeat;background-size: 25px 21px");
            return false; 
      }
	
    
	var x = document.forms["contactforma"]["contactPoruka"].value;
	if (document.forms["contactforma"]["contactPoruka"].value.length<5) {
       document.getElementById('errorPoruka').innerHTML+="Message too short";
	   document.getElementById('errorPoruka').setAttribute("style", "background-image: url('inputerror.jpg');background-repeat: no-repeat;background-size: 25px 21px");
       return false;
    }
	
	var y = document.forms["contactforma"]["contactIme"].value;
	var z = document.forms["contactforma"]["contactEmail"].value;
	if (x!=null && x!="" && ((y == null || y == "") || (z == null || z == "")))
	{
	    document.getElementById('errorPoruka').innerHTML+="Name or mail not correct";
	    document.getElementById('errorPoruka').setAttribute("style", "background-image: url('inputerror.jpg');background-repeat: no-repeat;background-size: 25px 21px");
        return false;
	}
	
	return true;
}

function mouseOverGreyScale0(id){
    var x = document.getElementById(id);
    x.setAttribute("style","filter:grayscale(" + 0 + "%)");
}

function mouseOverGreyScale100(id){
    var x = document.getElementById(id);
    x.setAttribute("style","filter:grayscale(" + 100 + "%)");
}


function ucitaj(id) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {

            document.getElementById("main").innerHTML = ajax.responseText;
            refreshPage();
        }
    };
    ajax.open("GET", "PHP/" + id + ".php", true);
    ajax.send();
}



var provjeraForme = function(){
	ajaxValidacijaForme();
}

var ajaxValidacijaForme = function(){
	
	var grad =  document.getElementById('contactGrad').value;
    var postanskiBroj =  document.getElementById('contactPB').value;
	var x = new XMLHttpRequest();
	
	x.onreadystatechange=function(){
        var jsonParse=JSON.parse(x.responseText);

        if (x.readyState === 4 && x.status === 200) {
            if (jsonParse.hasOwnProperty("greska")) {
            	if(jsonParse["greska"]==="Nepostojeće mjesto"){
                	document.getElementById("errorGrad").innerHTML="Nepostojeći grad";
					document.getElementById('errorGrad').setAttribute("style", "background-image: url('inputerror.jpg');background-repeat: no-repeat;background-size: 25px 21px");
					document.getElementById('contactGrad').focus();
            	}
            	else if(jsonParse["greska"]==="Nepostojeći poštanski broj"){
	                document.getElementById("errorPB").innerHTML="Nepostojeći poštanski broj";
					document.getElementById('errorPB').setAttribute("style", "background-image: url('inputerror.jpg');background-repeat: no-repeat;background-size: 25px 21px");
					document.getElementById('contactPB').focus();
	            }
	            else if(jsonParse["greska"]==="Poštanski broj ne odgovara mjestu"){
	                document.getElementById("errorPB").innerHTML="Poštanski broj ne odgovara";
					document.getElementById('errorPB').setAttribute("style", "background-image: url('inputerror.jpg');background-repeat: no-repeat;background-size: 25px 21px");
					document.getElementById('contactPB').focus();
	            }
                
            } 
            else {	
			    document.getElementById("errorPB").innerHTML="Grad i poštanski broj uredu";
				document.getElementById('errorPB').setAttribute("style", "background-image: url('inputcorrect.png');background-repeat: no-repeat;background-size: 25px 21px");
                document.getElementById("contactSubmit").submit();
            }
        }
    }
	x.open("GET", "http://zamger.etf.unsa.ba/wt/postanskiBroj.php?mjesto="+grad+"&postanskiBroj="+postanskiBroj, true);
	x.send();
}

