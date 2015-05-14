 <!DOCTYPE html>


<HTML>
<HEAD>
    <TITLE>Musica Electronica</TITLE>
	<link rel="stylesheet" type="text/css" href="WTprojekatStil.css">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
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
	
			<SCRIPT src = "Skripte.js" ></SCRIPT>
			
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
        $folder = glob('novosti/*.txt', GLOB_BRACE);
        $fajlovi = array();
        foreach($folder as $file) 
		{
            $fajl = file($file);
            array_push($fajlovi, $fajl);
        }

		
		for ($i=0; $i<count($fajlovi); $i++)
		{
			for ($j=0; $j<count($fajlovi); $j++)
			{
				$datum1 = strtotime($fajlovi[$i][0]);
				$datum2 = strtotime($fajlovi[$j][0]);
				if ($datum1 < $datum2)
				{
					$pomocna = $fajlovi[$i];
					$fajlovi[i] = $fajlovi[$j];
					$fajlovi[j] = $pomocna;
				}
			}
		}
		
		$first = true;
		foreach($fajlovi as $file)
		{
			$datumivrijeme=$file[0];
			$autor=$file[1];
			$naslov=$file[2];
			$slikanovosti=$file[3];
			$tekstnovost="";
			$tekstsirebool=false;
			$tekstsire="";
			$linkvise="";
			$tekst="";
			$tekst1=array();
			$postojivise=true;
			
			for($i = 4; $i < count($file); $i++) 
			{
				if(trim($file[$i]) === "--") 
				{
					$postojivise = false;
				}
				if($postojivise) 
				{
					$tekstnovost = $tekstnovost." ".$file[$i];
				}
				else 
				{
					if(trim($file[$i]) != "--")
					{
						$tekstsirebool = true;
						$tekstsire = $tekstsire." ".$file[$i];
						$linkvise="...more";
					}
				}
			}
        
			
			$DiV = explode(' ', $datumivrijeme);
			
			$naslov = strtolower($naslov);
            $naslov[0] = strtoupper($naslov[0]);
			
			if ($first)
			{
				print ("<div id = 'glavnaVijest'>
				<img src ='".htmlentities($slikanovosti, ENT_QUOTES)."' height:'200' width:'150' />
				<h3>".htmlentities($naslov, ENT_QUOTES)."</h3>
				<p> ".$tekstnovost."<a style='color: blue;'>".$linkvise."</a></p>
				<p style='color: cyan;'>" .$DiV[0]. " | by ".htmlentities($autor, ENT_QUOTES)."</p></div> ");
				$first = false;		
			}
			else {
			$k=2;
			print ("<div id = 'vijest".$k."'>
			 <img src ='".htmlentities($slikanovosti, ENT_QUOTES)."' height:'200' width:'150' />
			 <h3>".htmlentities($naslov, ENT_QUOTES)."</h3>
			 <p> ".$tekstnovost."<a style='color: blue;'>".$linkvise."</a></p>
			 <p style='color: cyan;'>" .$DiV[0]. " | by ".htmlentities($autor, ENT_QUOTES)."</p></div> ");
			 
			$k=$k+1;}
	
		}
		?>		
		<div id="video-container" style= "top:5px">
		     <span class="videonaslov">Song of the day</span><p>
             <iframe width="397" height="250" src="https://www.youtube.com/embed/yYwLLyy-hZQ" allowfullscreen></iframe></p>
        </div>	
		<div id="listapartners" style= "top:40px">
		Partners of Musica Electronica:
				<ul class="moja_lista">
				    <li><a href="http://www.bhtelecom.ba" target="_blank">BH Telecom</a></li>
					<li><a href="http://www.tomorrowland.com/global-splash/" target="_blank">Tomorrowland</a></li>
					<li><a href="http://djmag.com/" target="_blank">DJ Mag</a></li>
					<li><a href="http://www.sensation.com/landing/" target="_blank">Sensation</a></li>
				</ul>
		</div>
			
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