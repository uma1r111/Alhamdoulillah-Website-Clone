<?php
include "hijri.php";
$d = new uCal;
?>

<p>Vous êtes vous déjà demandé quel jour du calendrier musulman êtes vous né ? L'outil proposé sur cette page vous permet de le savoir. Indiquez simplement votre date de naissance puis cliquez sur "Convertir". Vous obtiendrez alors aussitôt votre date de naissance selon le calendrier islamique. Cela marche aussi avec les dates de mariage ou de décès. Vous pouvez aussi chercher à quelles dates ont eu lieu des évènements importants de l'histoire récente.</p>

<?php include ("share.php")?>
 
<h2>Connaître sa Date de Naissance en Hijri</h2>

<p>Choisissez la date de naissance que vous voulez convertir en date hégirienne :</p> 

<form method="post" action="">

<?php
echo "<SELECT name='jour' Size='1'>";
 
     for($i=1; $i<=31;$i++){        //Lister les jours
 
               if ($i < 10){            //Lister les jours pour pouvoir leur ajouter un 0 devant
              echo "<OPTION>0$i<br></OPTION>";
                   }
               else {
              echo "<OPTION>$i<br></OPTION>";
                    }
                          }
echo "</SELECT>";
 
echo '<SELECT name="mois" Size="1">';
 
     for($di=1; $di<=12;$di++){        //Lister les mois
 
               if ($d < 10){            //Lister les jours pour pouvoir leur ajouter un 0 devant
              echo "<OPTION>0$di<br></OPTION>";
                   }
               else {
              echo "<OPTION>$di<br></OPTION>";
                    }
                          }
echo "</SELECT>";
 
$dato = date('Y');       //On prend l'année en cours
     
echo '<SELECT name="annee" Size="1">';
 
     for ($y=1930; $y<=$dato; $y++) {           //De l'année 2000 à l'année actuelle
         echo "<OPTION><br>$y<br></OPTION>"; }
echo "</SELECT>";

?>

<input type="submit" value="Convertir"/>
</form>

<?

		if ($_POST['jour']!='' AND $_POST['mois']!='' AND $_POST['annee']!='') {
		
		$jour = $_POST['jour']; 
		$mois = $_POST['mois'];
		$annee = $_POST['annee'];
		
		$quand = $_POST['annee']-570;
		
		
		$calculer = "$annee-$mois-$jour";
		$semaine = date('D', strtotime($calculer));
		if ($semaine = "Sun") $semaine = "Dimanche";
		if ($semaine = "Mon") $semaine = "Lundi";
		if ($semaine = "Tue") $semaine = "Mardi";
		if ($semaine = "Wed") $semaine = "Mercredi";
		if ($semaine = "Thu") $semaine = "Jeudi";
		if ($semaine = "Fri") $semaine = "Vendredi";
		if ($semaine = "Sat") $semaine = "Samedi";

		  $date = $d->g2u($jour,$mois,$annee);
		  
		  if ($date[month] == 1) $date[month] = "Mouharram";
		  if ($date[month] == 2) $date[month] = "Safar";
		  if ($date[month] == 3) $date[month] = "Rabi' 1";
		  if ($date[month] == 4) $date[month] = "Rabi' 2";
		  if ($date[month] == 5) $date[month] = "Joumada 1";
		  if ($date[month] == 6) $date[month] = "Joumada 2";
		  if ($date[month] == 7) $date[month] = "Rajab";
		  if ($date[month] == 8) $date[month] = "Cha'ban";
		  if ($date[month] == 9) $date[month] = "Ramadan";
		  if ($date[month] == 10) $date[month] = "Shawwal";
		  if ($date[month] == 11) $date[month] = "Dhoul Qi'dah";
		  if ($date[month] == 12) $date[month] = "Dhoul Hidjah";
		  
		  if ($date[day] == 1) $date[day] = "1er";
		  
		  $comparaison = $d->date("Y");
		  
		  $age = $comparaison-$date['year'];
		  
		  echo "
		  
		  <ul>
		  <li>Selon le calendrier hégirien, votre date de naissance est le <b>$semaine $date[day] $date[month] $date[year]</b>.</li>
		  <li>Votre âge en année lunaire est de <b>$age ans</b>.</li>
		  <li>Vous êtes né(e) <b>$quand ans après le prophète</b> sallallahou 'alayhi wa sallam</b>.</li>
		  <ul>";
		}
?>
		  
