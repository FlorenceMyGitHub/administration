<?php
//upload.php
if($_FILES["file"]["name"] != '')
{

    
if ($_SERVER['SERVER_NAME'] == "localhost") {
    $s_file = 'http://localhost/maud/controller/galerie.json';
} else {
    $s_file = "http://".$_SERVER['SERVER_NAME']."/controller/galerie.json";
}
    
$array_id = array();
try {
    // On essayes de récupérer le contenu existant
    $s_fileData = file_get_contents($s_file.'?'.mt_rand());

    if( !$s_fileData || strlen($s_fileData) == 0 ) {
        // On crée le tableau JSON
        $tableau_pour_json = array();
        $id = 1;
    } else {
        // On récupère le JSON dans un tableau PHP
        $tableau_pour_json = json_decode($s_fileData, true);
        if (!empty($tableau_pour_json)) { 
        foreach ($tableau_pour_json as $img) {
            foreach ($img as $key=>$value) {
                if ($key == 'id') {
                    array_push($array_id, $value); 
                  //  var_dump($array_id);
                }
            }
        }
        $last_id = max($array_id);
        $id = $last_id+1;
        } else {
            $id = 1;
        }
    }
    
    $ext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    $test = explode('.', $_FILES["file"]["name"]);
    $ext = end($test);
    $name = rand(100, 999) . '.' . $ext;
    $location = '../../img/upload/' . $id.".".strtolower($ext);  
    $time = time();
    move_uploaded_file($_FILES["file"]["tmp_name"], $location);
    echo '<img src="'.$location.'?nocache='.$time.'" height="150" width="225" class="img-thumbnail" />';    
    
    //JSON
    $name="";
    $description="";
    $source= '../../img/upload/' . $id.".".strtolower($ext);

 
    
    
    // On ajoute le nouvel élement
    array_push( $tableau_pour_json, array(
        'id' => $id,
        'name' => $name,
        'description' => $description,
        'source' => $source
    ));
    // On réencode en JSON
    $contenu_json = json_encode($tableau_pour_json);

    // On stocke tout le JSON
    $s_file = '../../controller/galerie.json';
    file_put_contents($s_file, $contenu_json);

    echo "<p>La peinture a bien été ajoutée. </p><br><br><a href='index.php'><button type='button' class='btn btn-outline-secondary'>Ajouter une nouvelle peinture</button></a>";
} catch( Exception $e ) {
    echo "Erreur : ".$e->getMessage();
}
    
 
    
    
}
?>