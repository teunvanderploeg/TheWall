<?php
require 'includes/functions.php';
$dbConnect = dbConnect();


$allow = array("jpg", "jpeg", "gif", "png");
$todir = 'img/';
$errors = [];

$file_error = $_FILES['fileToUpload']['error'];
switch ( $file_error ) {
    case UPLOAD_ERR_OK:
        break;
    case UPLOAD_ERR_NO_FILE:
        $errors[] = 'Er is geen bestand geupload';
        break;
    case UPLOAD_ERR_CANT_WRITE:
        $errors[] = 'Kan niet schrijven naar disk';
        break;
    case UPLOAD_ERR_INI_SIZE:
    case UPLOAD_ERR_FORM_SIZE:
        $errors[] = 'Dit bestand is te groot, pas php.ini aan';
        break;
    default:
        $errors[] = 'Onbekeden fout';
}
// Alleen verder gaan als er nog geen fouten zijn
// Met count() tel je het aantal elementen in een array
if (count( $errors )=== 0 ) {
    // De bestandsnaam staat in de key: name
        $file_name = $_FILES['fileToUpload']['name'];
     
    // Grootte in bytes staat in de key: size
        $file_size = $_FILES['fileToUpload']['size'];
     
    // De tijdelijke opslag plek staat de key: temp_name
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
     
    // Bestandstype staat in de key: type
        $file_type = $_FILES['fileToUpload']['type'];
     
     
        $valid_image_types = [
            1 => 'gif',
            2 => 'jpg',
            3 => 'png'
        ];
        $image_type        = exif_imagetype( $file_tmp );
        if ( $image_type !== false ) {
           
            $file_extension = $valid_image_types[ $image_type ];
        } else {
            $errors[] = 'Dit is geen afbeelding!';
        }
    }else{
        echo $file_error;
        exit;
    }
    if($file_size > 2097152){
        $errors[] ='Het bestand moet kleiner zijn dan 2 MB';
      }

      if ( count( $errors ) === 0 ) {
 
        // Random bestandsnaam genereren, om dubbele bestanden te voorkomen.
        $new_filename   = sha1_file( $file_tmp ) . '.' . $file_extension;
        $final_filename = 'img/' . $new_filename;
     
        
        move_uploaded_file( $file_tmp, $final_filename ); 
     

            $titel = filter_var($_POST['titel'], FILTER_SANITIZE_STRING);
            $auteur = filter_var($_POST['auteur'], FILTER_SANITIZE_STRING);
            $bijschrift = filter_var($_POST['bijschrift'], FILTER_SANITIZE_STRING);
            $afbeelding = $final_filename;
            // voorberijden 
            $stmt = $dbConnect->prepare(
                "INSERT INTO afbeeldingen (titel, auteur, bijschrift, afbeelding)
                VALUES (:titel, :auteur, :bijschrift, :afbeelding)");
                $stmt->bindParam(':titel', $titel);
                $stmt->bindParam(':auteur', $auteur);
                $stmt->bindParam(':bijschrift', $bijschrift);
                $stmt->bindParam(':afbeelding', $afbeelding);
                $stmt->execute();

                header('Location: index.php');
                exit;
        }
        else{
            echo $file_error;
            exit;
        }
      
?>
