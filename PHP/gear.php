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
			$komentar = $veza->query("select id, vijest, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme3, autor, emailautora from komentari order by vrijeme asc");
	
			foreach ($vijest as $vijest1) 
			{
				
				if ($vijest1['id'] == $_GET['id'])
				{
				
					print "<div id = 'ucitanaVijest'><img src ='".$vijest1['slika']."' style='height:320px; width:320px' /><h1>".$vijest1['naslov']."</h1><small> ".$vijest1['autor']."</small><p> ".$vijest1['tekst']."</p><small> "
					.date("d.m.Y. (h:i)", $vijest1['vrijeme2'])."</small><br><br><br>";
					foreach ($komentar as $komentar1)
					{
						if ($komentar1['vijest'] == $_GET['id'])
						{
							if (($komentar1['emailautora'])=="")
								print "<small>".$komentar1['autor']."</small><br>".$komentar1['tekst']."<small><br> ".date("d.m.Y. (h:i)", $komentar1['vrijeme3'])."</small><br><br>";
							else
								print "<a href='mailto:".$komentar1['emailautora']."?subject=Vas komentar na MusicaElectronica&body=Default: Uspjesno ste ostavili komentar'><small>".$komentar1['autor']."</small></a><br>".$komentar1['tekst']."<small><br> ".date("d.m.Y. (h:i)", $komentar1['vrijeme3'])."</small><br><br>";
						}
					}
			
					print "<form method='post' action=' '><input type='email' name='email' placeholder ='Email'/><br>
					<textarea name='komentar' id = 'komentar' placeholder='Comment' rows='5' cols='45'></textarea><br>
					<input type='submit' name='submittt' value ='Submit comment'/></form></div>";
					if(isset($_POST['submittt']))
					{
						$tekst = htmlEntities($_POST['komentar'], ENT_QUOTES);
						$email = htmlEntities($_POST['email'], ENT_QUOTES);
						if (isset($_SESSION['username']))
							$SQL = $veza->query("INSERT INTO komentari SET vijest=".$_GET['id'].", tekst='$tekst', autor='$username', emailautora='$email'");	
						else 
							$SQL = $veza->query("INSERT INTO komentari SET vijest=".$_GET['id'].", tekst='$tekst', autor='Anonymous', emailautora='$email'");
							header("location: index.php?id=".$vijest1['id']);							
					}
				}
			}		 
		}
		
		
		else 
		{
			$vijest = $veza->query("select id, naslov, tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2, tip, slika from vijesti order by vrijeme desc");
			$komentar = $veza->query("select id, vijest, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme3, autor, emailautora from komentari order by vrijeme asc");
			$first = true;
			
			foreach($vijest as $vijest1)
			{	
				if ($vijest1['tip'] == "gear"){
				$rezultat1 = $veza->query("SELECT COUNT(*) FROM komentari WHERE vijest=$vijest1[id]");
				$rezultat2 = $rezultat1->fetchColumn();
				if ($first)
				{
					print ("<div id = 'glavnaVijest'>
					<img src ='".$vijest1['slika']."' style='height:250px; width:250px' />
					<h3>".$vijest1['naslov']."</h3>
					<p> ".implode(' ', array_slice(explode(' ', $vijest1['tekst']), 0, 30))."...<br><a href='index.php?id=".$vijest1['id']."'>".$rezultat2." comments</a></p>
					<p style='color: cyan;'>" .date("d.m.Y. ", $vijest1['vrijeme2']). " | by ".$vijest1['autor']."</p></div> ");
					$first = false;		
					print "<div id = 'vijestii'>";
				}
				else 
				{
					$k=2;
					print ("<div id = 'vijest".$k."'>
					<img src ='".$vijest1['slika']."' style='height:150px; width:150px' />
					<h3>".$vijest1['naslov']."</h3>
					<p> ".implode(' ', array_slice(explode(' ', $vijest1['tekst']), 0, 14))."...<br><a href='index.php?id=".$vijest1['id']."'>".$rezultat2." comments</a></p>
					<p style='color: cyan;'>" .date("d.m.Y. ", $vijest1['vrijeme2']). " | by ".$vijest1['autor']."</p></div> ");
				
					$k=$k+1;
				}
	
			}
			}
			print ("</div><div id='video-container'>
		     <span class='videonaslov'>Song of the day</span><p>
             <iframe width='397' height='250' src='https://www.youtube.com/embed/yYwLLyy-hZQ' allowfullscreen></iframe></p>
			</div>");
		}
		?>		
			
		
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