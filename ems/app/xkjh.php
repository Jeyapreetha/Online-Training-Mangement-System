<html>
<head>
<title>ShotDev.Com Tutorial</title>
</head>
<body>

<?php 
$word = new COM("word.application") or die ("Could not initialise MS Word object."); 
$word->Documents->Open(realpath("Budget Approval System.doc")); 
$strPath = realpath(basename(getenv($_SERVER["SCRIPT_NAME"]))); // C:/AppServ/www/myphp
$FileName = "MyPP";
// Extract content. 
$word->ActiveDocument->ExportAsFixedFormat($strPath."/".$FileName, 17, false, 0, 0, 0, 0, 7, true, true, 2, true, true, false);
$word->ActiveDocument->Close(false); 

$word->Quit(); 
$word = null; 
unset($word); 
$imagick = new Imagick(); 
$imagick->setResolution( 300, 300 ); 
if(!file_exists($strPath."\\DOC1\\"))
{
	mkdir($strPath."\\DOC1\\");
}
$imagick->readImage($strPath."\\".$FileName.'.pdf'); 
$imagick->writeImages($strPath."\\DOC1\\".$FileName.'.jpg', false); 

?>
</body>
</html>