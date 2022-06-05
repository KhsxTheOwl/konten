<?php	
system("clear");
error_reporting(0);
$jono = json_decode(file_get_contents("http://ip-api.com/json"))->timezone;
date_default_timezone_set($jono);
gass();
function gass(){
system("rm -rf .run.php");
system("clear");
banner();
while(true){
include("cfg.php");
$url = "https://www.adbch.cc/surf";
$uag = array("user-agent: $user_agent","cookie: $cookie");
$uap = array("x-requested-with: XMLHttpRequest","user-agent: $user_agent","content-type: application/x-www-form-urlencoded; charset=UTF-8","cookie: $cookie");
$inn = curl($url,$uag,"get");
$one = explode('<b>',$inn);
$ball = explode('</b>',$one[1])[0];
$cokk = strpos($inn,"g-recaptcha");
$jam = date("H");
$menit = date("i");
$detik = date("s");
echo "\033[1;37m│\033[1;34m[\033[1;37m".$jam."\033[0;34m:\033[1;37m".$menit."\033[0;34m:\033[1;37m".$detik."\033[1;34m]\033[1;31mBallance \033[1;34m: \033[1;32m$ball
\033[1;37m├\033[1;37m────────────────────────────────────\n";
if($cokk){
echo "Captha detect\n";
exit;
}
$one = explode('<input type="hidden" id="adsid" value="',$inn);
$vid = explode('">',$one[1])[0];
$one = explode("var viewurl = '",$inn);
$vis = explode("';",$one[1])[0];
$one = explode("var viewtime = '",$inn);
$jeda = explode("';",$one[1])[0];
if($vid == ""){
echo "limit woi\n";
exit;
}
$headers = array("user-agent: $user_agent");
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $vis);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$result = curl_exec($ch);

for ($x=$jeda;$x>0;$x--){
echo "\r[$x]visit website...\r";
sleep(1);
echo "\r                      \r";
}
sleep(3);
$end = curl("https://www.adbch.cc/earndata.php",$uap,"post","adsids=".$vid);

}
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
function banner(){
$sc_name = "adbch.cc";
$sc_version = "1.0";
$banner =
 "\033[1;37m┌\033[1;37m───────────────\033[1;35m•\033[1;32m◥\033[1;33mೋೋ\033[1;32m◤\033[1;35m•\033[1;37m───────────────\033[1;37m┐
\033[1;37m│\033[1;36m╦╔═╦ ╦╔═╗═╗ ╦  ╔═╗╦ ╦╔═╗╔╗╔╔╗╔╔═╗╦  \033[1;37m│
\033[1;37m│\033[1;32m╠╩╗╠═╣╚═╗╔╩╦╝  ║  ╠═╣╠═╣║║║║║║║╣ ║  \033[1;37m│
\033[1;37m│\033[1;36m╩ ╩╩ ╩╚═╝╩ ╚═  ╚═╝╩ ╩╩ ╩╝╚╝╝╚╝╚═╝╩═╝\033[1;37m│
\033[1;37m├\033[1;37m────────────────────────────────────\033[1;37m┘
\033[1;37m│              \033[1;34m[\033[1;33mINFO\033[1;34m]
\033[1;37m│\033[1;31m[\033[1;37mScript : \033[1;32m$sc_name\033[1;31m]
\033[1;37m│\033[1;31m[\033[1;37mScript By : \033[1;32mAga katoroik\033[0;31m[\033[1;32mKhsx\033[0;31m]\033[1;31m]
\033[1;37m│\033[1;31m[\033[1;37mChannel : \033[1;32mKhsx channel\033[1;31m]
\033[1;37m│\033[1;31m[\033[1;37mScript Version : \033[1;32m$sc_version\033[1;31m]
\033[1;37m│\033[1;31m[\033[1;37mDate : \033[1;32m".date("Y-m-d")."\033[1;31m]
\033[1;37m│\033[1;31m[\033[1;37mTelegram : \033[1;32m@OwlCamp\033[1;37m\033[1;31m]
\033[1;37m├\033[1;37m────────────────────────────────────┘\n";

echo $banner;}
?>
