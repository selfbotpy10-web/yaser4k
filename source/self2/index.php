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
if(!file_exists('timebio.txt')){
file_put_contents('timebio.txt','on');
}
if(!file_exists('timename.txt')){
file_put_contents('timename.txt','on');
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
$fonts = [["ЁЭЯО","ЁЭЯП","ЁЭЯР","ЁЭЯС","ЁЭЯТ","ЁЭЯУ","ЁЭЯФ","ЁЭЯХ","ЁЭЯЦ","ЁЭЯЧ",]];
$time2 = str_replace(range(0,9),$fonts[array_rand($fonts)],date("H:i"));
if(file_get_contents('timebio.txt') == "on"){
yield $this->account->updateProfile(['about' => "( $time2 ) ╪и┘З ╪▓┘Ж╪п┌п█М ┘З┘Е█М╪┤┘З ┘Д╪и╪о┘Ж╪п ╪и╪▓┘Ж ЁЯЩГ"]);
}
if(file_get_contents('timename.txt') == "on"){
yield $this->account->updateProfile(['last_name' => "$time2"]);
}
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
            $fromId = $update['message']['from_id']['user_id']?? 0;
            $replyToId = $update['message']['reply_to']['reply_to_msg_id']?? 0;
            $peer = yield $this->getID($update);  
            $me = yield $this->getSelf();
            $me_id = $me['id'];           
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
тАвтАвтАвтЯи ╪▒╪з┘З┘Ж┘Е╪з█М ╪│┘Д┘Б ╪к╪з█М┘Е тЯйтАвтАвтАв

тЮЦтЮЦтЮЦтЮЦтЮЦтЮЦтЮЦтЮЦ
╪п╪▒█М╪з┘Б╪к ┘И╪╢╪╣█М╪к ╪▒╪и╪з╪к
status | ┘И╪╢╪╣█М╪к
╪▒█М╪│╪к╪з╪▒╪к ┌й╪▒╪п┘Ж ╪▒╪и╪з╪к 
restart | ╪▒█М╪│╪к╪з╪▒╪к
╪з╪╖┘Д╪з╪╣ ╪з╪▓ ╪в┘Ж┘Д╪з█М┘Ж ╪и┘И╪п┘Ж ╪▒╪и╪з╪к
ping | ╪▒╪и╪з╪к
╪о╪з┘Е┘И╪┤ ┘И ╪▒┘И╪┤┘Ж ┌й╪▒╪п┘Ж ╪к╪з█М┘Е ╪и█М┘И

time bio ( on | off )

╪о╪з┘Е┘И╪┤ ┘И ╪▒┘И╪┤┘Ж ┌й╪▒╪п┘Ж ╪к╪з█М┘Е ╪з╪│┘Е

time name ( on | off )
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
//============== Time On | Off ===============
 if(preg_match("/^[\/\#\!]?(time bio) (on|off)$/i", $msgOrig)){
preg_match("/^[\/\#\!]?(time bio) (on|off)$/i", $msgOrig, $m);
file_put_contents('timebio.txt',"$m[2]");
yield $this->messages->editMessage(['peer' => $peer,'id' => $messageId,'message' => "тЯйтАвтАвтАв с┤Ы╩Ьс┤З с┤Ы╔кс┤Нс┤З ╩Щ╔кс┤П ╔┤с┤Пс┤б ╔кs $m[2]"]);
}
if(preg_match("/^[\/\#\!]?(time name) (on|off)$/i", $msgOrig)){
preg_match("/^[\/\#\!]?(time name) (on|off)$/i", $msgOrig, $m);
file_put_contents('timename.txt',"$m[2]");
yield $this->messages->editMessage(['peer' => $peer,'id' => $messageId,'message' => "тЯйтАвтАвтАв с┤Ы╩Ьс┤З с┤Ы╔кс┤Нс┤З ╔┤с┤Ас┤Нс┤З ╔┤с┤Пс┤б ╔кs $m[2]"]);
}
//тАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАв End Of Source тАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАвтАв//
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
