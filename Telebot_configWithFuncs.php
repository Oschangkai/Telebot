<?php
define("腐花群", "-14374429");
define("帝國群", "-89703818");
//Set
$website = "https://api.telegram.org/bot".$botToken;
$update = file_get_contents("php://input");
$updateArray = json_decode($update, TRUE);
//Get information
$chatId = $updateArray["message"]["chat"]["id"];  //Universal
$senderId = $updateArray["message"]["from"]["id"];
$senderName = $updateArray["message"]["from"]["first_name"].$updateArray["message"]["from"]["last_name"];
$text = $updateArray["message"]["text"];

//Functions
function sendmessage($chatId, $text){
  $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".urlencode($text)."&parse_mode=Markdown";
  file_get_contents($url);
}
function sendPhoto($chatId, $photo){
  $photoUrl = $GLOBALS[website]."/sendPhoto?chat_id=".$chatId."&photo=".$photo;
  file_get_contents($photoUrl);
}
function initPage($title, $group, $website){
  echo <<< HTML
<!doctype html>
  <html>
    <head>
    <meta charset="UTF-8">
      <title>$title</title>
    </head>
    <body>
      <div title="Form">
        <form action="$website/sendPhoto" method="post" enctype="multipart/form-data">
        我要寄圖片到:
          <select name="chat_id" size="1">
            <option value="$group">群組中
            <option value="115538277">KaiYi
            <option value="140241617">Q淳</option>
          </select>
          <input name="photo" type="file" accept="image/*"/>
          <input type="submit" value="送出！" />
        </form>
      </div>
    </body>
  </html>
HTML;
}
//定時發文
/*
ignore_user_abort(); //關掉瀏覽器，PHP腳本也可以繼續執行. 
date_default_timezone_set("Asia/Taipei");
set_time_limit(0);
$NetCut = "" ;
if (date("H:i") == "22:53")
  sendMessage("115538277", "定時發文測試");
*/
?>