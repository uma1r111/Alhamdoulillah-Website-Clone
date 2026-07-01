<?php 
$test = $_SERVER['SERVER_NAME']  . $_SERVER['REQUEST_URI'];
include ("coranic.php");
include("../inc/doctype.php");

$cano = get_permalink();
$liencano = substr($cano, 31);

if (strlen($_SERVER['REQUEST_URI']) > 50) echo '<link rel="canonical" href="https://www.al-hamdoulillah.com'.$liencano.'"/>';

if (strpos($test,'/page/') !== false) echo '<meta name="robots" content="noindex,follow" />';


if ($test == "www.al-hamdoulillah.com/blog/") echo "<title>Blog sur l'Islam et l'Actualité des Musulmans en France et dans le monde</title>"; 

if (($test == "www.al-hamdoulillah.com/blog/forum.html") && ($test !== "www.al-hamdoulillah.com/blog/")) {
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"http://www.al-hamdoulillah.com/blog/wp-content/plugins/bbpress/templates/default/css/bbpress.css\">";
	echo "<title>Forum Islam</title>"; }

 if (($test !== "www.al-hamdoulillah.com/blog/forum") 
	&& ($test !== "www.al-hamdoulillah.com/blog/forum.html") 
	&& ($test !== "www.al-hamdoulillah.com/blog/") 
	&& ($test !== "www.al-hamdoulillah.com/blog/quiz") 
	&& ($test !== "www.al-hamdoulillah.com/blog/fetes") 
	&& ($test !== "www.al-hamdoulillah.com/blog/developpement-personnel") 
	&& ($test !== "www.al-hamdoulillah.com/blog/actualite") 
	&& ($test !== "www.al-hamdoulillah.com/blog/temoignages-convertis") 
	&& ($test !== "www.al-hamdoulillah.com/blog/islamophobie") 
	&& ($test !== "www.al-hamdoulillah.com/blog/dawa") 
	&& ($test !== "www.al-hamdoulillah.com/blog/miracles")
	
	&& ($test !== "www.al-hamdoulillah.com/blog/questions-reponses")

		
		
	&& ($test !== "www.al-hamdoulillah.com/blog/rappels") 
		&& ($test !== "www.al-hamdoulillah.com/blog/rappels/mort") 
		&& ($test !== "www.al-hamdoulillah.com/blog/rappels/dounia") 
		&& ($test !== "www.al-hamdoulillah.com/blog/rappels/bonheur") 
		&& ($test !== "www.al-hamdoulillah.com/blog/rappels/science") 
		&& ($test !== "www.al-hamdoulillah.com/blog/rappels/bon-comportement") 
		
	&& ($test !== "www.al-hamdoulillah.com/blog/mises-a-jour")) echo "<title>$post->post_title</title>"; 
	
if ($test == "www.al-hamdoulillah.com/blog/quiz") echo "<title>Quiz sur l'Islam - Test de Connaissance Religion Musulmane</title>"; 
if ($test == "www.al-hamdoulillah.com/blog/fetes") echo "<title>Fetes Musulmanes - Aid el Fitr, Aid el Adha</title>"; 
if ($test == "www.al-hamdoulillah.com/blog/mises-a-jour") echo "<title>Mises à jour et Nouveautés du site al-hamdoulillah.com</title>"; 
if ($test == "www.al-hamdoulillah.com/blog/actualite") echo "<title>Actualité de l'Islam et des Musulmans</title>"; 

if ($test == "www.al-hamdoulillah.com/blog/questions-reponses") {
	echo "<title>Questions Réponses sur l'Islam et la Religion en Ligne</title>"; 
	echo '<link rel="next" href="https://www.al-hamdoulillah.com/blog/questions-reponses/page/2/">'; 
}

if ($test == "www.al-hamdoulillah.com/blog/questions-reponses/page/2") {
	echo '<link rel="prev" href="https://www.al-hamdoulillah.com/blog/questions-reponses/">';
	echo '<link rel="next" href="https://www.al-hamdoulillah.com/blog/questions-reponses/page/3/">'; 
	}


if ($test == "www.al-hamdoulillah.com/blog/rappels") echo "<title>Rappel Islam - Rappels Islamiques sur la Religion</title>"; 
	if ($test == "www.al-hamdoulillah.com/blog/rappels/mort") echo "<title>Rappel Mort Islam - Rappels sur la Mort</title>"; 
	if ($test == "www.al-hamdoulillah.com/blog/rappels/dounia") echo "<title>Rappel sur la dounia, le Bas Monde, la Vie d'Ici-Bas</title>"; 
	if ($test == "www.al-hamdoulillah.com/blog/rappels/bonheur") echo "<title>Rappel sur le Bonheur en Islam</title>"; 
	if ($test == "www.al-hamdoulillah.com/blog/rappels/science") echo "<title>Rappel sur le Science en Islam et ses Mérites</title>"; 
	if ($test == "www.al-hamdoulillah.com/blog/rappels/bon-comportement") echo "<title>Rappel sur le Bon Comportement en Islam</title>"; 
	
