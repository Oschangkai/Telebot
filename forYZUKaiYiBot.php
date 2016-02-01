<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>德意志國王</title>
</head>
<body>
<?php
//echo
//include("UniversalSettingforTelebot.php");

//Set
$botToken = "botToken";
$website = "https://api.telegram.org/bot".$botToken;
$update = file_get_contents("php://input");
$updateArray = json_decode($update, TRUE);

//Get information
$chatId = $updateArray["message"]["chat"]["id"];  //Universal
$senderId = $updateArray["message"]["from"]["id"];
$senderName = $updateArray["message"]["from"]["first_name"].$updateArray["message"]["from"]["last_name"];
$text = $updateArray["message"]["text"];

//Message Arrays
$key_MorningGreeting = array("早安啊", "各位早安啊!", "又是一個美好的早晨~~", $senderName."早~~", "不要調戲我!!!!");
$MorningGreeting = $key_MorningGreeting[mt_rand(0,count($key_MorningGreeting) - 1)];

$Judge_q = array("機器人 你評評理啊", "機器人你評評理啊");
$key_Judge = array("蛤？", "甘我屁事", "你們慢慢玩吧", "我要封殺妳!", "什麼？", "我什麼也沒聽到~~~", "喔", "就是說嘛! 太過分了!", "才不想理膩勒");
$Judge = $key_Judge[mt_rand(0,count($key_Judge) - 1)];

$Crackme_q = array("我要潑你水", "臭機器人");
$key_Crackme = array("你好壞QQ", "我要哭哭了QQQQQ", "別這樣嘛", "好說好說");
$Crackme = $key_Crackme[mt_rand(0,count($key_Crackme) - 1)];


$key_Lin = array("松獅犬4ni", "獅子丸4ni", "柯基犬4ni", "肥肚肚", "松獅犬", "獅子丸", "柯基犬");
$Lin = $key_Lin[mt_rand(0,count($key_Lin) - 1)];

$key_Hung = array("元智林俊傑", "元智林俊傑4ni", "唱歌！唱歌！");
$Hung = $key_Hung[mt_rand(0,count($key_Hung) - 1)];

$key_Chang = array("楷yeeeeeeee", "yeeeee", "恐龍4ni", "恐龍yeeeeee");
$Chang = $key_Chang[mt_rand(0,count($key_Chang) - 1)];

//Reply Messages
switch ($text) { 
  case '/test':
    sendMessage($chatId, "I'm KaiYi Bot!! \n Ur ID is:".$senderId);
  break;

  case '/id':
  	sendMessage($chatId, $senderId);
	break;
	
  case '/gid':
  	sendMessage($chatId, $chatId);
	break;

  case '月亮':
    sendMessage($chatId, "🌕🌖🌗🌘🌑🌒🌓🌔🌕🌕");
  break;

	case '生肖':
    sendMessage($chatId, "🐭🐮🐯🐰🐲🐍🐴🐐🐒🐓🐕🐷");
  break;

  default:
  if (in_array($text, $Crackme_q))
  	sendMessage($chatId, $Crackme);
  if (in_array($text, $Hung_q))
    sendMessage($chatId, $Hung);
  if (preg_match("/早安/", $text))
    sendMessage($chatId, $MorningGreeting);
  if (preg_match("/yee/i", $text))
    sendMessage($chatId, "是\"翊\"不是".$text."!!!!");
  if (preg_match("/晚安/", $text))
    sendMessage($chatId, $senderName."晚安");
  if (preg_match("/裕翔/", $text))
    sendMessage($chatId, $Lin);
  if (preg_match("/子軒/", $text))
    sendMessage($chatId, $Hung);
  if (preg_match("/楷翊/", $text))
    sendMessage($chatId, $Chang);
  if (preg_match("/(去死|有病)/", $text, $dirtyWords))
    sendMessage($chatId, "你才".$dirtyWords[1]."膩!");
  if (in_array($text, $Judge_q))
  {
    if ($senderName == "ChangKaiYi")
      sendMessage($chatId, "就是說嘛! 太過分了!");
    else
      sendMessage($chatId, $Judge);
  }


}
//GetText fun
function sendmessage($chatId, $text){
  $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".urlencode($text);
  file_get_contents($url);
}


?>
<!--Upload UI-->
<div title="Form">
<form action="<?php  echo $website.'/sendPhoto' ?>" method="post" enctype="multipart/form-data">
  我要寄圖片到:
  <select name="chat_id" size="1">
    <option value="-89703818">群組中
    <option value="115538277">KaiYi</option>
  </select>
    
  <input name="photo" type="file" accept="image/*"/>
  <input type="submit" value="送出！" />
</form>
</div>
</body>
</html>