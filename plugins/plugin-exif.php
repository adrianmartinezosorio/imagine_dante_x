<?php
/*

EXIFMODULE 1.0

exif_image_data($imagePath);
exif_image_gps($image = '');

exif_date_sanitize($date);
exif_date_sanitize_hour($date);
exif_date_sanitize_date($date);

Update: 25/01/2020
*/


/*---------------------------------------------------------------------------*/
/* Obtenemos array con las coordenadas de la imagen. */
/* 2020 */
/*---------------------------------------------------------------------------*/
function exif_image_gps($image = ''){
    if(isset($image) && !empty($image) && file_exists($image)){
        $exif = exif_read_data($image, 0, true);
        if($exif && isset($exif['GPS'])){

            if(isset($exif['GPS']['GPSLatitude']) && isset($exif['GPS']['GPSLongitude']) && !empty($exif['GPS']['GPSLatitude']) && !empty($exif['GPS']['GPSLongitude'])){

                $GPSLatitudeRef = $exif['GPS']['GPSLatitudeRef'];
                $GPSLatitude    = $exif['GPS']['GPSLatitude'];
                $GPSLongitudeRef= $exif['GPS']['GPSLongitudeRef'];
                $GPSLongitude   = $exif['GPS']['GPSLongitude'];

                $lat_degrees = count($GPSLatitude) > 0 ? gps2Num($GPSLatitude[0]) : 0;
                $lat_minutes = count($GPSLatitude) > 1 ? gps2Num($GPSLatitude[1]) : 0;
                $lat_seconds = count($GPSLatitude) > 2 ? gps2Num($GPSLatitude[2]) : 0;
                
                $lon_degrees = count($GPSLongitude) > 0 ? gps2Num($GPSLongitude[0]) : 0;
                $lon_minutes = count($GPSLongitude) > 1 ? gps2Num($GPSLongitude[1]) : 0;
                $lon_seconds = count($GPSLongitude) > 2 ? gps2Num($GPSLongitude[2]) : 0;
                
                $lat_direction = ($GPSLatitudeRef == 'W' or $GPSLatitudeRef == 'S') ? -1 : 1;
                $lon_direction = ($GPSLongitudeRef == 'W' or $GPSLongitudeRef == 'S') ? -1 : 1;
                
                $latitude = $lat_direction * ($lat_degrees + ($lat_minutes / 60) + ($lat_seconds / (60*60)));
                $longitude = $lon_direction * ($lon_degrees + ($lon_minutes / 60) + ($lon_seconds / (60*60)));

                if(isset($exif['GPS']['GPSAltitude']) && !empty($exif['GPS']['GPSAltitude'])){

                    $GPSAltitudeRef= $exif['GPS']['GPSAltitudeRef'];
                    $GPSAltitude   = $exif['GPS']['GPSAltitude'];
                    $GPSAltitude = explode("/", $GPSAltitude);
                    $GPSAltitude = $GPSAltitude[0] / $GPSAltitude[1];

                    return array('latitude'=>$latitude, 'longitude'=>$longitude,'altitude'=>$GPSAltitude);

                }else{

                    return array('latitude'=>$latitude, 'longitude'=>$longitude,'altitude'=>"false");

                }

            }else{
                return false;
            }

        }else{
            return false;
        }
    }else{
        return false;
    }
}

/*---------------------------------------------------------------------------*/
/* Obtenemos array con los datos de la imagen. */
/* 2020 */
/*---------------------------------------------------------------------------*/
function exif_image_data($imagePath) {

    // Check if the variable is set and if the file itself exists before continuing
    if ((isset($imagePath)) and (file_exists($imagePath))) {
   
      // There are 2 arrays which contains the information we are after, so it's easier to state them both
      $exif_ifd0 = exif_read_data($imagePath ,'IFD0' ,0);      
      $exif_exif = exif_read_data($imagePath ,'EXIF' ,0);
     
      //error control
      $notFound = "Unavailable";
     
      // Make
      if (@array_key_exists('Make', $exif_ifd0)) {
        $camMake = $exif_ifd0['Make'];
      } else { $camMake = $notFound; }
     
      // Model
      if (@array_key_exists('Model', $exif_ifd0)) {
        $camModel = $exif_ifd0['Model'];
      } else { $camModel = $notFound; }
     
      // Exposure
      if (@array_key_exists('ExposureTime', $exif_ifd0)) {
        $camExposure = $exif_ifd0['ExposureTime'];
      } else { $camExposure = $notFound; }

      // Aperture
      if (@array_key_exists('ApertureFNumber', $exif_ifd0['COMPUTED'])) {
        $camAperture = $exif_ifd0['COMPUTED']['ApertureFNumber'];
      } else { $camAperture = $notFound; }
     
      // Date
      if (@array_key_exists('DateTime', $exif_ifd0)) {
        $camDate = $exif_ifd0['DateTime'];
      } else { $camDate = $notFound; }
     
      // ISO
      if (@array_key_exists('ISOSpeedRatings',$exif_exif)) {
        $camIso = $exif_exif['ISOSpeedRatings'];
      } else { $camIso = $notFound; }

      if (@array_key_exists('Height', $exif_ifd0['COMPUTED'])) {
        $Height = $exif_ifd0['COMPUTED']['Height'];
      } else { $Height = $notFound; }


      if (@array_key_exists('Width', $exif_ifd0['COMPUTED'])) {
        $Width = $exif_ifd0['COMPUTED']['Width'];
      } else { $Width = $notFound; }


     
      $return = array();
      $return['make'] = $camMake;
      $return['model'] = $camModel;
      $return['exposure'] = $camExposure;
      $return['aperture'] = $camAperture;
      $return['date'] = $camDate;
      $return['iso'] = $camIso;

      $return['Height'] = $Height;
      $return['Width'] = $Width;
      return $return;
   
    } else {
      return false;
    }
}

/*---------------------------------------------------------------------------*/
/* Reformateamos fecha y hora de forma amigable.  */
/* 2020 */
/*---------------------------------------------------------------------------*/
function exif_date_sanitize($date){

  $date = explode(" ",$date);

  $date[0] = str_replace(':', '-', $date[0]);

  $reordenfecha = explode("-",$date[0]);

  $ano = $reordenfecha[0];
  $mes = $reordenfecha[1];
  $dia = $reordenfecha[2];

  $fechabien = $dia . '-' . $mes . '-' . $ano;

  return $fechabien . ' ' . $date[1];

}
/*---------------------------------------------------------------------------*/
/* Reformateamos fecha y hora de forma amigable y retorna fecha.  */
/* 2020 */
/*---------------------------------------------------------------------------*/
function exif_date_sanitize_date($date){

  $date = explode(" ",$date);

  $date[0] = str_replace(':', '-', $date[0]);

  $reordenfecha = explode("-",$date[0]);

  $ano = $reordenfecha[0];
  $mes = $reordenfecha[1];
  $dia = $reordenfecha[2];

  $fechabien = $dia . '-' . $mes . '-' . $ano;

  return $fechabien;

}
/*---------------------------------------------------------------------------*/
/* Reformateamos fecha y hora de forma amigable y retorna hora.  */
/* 2020 */
/*---------------------------------------------------------------------------*/
function exif_date_sanitize_hour($date){

  $date = explode(" ",$date);

  $date[0] = str_replace(':', '-', $date[0]);

  $reordenfecha = explode("-",$date[0]);

  $ano = $reordenfecha[0];
  $mes = $reordenfecha[1];
  $dia = $reordenfecha[2];

  $fechabien = $dia . '-' . $mes . '-' . $ano;

  return $date[1];

}
?>