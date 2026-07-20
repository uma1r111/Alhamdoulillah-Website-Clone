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