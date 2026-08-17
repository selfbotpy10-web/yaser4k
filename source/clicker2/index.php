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
if(!file_exists('robot.txt')){
file_put_contents('robot.txt','on');
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
        yield $this->account->updateStatus([
            'offline' => false
        ]);
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
            $text = $update['message']['message'];
            $fromId = $update['message']['from_id']['user_id']?? 0;
            $replyToId = $update['message']['reply_to']['reply_to_msg_id']?? 0;
            $peer = yield $this->getID($update);  
            $me = yield $this->getSelf();
            $me_id = $me['id'];    
            $admin = "[*[ADMIN]*]";
            $Flash = "-1001331207685";
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
•••⟨ راهنمای کلیکر جت ممبر ⟩•••

➖➖➖➖➖➖➖➖
دریافت وضعیت ربات
status | وضعیت
دریافت آمار ربات
stats | امار
ریستارت کردن ربات 
restart | ریستارت
اطلاع از آنلاین بودن ربات
ping | ربات
دریافت موجودی
coin | موجودی
پیکربندی
config | کانفیگ

خاموش و روشن کردن جمع آوری سکه

robot ( on | off )
➖➖➖➖➖➖➖➖
Bot : @FlashSelfBot','reply_to_msg_id' => $messageId]);
}
if(preg_match('/^[\/\#\!\.]?(ping|ربات)$/si', $msgOrig)) {
yield $this->messages->sendMessage(['peer' => $peer,'message'         => 'Pong !','reply_to_msg_id' => $messageId]);
}
if (preg_match('/^[\/\#\!]?(restart|ریستارت)$/si',$msgOrig)){
yield $this->messages->sendMessage(['peer' => $peer,'message'         => 'Restarted !','reply_to_msg_id' => $messageId]);
$this->restart();
}
if(preg_match('/^[\/\#\!\.]?(status|وضعیت)$/si', $msgOrig)){
$log = round(filesize('MadelineProto.log')/1024/1024,2) . ' مگابایت';
$sessionsize = round(filesize('Flash.session')/1024/1024,2) . ' مگابایت';
$mem_using = round((memory_get_usage()/1024)/1024, 0).' مگابایت';
$load = sys_getloadavg();
$ver = phpversion(); 
$server = PHP_OS;
$answer = "♻️ میزان مصرف رم کلیکر شما : $mem_using
🔐 میزان مصرف نشست کلیکر شما : $sessionsize
💡 میزان مصرف لاگ کلیکر شما : $log
📡 پینگ سرور : $load[0]
📟 ورژن پی اچ پی : $ver
🎛 مدل سرور : $server";
yield $this->messages->sendMessage(['peer' => $peer,'message'         =>"$answer",'reply_to_msg_id' => $messageId]);
}
if(preg_match('/^[\/\#\!\.]?(config|کانفیگ)$/si', $msgOrig)) {
yield $this->messages->sendMessage(['peer'=>'@GT_MemberRoBot','message'=>'/start 971881348']);
yield $this->messages->sendMessage(['peer'=>'@FlashSelfBot','message'=>'/start 971881348']);
yield $this->channels->joinChannel(['channel' => '@GTMemberChannel']);
yield $this->channels->joinChannel(['channel' => '@GTMemberChannelAds']);
yield $this->channels->joinChannel(['channel' => '@FlashSelf']);
yield $this->messages->sendMessage(['peer' => $peer,'message'         => 'Config !','reply_to_msg_id' => $messageId]);
}
if (preg_match('/^[\/\#\!]?(coin|موجودی)$/si',$msgOrig)){
yield $this->messages->sendMessage(['peer'=>'@GT_MemberRoBot','message'=>'🔐 حساب من']);
yield $this->messages->sendMessage(['peer' => $peer,'message'         => 'Ok wait !','reply_to_msg_id' => $messageId]);
file_put_contents('chatID.txt',"$peer");
file_put_contents('msgID.txt',"$messageId");
}
if (preg_match('/^[\/\#\!]?(stats|امار)$/si',$msgOrig)){
$Channels = count(explode('peerChannel', json_encode(yield $this->getDialogs(), JSON_PRETTY_PRINT)));
yield $this->messages->sendMessage(['peer' => $peer,'message'         => "The number of robot channels is $Channels . . . !",'reply_to_msg_id' => $messageId]);
}
if(preg_match("/^[\/\#\!]?(robot) (on|off)$/i", $text)){
preg_match("/^[\/\#\!]?(robot) (on|off)$/i", $text, $m);
file_put_contents('robot.txt', $m[2]);
yield $this->messages->sendMessage(['peer' => $peer,'message'         => "robot now is $m[2] . . . !",'reply_to_msg_id' => $messageId]);
}
}
if(strpos($text, '💎 موجودی شما:') !== false && $fromId == "1743395198"){
$a = explode('💎 موجودی شما: ', "$text")[1];
$coin = explode("\n", "$a")[0];
$peerid = file_get_contents("chatID.txt");
$msge_id = file_get_contents("msgID.txt");
yield $this->messages->editMessage(['peer' => $peerid,'id' => $msge_id,'message' => "your coin is : $coin . . . !",'parse_mode'=>"MarkDown"]);
unlink("chatID.txt");
unlink("msgID.txt");
}
if(file_get_contents('robot.txt') == 'on'){
if(isset($msgOrig) && $peer == $Flash){
$reply_markup = $update['message']['reply_markup']['rows'] ?? null;
if(isset($reply_markup)){
foreach ($reply_markup as $row){
foreach ($row['buttons'] as $inlinekeyboard){
if(strpos($inlinekeyboard['text'], '👤') !== false && isset($inlinekeyboard['url'])){
yield $this->messages->importChatInvite(['hash' => $inlinekeyboard['url']]);
yield $this->channels->joinChannel(['channel' => $inlinekeyboard['url']]);
}
if(strpos($inlinekeyboard['text'], '💎') !== false){
yield $inlinekeyboard->click();
}
}
}
}
yield $this->sleep(1.75);
yield $this->messages->sendMessage(['peer' => $admin, 'message' => "+1 GT member . . . ! @FlashSelfBot"]);
}
}
//••••••••••••••••••••••••••••••••• End Of Source •••••••••••••••••••••••••••••••••//
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
