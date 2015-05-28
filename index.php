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
		
		
			<?php	
		$veza = new PDO("mysql:dbname=me;host=localhost;charset=utf8", "meuser", "bigbangkamehameha1");
		$veza->exec("set names utf8");
		
		$vijest = $veza->query("select id, naslov, tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2, tip, slika from vijesti order by vrijeme desc");

		session_start();		
		if (isset($_SESSION['username']))
		{
			$username = $_SESSION['username'];
			
			$result = $veza->query("SELECT * FROM korisnici WHERE username='$username'");
			$genre = "\"genre\"";
			foreach ($result as $korisnik)
			{
			if ($korisnik['prava'] == 'admin'){			
		
					print "<div id='user' style='position:absolute; top:1.5%; right:25%;'><form method='post'>Logged in as ".$username."
					<input type='submit' name='logout' value ='Logout'/> "?> <a onClick="ucitaj('adminpanel')" 
					style="cursor: pointer; text-decoration: underline; color:blue">Admin panel</a><?php print "</form></div>";
					
			}
				
				else 
					print "<div id='user' style='position:absolute; top:1.5%; right:25%;'><form method='post'>Logged in as ".$username."
					<input type='submit' name='logout' value ='Logout'/></form></div>";
			}
			
		}
        
		
		else if (isset($_REQUEST['username'])) 
		{
				$username = htmlEntities($_REQUEST['username'], ENT_QUOTES);
				$username = htmlEntities($_REQUEST['password'], ENT_QUOTES);
				$upit = $veza->prepare("SELECT * FROM korisnici WHERE username=? and password=?");
				$upit->execute(array($username,$password));
		
			    $_SESSION['username'] = $username;		
                header("location: index.php");				
		}
		
		
		
		else
		{
			   print "<div id='loginn' style='position:absolute; top:1.5%; right:23%;'>
			   <form method='post' action =''><input type = 'text' name = 'username' id='username' placeholder='username'>
			   <input type = 'password' name = 'password' id='password' placeholder='password'>
			   <input type='submit' name='login' value ='Login'/></form></div>";
		}
		
		if (isset($_POST['logout']))
		{
			session_unset();
			header("location: index.php");	
		}
		?>
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
		
		$vijest = $veza->query("select id, naslov, tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2, tip, slika from vijesti order by vrijeme desc");
						
		if (isset($_GET['id']))
		{
			$vijest = $veza->query("select id, naslov, tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2, tip, slika from vijesti order by vrijeme desc");
			$komentar = $veza->query("select id, vijest, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme3, autor, emailautora from komentari order by vrijeme asc");
	
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
							if (($komentar1['emailautora'])=="")
								print "<small>".$komentar1['autor']."</small><br>".$komentar1['tekst']."<small><br> ".date("d.m.Y. (h:i)", $komentar1['vrijeme3'])."</small><br><br>";
							else
								print "<a href='mailto:".$komentar1['emailautora']."?subject=Vas komentar na MusicaElectronica&body=Default: Uspjesno ste ostavili komentar'><small>".$komentar1['autor']."</small></a><br>".$komentar1['tekst']."<small><br> ".date("d.m.Y. (h:i)", $komentar1['vrijeme3'])."</small><br><br>";
						}
					}
			
					print "<form method='post' action=' '><input type='email' name='email' placeholder ='Email'/><br>
					<textarea name='komentar' id = 'komentar' placeholder='Comment' rows='5' cols='45'></textarea><br>
					<input type='submit' name='submit' value ='Submit comment'/></form>";
					if(isset($_POST['submit']))
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
				$rezultat1 = $veza->query("SELECT COUNT(*) FROM komentari WHERE vijest=$vijest1[id]");
				$rezultat2 = $rezultat1->fetchColumn();
				if ($first)
				{
					print ("<div id = 'glavnaVijest'>
					<img src ='".$vijest1['slika']."' style='height:250px; width:250px' />
					<h3>".$vijest1['naslov']."</h3>
					<p> ".implode(' ', array_slice(explode(' ', $vijest1['tekst']), 0, 30))."...<br><a href='index.php?id=".$vijest1['id']."'>".$rezultat2." komentara</a></p>
					<p style='color: cyan;'>" .date("d.m.Y. ", $vijest1['vrijeme2']). " | by ".$vijest1['autor']."</p></div> ");
					$first = false;		
				}
				else 
				{
					$k=2;
					print ("<div id = 'vijest".$k."'>
					<img src ='".$vijest1['slika']."' style='height:150px; width:150px' />
					<h3>".$vijest1['naslov']."</h3>
					<p> ".implode(' ', array_slice(explode(' ', $vijest1['tekst']), 0, 14))."...<br><a href='index.php?id=".$vijest1['id']."'>".$rezultat2." komentara</a></p>
					<p style='color: cyan;'>" .date("d.m.Y. ", $vijest1['vrijeme2']). " | by ".$vijest1['autor']."</p></div> ");
				
					$k=$k+1;
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
		
			
		</div>
		<div id="podnozje">
		    &copy; 2014/2015 Haris &#352;emi&#263; All Rights Reserved
		    <br>Elektrotehni&#269;ki fakultet Sarajevo
		</div>	
    </div>
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