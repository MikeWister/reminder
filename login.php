<?php
    function post($url, $data = array()) 
    {
        if(!ini_get('allow_url_fopen')) throw new Exception("Not Allowed URL Open!");
        $stream = stream_context_create(array('http' => array(
        'method' => 'POST',
//        'header' => 'Content-type: application/x-www-form-urlencoded',
        'content' => http_build_query($data),
    )));
        return file_get_contents($url, false, $stream);
    }
?>

<?php
    $params = array(
//    "username" => "071007",
//    "password" => "Augsepoct90"
    "login_id" => "217179",
    "password" => "Kara9ri0",
    );

    $url = "https://fc.momoclo.net/pc/login.php";
//    $url = "https://fc.momoclo.net";
//    $url = "http://telcp01/redmine/login";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
//    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    $output = curl_exec($ch);

    curl_close($ch);

    //print $output;

    //var_dump($url);
    //var_dump($params);

   
    try{
        $hoge=post($url, $params);
        var_dump($hoge);
    }catch(Exception $e)
    {
        var_dump($e);
    }

?>

