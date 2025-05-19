<?php
$functions_dir = get_template_directory() . '/functions/';
// Inclure les fichiers spécifiques
$function_files = array(
    'generateur.php',
    'customizer.php',
    'options.php'
);

 
 // Boucle pour inclure tous les fichiers
 foreach ($function_files as $file) {
     include_once $functions_dir . $file;
 }
?>