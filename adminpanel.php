 <!DOCTYPE html>


<HTML>
<HEAD>
    <TITLE>Musica Electronica</TITLE>
	<link rel="stylesheet" type="text/css" href="WTprojekatStil.css">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
</HEAD>
<BODY>
		<?php	
			$veza = new PDO("mysql:dbname=me;host=localhost;charset=utf8", "meuser", "bigbangkamehameha1");
			$veza->exec("set names utf8");
			
			$vijesti = $veza->query("select id, naslov, tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2, tip, slika from vijesti order by vrijeme desc");
			
			echo "<table border='1' cellpadding='10'>";
			echo "<tr> <th>Image</th> <th>News ID</th> <th>News title</th> <th> autor </th></tr>";
			foreach ($vijesti as $vijest)
			{
				echo "<tr>";
				echo "<td><img src ='".$vijest['slika']."' style='height:150px; width:150px;' /></td>";
				echo "<td>".$vijest['id']."</td>";
				echo "<td>".$vijest['naslov']."</td>";
				echo "<td>".$vijest['autor']."</td>";
				echo "</tr>"; 				
			}
			echo "</table>";
			print "<form method='post' action=' '><input type = 'text' name = 'naslovvijesti' id='naslovvijesti' placeholder='News title' style= 'position: absolute; top: 30%; right:31%' /><br>
			<textarea name='tekstvijesti' id = 'tekstvijesti' placeholder='text' rows='7' cols='30' style= 'position: absolute; top: 34%; right:22%'></textarea><br>
			<input type = 'text' name = 'tipvijesti' id='type' placeholder='News type(gear, shows or default:ostalo)' style= 'position: absolute; top: 55%; right:30.7%' /><br>
			<input type = 'text' name = 'slikaa' id='slikaa' placeholder='News image link' style= 'position: absolute; top: 60%; right:30.7%' /><br>
			<input type='submit' name='dodajvijest' value ='Submit news' style= 'position: absolute; top: 65%; right:34%'/><br></form>";
			
			if (isset($_POST['dodajvijest']))
			{
				$naslovv = $_POST['naslovvijesti'];
				$tekstt = $_POST['tekstvijesti'];
				$tipp = $_POST['tipvijesti'];
				$slikaaa = $_POST['slikaa'];
				$sql = "INSERT INTO vijesti (naslov,tekst,autor,tip,slika)VALUES (:naslov, :tekst, :autor, :tip, :slika)";
				$q = $veza->prepare($sql);
				$q->execute(array('naslov'=>$naslovv,'tekst'=>$tekstt,'autor'=>$username,'tip'=>$tipp,'slika'=>$slikaaa));
				
			}
			
			print "<form method='post' action=' '><input type = 'text' name ='vijestzabrisanje' placeholder='ID of news to be deleted'><br>
			<input type='submit' name='obrisivijest' value ='Submit news' style= 'position: absolute; top: 67%; left: 27%'/><br></form>"
			
			
		?>		
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		
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
<div id="fblink"><a href="https://www.facebook.com/?_rdr" target="_blank">
<img border="0" alt="Facebook page" src="fblink11.jpg">
</a></div>
<div id="twitterlink"><a href="https://twitter.com/?lang=en" target="_blank">
<img border="0" alt="Twitter page" src="twitterlink111.jpg">
<div id="googlepluslink"><a href="https://plus.google.com/" target="_blank">
<img border="0" alt="Google+ page" src="googlepluslink1.jpg">
</a></div>
</div>
</div>
</BODY>
</HTML>-->