if ($test == "www.al-hamdoulillah.com/blog/islamophobie") echo "<title>Islamophobie Anti Islam - Racisme Anti Musulman et Critiques</title>"; 
if ($test == "www.al-hamdoulillah.com/blog/dawa") echo "<title>Dawa Islam - Comment Faire la Da'wa aux Non-Musulmans</title>"; 
if ($test == "www.al-hamdoulillah.com/blog/miracles") echo "<title>Les Miracles Scientifiques du Coran et de la Sounna</title>"; 
if ($test == "www.al-hamdoulillah.com/blog/developpement-personnel") echo "<title>Développement Personnel en Ligne : cours, formation, pdf</title>"; 
if ($test == "www.al-hamdoulillah.com/blog/temoignages-convertis") echo "<title>Témoignages de Convertis à l'Islam - Témoignage Religion Musulmane</title>"; 
	?>

</head>

<body>

<?php include("../inc/menu.php") ?>

<table id="global">
<tbody>
<tr>

<td id="contenu">

<?php 
if ($test == "www.al-hamdoulillah.com/blog/") echo "<h1 class=\"article\">Blog Islam : La Louange</h1>";
if (($test == "www.al-hamdoulillah.com/blog/forum.html") && ($test !== "www.al-hamdoulillah.com/blog/")) echo "<h1 class=\"article\">Forum Islam</h1>";

if (($test !== "www.al-hamdoulillah.com/blog/forum") 
	&& ($test !== "www.al-hamdoulillah.com/blog/") 
	&& ($test !== "www.al-hamdoulillah.com/blog/quiz")  
	&& ($test !== "www.al-hamdoulillah.com/blog/miracles") 
	
	&& ($test !== "www.al-hamdoulillah.com/blog/rappels") 
		&& ($test !== "www.al-hamdoulillah.com/blog/rappels/mort") 
		&& ($test !== "www.al-hamdoulillah.com/blog/rappels/dounia") 
		&& ($test !== "www.al-hamdoulillah.com/blog/rappels/bonheur") 
		&& ($test !== "www.al-hamdoulillah.com/blog/rappels/science") 
		&& ($test !== "www.al-hamdoulillah.com/blog/rappels/bon-comportement") 
		
	&& ($test !== "www.al-hamdoulillah.com/blog/questions-reponses")

		
	&& ($test !== "www.al-hamdoulillah.com/blog/developpement-personnel") 
	&& ($test !== "www.al-hamdoulillah.com/blog/temoignages-convertis") 
	&& ($test !== "www.al-hamdoulillah.com/blog/mises-a-jour")
	&& ($test !== "www.al-hamdoulillah.com/blog/islamophobie")
	&& ($test !== "www.al-hamdoulillah.com/blog/dawa")
	&& ($test !== "www.al-hamdoulillah.com/blog/actualite"))
	the_title( '<h1 class="article">', '</h1>' );

// RAPPELS

if ($test == "www.al-hamdoulillah.com/blog/rappels") echo "
<h1 class=\"article\">Rappel Islam</h1>
<p>L'Homme oubli par nature. C'est pourquoi il lui est nécessaire de se rappeler. Allah dit dans le Coran : {Et rappelle ; car le rappel profite aux croyants} (s51/v55). Voici donc une série de rappels sur différents sujets comme le bon comportement, la prière, la famille, la jeunesse, la fornication et plein d'autres thèmes.</p>
<h2 style=\"margin-top:-15px;\">Rappels Islamiques</h2>
"; 

if ($test == "www.al-hamdoulillah.com/blog/rappels/mort") echo "
<h1 class=\"article\">Rappel sur la Mort</h1>
<h2 style=\"margin-top:-15px;\">Rappels sur la Mort en Islam</h2>
"; 
	
if ($test == "www.al-hamdoulillah.com/blog/rappels/dounia") echo "
<h1 class=\"article\">Rappel sur la dounia</h1>
<p style=\"margin-bottom:-15px;\">Le rappel sur la vie d'ici-bas est important. Il permet paradoxalement de redescendre un peu sur terre et voir ce bas monde d'un oeil différent. L'imam Ibn al Jaouzi a dit : « Ceux qui courrent derrière ce monde ont certes négligé son plaisir. Le plaisir de ce monde n'est autre que la noblesse de la science, la splendeur de la chasteté, la fierté de l'honneur ainsi que la gloire de sa sobriété. »</p>
<h2 style=\"margin-top:-15px;\">Rappels sur la Vie dans ce Bas-Monde</h2>
";

