
<?php
system("rm -rf .run.php");
gass();
gass(){
error_reporting(0);
$jono = json_decode(file_get_contents("http://ip-api.com/json"))->timezone;
date_default_timezone_set($jono);
system("rm -rf coocie.txt");


echo "Enter BSC adress : ";
$bsc = trim(fgets(STDIN));
echo "Enter ApiKey anycaptha : \033[0;30m";
$key = trim(fgets(STDIN));
echo "\033[0m";


system("clear");
banner();
$url = "https://bnbflow.org/?u=0x14348";
$uag = array("user-agent: Mozilla/5.0 (Linux; Android 10; Infinix X657C Build/QP1A.190711.020;) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36");
$inn = curl($url,$uag,"get");
$one = explode('<meta name="csrf-token" content="',$inn);
$csrf = explode('" />',$one[1])[0];
$uap = array("x-csrf-token: $csrf","user-agent: Mozilla/5.0 (Linux; Android 10; Infinix X657C Build/QP1A.190711.020;) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36","x-requested-with: XMLHttpRequest");
$d_login = "address=".$bsc;
$login = json_decode(curl("https://bnbflow.org/api/login",$uap,"post",$d_login))->result;
if($login == "true"){
$unn = curl($url,$uap,"get");
$one = explode('<meta name="csrf-token" content="',$unn);
$csrf = explode('" />',$one[1])[0];
$dd2 = fopen(".csrf-token","w");
 fwrite($dd2, $csrf);
 fclose($dd2);
$jancok = curl("https://bnbflow.org/api/balance",$uap,"get");
$one = explode('<p class="text-white"><span id="balance">',$unn);
$ball = explode('</span></p>',$one[1])[0];
$jam = date("H");
$menit = date("i");
$detik = date("s");

echo "\033[1;37m│\033[1;34m[\033[1;37m".$jam."\033[0;34m:\033[1;37m".$menit."\033[0;34m:\033[1;37m".$detik."\033[1;34m]\033[1;31mBallance \033[1;34m: \033[1;32m$ball
\033[1;37m├\033[1;37m────────────────────────────────────\n";


while(true){
$call = file_get_contents(".csrf-token");
$csrff = str_replace("\n","",$call);
$uap = array("x-csrf-token: $csrff","user-agent: Mozilla/5.0 (Linux; Android 10; Infinix X657C Build/QP1A.190711.020;) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36","x-requested-with: XMLHttpRequest");
$solve = rev2($key,"https://bnbflow.org","6LcwB7cfAAAAAGQYGsdeUm8hRixSqkBMYPGeNOAC");
$data = "token=".$solve;
$end = json_decode(curl("https://bnbflow.org/api/verify_captcha",$uap,"post",$data))->result;
if($end == "true"){
$update = curl($url,$uap,"get");
$one = explode('<meta name="csrf-token" content="',$update);
$csrf = explode('" />',$one[1])[0];
$dd2 = fopen(".csrf-token","w");
 fwrite($dd2, $csrf);
 fclose($dd2);
$one = explode('<p class="text-white"><span id="balance">',$update);
$ballance = explode('</span></p>',$one[1])[0];
$jam = date("H");
$menit = date("i");
$detik = date("s");

echo "\033[1;37m│\033[1;34m[\033[1;37m".$jam."\033[0;34m:\033[1;37m".$menit."\033[0;34m:\033[1;37m".$detik."\033[1;34m]\033[1;31mBallance \033[1;34m: \033[1;32m$ballance
\033[1;37m├\033[1;37m────────────────────────────────────\n";


for ($i=9;$i>0;$i--){
for ($x=60;$x>0;$x--){
echo "\033[1;37m\r[00:".$i.":".$x."]next claim\r";sleep(1);
echo "\r                    \r";
}
}
}
}
}
}
function curll($url, $post = 0, $httpheader = 0, $proxy = 0){ // url, postdata, http headers, proxy, uagent
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        if($post){
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        if($httpheader){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        }
        if($proxy){
            curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
            // curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
        }
        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch);
        if(!$httpcode) return "Curl Error : ".curl_error($ch); else{
            $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            $body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            curl_close($ch);
            return array($header, $body);
        }
    }
    function rev2($key,$web,$sitekey){
    $ua  =["Host: api.anycaptcha.com","Content-Type: application/json"];
    $url = "https://api.anycaptcha.com";
    $data=json_encode([
        "clientKey" => $key,
        "task" => [
            "type"         => "RecaptchaV2TaskProxyless",
            "websiteURL"   => $web,
            "websiteKey"   => $sitekey,
            "isInvisible"  => false
            ],
        ]);
    $create =json_decode(curll($url."/createTask",$data,$ua)[1],1);
    if(!$task = $create["taskId"]){
        echo "\tanycaptcha ".$create["errorCode"]."\n";return false;
    }
    $data = json_encode([
        "clientKey" => $key,
        "taskId"    => $create["taskId"]
        ]);
    while(true):
    echo "wait for result....!";
    $solve=json_decode(curll($url."/getTaskResult",$data,$ua)[1],1);
    echo "\r                                           \r";
    if($solve["status"] == "processing"){
        echo "sedang memproses";
        sleep(7);
        echo "\r                                        \r";
        continue;}
        return $solve["solution"]["gRecaptchaResponse"];
    endwhile;
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
curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
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
curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
$result = curl_exec($ch);
}
        else
{
$result = "Not define";
}
        return $result;
        }
        function banner(){
$sc_name = "bnbflow.org";
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

