<?php
include("jdf.php");
 $load = sys_getloadavg();
$telegram_ip_ranges = [
['lower' => '149.154.160.0', 'upper' => '149.154.175.255'], // literally 149.154.160.0/20
['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],    // literally 91.108.4.0/22
];
$ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
$ok=false;
foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
    $lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
    $upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
    if ($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok=true;
}
/*
t.me/tak_php
••••••••••••••••••••••••••••••••••••••••••
کانال پر از سورس های متفاوت
سورس کده 
https://t.me/Sourrce_kade
••••••••••••••••••••••••••••••••••••••••••
کص ننت اصکی بری منبع نزنی 
•••••••••••••••••••••
اصکی با منبع ازاد ✓
•••••••••••••••••••••
سورس نوشته شده توسط @tak_php 
تــک پـــی اچـــ پــــی
*/
if (!$ok) die("Are You Okay ? t.me/tak_php");
error_reporting(0); 
//----
// خط زیر توکن بزارید
$token="8692468638:AAHfcDaML6MsWoLu1aLRK1qCNCrh0Y9_9cc"; // توکن ربات
//----
define('API_KEY',$token);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
if(curl_error($ch)){
    var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}
function SendMessage($chat_id, $text)
{
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => $text,
        'parse_mode' => "HTML"
    ]);
}
function sendphoto($chat_id, $photo, $caption){
Bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$photo,
'caption'=>$caption,
]);
}
//===[تاریخ]===//
$date = jdate("Y/m/d");
$time = jdate("H:i:s");
//----
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$from_id = $message->from->id;
$text = $message->text;
$tc = $update->message->chat->type;
$rpto = $update->message->reply_to_message->forward_from->id;
//----
// اینجا ها رو ادیت بزنید
$admins = array("8852042397","8852042397"); // ای دی عددی ادمین ها
$bottag = "Ffgdddbot"; // ای دی ربات بدون @
$address = "Https://Sourrce_kade.ir/selfisaz"; // ادرس هاست + پوشه
$chanloc1 = "caghdh"; // ای دی کانال بدون @
$dev = "8852042397"; // ای دی عددی مالک
$baner = "https://t.me/slokings/7828"; // لینک بنر زیر مجموعه
//----
@$tak_php = file_get_contents("data/$chat_id/member.txt");
$data = file_get_contents("data/$from_id/tak.txt");
$textmassage = $message->text;
$username = $message->from->username;
$first_name = $message->from->first_name;
$photo = $update->message->photo;
$user = json_decode(file_get_contents("data/$from_id.json"),true);
$step = $user["step"];
$imt = $user["imt"];
$warn = $user["warn"];
$forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$chanloc1&user_id=".$chat_id));
$tch = $forchaneel->result->status;
$onof = file_get_contents("onof.txt");
//---
function Spam($user_id){
@mkdir("data/spam");
$spam_status = json_decode(file_get_contents("data/spam/$user_id.json"),true);
if($spam_status != null){
if(mb_strpos($spam_status[0],"time") !== false){
if(str_replace("time ",null,$spam_status[0]) >= time())
exit(false);
else
$spam_status = [1,time()+2];
}
function save($filename, $data){
$file = fopen($filename, 'w');
fwrite($file, $data);
fclose($file);
}
function Forward($koja,$key,$pm)
{
    bot('ForwardMessage',[
        'chat_id'=>$koja,
        'from_chat_id'=>$key,
        'message_id'=>$pm
    ]);
}
function deletefolder($path){
 if($handle=opendir($path)){
  while (false!==($file=readdir($handle))){
   if($file<>"." AND $file<>".."){
    if(is_file($path.'/'.$file)){ 
     @unlink($path.'/'.$file);
    } 
    if(is_dir($path.'/'.$file)) { 
     deletefolder($path.'/'.$file); 
     @rmdir($path.'/'.$file); 
    }
   }
        }
    }
}
//---
if($tc != "private"){
bot('LeaveChat',[
'chat_id'=>$chat_id
]);
}
if(time() < $spam_status[1]){
if($spam_status[0]+1 > 3){
$time = time() + 1000;
$spam_status = ["time $time"];
file_put_contents("data/spam/$user_id.json",json_encode($spam_status,true));
bot('SendMessage',[
'chat_id'=>$user_id,
'text'=>"جهت جلوگیری از اسپم ربات شما به مدت 1000 ثانیه از ربات سلف ساز شدید... ⏳",
]);
exit(false);
}else{
$spam_status = [$spam_status[0]+1,$spam_status[1]];
}}else{
$spam_status = [1,time()+2];
}}else{
$spam_status = [1,time()+2];
}
file_put_contents("data/spam/$user_id.json",json_encode($spam_status,true));
}
Spam($from_id);
// ben & bot off
if($warn >= 3){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ | شما از ربات مسدود شدید ",
]); 
exit;
}
if($onof == "off" and $chat_id != $dev){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🤖 | ربات موقتا خاموش میباشد
",
]);
exit();
}
//---
if(strpos($text=="/start") !== false  && $text !=="/start" && $tc == "private"){
	if (!file_exists("data/$from_id/tak.txt")) {
        mkdir("data/$from_id");
        file_put_contents("data/$from_id/tak.txt","none");
        $myfile2 = fopen("member.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "$from_id\n");
        fclose($myfile2);
    }
$id=str_replace("/start ","",$text);
$amar=file_get_contents("data/members.txt");
$exp=explode("\n",$amar);
if(!in_array($from_id,$exp) && $from_id != $id){
$filess = fopen("data/members.txt", "a") or die("Unable to open file!");
fwrite($filess, "$from_id\n");
fclose($filess);
	$user["step"] = "none";
	$user["imt"] = 2;
	$user["warn"] = "0";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);	
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✓ خوش اومدی دوباره /start بزن!",
                   'parse_mode'=>"MarkDown",
	                      ]);
	
