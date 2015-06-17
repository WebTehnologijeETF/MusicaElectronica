<!DOCTYPE html>


<HTML>
<HEAD>
    <TITLE>Musica Electronica</TITLE>
	<link rel="stylesheet" type="text/css" href="../CSS/WTprojekatStil.css">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<SCRIPT src = "JS/Skripte.js" ></SCRIPT>
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
				$naslovv =  htmlEntities($_POST['naslovvijesti'], ENT_QUOTES);
				$tekstt = htmlEntities($_POST['tekstvijesti'], ENT_QUOTES);
				$tipp = htmlEntities($_POST['tipvijesti'], ENT_QUOTES);
				$slikaaa = htmlEntities($_POST['slikaa'], ENT_QUOTES);
				
				$SQL = $veza->query("INSERT INTO vijesti SET naslov='$naslovv', tekst='$tekstt', autor='".$_SESSION['username']."', tip='$tipp', slika='$slikaaa'");						
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
		
</BODY>
</HTML>
