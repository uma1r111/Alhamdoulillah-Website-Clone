<center>

<div style="background-color:lightblue; height:5px; margin-top:10px;"></div>
<table style="background-color:#333333; height:111px; color:white; width:100%; margin-left:auto; margin-right:auto; text-align:center;">
<tr><td>
<a style="color:white;" href="/blog/contact">Contact</a> | <a style="color:white;" href="/mentions-legales.html">Mentions légales</a> | <a style="color:white;" href="/qui-sommes-nous.html">A propos</a> | <a style="color:white;" href="/ressources.html">Ressources</a> |  <a style="color:white;" href="/blog/">Blog</a> |  <a style="color:white;" href="/glossaire/">Glossaire</a> | <a style="color:white;" href ="/blog/questions-reponses/">Questions réponses sur l'islam</a></td></tr>
<tr><td>
<a style="color:white;" href ="/infos/devenir-musulman.html">Devenir musulman</a> - 
<a style="color:white;" href ="/infos/terrorisme/">Islam et terrorisme</a> - 
<a style="color:white;" href ="/infos/convertir-islam.html">Se convertir à l'islam</a> - 
<a style="color:white;" href ="/prenom-musulman/">Prénom musulman</a> -
<a style="color:white;" href="/roqya/">Roqya</a></td></tr>
<tr><td>English : <a style="color:white;" href="/en/">al hamdulillah</a> | Arabic : <a style="color:white;" href="/ar/">الحمد الله</a><br>
al-hamdoulillah.com © <?echo date(Y);?></td></tr>
</table>

</center>
	

<?php if ((strstr($test, "horaires-prieres/monde")) or (strstr($test, "horaires-prieres/ramadan"))) {
	?>

<script src="https://apis.google.com/js/platform.js" defer></script>

<?php };?>

<script defer>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-9535111-1', 'auto');
  ga('send', 'pageview');

</script>


<!-- COOKIES -->
<link rel="stylesheet" type="text/css" href="/en/css/cookieconsent.min.css" />
<script defer src="/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#333",
      "text": "white"
    },
    "button": {
      "background": "#add8e6"
    } 
},
	onInitialise: function (status) {
	  var type = this.options.type;
	  var didConsent = this.hasConsented();
	  if (type == 'opt-out' && !didConsent) {
	
	  }
  },
  "theme": "classic",
  "type": "opt-out",
  "content": {
    "message": "Nous utilisons des cookies pour personnaliser le contenu, analyser le trafic et partager des données avec nos partenaires de médias sociaux, de publicité et d'analyse. En poursuivant votre navigation, vous acceptez l'utilisation de cookies.",
    "dismiss": "J'accepte",
    "deny": "Je refuse",
    "link": "En savoir plus",
    "href": "/mentions-legales.html"
  }
})});
</script>

