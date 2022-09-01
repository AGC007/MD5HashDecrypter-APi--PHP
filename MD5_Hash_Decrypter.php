<?php

if($_GET['Hash'])
{
    MD5_Hash_Decrypter($_GET['Hash']);
}

#------------ HASH Decrypter -------------#

function MD5_Hash_Decrypter($Hash)
{
    $headers = array(
        'Content-Type:application/json'.
        'Host:bluecode.info',
        'User-Agent:MD5 LITE 2.4.3'
    );

    $MD5_REQ = curl_init();
    curl_setopt($MD5_REQ, CURLOPT_URL, 'https://bluecode.info/md5api/?search%5B%5D='.$Hash.'&');
    curl_setopt($MD5_REQ, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($MD5_REQ, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($MD5_REQ, CURLOPT_CUSTOMREQUEST, 'GET' );
    curl_setopt($MD5_REQ, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    $Resopone = curl_exec($MD5_REQ);
    
    if(strpos($Resopone , $Hash))
    {
        $Result = json_decode($Resopone , true) [$Hash];
        echo(json_encode(array(
            'Error' => 'false' ,
            'Hash' => $Hash ,
            'Result' => $Result ,
            'Developer' => 'AGC007'
            )));
    }
    else{
        echo(json_encode(array(
            'error' => 'true' ,
            'errorType' => 'Hash iS Not Decrypted :(' , 
            'Developer' => 'AGC007'
            )));
    }
}

#------------ HASH Decrypter -------------#

?>