if ($test == "www.al-hamdoulillah.com/blog/rappels/bonheur") echo "
<h1 class=\"article\">Rappel sur le Bonheur</h1>
<p>Ceux qui errent derrière les fausses illusions du bonheur n'atteindront en réalité qu'un faux mirage. Si le fabricant est le seul à décider de ce qui convient le mieux à son objet ainsi fabriqué, et ce en le faisant suivre d'une notice d'utilisation, garante pour son bon fonctionnement, alors qu'il s'agit d'un objet purement mécanique, que dire de l'être humain, que des gens mals inspirés veulent à tout prix diriger loin de la nature que lui a assigné son Créateur.</p>
<p>Allah sait mieux que quiconque ce qui nous va et ce qui nous convient dans notre vie. Le bonheur n'est pas toujours forcément là où on le pense. Il se peut que nous ayez de l'aversion pour une chose alors qu'il y a en elle un grand bien, et vis versa.</p>
<h2 style=\"margin-top:-15px;\">Rappels sur le Bonheur en Islam</h2>
"; 

if ($test == "www.al-hamdoulillah.com/blog/rappels/science") echo "
<h1 class=\"article\">Rappel sur la Science</h1>
<p>Le prophète <span class=\"respect\">(sallallahou 'alayhi wa sallam)</span> a dit : « <span class=\"hadith\">Le mérite du savant sur le dévot est semblable à celui de la lune au cours d'une nuit de pleine lune sur l'ensemble des autres planètes. Les savants sont les héritiers des prophètes. Or les prophètes n'ont laissé en guide d'héritage ni dinar, ni dirham, mais seulement la science. Celui qui s'adonne à la science s'assure d'une grande chance.</span> »</p>
<h2 style=\"margin-top:-15px;\">Rappels sur la Science en Islam</h2>
"; 

if ($test == "www.al-hamdoulillah.com/blog/rappels/bon-comportement") echo "
<h1 class=\"article\">Rappel sur le Bon Comportement</h1>
<h2 style=\"margin-top:-15px;\">Rappels sur le Bon Comportement du Musulman</h2>
"; 
	
if ($test == "www.al-hamdoulillah.com/blog/quiz") echo "
<h1 class=\"article\">Quiz sur l'Islam</h1>
<h2 style=\"margin-top:-15px;\">Test de Connaissance sur l'Islam</h2>
"; 

if ($test == "www.al-hamdoulillah.com/blog/fetes") echo "
<h1 class=\"article\">Fêtes Musulmanes</h1>
<h2 style=\"margin-top:-15px;\">Fêtes Islamiques</h2>
"; 


if ($test == "www.al-hamdoulillah.com/blog/developpement-personnel") echo "
<h1 class=\"article\">Developpement Personnel</h1>
<p>Vous arrive-t-il d'être mal à l'aise ? De perdre vos moyens ? N'avez-vous jamais peur de \"ne pas être à la hauteur\" et de soulever les rires ? Ce sentiment de \"ne pas être comme les autres\", ces contradictions internes, vous essayez bien de les oublier, mais elles sont là, et elle vous conduiront, peu à peu, à l'échec.</p>
<p>D'ailleurs, ne vous mènent-elles pas, de temps en temps, à un état dépressif ? A un sentiment de \"ras le bol\" ? A une impression de passer à côté des vraies choses de la vie ? Rassurez-vous, des milliers de gens avant vous ont connu ces difficultés. Certains ont appris à surmonter, à dépasser ce handicap. Ils ne sont plus le jouet des circonstances, au contraire ; ils les plient à leur volonté. </p>
<p>Grâce au développement personnel, vous pouvez par exemple insha Allah :</p>
<ul>
	<li>Devenir beaucoup plus sûr de vous même</li>
	<li>Vous exprimer clairement et à convaincre les autres</li>
	<li>Stimuler votre créativité et votre imagination</li>
	<li>Augmenter votre concentration et votre mémoire.</li>
	<li>N'éprouverer plus de gêne, ni de peur de l'échec.</li>
	<li>Assimiler facilement de nouvelles connaissances.</li>