$userr = json_decode(file_get_contents("data/$id.json"),true);
$bugha = $userr['imt'] + 1;
	$userr["imt"] = "$bugha";
$outjson = json_encode($userr,true);
file_put_contents("data/$id.json",$outjson);	
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"🤠 یه نفر با لینکت اومد 1 امتیاز دادمت.",
                   'parse_mode'=>"MarkDown",
	                      ]);
					}
					}
					//---
if(!file_exists("data/$from_id.json")){
	$filess = fopen("data/members.txt", "a") or die("Unable to open file!");
fwrite($filess, "$from_id\n");
fclose($filess);
	$user["step"] = "none";
	$user["imt"] = 2;
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);	
}
if($tch != 'member' && $tch != 'creator' && $tch != 'administrator' ){
		 bot('sendMessage',[
                    'chat_id'=>$chat_id,
                    'text'=>"🌟 به ربات سلف ساز رایگان خوش آمدید.

🌹 برای استفاده از این ربات ابتدا وارد کانال ما بشوید و سپس روی دکمه تایید عضویت کلیک کنید 🙂 

از پنل شیشه پایین استفاده کنید 👇",
                       'reply_markup' => json_encode([
                    'inline_keyboard' => [
    [['text' => "⭕️ ورود به کانال ⭕️", 'url' => "https://t.me/$chanloc1"]],
    [['text' => "✅ تایید عضویت", 'url' => "https://telegram.me/$bottag?start"]],
                    ]
                ])
]);
}else{
if($text == "/start" or $text == "⇱ 𝔟𝔞𝔠𝔨 ⇲"){
	$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);	
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"🙃 به سلف ساز ما خوش اومدی 🌹",
 'parse_mode'=>"HTML",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"سٔاٰخّتً سَلٰفْ 😈"]],
    [['text'=>"⭐️ دریافت امتیاز"],['text'=>"پروفایل من ❄️"]],
    [['text'=>"🛍 خرید امتیاز"],['text'=>"آپدیت ربات ♻️"]],
    [['text'=>"🗑 حذف ربات"],['text'=>"وضعیت ربات 📊"]],
    [['text'=>"پشتیبانی 💡"]],
	],
	"resize_keyboard"=>true
	])
 ]);
}
if($text == "پشتیبانی 💡"){
	$user["step"] = "sup";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);	
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"‼️ لطفا پیام خود را ارسال کنید :

( برای دریافت پاسخ حتما فورواردتونو باز کنید )",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
}
if($step == "sup" && $text != "⇱ 𝔟𝔞𝔠𝔨 ⇲"){
	$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);	
bot('ForwardMessage',[
	'chat_id'=>$admins[0],
	'from_chat_id'=>$from_id,
	'message_id'=>$message_id
	]);
	bot('sendMessage',[
 'chat_id'=>$admins[0],
 'text'=>"🌟 | جهت پاسخ دادن به کاربر روی پیام کاربر ریپلی کنید و پیام خود را ارسال کنید ",
 'parse_mode'=>"HTML",
	 ]);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ پیام شما به پشتیبانی ارسال شد",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
}
if($rpto != "" && in_array($chat_id,$admins)){
     bot('sendMessage',[
 'chat_id'=>$rpto,
 'text'=>"
❗️| کاربر گرامی شما یک پیام از طرف پشتیبانی ربات دارید . . .

پیام : `$text`
",
 'parse_mode'=>"MarkDown",
	 ]);
	      bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"✅ پیام شما به فرد مورد نظر ارسال شد ",
 'parse_mode'=>"MarkDown",
	 ]);
    }
 if($text == "🛍 خرید امتیاز"){
bot('sendMessage',
['chat_id'=>$chat_id,
'text'=>"کاربر عزیز❤️✅جهت خرید امتیاز بر روی لینک مورد نظر خود کلیک کنید 👇",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"🥂 10 امتیاز | 10 کا نیـترو 🥂",'url'=>'https://t.me/ i_love_she']],
[['text'=>"🥂 15 امتیاز | 15 کا نیـترو 🥂",'url'=>'https://t.me/ i_love_she']],
[['text'=>"🥂 20 امتیاز | 19 کا نیـترو 🥂",'url'=>'https://t.me/ i_love_she']],
[['text'=>"🥂 50 امتیاز | 45 کا نیـترو 🥂",'url'=>'https://t.me/ i_love_she']],
[['text'=>"🥂 100 امتیاز | 85 کا نیـترو 🥂",'url'=>'https://t.me/ i_love_she']],
]])
]);
}

if($text == "🗑 حذف ربات"){
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"🍃 | لطفاً گزینه مورد نظر را انتخاب کنید ",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"🗑 حذف سلف [ سلف سرگرمی ]"]],
    [['text'=>"🗑 حذف سلف [ تٔاًیٍمٌ تٔوُ بٌیًوِ ]"]],
    [['text'=>"🗑 حذف سلف [ تٔاًیٍمٌ تٔوُ أسًمُ ]"]],
    [['text'=>"🗑 حذف سلف [ تٔاًیٍمٌ تٔوُ پٔرٌوٌفٌ ]"]],
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
 }
 
