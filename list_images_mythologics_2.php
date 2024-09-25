<?php
header('Content-Type: application/json');

// Définir le chemin vers le dossier des images
$image_dir = './images/sources/mythologics_2';

// Récupérer la liste des fichiers du dossier
$files = scandir($image_dir);

// Filtrer les fichiers pour ne garder que les images
$images = array_filter($files, function($file) use ($image_dir) {
    $file_path = $image_dir . '/' . $file;
    return is_file($file_path) && preg_match('/\.(jpg|jpeg|png|webp)$/i', $file);
});

// Créer un tableau avec le chemin complet pour chaque image
$image_list = array_map(function($image) use ($image_dir) {
    return [
        'name' => $image,
        'path' => $image_dir . '/' . $image
    ];
}, $images);

// Retourner les données au format JSON
echo json_encode($image_list);
?>
