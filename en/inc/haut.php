<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- <script data-ad-client="ca-pub-7774762967038154" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7774762967038154" crossorigin="anonymous"></script>

<link rel="preconnect" href="https://al-hamdoulillah.com">
<link rel='dns-prefetch' href='//al-hamdoulillah.com' />
<link rel='dns-prefetch' href='//fonts.googleapis.com' />
<link rel='dns-prefetch' href='//fonts.googleapis.com' />
<link rel="dns-prefetch" href="//www.google-analytics.com">
<link rel="dns-prefetch" href="//ssl.google-analytics.com">
<link rel="dns-prefetch" href="//pagead2.googlesyndication.com">
<link rel="dns-prefetch" href="//googleads.g.doubleclick.net">
<link rel="dns-prefetch" href="//tpc.googlesyndication.com">
<link rel="dns-prefetch" href="//stats.g.doubleclick.net">
<link rel="dns-prefetch" href="//www.gstatic.com">

<?php
$url = $_SERVER['PHP_SELF'];

$pageI = substr($url, 0, 14);

$page0 = substr($url, 0, 17);
$page1 = substr($url, 0, 15);
$page2 = substr($url, 0, 14);
$page3 = substr($url, 0, 24);
$page4 = substr($url, 0, 25);
$page5 = substr($url, 0, 26);
$page6 = substr($url, 0, 17);


if ($pageI == '/en/index.html') $classI = 'class="active"';

if ($page0 == '/en/prayer-times/') $class0 = 'class="active"';
if ($page1 == '/en/quran/read/') $class1 = 'class="active"';
if ($page2 == '/en/quran/mp3/') $class2 = 'class="active"';
if ($page3 == '/en/muslim-calendar.html') $class3 = 'class="active"';
if ($page4 == '/en/pillars-islam/prayer/') $class4 = 'class="active"';
if ($page5 == '/en/pillars-islam/ramadan/') $class5 = 'class="active"';
if ($page6 == '/en/supplication/') $class6 = 'class="active"';

?>


        <div class="mob">
	
            <a href="/en/"><img id="logo" alt="islam" src="/images/logo-en.webp"></a>
				
		<button id="bouton" onclick="myFunction()">Menu</button>

		<script>
function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>

		
	<div id="myDIV" style="display:none;" class="container2">
		
	
            <ul id="nav">
				
				<?php echo ";
                <li $class1><a href=\"/en/prayer-times/\">Prayer Times</a></li>
                <li $class2><a href=\"/en/muslim-calendar.html\">Islamic Calendar</a></li>
                <li $class3><a href=\"/en/quran/mp3/\">Quran Mp3</a></li>
                <li $class4><a href=\"/en/pillars-islam/prayer/\">The Prayer</a></li>
                <li $class5><a href=\"/en/pillars-islam/ramadan/\">Ramadan</a></li>
                <li $class6><a href=\"/en/supplication/\">Supplications</a></li>
				";
				?>
				
            </ul>
        </div>

	</div>


        <div class="container">
            <ul id="nav">
                
                <li><a href="/en/"><img id="logo" alt="islam" src="/images/logo-en.webp"></a></li>

                <li <?php echo $class0?>><a href="/en/prayer-times/">Prayer Times</a></li>
				<li <?php echo $class3?>><a href="/en/muslim-calendar.html">Islamic Calendar</a></li>
                <li <?php echo $class1?>><a href="/en/quran/read/">Read Quran</a></li>
                <li <?php echo $class2?>><a href="/en/quran/mp3/">Quran Mp3</a></li>
                <li <?php echo $class4?>><a href="/en/pillars-islam/prayer/">The Prayer</a></li>
                <li <?php echo $class5?>><a href="/en/pillars-islam/ramadan/">Ramadan</a></li>
                <li <?php echo $class6?>><a href="/en/supplication/">Supplications</a></li>
                
                
                
            </ul>
        </div>
		
<center>
<!-- <script data-ad-client="ca-pub-7774762967038154" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7774762967038154" crossorigin="anonymous"></script>
</center>