if($text == "🗑 حذف سلف [ تٔاًیٍمٌ تٔوُ بٌیًوِ ]"){
	$user["step"] = "del1";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);	
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ شماره پوشه را برای حذف ارسال کنید :",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
}
if($step == "del1" && $text != "⇱ 𝔟𝔞𝔠𝔨 ⇲"){
if(is_dir("cli1/$text")){
deletefolder("cli1/$text");
rmdir("cli1/$text");
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"✓ سلف با موفقیت حذف شد .",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
}else{
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ هیچ رباتی با این شماره ساخته نشده‌.",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
}
}
if($text == "🗑 حذف سلف [ تٔاًیٍمٌ تٔوُ أسًمُ ]"){
	$user["step"] = "del2";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);	
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ شماره پوشه را برای حذف ارسال کنید :",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
}
if($step == "del2" && $text != "⇱ 𝔟𝔞𝔠𝔨 ⇲"){
if(is_dir("cli2/$text")){
deletefolder("cli2/$text");
rmdir("cli2/$text");
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"✓ سلف با موفقیت حذف شد .",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
}else{
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ هیچ رباتی با این شماره ساخته نشده‌.",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
}
}
if($text == "🗑 حذف سلف [ تٔاًیٍمٌ تٔوُ پٔرٌوٌفٌ ]"){
	$user["step"] = "del3";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);	
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ شماره پوشه را برای حذف ارسال کنید :",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
}
if($step == "del3" && $text != "⇱ 𝔟𝔞𝔠𝔨 ⇲"){
if(is_dir("cli3/$text")){
deletefolder("cli3/$text");
rmdir("cli3/$text");
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"✓ سلف با موفقیت حذف شد .",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
}else{
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ هیچ رباتی با این شماره ساخته نشده‌.",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
}
}
if($text == "🗑 حذف سلف [ سلف سرگرمی ]"){
	$user["step"] = "del4";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);	
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ شماره پوشه را برای حذف ارسال کنید :",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
}
if($step == "del4" && $text != "⇱ 𝔟𝔞𝔠𝔨 ⇲"){
if(is_dir("cli4/$text")){
deletefolder("cli4/$text");
rmdir("cli4/$text");
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"✓ سلف با موفقیت حذف شد .",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
}else{
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ هیچ رباتی با این شماره ساخته نشده‌.",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
}
}
if($text == "سٔاٰخّتً سَلٰفْ 😈"){
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"🍃 | لطفاً گزینه مورد نظر را انتخاب کنید ",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"سٔاٰخّتً تٌاّیًمِ ⏱"]],
    [['text'=>"♻️ ساخت سلف سرگرمی"]],
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
 }
 if($text == "♻️ ساخت سلف سرگرمی"){
if($imt > 40 ){
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🌟 | جهت ساخت سلف [ سلف سرگرمی ] روی دکمه ساخت سلف بزنید . . .

🔥 | هزینه ساخت سلف [ سلف سرگرمی ] - 40 امتیاز است 
",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"🌹 ساخت سلف [ سلف سرگرمی ]"]],
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
 }else{
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"🌷 | جهت ساخت سلف [ سلف سرگرمی ] حداقل به 40 امتیاز نیاز دارید ",
 'parse_mode'=>"MarkDown",
   ]);
 }
 }
if($text == "🌹 ساخت سلف [ سلف سرگرمی ]"){
if($imt > 40 ){
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"♻️ سلف شما در حال ساخت است ..",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
 	$rand = rand(1111111111,9999999999);
  $fil = $rand;
  mkdir("cli4/$fil");
    	 $index = file_get_contents("source/self4/index.php");
  save("cli4/$fil/index.php",$index);
  $bugha = $imt - 40;
  	$user["imt"] = "$bugha";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);	
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ سلف شما با موفقیت ساخته شد !

👈🏻 شماره پوشه : $fil
💎 لینک لوگین :
$address/cli4/$fil/index.php

➕ کرون جاب خودکار اعمال شده.
‼️ مقدار 40 امتیاز از شما کسر شد .
🆔 | @$bottag",
 ]);
 }else{
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"🌷 | جهت ساخت سلف [ سلف سرگرمی ] حداقل به 40 امتیاز نیاز دارید ",
 'parse_mode'=>"MarkDown",
   ]);
 }
 }
 if($text == "سٔاٰخّتً تٌاّیًمِ ⏱"){
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"✨ | گزینه مورد نظر را از کیبورد زیر انتخاب کنید 👇🏻",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"تٔاًیٍمٌ تٔوُ بٌیًوِ"]],[['text'=>"تٔاًیٍمٌ تٔوُ أسًمُ"]],
    [['text'=>"تٔاًیٍمٌ تٔوُ پٔرٌوٌفٌ"]],
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
 }
 
 if($text == "تٔاًیٍمٌ تٔوُ بٌیًوِ"){
if($imt > 10 ){
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🌟 | جهت ساخت سلف [ تٔاًیٍمٌ تٔوُ بٌیًوِ ] روی دکمه ساخت سلف بزنید . . .

🔥 | هزینه ساخت سلف [ تٔاًیٍمٌ تٔوُ بٌیًوِ ] - 10 امتیاز است 
",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"🌹 ساخت سلف [ تٔاًیٍمٌ تٔوُ بٌیًوِ ]"]],
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
 }else{
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"🌷 | جهت ساخت سلف [ تٔاًیٍمٌ تٔوُ بٌیًوِ ] حداقل به 10 امتیاز نیاز دارید ",
 'parse_mode'=>"MarkDown",
   ]);
 }
 }
 if($text == "تٔاًیٍمٌ تٔوُ أسًمُ"){
if($imt > 20 ){
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🌟 | جهت ساخت سلف [ تٔاًیٍمٌ تٔوُ أسًمُ ] روی دکمه ساخت سلف بزنید . . .

🔥 | هزینه ساخت سلف [ تٔاًیٍمٌ تٔوُ أسًمُ ] - 20 امتیاز است 
",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"🌹 ساخت سلف [ تٔاًیٍمٌ تٔوُ أسًمُ ]"]],
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
 }else{
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"🌷 | جهت ساخت سلف [ تٔاًیٍمٌ تٔوُ أسًمُ ] حداقل به 20 امتیاز نیاز دارید ",
 'parse_mode'=>"MarkDown",
   ]);
 }
 }
 if($text == "تٔاًیٍمٌ تٔوُ پٔرٌوٌفٌ"){
if($imt > 30 ){
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🌟 | جهت ساخت سلف [ تٔاًیٍمٌ تٔوُ پٔرٌوٌفٌ ] روی دکمه ساخت سلف بزنید . . .

🔥 | هزینه ساخت سلف [ تٔاًیٍمٌ تٔوُ پٔرٌوٌفٌ ] - 30 امتیاز است 
",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"🌹 ساخت سلف [ تٔاًیٍمٌ تٔوُ پٔرٌوٌفٌ ]"]],
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
 }else{
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"🌷 | جهت ساخت سلف [ تٔاًیٍمٌ تٔوُ پٔرٌوٌفٌ ] حداقل به 30 امتیاز نیاز دارید ",
 'parse_mode'=>"MarkDown",
   ]);
 }
 }
