 <!DOCTYPE html>


<HTML>
<HEAD>
    <TITLE>Musica Electronica</TITLE>
	<link rel="stylesheet" type="text/css" href="WTprojekatStil.css">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
</HEAD>
<BODY>
<?php
header('Content-Type: text/html; charset=utf-8');

$contactIme ="";
$contactEmail ="";
$contactGrad ="";
$contactPB ="";
$contactPoruka ="";
$errorName ="";
$errorMail="";
$errorGrad="";
$errorPB="";
$errorPoruka="";
$errorNameSlika="";
$errorMailSlika="";
$errorGradSlika="";
$errorPBSlika="";
$errorPorukaSlika="";
$validno=true;


function prilagodjavanje_ulaza($string)
{
	$data = trim($string);
	$data = stripslashes($string);
	$data = htmlspecialchars($string);
	return $string;
}

if(isset($_POST['contactSubmit']))
{
    if (empty($_POST["contactIme"]))
	{
        $errorName = "Name is required";
    } 
	else 
	{
        $contactIme = prilagodjavanje_ulaza($_POST["contactIme"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$contactIme)) 
		{
			$errorName = "Only letters and white spaces allowed!";
			$errorNameSlika = "inputerror1.jpg";
			$validno=false;
		}
	}
	if (empty($_POST["contactEmail"])) 
	{
		$errorMail = "Email is required";
	} 
	else 
	{
		$contactEmail = prilagodjavanje_ulaza($_POST["contactEmail"]);
		if (!preg_match("/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/",$contactEmail))
		{
			$errorMail = "Invalid email format";
			$errorMailSlika = "inputerror1.jpg";
			$validno=false;
		}
	}
	
	if (empty($_POST["contactGrad"]))
	{
        $contactGrad = "";
    } 
	else 
	{
        $contactGrad = prilagodjavanje_ulaza($_POST["contactGrad"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$contactGrad)) 
		{
			$errorName = "Only letters and white spaces allowed!";
			$errorGradSlika = "inputerror1.jpg";
			$validno=false;
		}
	}
	
	if (empty($_POST["contactPB"]))
	{
        $contactPB = "";
    } 
	else 
	{
        $contactPB = prilagodjavanje_ulaza($_POST["contactPB"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$contactPB)) 
		{
			$errorPB = "Only letters and white spaces allowed!";
			$errorPBSlika = "inputerror1.jpg";
			$validno=false;
		}
	}
	
	if (empty($_POST["contactPoruka"])) 
	{
		$errorPoruka = "Message is required";
		$errorPorukaSlika = "inputerror1.jpg";
		$validno=false;
	}
	else 
	{
		$contactPoruka = prilagodjavanje_ulaza($_POST["contactPoruka"]);
	}	
}	

if($validno)
{
	print "<h3>Check if input data is correct</h3>";
	echo "Name: ".$contactIme; print "<br>";
	echo "Mail: ".$contactEmail; print "<br>";
	echo "Town: ".$contactGrad; print "<br>";
    echo "Postal code: ".$contactPB; print "<br>";
	echo "Message: ".$contactPoruka; print "<br>";
	print "<br> Input data can be changed below: "; 
}	
?>
	<form action="validacijaForme.php" name="forma" id="forma" method="post">
		<span id = "errorName"> <?php echo $errorName;?> </span><INPUT TYPE="TEXT" NAME="contactIme" placeholder="*Name" id="contactIme" SIZE="40" >		
		<span id = "errorMail"> <?php echo $errorMail;?> </span><INPUT TYPE="TEXT" NAME="contactEmail" placeholder="*Email" id="contactEmail" SIZE="40"> 
		<span id = "errorGrad"></span><INPUT TYPE="TEXT" NAME="contactGrad" placeholder="Town" id = "contactGrad" SIZE="40">
		<span id = "errorPB"></span><INPUT TYPE="TEXT" NAME="contactPB" placeholder="Postal code" id = "contactPB" SIZE="40" >
		<span id = "errorPoruka"> <?php echo $errorPoruka;?> </span><textarea name="contactPoruka" placeholder="*Message" cols="30" rows="7" id = "contactPoruka"></textarea>
		<INPUT TYPE="Button" NAME="contactSubmit" VALUE="Submit" ID="contactSubmit"> 
		<textarea name="TextAreaOstalo" id="TextAreaOstalo" cols="40" rows="15" class="field left" readonly>To find more about us or to help us with your work or corporate identity, please fill in the form and click on submit.
		</textarea>
	</form>	
	



</BODY>
</HTML>
