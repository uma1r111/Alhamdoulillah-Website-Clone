<?php include("../../inc/doctype.php");

$testeurlivre = $_SERVER['SERVER_NAME']  . $_SERVER['REQUEST_URI'];

	if (strstr($testeurlivre, "bukhari")) $source = "bukhari";
	if (strstr($testeurlivre, "muslim")) $source = "muslim";
	if (strstr($testeurlivre, "muwatta")) $source = "muwatta";
	if (strstr($testeurlivre, "majah")) $source = "majah";
	if (strstr($testeurlivre, "nasai")) $source = "nasai";
	if (strstr($testeurlivre, "tirmidhi")) $source = "tirmidhi";
	if (strstr($testeurlivre, "dawood")) $source = "dawood";

	if ($source == "bukhari") {
		$court = "صحيح البخاري";
		$long = "صحيح البخاري";
		$adad = 98;
	}
	
	if ($source == "muslim") {
		$court = "صحِيح مسلم";
		$long = "صحِيح مسلم";
		$adad = 57;
	}	

	if ($source == "muwatta") {
		$court = "الموطأ";
		$long = "موطأ مالك";
		$adad = 61;
	}		

if ($source == "majah") {
		$court = "ابن ماجه";
		$long = "سنن ابن ماجه";
		$adad = 38;
	}	

if ($source == "nasai") {
		$court = "النسائي";
		$long = "سنن النسائي";
		$adad = 52;
	}	
	
if ($source == "tirmidhi") {
		$court = "الترمذي";
		$long = "سنن الترمذي";
		$adad = 46;
	}	

if ($source == "dawood") {
		$court = "أبو داود";
		$long = "سنن أبي داود";
		$adad = 42;
	}	


?>

<title>حديث عن <?php echo $bookseo;?> من <?php echo $long;?> (<?php echo $bookHadiths;?> أحاديث)</title>
<meta name="description" content="<?php echo $court;?> - قراءة أحاديث <?php echo $long;?> كتاب كامل" />

</head>