if($text == "🌹 ساخت سلف [ تٔاًیٍمٌ تٔوُ بٌیًوِ ]"){
if($imt > 10 ){
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"♻️ سلف شما در حال ساخت است ..",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
 	$rand = rand(1111111111,9999999999);
  $fil = $rand;
  mkdir("cli1/$fil");
    	 $index = file_get_contents("source/self1/index.php");
  save("cli1/$fil/index.php",$index);
  $bugha = $imt - 10;
  	$user["imt"] = "$bugha";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);	
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ سلف شما با موفقیت ساخته شد !

👈🏻 شماره پوشه : $fil
💎 لینک لوگین :
$address/cli1/$fil/index.php

➕ کرون جاب خودکار اعمال شده.
‼️ مقدار 10 امتیاز از شما کسر شد .
🆔 | @$bottag",
 ]);
 }else{
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"🌷 | جهت ساخت سلف [ تٔاًیٍمٌ تٔوُ بٌیًوِ ] حداقل به 10 امتیاز نیاز دارید ",
 'parse_mode'=>"MarkDown",
   ]);
 }
 }
 if($text == "🌹 ساخت سلف [ تٔاًیٍمٌ تٔوُ أسًمُ ]"){
if($imt > 20 ){
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"♻️ سلف شما در حال ساخت است ..",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
 	$rand = rand(1111111111,9999999999);
  $fil = $rand;
  mkdir("cli2/$fil");
    	 $index = file_get_contents("source/self2/index.php");
  save("cli2/$fil/index.php",$index);
  $bugha = $imt - 20;
  	$user["imt"] = "$bugha";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);	
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ سلف شما با موفقیت ساخته شد !

👈🏻 شماره پوشه : $fil
💎 لینک لوگین :
$address/cli2/$fil/index.php

➕ کرون جاب خودکار اعمال شده.
‼️ مقدار 20 امتیاز از شما کسر شد .
🆔 | @$bottag",
 ]);
 }else{
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"🌷 | جهت ساخت سلف [ تٔاًیٍمٌ تٔوُ أسًمُ ] حداقل به 20 امتیاز نیاز دارید ",
 'parse_mode'=>"MarkDown",
   ]);
 }
 }
 if($text == "🌹 ساخت سلف [ تٔاًیٍمٌ تٔوُ پٔرٌوٌفٌ ]"){
if($imt > 30 ){
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"♻️ سلف شما در حال ساخت است ..",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
 	$rand = rand(1111111111,9999999999);
  $fil = $rand;
  mkdir("cli3/$fil");
    	 $index = file_get_contents("source/self3/index.php");
  save("cli3/$fil/index.php",$index);
  $bugha = $imt - 30;
  	$user["imt"] = "$bugha";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);	
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅ سلف شما با موفقیت ساخته شد !

👈🏻 شماره پوشه : $fil
💎 لینک لوگین :
$address/cli3/$fil/index.php

➕ کرون جاب خودکار اعمال شده.
‼️ مقدار 30 امتیاز از شما کسر شد .
🆔 | @$bottag",
 ]);
 }else{
 bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"🌷 | جهت ساخت سلف [ تٔاًیٍمٌ تٔوُ پٔرٌوٌفٌ ] حداقل به 30 امتیاز نیاز دارید ",
 'parse_mode'=>"MarkDown",
   ]);
 }
 }

if($text == 'پروفایل من ❄️'){
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "┈┅┈┅┈┅┈┅🙂 پروفایل شــما 👇┅┈┅┈┅┈┅┈",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text'=>"┈┅┈┅┈┅┈┅┈┅┈┅┈┅┈┅┈",'callback_data'=>'ping']],
[['text'=>"$first_name",'callback_data'=>'ping'],['text'=>"🍃 نام شما : ",'callback_data'=>'ping']],
[['text'=>"$chat_id",'callback_data'=>'ping'],['text'=>"🍂 شناسه کاربری شما :",'callback_data'=>'ping']],
[['text'=>"@$username",'callback_data'=>'ping'],['text'=>"🆔 یوزرنیم شما : ",'callback_data'=>'ping']],
[['text'=>"$imt",'callback_data'=>'ping'],['text'=>"💫 تعداد امتیازت :",'callback_data'=>'ping']],
[['text'=>"$warn",'callback_data'=>'ping'],['text'=>"❗️| اخطار های شما :",'callback_data'=>'ping']],
[['text'=>"┈┅┈┅┈┅┈┅┈┅┈┅┈┅┈┅┈",'callback_data'=>'ping']],
[['text'=>"$time",'callback_data'=>'ping'],['text'=>"⏰ ساعت :",'callback_data'=>'ping']],
[['text'=>"$date",'callback_data'=>'ping'],['text'=>"📆 تاریخ :",'callback_data'=>'ping']],
[['text'=>"┈┅┈┅┈┅┈┅┈┅┈┅┈┅┈┅┈",'callback_data'=>'ping']],
]
])
]);
} 
  