<!-- START MIGRATION POPUP MODAL -->
<div id="migrationModal" style="display:none; position:fixed; z-index:999999; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.85); font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; padding:20px; box-sizing:border-box;">

    <div style="background-color:#12141c; background-image:radial-gradient(circle at top right, rgba(111,34,216,0.15), transparent 60%); width:100%; max-width:750px; min-height:420px; border-radius:16px; border:1px solid rgba(255,255,255,0.08); overflow:hidden; box-shadow:0 20px 50px rgba(0,0,0,0.5); position:relative; display:flex; flex-direction:row; animation:modalSlideUp 0.4s cubic-bezier(0.16,1,0.3,1); box-sizing:border-box;">

        <button onclick="closeMigrationModal()" style="position:absolute; top:15px; right:20px; background:none; border:none; font-size:28px; color:rgba(255,255,255,0.4); cursor:pointer; line-height:1; z-index:10;" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='rgba(255,255,255,0.4)'">&times;</button>

        <div style="flex:1.2; padding:45px 30px 45px 45px; display:flex; flex-direction:column; justify-content:center; text-align:left; z-index:2; box-sizing:border-box;">
            <h2 style="margin:0 0 16px 0; font-size:34px; font-weight:800; color:#6f22d8; line-height:1.2; letter-spacing:-0.5px;">Join Thousands of Muslims</h2>
            <p style="margin:0 0 32px 0; font-size:15px; color:#a0a5b5; line-height:1.6; max-width:380px;">Become part of a growing global community using Alhamdulillah to learn, reflect, and build stronger Islamic habits.</p>
            <div style="display:flex; gap:14px; flex-wrap:wrap;">
                <a href="https://new.al-hamdoulillah.com" target="_blank" style="background-color:#6f22d8; color:#ffffff; padding:12px 24px; font-size:14px; font-weight:600; text-decoration:none; border-radius:8px; box-shadow:0 4px 12px rgba(111,34,216,0.35); text-align:center;" onmouseover="this.style.backgroundColor='#5b1ab8'" onmouseout="this.style.backgroundColor='#6f22d8'">Explore Features</a>
                <a href="https://new.al-hamdoulillah.com/about" target="_blank" style="background-color:#ffffff; color:#12141c; padding:12px 24px; font-size:14px; font-weight:600; text-decoration:none; border-radius:8px; border:1px solid rgba(255,255,255,0.1); text-align:center;" onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">Learn More</a>
            </div>
        </div>

        <div style="flex:0.8; position:relative; display:flex; align-items:flex-end; justify-content:center; overflow:hidden; background-color:rgba(0,0,0,0.15); box-sizing:border-box; min-width:260px;" class="modal-graphics-col">
            <div style="position:absolute; bottom:-60px; right:-20px; width:320px; height:380px; background:url('/images/banners/popup-app-mockup.png') no-repeat bottom right; background-size:contain; z-index:1;"></div>
            <div style="position:absolute; bottom:-50px; right:-50px; width:200px; height:200px; background-color:#6f22d8; filter:blur(70px); opacity:0.25; border-radius:50%;"></div>
        </div>

    </div>
</div>

<style>
@keyframes modalSlideUp {
    from { opacity:0; transform:translateY(30px); }
    to   { opacity:1; transform:translateY(0); }
}
#migrationModal.active {
    display:flex !important;
    align-items:center;
    justify-content:center;
}
@media (max-width:680px) {
    #migrationModal > div { flex-direction:column !important; min-height:auto !important; max-width:420px !important; }
    .modal-graphics-col  { display:none !important; }
    #migrationModal > div > div:first-of-type { padding:35px 25px !important; }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    if (!sessionStorage.getItem("migrationModalDismissed")) {
        setTimeout(function() {
            var m = document.getElementById("migrationModal");
            m.classList.add("active");
        }, 1200);
    }
});
function closeMigrationModal() {
    document.getElementById("migrationModal").classList.remove("active");
    sessionStorage.setItem("migrationModalDismissed", "true");
}
</script>
<!-- END MIGRATION POPUP MODAL -->

<script>
document.addEventListener("DOMContentLoaded", function() {
  var lazyloadImages;    

  if ("IntersectionObserver" in window) {
    lazyloadImages = document.querySelectorAll(".lazy");
    var imageObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          var image = entry.target;
          image.src = image.dataset.src;
          image.classList.remove("lazy");
          imageObserver.unobserve(image);
        }
      });
    });

    lazyloadImages.forEach(function(image) {
      imageObserver.observe(image);
    });
  } else {  
    var lazyloadThrottleTimeout;
    lazyloadImages = document.querySelectorAll(".lazy");
    
    function lazyload () {
      if(lazyloadThrottleTimeout) {
        clearTimeout(lazyloadThrottleTimeout);
      }    

      lazyloadThrottleTimeout = setTimeout(function() {
        var scrollTop = window.pageYOffset;
        lazyloadImages.forEach(function(img) {
            if(img.offsetTop < (window.innerHeight + scrollTop)) {
              img.src = img.dataset.src;
              img.classList.remove('lazy');
            }
        });
        if(lazyloadImages.length == 0) { 
          document.removeEventListener("scroll", lazyload);
          window.removeEventListener("resize", lazyload);
          window.removeEventListener("orientationChange", lazyload);
        }
      }, 20);
    }

    document.addEventListener("scroll", lazyload);
    window.addEventListener("resize", lazyload);
    window.addEventListener("orientationChange", lazyload);
  }
})
</script>
</center>