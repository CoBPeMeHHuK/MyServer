<?php

    $name=$_POST['name'];
    $phone=$_POST['phone'];
$ip=$_SERVER['REMOTE_ADDR'];
$key=array(method=>get_api_key);
$key_string=http_build_query($key);
$url_key="http://alfashops.ru/scripts/test_task/api_sample.php";
$ch1=curl_init();
curl_setopt($ch1,CURLOPT_URL,$url_key);
curl_setopt($ch1,CURLOPT_POST,true);
curl_setopt($ch1,CURLOPT_POSTFIELDS,$key_string);
curl_setopt($ch1,CURLOPT_RETURNTRANSFER,true);
$output_key=curl_exec($ch1);
$my_string=$name.$phone.$ip.$output_key;
//echo ($my_string);
curl_close($ch1);

$data=array(method=>"send_lead",
    name=>$name,
    phone=>$phone,
    ip=>$ip,
    key=>$output_key);

$string = http_build_query($data);
$url="http://alfashops.ru/scripts/test_task/api_sample.php";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$string);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$output=curl_exec($ch);
echo $output;
//echo 'Its nice';
curl_close($ch);

