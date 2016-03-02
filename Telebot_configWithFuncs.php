<?php
//Set
//set_time_limit(0);//讓php持續進行不停止
date_default_timezone_set('Asia/Taipei');
$website = "https://api.telegram.org/bot".$botToken;
$update = file_get_contents("php://input");
$updateArray = json_decode($update, TRUE);
//Get information
$chatId = $updateArray["message"]["chat"]["id"];  //Universal
$senderId = $updateArray["message"]["from"]["id"];
$senderName = $updateArray["message"]["from"]["first_name"].$updateArray["message"]["from"]["last_name"];
$text = $updateArray["message"]["text"];
//Logging
$time = date('Y-m-d H:i:s', time());
$sTime = date('H:i', time());
if ($chatId == $senderId)
  $msgLog = array("時間" => $time, "群組" => "私訊", "發送者" => $senderName, "內容" => $text);
else
  $msgLog = array("時間" => $time, "群組" => convertToName($chatId), "發送者" => $senderName, "內容" => $text);
//$msgLog = $time."\t".$senderName."@".convertToName($chatId)."：".$text."\n";

//Functions
function sendmessage($chatId, $text){
  $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".urlencode($text)."&parse_mode=Markdown";
  file_get_contents($url);
}
function sendPhoto($chatId, $photo){
  $photoUrl = $GLOBALS[website]."/sendPhoto?chat_id=".$chatId."&photo=".$photo;
  file_get_contents($photoUrl);
}
function convertToName($chatId){
  if ($chatId < 0){ //is Group
    switch ($chatId) {
      case 'groupID1':
        return "group1";
        break;

      case 'groupID2':
        return "group2";
        break;

      default:
        sendMessage("me", $chatId."群組使用了我");
        return $chatId;
        break;
    }
  }
  else if($chatId > 0){ //is Personal
    switch ($chatId) {
      case 'me':
        return "me";
        break;

      case '1':
        return "1";
        break;

      default:
        sendMessage("me", $chatId."是".$senderName);
        return $chatId;
        break;
    }
  }
}
function logMsg($chatId, $msgLog){
  $f = fopen(convertToName($chatId).'.json', 'a')or die("Error opening output file");
  //fwrite($f, $dump);
  fwrite($f, json_encode($msgLog, JSON_UNESCAPED_UNICODE));//Encode to Unicode
  fclose($f);
}
function initPage($groupID, $website){
  $group = convertToName($groupID);
  echo <<< HTML
    <!doctype html>
      <html>
        <head>
        <meta charset="UTF-8">
          <title>$group</title>
        </head>
        <body>
          <div title="Form">
            <form action="$website/sendPhoto" method="post" enctype="multipart/form-data">
            我要寄圖片到:
              <select name="chat_id" size="1">
                <option value="$groupID">群組中</option>
                <option value="me">me</option>
                <option value="1">1</option>
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
$NetCut = "" ;
if (date("H:i") == "22:53")
  sendMessage("115538277", "定時發文測試");
*/
/*
header('Content-type:application/force-download'); //告訴瀏覽器 為下載 
header('Content-Transfer-Encoding: Binary'); //編碼方式
header('Content-Disposition:attachment;filename=hello.txt'); //檔名
header('Content-type: application/pdf');// We'll be outputting a PDF
 */
?>