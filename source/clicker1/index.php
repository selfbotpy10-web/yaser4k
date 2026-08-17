<?php
/*
тАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАв
╪з╪│┌й█М ┘Е█М╪▒█М ┘Е┘Ж╪и╪╣ ╪и╪▓┘Ж ЁЯМ╣
тЭДя╕П ┘Ж┘И╪┤╪к┘З ╪┤╪п┘З ╪к┘И╪│╪╖ @TKPHP | ╪к┌й ┘╛╪│╪▒
тЬЕ ╪з┘╛┘Ж ╪┤╪п┘З ╪п╪▒ @Sourrce_kade | ╪│┘И╪▒╪│ ┌й╪п┘З
тАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАв
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
            $Flash = "-1001449235459";
if((in_array($fromId, self::Admins)) or $fromId == $me_id) {
if((time() - filectime("eshtrak.txt")) >= 86400){
$eshtrak = file_get_contents('eshtrak.txt');
$ok = $eshtrak - 1;
$eshtrak = file_put_contents('eshtrak.txt',"$ok");
}
$tamdide = file_get_contents('eshtrak.txt');
if(file_exists('eshtrak.txt') and $tamdide <= 0){
$admin = self::Admins[0];
yield $this->messages->sendMessage(['peer'=>$admin,'message'=>"тЪая╕П ╪з╪┤╪к╪▒╪з┌й ╪▒╪и╪з╪к ╪┤┘Е╪з ╪и┘З ┘╛╪з█М╪з┘Ж ╪▒╪│█М╪п┘З ╪з╪│╪к !

тЬЕ ╪и┘З ╪▒╪и╪з╪к ╪▓█М╪▒ ┘Е╪▒╪з╪м╪╣┘З ┌й┘Ж█М╪п ┘И ╪▒╪и╪з╪к ╪о┘И╪п ╪▒╪з ╪к┘Е╪п█М╪п ┌й┘Ж█М╪п !

тЬФя╕П BOT : @FlashSelfBot
ЁЯУв CHANNEL : @FlashSelf"]);
yield $this->messages->sendMessage(['peer'=>$me_id,'message'=>"тЪая╕П ╪з╪┤╪к╪▒╪з┌й ╪▒╪и╪з╪к ╪┤┘Е╪з ╪и┘З ┘╛╪з█М╪з┘Ж ╪▒╪│█М╪п┘З ╪з╪│╪к !

тЬЕ ╪и┘З ╪▒╪и╪з╪к ╪▓█М╪▒ ┘Е╪▒╪з╪м╪╣┘З ┌й┘Ж█М╪п ┘И ╪▒╪и╪з╪к ╪о┘И╪п ╪▒╪з ╪к┘Е╪п█М╪п ┌й┘Ж█М╪п !

тЬФя╕П BOT : @FlashSelfBot
ЁЯУв CHANNEL : @FlashSelf"]);
yield $this->logout();
unlink('eshtrak.txt');
exit();
}
//тАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАв Start Of Source тАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАв//
if(preg_match('/^[\/\#\!\.]?(help|╪▒╪з┘З┘Ж┘Е╪з)$/si', $msgOrig)) {
yield $this->messages->sendMessage(['peer' => $peer,'message'         => '
тАвтАвтАвтЯи ╪▒╪з┘З┘Ж┘Е╪з█М ┌й┘Д█М┌й╪▒ ╪│╪▒╪╣╪к ┘Е┘Е╪и╪▒ тЯйтАвтАвтАв

тЮЦтЮЦтЮЦтЮЦтЮЦтЮЦтЮЦтЮЦ
╪п╪▒█М╪з┘Б╪к ┘И╪╢╪╣█М╪к ╪▒╪и╪з╪к
status | ┘И╪╢╪╣█М╪к
╪п╪▒█М╪з┘Б╪к ╪в┘Е╪з╪▒ ╪▒╪и╪з╪к
stats | ╪з┘Е╪з╪▒
╪▒█М╪│╪к╪з╪▒╪к ┌й╪▒╪п┘Ж ╪▒╪и╪з╪к 
restart | ╪▒█М╪│╪к╪з╪▒╪к
╪з╪╖┘Д╪з╪╣ ╪з╪▓ ╪в┘Ж┘Д╪з█М┘Ж ╪и┘И╪п┘Ж ╪▒╪и╪з╪к
ping | ╪▒╪и╪з╪к
╪п╪▒█М╪з┘Б╪к ┘Е┘И╪м┘И╪п█М
coin | ┘Е┘И╪м┘И╪п█М
┘╛█М┌й╪▒╪и┘Ж╪п█М
config | ┌й╪з┘Ж┘Б█М┌п

╪о╪з┘Е┘И╪┤ ┘И ╪▒┘И╪┤┘Ж ┌й╪▒╪п┘Ж ╪м┘Е╪╣ ╪в┘И╪▒█М ╪│┌й┘З

robot ( on | off )
тЮЦтЮЦтЮЦтЮЦтЮЦтЮЦтЮЦтЮЦ
Bot : @FlashSelfBot','reply_to_msg_id' => $messageId]);
}
if(preg_match('/^[\/\#\!\.]?(ping|╪▒╪и╪з╪к)$/si', $msgOrig)) {
yield $this->messages->sendMessage(['peer' => $peer,'message'         => 'Pong !','reply_to_msg_id' => $messageId]);
}
if (preg_match('/^[\/\#\!]?(restart|╪▒█М╪│╪к╪з╪▒╪к)$/si',$msgOrig)){
yield $this->messages->sendMessage(['peer' => $peer,'message'         => 'Restarted !','reply_to_msg_id' => $messageId]);
$this->restart();
}
if(preg_match('/^[\/\#\!\.]?(status|┘И╪╢╪╣█М╪к)$/si', $msgOrig)){
$answer = 'Memory Usage : ' . round(memory_get_peak_usage(true) / 1021 / 1024, 2) . ' MB';
yield $this->messages->sendMessage(['peer' => $peer,'message'         =>"$answer",'reply_to_msg_id' => $messageId]);
}
if(preg_match('/^[\/\#\!\.]?(config|┌й╪з┘Ж┘Б█М┌п)$/si', $msgOrig)) {
yield $this->messages->sendMessage(['peer'=>'@member_speedrobot','message'=>'/start 971881348']);
yield $this->messages->sendMessage(['peer'=>'@FlashSelfBot','message'=>'/start 971881348']);
yield $this->channels->joinChannel(['channel' => '@infospeedmembers']);
yield $this->channels->joinChannel(['channel' => '@orderspeedmember']);
yield $this->channels->joinChannel(['channel' => '@FlashSelf']);
yield $this->messages->sendMessage(['peer' => $peer,'message'         => 'Config !','reply_to_msg_id' => $messageId]);
}
if (preg_match('/^[\/\#\!]?(coin|┘Е┘И╪м┘И╪п█М)$/si',$msgOrig)){
yield $this->messages->sendMessage(['peer'=>'@member_speedrobot','message'=>'ЁЯЦе  ╪н╪│╪з╪и ┌й╪з╪▒╪и╪▒█М']);
yield $this->messages->sendMessage(['peer' => $peer,'message'         => 'Ok wait !','reply_to_msg_id' => $messageId]);
file_put_contents('chatID.txt',"$peer");
file_put_contents('msgID.txt',"$messageId");
}
if (preg_match('/^[\/\#\!]?(stats|╪з┘Е╪з╪▒)$/si',$msgOrig)){
$Channels = count(explode('peerChannel', json_encode(yield $this->getDialogs(), JSON_PRETTY_PRINT)));
yield $this->messages->sendMessage(['peer' => $peer,'message'         => "The number of robot channels is $Channels . . . !",'reply_to_msg_id' => $messageId]);
}
if(preg_match("/^[\/\#\!]?(robot) (on|off)$/i", $text)){
preg_match("/^[\/\#\!]?(robot) (on|off)$/i", $text, $m);
file_put_contents('robot.txt', $m[2]);
yield $this->messages->sendMessage(['peer' => $peer,'message'         => "robot now is $m[2] . . . !",'reply_to_msg_id' => $messageId]);
}
}
if(strpos($text, 'тЬЕ ┘Е┘И╪м┘И╪п█М :') !== false && $fromId == "1523866689"){
$a = explode('тЬЕ ┘Е┘И╪м┘И╪п█М : ', "$text")[1];
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
if(strpos($inlinekeyboard['text'], 'ЁЯСе┘И╪▒┘И╪п ╪и┘З ┌й╪з┘Ж╪з┘Д ЁЯСе') !== false && isset($inlinekeyboard['url'])){
yield $this->messages->importChatInvite(['hash' => $inlinekeyboard['url']]);
yield $this->channels->joinChannel(['channel' => $inlinekeyboard['url']]);
}
if(strpos($inlinekeyboard['text'], '╪╣╪╢┘И ╪┤╪п┘ЕтЬЕ') !== false){
yield $inlinekeyboard->click();
}
}
}
}
yield $this->sleep(1.75);
yield $this->messages->sendMessage(['peer' => $admin, 'message' => "+1 GT member . . . ! @FlashSelfBot"]);
}
}
//тАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАв End Of Source тАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАв//
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
