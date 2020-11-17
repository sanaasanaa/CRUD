<?php
$uploaddir = 'photos/';
$uploadfile = $uploaddir . basename($_FILES['photo_ticket']['name']);

echo '<pre>';
if (move_uploaded_file(@$_FILES['photo_ticket']['tmp_name'], $uploadfile)) {

echo "<img src=".$uploadfile."alt='ticket'>";

header('Location: index.php');

} else {
echo "Probleme avec ce fichier";
}

echo '</pre>';
?>