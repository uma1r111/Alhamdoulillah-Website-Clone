<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- <script data-ad-client="ca-pub-7774762967038154" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7774762967038154" crossorigin="anonymous"></script>
<?php
$url = $_SERVER['PHP_SELF'];

$page0 = substr($url, 0, 14);
$page1 = substr($url, 0, 15);
$page2 = substr($url, 0, 14);
$page3 = substr($url, 0, 17);
$page4 = substr($url, 0, 24);

if ($page0 == '/ar/index.html') $class0 = 'class="active"';
if ($page1 == '/ar/quran/read/') $class1 = 'class="active"';
if ($page2 == '/ar/quran/mp3/') $class2 = 'class="active"';
if ($page3 == '/ar/prayer-times/') $class3 = 'class="active"';

?>

<div class="mob">
	
            <a href="/ar/"><img id="logo" alt="الإسلام" src="/images/logo-ar.webp"></a>
				
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
				
				<?php echo "
                <li $class3><a href=\"/ar/prayer-times/\">أوقات الصلاة</a></li>
                <li $class2><a href=\"/ar/quran/read/\">قراءة القرآن</a></li>
                <li $class1><a href=\"/ar/quran/mp3/\">قرآن MP3</a></li>
				";
				?>
				
            </ul>
        </div>

	</div>

        <div class="container">
            <ul id="nav">
                <li><a href="/ar/"><img id="logo" alt="الإسلام" src="/images/logo-ar.webp"></a></li>
				
                <li <?php echo $class3?>><a href="/ar/prayer-times/">أوقات الصلاة</a></li>
                <li <?php echo $class1?>><a href="/ar/quran/read/">قراءة القرآن</a></li>
                <li <?php echo $class2?>><a href="/ar/quran/mp3/">قرآن MP3</a></li>
                
            </ul>
        </div>
		
<!-- <script data-ad-client="ca-pub-7774762967038154" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7774762967038154" crossorigin="anonymous"></script>

</center>