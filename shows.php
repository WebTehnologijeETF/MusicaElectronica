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
		
		$vijest = $veza->query("select id, naslov, tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2, tip, slika from vijesti order by vrijeme desc");
						
		if (isset($_GET['id']))
		{
			$vijest = $veza->query("select id, naslov, tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2, tip, slika from vijesti order by vrijeme desc");
			$komentar = $veza->query("select id, vijest, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme3, autor from komentari order by vrijeme desc");
			foreach ($vijest as $vijest1) 
			{
				if ($vijest1['id'] == $_GET['id'])
				{
				
					print "<img src ='".$vijest1['slika']."' height:'300' width:'300' /><h1>".$vijest1['naslov']."</h1><small> ".$vijest1['autor']."</small><p> ".$vijest1['tekst']."</p><small> "
					.date("d.m.Y. (h:i)", $vijest1['vrijeme2'])."</small><br><br><br>";
					foreach ($komentar as $komentar1)
					{
						if ($komentar1['vijest'] == $_GET['id'])
						{
							print "<small>".$komentar1['autor']."</small><br>".$komentar1['tekst']."<small><br> ".date("d.m.Y. (h:i)", $komentar1['vrijeme3'])."</small><br><br>";
						}
					}
			
					print "<form method='post' action=' '><textarea name='komentar' id = 'komentar' placeholder='Comment' rows='10'></textarea><br>
					<input type='submit' name='submit' value ='Submit comment'/></form>";
					if(isset($_POST['submit']))
					{
						$tekst = $_POST['komentar'];
						if (isset($_SESSION['username']))
							$SQL = $veza->query("INSERT INTO komentari SET vijest=".$_GET['id'].", tekst='$tekst', autor='$username'");	
						else 
							$SQL = $veza->query("INSERT INTO komentari SET vijest=".$_GET['id'].", tekst='$tekst', autor='Anonymous'");	
							header("location: index.php?id=".$vijest1['id']);				
					}
				}
			}		 
		}
		
		
		else 
		{
			$vijest = $veza->query("select id, naslov, tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2, tip, slika from vijesti order by vrijeme desc");
			$komentar = $veza->query("select id, vijest, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme3, autor from komentari order by vrijeme desc");
			$first = true;
			foreach($vijest as $vijest1)
			{	
			    if ($vijest1['tip']=="shows")
				{
				$rezultat1 = $veza->query("SELECT COUNT(*) FROM komentari WHERE vijest=$vijest1[id]");
				$rezultat2 = $rezultat1->fetchColumn();
				if ($first)
				{
					print "<div id = 'glavnaVijest'>
					<img src ='".$vijest1['slika']."' style='height:250px; width:250px' />
					<h3>".$vijest1['naslov']."</h3>
					<p> ".implode(' ', array_slice(explode(' ', $vijest1['tekst']), 0, 30))."...<br><a href='index.php?id=".$vijest1['id']."'>".$rezultat2." komentara</a></p>
					<p style='color: cyan;'>" .date("d.m.Y. ", $vijest1['vrijeme2']). " | by ".$vijest1['autor']."</p></div> ";
					$first = false;		
				}
				else 
				{
					$k=2;
					print "<div id = 'vijest".$k."'>
					<img src ='".$vijest1['slika']."' style='height:150px; width:150px' />
					<h3>".$vijest1['naslov']."</h3>
					<p> ".implode(' ', array_slice(explode(' ', $vijest1['tekst']), 0, 14))."...<br><a href='index.php?id=".$vijest1['id']."'>".$rezultat2." komentara</a></p>
					<p style='color: cyan;'>" .date("d.m.Y. ", $vijest1['vrijeme2']). " | by ".$vijest1['autor']."</p></div> ";
				
					$k=$k+1;
				}
	
			}
			}
			print ("<div id='video-container' style= 'top:5px'>
		     <span class='videonaslov'>Song of the day</span><p>
             <iframe width='397' height='250' src='https://www.youtube.com/embed/yYwLLyy-hZQ' allowfullscreen></iframe></p>
			</div>	
			<div id='listapartners' style= 'top:40px'>
				Partners of Musica Electronica:
				<ul class='moja_lista'>
				    <li><a href='http://www.bhtelecom.ba' target='_blank'>BH Telecom</a></li>
					<li><a href='http://www.tomorrowland.com/global-splash/' target='_blank'>Tomorrowland</a></li>
					<li><a href='http://djmag.com/' target='_blank'>DJ Mag</a></li>
					<li><a href='http://www.sensation.com/landing/' target='_blank'>Sensation</a></li>
				</ul>
			</div>");
		}
		?>	
		
		
</BODY>
</HTML>

 