if($text == "/creator"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"1- در صورت خرید ربات مشابه یا خرید سورس و ... به سازنده ربات مراجعه کنید 🥱 

܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏

2- سازنده ربات به پشتیبانی ربات هیچ ربطی ندارد 🍃

܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏

3- اگر باگی در ربات دیدید حتما به سازنده گزارش بدید و جایزه دریافت کنید 🤯

܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏܏܍܏܍܏܍܏܍܏܍܏܍܏܍܏

☎️ برای ارتباط با سازنده روی دکمه زیر کلیک کنید 🍀",'parse_mode'=>"HTML",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"𝙲𝚁𝙴𝙰𝚃𝙾𝚁",'url'=>'https://t.me/i_love_she']],
]])
]);
}
if($text == "⭐️ دریافت امتیاز"){
	$id = bot('sendphoto',[
	'chat_id'=>$from_id,
	'photo'=>$baner,
	'caption'=>"🤔 دلت میخواد سلف داشته باشی رو اکانتت ؟ 

یا اینکه داخل پروفایلت تایم داشته باشی ؟ 🤔



اونم #کاملا_رایگان باشه ؟ ☃️

خب این کاری نداره که با این ربات میتونی به راحتی سلف درست کنی و ساعت بزنی داخل اسم و بیوگرافی و عکس پروفایلت 💫

🔗 lιɴĸ : https://t.me/$bottag?start=$from_id",
    		])->result->message_id;
   bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"⚡️⚡️⚡️⚡️⚡️⚡️⚡️⚡️⚡️⚡️⚡️⚡️⚡️⚡️⚡️⚡️


با پخش کردن بنر بالا داخل پی وی هات و گروه هات هر کسی با لینک تو وارد ربات بشه بهت 1 امتیاز میدم 🙂

همین الان دوستات رو به ربات دعوت کن و برای خودت سلف رایگان درست کن 😁

⚡️⚡️⚡️⚡️⚡️⚡️⚡️⚡️⚡️⚡️⚡️⚡️⚡️⚡️⚡️⚡️",
 'reply_markup'=>json_encode([
    'keyboard'=>[
    [['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
}
if($text == "آپدیت ربات ♻️"){
file_put_contents("data/$from_id/step.txt","none");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'کمی صبر کنید در حال آپدیت ربات💫'
 ]);
sleep(3);
 bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'▱▱▱▱▱▱▱▱▱▱'
 ]);
sleep(0.1);
 bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'▰▱▱▱▱▱▱▱▱▱'
 ]);
 sleep(0.1);
 bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'▰▰▱▱▱▱▱▱▱▱'
 ]);
 sleep(0.1);
 bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'▰▰▰▱▱▱▱▱▱▱'
 ]);
 sleep(0.1);
 bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'▰▰▰▰▱▱▱▱▱▱'
 ]);
 sleep(0.1);
 bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'▰▰▰▰▰▱▱▱▱▱'
 ]);
 sleep(0.1);
 bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'▰▰▰▰▰▰▱▱▱▱'
 ]);
 sleep(0.1);
 bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'▰▰▰▰▰▰▰▱▱▱'
 ]);
 sleep(0.1);
 bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'▰▰▰▰▰▰▰▰▱▱'
 ]);
 sleep(0.1);
 bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'▰▰▰▰▰▰▰▰▰▱'
 ]);
 sleep(0.1);
  bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'▰▰▰▰▰▰▰▰▰▰'
 ]);
  sleep(0.1);
    bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'25%'
 ]);
  sleep(0.1);
      bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'50%'
 ]);
 sleep(0.1);
      bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'75%'
 ]);
  sleep(0.1);
 bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'𝟏𝟎𝟎% 𝖳𝖧𝖤 𝖱𝖮𝖡𝖮𝖳 𝖶𝖠𝖲 𝖴𝖯𝖣𝖠𝖳𝖤𝖣'
 ]);
}
function rand_string( $length ) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
return substr(str_shuffle($chars),0,$length);
}
$hadi =  rand_string(12);
if($text == 'وضعیت ربات 📊'){
	$load = sys_getloadavg();
$memm = memory_get_usage();
$ver = phpversion(); 
$mem = file_get_contents("data/members.txt");
		$ex2 = explode("\n",$mem);
		$c1 = count($ex2)-1;
		$document = 'cli';
$scan = scandir($document);
$scan = array_diff($scan, ['.','..']);
$fil = count($scan);
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "┈┅┈┅┈┅┈┅ وضعیت ربات به شرح زیر است ┅┈┅┈┅┈┅┈",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text'=>"┈┅┈┅┈┅┈┅┈┅┈┅┈┅┈┅┈",'callback_data'=>'ping']],
[['text'=>"$c1",'callback_data'=>'ping'],['text'=>"✨ تعداد کاربران :",'callback_data'=>'ping']],
[['text'=>"$fil",'callback_data'=>'ping'],['text'=>"🌙 تعداد سلف ها :",'callback_data'=>'ping']],
[['text'=>"$hadi",'callback_data'=>'ping'],['text'=>"🍺 لایسنس شما :",'callback_data'=>'ping']],
[['text'=>"$load[0]",'callback_data'=>'ping'],['text'=>"پینگ 〽️ :",'callback_data'=>'ping']],
[['text'=>"$ver",'callback_data'=>'ping'],['text'=>"ورژن پی اچ پی♻️ :",'callback_data'=>'ping']],
[['text'=>"$memm KB",'callback_data'=>'ping'],['text'=>"میزان مصرف حافظه💻 :",'callback_data'=>'ping']],
[['text'=>"┈┅┈┅┈┅┈┅ تاریخ امروز ┅┈┅┈┅┈┅┈",'callback_data'=>'ping']],
[['text'=>"$date",'callback_data'=>'ping']],
[['text'=>"┈┅┈┅ ساعت و دقیقه و ثانیه ┅┈┅┈",'callback_data'=>'ping']],
[['text'=>"$time",'callback_data'=>'ping']],
]
])
]);
} 
#••••••••••••••••••••••••••••••••••••••••••#
// پــنــل مــدیــریــت
#••••••••••••••••••••••••••••••••••••••••••#
// panel admin
#••••••••••••••••••••••••••••••••••••••••••#
if($text == "/admin" or $text == "/panel" or $text == "برگشت به پنل"){
if(in_array($chat_id,$admins)){
	$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);	
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"🙏 پنل مدیریتی بالا اومد🙏",
 'reply_markup'=>json_encode([
    'keyboard'=>[
[['text'=>"آمار ربات 📊"]],
[['text'=>"❌ | بن کردن"],['text'=>"🤍 | آن بن"]],
[['text'=>"فوروارد همگانی 💌"],['text'=>"📨 پیام همگانی"]],
[['text'=>"📈 | افزایش امتیاز کاربر"],['text'=>"📉 | کسر امتیاز کاربر"]],
[['text'=>"⏺ | روشن"],['text'=>"💤 | خاموش"]],
[['text'=>"❗️| اخطار به کاربر"],['text'=>"❕| حذف اخطار کاربر"]],
[['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
	],
	"resize_keyboard"=>true
	])
 ]);
}
}

