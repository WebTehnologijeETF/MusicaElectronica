 <!DOCTYPE html>


<HTML>
<HEAD>
    <TITLE>Musica Electronica</TITLE>
	<link rel="stylesheet" type="text/css" href="WTprojekatStil.css">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
</HEAD>
<BODY>
    <?php include 'validacijaForme.php'?>;
	<span id="naslovforme">Contact us (forma se ispravno prikazuje u Mozilla Firefox)</span>
	<span id="contactExpl">Fields marked with asterix (&lowast;) are required</span>
		<form action="validacijaForme.php" name="contactforma" id="contactforma" method="post">
			<span id = "errorName"></span><INPUT TYPE="TEXT" NAME="contactIme" placeholder="*Name" id="contactIme" SIZE="40" >		
			<span id = "errorMail"></span><INPUT TYPE="TEXT" NAME="contactEmail" placeholder="*Email" id="contactEmail" SIZE="40"> 
			<span id = "errorGrad"></span><INPUT TYPE="TEXT" NAME="contactGrad" placeholder="Town" id = "contactGrad" SIZE="40">
			<span id = "errorPB"></span><INPUT TYPE="TEXT" NAME="contactPB" placeholder="Postal code" id = "contactPB" SIZE="40" >
			<span id = "errorPoruka"></span><textarea name="contactPoruka" placeholder="*Message" cols="30" rows="7" id = "contactPoruka"></textarea>
			<INPUT TYPE="Button" NAME="contactSubmit" VALUE="Submit" ID="contactSubmit"> 
			<textarea name="TextAreaOstalo" id="TextAreaOstalo" cols="40" rows="15" class="field left" readonly>To find more about us or to help us with your work or corporate identity, please fill in the form and click on submit.
			</textarea>
		</form>		
</BODY>
</HTML>

 <!--DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">


<HTML>
<HEAD>
    <TITLE>Musica Electronica</TITLE>
	<link rel="stylesheet" type="text/css" href="WTprojekatStil.css">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
</HEAD>
<BODY>
<div id="okvir">
<div id="zaglavlje">
<div id="logo"><img src="logo4.jpg" height="45px" width="41px"></div>
<h1>	Musica electronica</h1>
<div id="fblink"><a href="https://www.facebook.com/?_rdr" tarPOST="_blank">
<img border="0" alt="Facebook page" src="fblink11.jpg">
</a></div>
<div id="twitterlink"><a href="https://twitter.com/?lang=en" tarPOST="_blank">
<img border="0" alt="Twitter page" src="twitterlink111.jpg">
<div id="googlepluslink"><a href="https://plus.google.com/" tarPOST="_blank">
<img border="0" alt="Google+ page" src="googlepluslink1.jpg">
</a></div>
</div>
</div>
</BODY>
</HTML>-->