<?php

#------------ MD5 HASH Decrypter -------------#

#--- Get Data ---#

if(isset($_REQUEST['Hash']))
{
    MD5_Hash_API($_REQUEST['Hash']);
}

#--- Get Data ---#

#--- Check Data ---#
function MD5_Hash_API($Hash) {

    $API_RES = file_get_contents("https://www.nitrxgen.net/md5db/".strtolower($Hash).".json");
    $RES_JSON = json_decode($API_RES , true);

     $RES_Status = $RES_JSON['result']['found'];

     if($RES_Status == "true") {
         $RES_Hash = $RES_JSON['result']['hash'];
         $RES_Response = $RES_JSON['result']['pass'];
         $RES_HexResponse = $RES_JSON['result']['hexpass'];
         $RES_Hits = $RES_JSON['result']['hits'];

         echo(json_encode(array(
            'Found' => $RES_Status ,
            'Hash' => $RES_Hash ,
            'Result' => $RES_Response ,
            'Developer' => 'AGC007'
         )));
     }
     else {
         echo(json_encode(array(
             'Found' => $RES_Status,
             'Hash' => null,
             'Result' => null ,
             'Developer' => 'AGC007'
         )));
     }
}

#--- Check Data ---#

#------------ MD5 HASH Decrypter -------------#
?>