elseif($text == "📈 | افزایش امتیاز کاربر" and $tc == 'private'){	
if ($chat_id == $dev) {
$user["step"] = "coinup";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🆔 | ایدی عددی فرد مورد نظر را ارسال کنید",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
],
"resize_keyboard"=>true,
])
]); 
}}
if($step == "coinup" && $text != "⇱ 𝔟𝔞𝔠𝔨 ⇲"){
if ($chat_id == $dev) {
if(file_exists("data/$text.json")){
$user["step"] = "getcoin";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
file_put_contents("data/id.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔰 | تعداد امتیاز را ارسال کنید",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
],
"resize_keyboard"=>true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ | ایدی کاربری که ارسال کردید در ربات نیست",
]); 
}}}
if($step == "getcoin" && $text != "⇱ 𝔟𝔞𝔠𝔨 ⇲"){
if ($chat_id == $dev) {
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$id = file_get_contents("data/id.txt");
$userr = json_decode(file_get_contents("data/$id.json"),true);
$bugha = $userr['imt'] + $text;
$userr["imt"] = "$bugha";
$outjson = json_encode($userr,true);
file_put_contents("data/$id.json",$outjson);	
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"
🎉 | تبریک تعداد *$text* امتیاز به شما اضافه شد . . . 
 
",
'parse_mode'=>"MarkDown",
]); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ | با موفقیت تعداد *$text* امتیاز به کاربر `$id` اضافه شد",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"آمار ربات 📊"]],
[['text'=>"❌ | بن کردن"],['text'=>"🤍 | آن بن"]],
[['text'=>"فوروارد همگانی 💌"],['text'=>"📨 پیام همگانی"]],
[['text'=>"📈 | افزایش امتیاز کاربر"],['text'=>"📉 | کسر امتیاز کاربر"]],
[['text'=>"⏺ | روشن"],['text'=>"💤 | خاموش"]],
[['text'=>"❗️| اخطار به کاربر"],['text'=>"❕| حذف اخطار کاربر"]],
[['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
],
"resize_keyboard"=>true,
])
]); 
}}
elseif($text == "📉 | کسر امتیاز کاربر" and $tc == 'private'){	
if ($chat_id == $dev) {
$user["step"] = "coindown";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🆔 | ایدی عددی فرد مورد نظر را ارسال کنید",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
],
"resize_keyboard"=>true,
])
]); 
}}
if($step == "coindown" && $text != "⇱ 𝔟𝔞𝔠𝔨 ⇲"){
if ($chat_id == $dev) {
if(file_exists("data/$text.json")){
$user["step"] = "byecoin";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
file_put_contents("data/id.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🔰 | تعداد امتیاز را ارسال کنید",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
],
"resize_keyboard"=>true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ | ایدی کاربری که ارسال کردید در ربات نیست",
]); 
}}}
if($step == "byecoin" && $text != "⇱ 𝔟𝔞𝔠𝔨 ⇲"){
if ($chat_id == $dev) {
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$id = file_get_contents("data/id.txt");
$userr = json_decode(file_get_contents("data/$id.json"),true);
$bugha = $userr['imt'] - $text;
$userr["imt"] = "$bugha";
$outjson = json_encode($userr,true);
file_put_contents("data/$id.json",$outjson);	
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"
🔐 | تعداد *$text* امتیاز از شما کسر شد . . .
 
",
'parse_mode'=>"MarkDown",
]); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ | با موفقیت تعداد *$text* امتیاز از کاربر `$id` کسر شد",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"آمار ربات 📊"]],
[['text'=>"❌ | بن کردن"],['text'=>"🤍 | آن بن"]],
[['text'=>"فوروارد همگانی 💌"],['text'=>"📨 پیام همگانی"]],
[['text'=>"📈 | افزایش امتیاز کاربر"],['text'=>"📉 | کسر امتیاز کاربر"]],
[['text'=>"⏺ | روشن"],['text'=>"💤 | خاموش"]],
[['text'=>"❗️| اخطار به کاربر"],['text'=>"❕| حذف اخطار کاربر"]],
[['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
],
"resize_keyboard"=>true,
])
]); 
}}
elseif($text == "❗️| اخطار به کاربر" and $tc == 'private'){	
if ($chat_id == $dev) {
$user["step"] = "warnup";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🆔 | ایدی عددی فرد مورد نظر را ارسال کنید",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
],
"resize_keyboard"=>true,
])
]); 
}}
if($step == "warnup" && $text != "⇱ 𝔟𝔞𝔠𝔨 ⇲"){
if ($chat_id == $dev) {
if(file_exists("data/$text.json")){
$user["step"] = "getwarn";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
file_put_contents("data/id.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تعداد اخطار را وارد کنید 🎈",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
],
"resize_keyboard"=>true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ | ایدی کاربری که ارسال کردید در ربات نیست",
]); 
}}}
if($step == "getwarn" && $text != "⇱ 𝔟𝔞𝔠𝔨 ⇲"){
if ($chat_id == $dev) {
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$id = file_get_contents("data/id.txt");
$userr = json_decode(file_get_contents("data/$id.json"),true);
$bugha = $userr['warn'] + $text;
$userr["warn"] = "$bugha";
$outjson = json_encode($userr,true);
file_put_contents("data/$id.json",$outjson);	
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"
❗️| اوپس , تعداد *$text* اخطار به شما اضافه شد . . .
 
",
'parse_mode'=>"MarkDown",
]); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ | با موفقیت تعداد *$text* اخطار به کاربر `$id` اضافه شد . . .",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"آمار ربات 📊"]],
[['text'=>"❌ | بن کردن"],['text'=>"🤍 | آن بن"]],
[['text'=>"فوروارد همگانی 💌"],['text'=>"📨 پیام همگانی"]],
[['text'=>"📈 | افزایش امتیاز کاربر"],['text'=>"📉 | کسر امتیاز کاربر"]],
[['text'=>"⏺ | روشن"],['text'=>"💤 | خاموش"]],
[['text'=>"❗️| اخطار به کاربر"],['text'=>"❕| حذف اخطار کاربر"]],
[['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
],
"resize_keyboard"=>true,
])
]); 
}}
elseif($text == "❕| حذف اخطار کاربر" and $tc == 'private'){	
if ($chat_id == $dev) {
$user["step"] = "warndown";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🆔 | ایدی عددی فرد مورد نظر را ارسال کنید",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
],
"resize_keyboard"=>true,
])
]); 
}}
if($step == "warndown" && $text != "⇱ 𝔟𝔞𝔠𝔨 ⇲"){
if ($chat_id == $dev) {
if(file_exists("data/$text.json")){
$user["step"] = "byewarn";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
file_put_contents("data/id.txt",$text);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تعداد اخطار را وارد کنید 🎈",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
],
"resize_keyboard"=>true,
])
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ | ایدی کاربری که ارسال کردید در ربات نیست",
]); 
}}}
if($step == "byewarn" && $text != "⇱ 𝔟𝔞𝔠𝔨 ⇲"){
if ($chat_id == $dev) {
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$id = file_get_contents("data/id.txt");
$userr = json_decode(file_get_contents("data/$id.json"),true);
$bugha = $userr['warn'] - $text;
$userr["warn"] = "$bugha";
$outjson = json_encode($userr,true);
file_put_contents("data/$id.json",$outjson);	
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"
🎉 | تبریک تعداد *$text* اخطار از شما کم شد . . .
 
",
'parse_mode'=>"MarkDown",
]); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ | با موفقیت تعداد *$text* اخطار از کاربر `$id` حذف شد . . .",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"آمار ربات 📊"]],
[['text'=>"❌ | بن کردن"],['text'=>"🤍 | آن بن"]],
[['text'=>"فوروارد همگانی 💌"],['text'=>"📨 پیام همگانی"]],
[['text'=>"📈 | افزایش امتیاز کاربر"],['text'=>"📉 | کسر امتیاز کاربر"]],
[['text'=>"⏺ | روشن"],['text'=>"💤 | خاموش"]],
[['text'=>"❗️| اخطار به کاربر"],['text'=>"❕| حذف اخطار کاربر"]],
[['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
],
"resize_keyboard"=>true,
])
]); 
}}
elseif($text == "💤 | خاموش" and $tc == 'private'){
if ($chat_id == $dev) {
	file_put_contents("onof.txt","off");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"💤 | ربات با موفقیت خاموش شد",
]); 
}}
elseif($text == "⏺ | روشن" and $tc == 'private'){
if ($chat_id == $dev) {
	file_put_contents("onof.txt","on");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⏺ | ربات با موفقیت روشن شد",
]); 
}}
elseif($text == "❌ | بن کردن" and $tc == 'private'){	
if ($chat_id == $dev) {
$user["step"] = "ben";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🆔 | ایدی عددی فرد مورد نظر را ارسال کنید",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
],
"resize_keyboard"=>true,
])
]); 
}}
if($step == "ben" && $text != "⇱ 𝔟𝔞𝔠𝔨 ⇲"){
if ($chat_id == $dev) {
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$text = file_get_contents("data/id.txt");
$userr = json_decode(file_get_contents("data/$text.json"),true);
$bugha = $userr['warn'] + 3;
$userr["warn"] = "$bugha";
$outjson = json_encode($userr,true);
file_put_contents("data/$text.json",$outjson);	
bot('sendMessage',[
'chat_id'=>$text,
'text'=>"
❌ | شما از ربات مسدود شدید 
 
",
'parse_mode'=>"MarkDown",
]); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ | با موفقیت کاربر `$text` از ربات مسدود شد . . .",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"آمار ربات 📊"]],
[['text'=>"❌ | بن کردن"],['text'=>"🤍 | آن بن"]],
[['text'=>"فوروارد همگانی 💌"],['text'=>"📨 پیام همگانی"]],
[['text'=>"📈 | افزایش امتیاز کاربر"],['text'=>"📉 | کسر امتیاز کاربر"]],
[['text'=>"⏺ | روشن"],['text'=>"💤 | خاموش"]],
[['text'=>"❗️| اخطار به کاربر"],['text'=>"❕| حذف اخطار کاربر"]],
[['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
],
"resize_keyboard"=>true,
])
]); 
}}
elseif($text == "🤍 | آن بن" and $tc == 'private'){	
if ($chat_id == $dev) {
$user["step"] = "unben";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🆔 | ایدی عددی فرد مورد نظر را ارسال کنید",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
],
"resize_keyboard"=>true,
])
]); 
}}
if($step == "unben" && $text != "⇱ 𝔟𝔞𝔠𝔨 ⇲"){
if ($chat_id == $dev) {
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$text = file_get_contents("data/id.txt");
$userr = json_decode(file_get_contents("data/$text.json"),true);
$userr["warn"] = "0";
$outjson = json_encode($userr,true);
file_put_contents("data/$text.json",$outjson);	
bot('sendMessage',[
'chat_id'=>$text,
'text'=>"
🤍 | شما آن بن شدید 
 
",
'parse_mode'=>"MarkDown",
]); 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ | با موفقیت کاربر `$text` از ربات آزاد شد . . .",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"آمار ربات 📊"]],
[['text'=>"❌ | بن کردن"],['text'=>"🤍 | آن بن"]],
[['text'=>"فوروارد همگانی 💌"],['text'=>"📨 پیام همگانی"]],
[['text'=>"📈 | افزایش امتیاز کاربر"],['text'=>"📉 | کسر امتیاز کاربر"]],
[['text'=>"⏺ | روشن"],['text'=>"💤 | خاموش"]],
[['text'=>"❗️| اخطار به کاربر"],['text'=>"❕| حذف اخطار کاربر"]],
[['text'=>"⇱ 𝔟𝔞𝔠𝔨 ⇲"]],
],
"resize_keyboard"=>true,
])
]); 
}} 
if($text == "فوروارد همگانی 💌" && $chat_id == $dev){
    file_put_contents("data/$from_id/tak.txt","fwd");
 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"پیام خود را ارسال کنید",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
   [['text'=>'⇱ 𝔟𝔞𝔠𝔨 ⇲']],
      ],'resize_keyboard'=>true])
  ]);
}
if($data == "fwd" && $chat_id == $dev){
    file_put_contents("data/$from_id/tak.txt","no");
 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"درحال ارسال",
  ]);
