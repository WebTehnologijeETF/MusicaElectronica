 <!DOCTYPE html>


<HTML>
<HEAD>
    <TITLE>Musica Electronica</TITLE>
	<link rel="stylesheet" type="text/css" href="WTprojekatStil.css">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<SCRIPT src = "Skripte.js" ></SCRIPT>
</HEAD>
<BODY>
    <div id="okvir">
        <div id="zaglavlje">
		
            <a href="index.php"><div id="logo">&nbsp;</div></a>
			<a href="https://www.youtube.com/" target="_blank"><div id="ytlink"></div></a>
			<div id="zaglavljeDivider"></div>
            <a href="https://www.facebook.com/?_rdr" target="_blank"><div id="fblink"></div></a>
            <a href="https://twitter.com/?lang=en" target="_blank"><div id="twitterlink"></div></a>
            <a href="https://plus.google.com/" target="_blank"><div id="googlepluslink"></div></a>
        </div>
		
	    <div id="meni">	  
	
			
			<div id = "menuslide1" onmouseover="mouseOverGreyScale0('whatisME')" onmouseout="mouseOverGreyScale100('whatisME')">
				<a href="#"  onmouseover="mouseOverMenu1('MEmenu', 'whatisME')" onmouseout="mouseOutMenu1('MEmenu', 'whatisME')"><div id="whatisME">About Musica Electronica</div></a>
				<ul id="MEmenu" onmouseover="mouseOverMenu('MEmenu')" onmouseout="mouseOutMenu('MEmenu')">
					<li><a href="#">About us (in construction...)</a></li>
					<li><a onclick = "ucitaj('genre')">About electronic music (working)</a></li>
					<li><a href="#">Rest under construction</a></li>
				</ul>
			</div>
			
			<div id = "menuslide2" onmouseover="mouseOverGreyScale0('djs')" onmouseout="mouseOverGreyScale100('djs')">
				<a href="#" onmouseover="mouseOverMenu1('DJmenu', 'djs')" onmouseout="mouseOutMenu1('DJmenu', 'djs')"><div id="djs">DJs</div></a>
				<ul id="DJmenu" onmouseover="mouseOverMenu('DJmenu')" onmouseout="mouseOutMenu('DJmenu')">
					<li><a href="#">What is a DJ (in construction...)</a></li>
					<li><a href="#">Becoming a DJ (in construction...)</a></li>
					<li><a onclick = "ucitaj('djs')">Top10 DJS 2014/2015 (working)</a></li>
					<li><a href="#">Rest under construction</a></li>		
				</ul> 
			</div>
			
			<div id = "menuslide3" onmouseover="mouseOverGreyScale0('shows')" onmouseout="mouseOverGreyScale100('shows')">
				<a href="#" onmouseover="mouseOverMenu1('ShowsMenu', 'shows')" onmouseout="mouseOutMenu1('ShowsMenu', 'shows')"><div id="shows">Shows</div></a>
				<ul id="ShowsMenu" onmouseover="mouseOverMenu('ShowsMenu')" onmouseout="mouseOutMenu('ShowsMenu')">
					<li><a onclick = "ucitaj('shows')">News (working)</a></li>
					<li><a href="#">Top shows 2014/2015 (in construction...)</a></li>
					<li><a href="#">Rest under construction</a></li>
				</ul> 
			</div>
			
			<div id = "menuslide4" onmouseover="mouseOverGreyScale0('gear')" onmouseout="mouseOverGreyScale100('gear')">
				<a href="#" onmouseover="mouseOverMenu1('GearMenu', 'gear')" onmouseout="mouseOutMenu1('GearMenu', 'gear')"><div id="gear">Gear</div></a>
				<ul id="GearMenu" onmouseover="mouseOverMenu('GearMenu')" onmouseout="mouseOutMenu('GearMenu')">
					<li><a onclick = "ucitaj('gear')">News (working)</a></li>
					<li><a href="#">Choosing right gear (in construction...)</a></li>
					<li><a href="#">Rest under construction</a></li>
				</ul>
			</div>
			
			<a onclick = "ucitaj('contact')"><div id="contact">Contact</div></a>
			<a onclick = "ucitaj('partners')"><div id="partners">Partners</div></a>
								
		</div>
		
		<div id="main">	
		
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
				$naslovv =  htmlEntities($_POST['naslovvijesti'], ENT_QUOTES);
				$tekstt = htmlEntities($_POST['tekstvijesti'], ENT_QUOTES);
				$tipp = htmlEntities($_POST['tipvijesti'], ENT_QUOTES);
				$slikaaa = htmlEntities($_POST['slikaa'], ENT_QUOTES);
				
				$SQL = $veza->query("INSERT INTO vijesti SET naslov='$naslovv', tekst='$tekstt', autor='admin', tip='$tipp', slika='$slikaaa'");			
			}
			
			print "<form method='post' action=' '><input type = 'text' name ='vijestzabrisanje' placeholder='ID of news' style= 'position: absolute; top: 83%; right: 30.7%'><br>
			<input type='submit' name='obrisivijest' value ='Delete news' style= 'position: absolute; top: 88%; right: 34%'/><br>
			<input type='submit' name='prikazikomentare' value ='Show comments' style= 'position: absolute; top: 88%; right: 24%'/></form>";
			if (isset($_POST['obrisivijest']))
			{
				$idvijesti = $_POST['vijestzabrisanje'];
				$SQL = $veza->query("DELETE FROM vijesti WHERE id=$idvijesti");	
			}
			if (isset($_POST['prikazikomentare']))
			{
				echo "<table border='1' cellpadding='10'>";
				echo "<tr> <th>Comment ID</th> <th>Comment text</th> <th>Comment time</th> <th> Comment author </th></tr>";
				$idvijesti = $_POST['vijestzabrisanje'];
				$komentar = $veza->query("select id, vijest, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme3, autor, emailautora from komentari order by vrijeme asc");	
				foreach ($komentar as $komentar1)
				{
					if ($komentar1['vijest']==$idvijesti)
					{
						echo "<tr>";
						echo "<td>".$komentar1['id']."</td>";
						echo "<td>".$komentar1['tekst']."</td>";
						echo "<td>".date("d.m.Y. (h:i)", $komentar1['vrijeme3'])."</td>";
						echo "<td>".$komentar1['autor']."</td>";
						echo "</tr>"; 	
					}						
				}
				echo "</table>";
				print "<form method='post' action=' '><input type = 'text' name ='komentarzabrisanje' placeholder='ID of comment' style= 'position: absolute; top: 140%; right: 30.7%'><br>
				<input type='submit' name='obrisikomentar' value ='Delete comment' style= 'position: absolute; top: 145%; right: 32.3%'/><br></form>";
				if (isset($_POST['obrisikomentar']))
				{
					$idkomentara = $_POST['komentarzabrisanje'];
					$SQL1 = $veza->query("DELETE FROM komentari WHERE id=$idkomentara");	
				}
			}
		?>
		
			
		</div>
		<div id="podnozje">
		    &copy; 2014/2015 Haris &#352;emi&#263; All Rights Reserved
		    <br>Elektrotehni&#269;ki fakultet Sarajevo
		</div>	
    </div>
</BODY>
</HTML>

