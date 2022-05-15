<?php

$ua = array("x-requested-with: XMLHttpRequest",
"user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36",
"content-type: application/x-www-form-urlencoded; charset=UTF-8",
"cookie: XXXXX");

$init = curl("https://lootbits.io/dashboard.php",$ua,"get");
$one = explode("url: 'prorto.php?uhash=",$init);
$two = explode("',",$one[1]);
$uhash=$two[0];
$one = explode("l1IlI1: '",$init);
$two = explode("'",$one[1]);
$id=$two[0];

$url = "https://lootbits.io/prorto.php?uhash=".$uhash;
$data = "uhash=".$uhash."&l1IlI1=".$id;
while(true){
$end = curl($url,$ua,"post",$data);
$one = explode('::',$end);
$two = explode('::',$one[3]);
$limit=$two[0];
echo "$end\n";
if($limit == "0"){
exit;
}
sleep(2);
}

function curl($url, $headers, $mode="get", $data=0)
        {
        if ($mode == "get" || $mode == "Get" || $mode == "GET")
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$result = curl_exec($ch);
}
        elseif ($mode == "post" || $mode == "Post" || $mode == "POST")
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$result = curl_exec($ch);
}
        else
{
$result = "Not define";
}
        return $result;
        }

?>