$forp = fopen( "member.txt", 'r'); 
while( !feof( $forp)) { 
$fakar = fgets( $forp); 
Forward($fakar, $chat_id,$message_id); 
  } 
   bot('sendMessage',[ 
   'chat_id'=>$chat_id, 
   'text'=>"با موفقیت ارسال شد.", 
   ]);
}
if($text == "📨 پیام همگانی" && $chat_id == $dev){
    file_put_contents("data/$from_id/tak.txt","forall");
 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"پیام خودتون را فوروارد کنید:",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
   [['text'=>'⇱ 𝔟𝔞𝔠𝔨 ⇲']],
      ],'resize_keyboard'=>true])
  ]);
}
if($data == "forall" && $chat_id == $dev){
    file_put_contents("data/$from_id/tak.txt","no");
 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"درحال ارسال",
  ]);
$all_member = fopen( "member.txt", "r"); 
while( !feof( $all_member)){
$bo = fgets( $all_member);
SendMessage($bo,"$text");
}
   bot('sendMessage',[ 
   'chat_id'=>$chat_id, 
   'text'=>"با موفقیت ارسال شد.", 
   ]);
} 
 if($text == "آمار ربات 📊"){
 	$load = sys_getloadavg();
$memm = memory_get_usage();
$ver = phpversion(); 
if(in_array($chat_id,$admins)){
$mem = file_get_contents("data/members.txt");
		$ex2 = explode("\n",$mem);
		$c1 = count($ex2)-1;
		$document = 'cli';
$scan = scandir($document);
$scan = array_diff($scan, ['.','..']);
$fil = count($scan);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text' => "┈┅┈┅┈┅┈┅آمار ربات شما┅┈┅┈┅┈┅┈",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text'=>"┈┅┈┅┈┅┈┅┈┅┈┅┈┅┈┅┈",'callback_data'=>'ping']],
[['text'=>"$c1",'callback_data'=>'ping'],['text'=>"✨ تعداد کاربران :",'callback_data'=>'ping']],
[['text'=>"$fil",'callback_data'=>'ping'],['text'=>"🌙 تعداد سلف :",'callback_data'=>'ping']],
[['text'=>"┈┅┈┅┈┅┈┅┈┅┈┅┈┅┈┅┈",'callback_data'=>'ping']],
[['text'=>"$load[0]",'callback_data'=>'ping'],['text'=>"پینگ 〽️ :",'callback_data'=>'ping']],
[['text'=>"$ver",'callback_data'=>'ping'],['text'=>"ورژن پی اچ پی♻️ :",'callback_data'=>'ping']],
[['text'=>"$memm KB",'callback_data'=>'ping'],['text'=>"میزان مصرف حافظه💻 :",'callback_data'=>'ping']],
[['text'=>"┈┅┈┅┈┅┈┅┈┅┈┅┈┅┈┅┈",'callback_data'=>'ping']],
[['text' => "سازنده 🎉", 'url' => "https://t.me/tak_php"]],
[['text'=>"┈┅┈┅┈┅┈┅ تاریخ امروز ┅┈┅┈┅┈┅┈",'callback_data'=>'ping']],
[['text'=>"$date",'callback_data'=>'ping']],
[['text'=>"┈┅┈┅ ساعت و دقیقه و ثانیه ┅┈┅┈",'callback_data'=>'ping']],
[['text'=>"$time",'callback_data'=>'ping']],
]
])
 ]);
}
}
//----
}

/*
t.me/tak_php
••••••••••••••••••••••••••••••••••••••••••
کانال پر از سورس های متفاوت
سورس کده 
https://t.me/Sourrce_kade
••••••••••••••••••••••••••••••••••••••••••
کص ننت اصکی بری منبع نزنی 
•••••••••••••••••••••
اصکی با منبع ازاد ✓
•••••••••••••••••••••
سورس نوشته شده توسط @tak_php 
تــک پـــی اچـــ پــــی
*/
    if(file_exists(error_log))
	unlink(error_log);
?>
