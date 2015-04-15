$(document).ready(function() {   
    $("#menuslide1").hover(
    function() {
        $("#MEmenu").slideDown(200);
		('#whatisME').css('grayscale', 0);
    }, function() {
        $("#MEmenu").slideUp(200);
		('#whatisME').css('grayscale', 100);
    });	
});

$(document).ready(function() {   
    $("#menuslide2").hover(
    function() {
        $("#DJmenu").slideDown(200);
		('#djs').css('grayscale', 0);
    }, function() {
        $("#DJmenu").slideUp(200);
		('#djs').css('grayscale', 100);
    });	
});

$(document).ready(function() {   
    $("#menuslide3").hover(
    function() {
        $("#ShowsMenu").slideDown(200);
		('#shows').css('grayscale', 0);
    }, function() {
        $("#ShowsMenu").slideUp(200);
		('#shows').css('grayscale', 100);
    });	
});

$(document).ready(function() {   
    $("#menuslide4").hover(
    function() {
        $("#GearMenu").slideDown(200);
		('#gear').css('grayscale', 0);
    }, function() {
        $("#GearMenu").slideUp(200);
		('#gear').css('grayscale', 100);
    });	
});

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
	document.getElementById('errorWebsite').innerHTML="";
	document.getElementById('errorPoruka').innerHTML="";
	if (document.forms["contactforma"]["contactIme"].value.length>20) {
        document.getElementById('errorName').innerHTML+="Name too long";
		document.getElementById('errorName').setAttribute("style", "background-image: url('inputerror.jpg');background-repeat: no-repeat;background-size: 25px 21px");
            return false; 
      }
	   
	
	var emailRegEx = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	if (!emailRegEx.test(document.forms["contactforma"]["contactEmail"].value)) {
		document.getElementById('errorMail').innerHTML+="Wrong mail format";
		document.getElementById('errorMail').setAttribute("style", "background-image: url('inputerror.jpg');background-repeat: no-repeat;background-size: 25px 21px"); 
		return false;
	}
	
    
	var x = document.forms["contactforma"]["contactPoruka"].value;
	if (document.forms["contactforma"]["contactPoruka"].value.length<15) {
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