</ul>
<p>Ces articles de développement personnel s'adressent à tous et à toutes : aussi bien à ceux qui croient que l'épanouissement leur est interdit parce-qu'ils n'ont pas assez de diplômes, qu'aux intellectuels qui souffrent de ne pas avoir les pieds sur terre.</p>
<h2 style=\"margin-top:-15px;\">Developpement Personnel Gratuit</h2>
";

 
if ($test == "www.al-hamdoulillah.com/blog/islamophobie") echo "
<h1 class=\"article\">Islamophobie</h1>
<p>Les musulmans sont la cibles de nombreux actes malveillants du simple fait de leur appartenance à la religion musulmane. Cette section relève quelques actes islamophobes auxquels sont confrontés les musulmans, principalement les femmes musulmanes voilées. Du fait du grand nombre de violences contre les musulmans, il n'est pas possible de tout lister ici. Ce n'est qu'un aperçu, un échantillon de la situation que vivent des musulmans.</p>
<h2 style=\"margin-top:-15px;\">Racisme Anti Musulman et Anti Islam</h2>
"; 


if ($test == "www.al-hamdoulillah.com/blog/dawa") echo "
<h1 class=\"article\">Da'wa</h1>
<h2 style=\"margin-top:-15px;\">Faire la Dawa</h2>
"; 


if ($test == "www.al-hamdoulillah.com/blog/miracles") echo "<h1 class=\"article\">Miracles du Coran</h1>"; 

if ($test == "www.al-hamdoulillah.com/blog/temoignages-convertis") echo "
<h1 class=\"article\">Témoignages de Convertis à l'Islam</h1>
<p>L'islam est une religion qui attire de plus en plus de gens à travers le monde, malgré les critiques d'une partie des médias. On pourrait également dire que c'est par par le biais des médias qui allument les projecteurs sur cette belle religion qu'est l'islam, ce qui pousse les gens à se renseigner et se faire leur propre opinion.</p>
<h2 style=\"margin-top:-15px;\">Récits de Convertis à l'Islam</h2>
"; 

if ($test == "www.al-hamdoulillah.com/blog/mises-a-jour") echo "<h1 class=\"article\">Mises à jour et Nouveautés du site</h1>"; 	

if ($test == "www.al-hamdoulillah.com/blog/actualite") echo "
<h1 class=\"article\">Actualité de l'Islam en France et des Musulmans du Monde</h1>
<p>Notre équipe s'efforce de vous proposer les évènements qui font l'actualité dans notre pays, en Europe et plus globalement dans le monde entier. Dans le cadre de la lutte contre les propagation de fake news, veuillez nous signaler toute fausse information afin d'en informer aussitôt nos lecteurs. Parce-que votre avis est important, n'hésitez pas à nous contacter pour nous faire part de vos commentaires.</p>
<h2 style=\"margin-top:-15px;\">Actualité des Musulmans en France et dans le Monde</h2>
"; 	

// QUESTIONS REPONSES

if ($test == "www.al-hamdoulillah.com/blog/questions-reponses") echo "
<h1 class=\"article\">Questions Réponses sur l'Islam</h1>
<p>Vous trouverez dans cette catégorie toute une série de questions/réponses posées par les frères et soeurs de notre communauté sur des sujets divers et variés touchant à la vie du musulman, sa relation avec Allah, avec les musulmans, avec les non-musulmans, dans sa vie professionnelle, etc.. </p>
<p>Aussi, il est bon de rappeler certains principes de bases. Les questions sont posées dans un contexte bien précis. Elle s'appliquent à un moment donné, dans un pays ou un endroit donné, pour une personne donnée. Non pas que les réponses sont valables uniquement pour ceux qui ont posé la question, mais ce sont des éléments dont il faut tenir compte et ne pas tirer des généralités à partir d'une réponse.</p>
<p>Pour certaines réponses, tous les avis juridiques ne sont pas précisés. Si vous souhaitez connaitre un avis précis, merci de nous contacter. Parfois, seul l'avis des malikites est donné, tantôt celui des hanafites, des chafi'ites, des hanbalites ou bien d'autres savants contemporains.</p>
<h2 style=\"margin-top:-15px;\">Questions sur l'Islam et la Religion Musulmane</h2>";



if ($test == "www.al-hamdoulillah.com/blog/forum.html") echo "
<p style=\"margin-bottom:-15px;\">Ce forum de discussion vous permet d'échanger au sujet de tous les aspects de la religion musulmane. Vous êtes priés d'échanger avec respect et de garder à l'esprit que même si vous êtes derrière votre écran, tout ce qui vous écrivez pourra être retenu contre vous le Jour du Jugement. Soyez des frères et soeurs qui s'aiment en Allah. Entraidez vous mutuellement et encouragez-vous à faire de bonnes oeuvres. N'hésitez pas aussi à discuter de votre problèmes concernant le mariage, la prière, le jeûne ou encore la sorcellerie et le mauvais oeil.</p>";



?>