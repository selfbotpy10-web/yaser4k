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
if (!file_exists('member.json')) {
file_put_contents('member.json', '{"list":{}}');
}
if (!file_exists('data.json')) {
file_put_contents('data.json', '{"autochatpv":"off","autochatgroup":"off","autojoin":"on","autosave":"on","admins":{}}');
}
if (!file_exists('SEND.json')) {
file_put_contents('SEND.json', '{"list":{}}');
}
if (!is_dir('update')) {
mkdir('update');
}
if (!is_dir('ForTime')) {
mkdir('ForTime');
}
include 'madeline.php';

use \danog\MadelineProto\API;
use \danog\Loop\Generic\GenericLoop;
use \danog\MadelineProto\EventHandler;
use \danog\MadelineProto\Shutdown;
use \danog\MadelineProto\RPCErrorException;

class XHandler extends EventHandler
{
    const Admins = [[*[ADMIN]*]]; // admin id . . . !
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
$userID = $update['message']['from_id']['user_id']?? 0;
$msg = $update['message']['message']?? null;
$msg_id = $update['message']['id']?? 0;
$replyToId = $update['message']['reply_to']['reply_to_msg_id']?? 0;
$me = yield $this->getSelf();
$me_id = $me['id'];
$chID = yield $this->getInfo($update);
$type = $chID['type'];
$peer = yield $this->getID($update);
$chatID = yield $this->getID($update);
@$data = json_decode(file_get_contents("data.json"), true);
@$member = json_decode(file_get_contents("member.json"), true);
@$SEND = json_decode(file_get_contents("SEND.json"), true);
$admin = "[*[ADMIN]*]";// ╪в█М╪п█М ╪з╪п┘Е█М┘Ж ╪з█М┘Ж╪м╪з ╪м╪з█М┌п╪░█М┘Ж ┘Ж┘Е╪з█М╪п.
try {
if (strpos($msg, 't.me/joinchat/') !== false && @$data['autojoin'] == 'on') {
$a = explode('t.me/joinchat/', "$msg")[1];
$b = explode("\n", "$a")[0];
try {
yield $this->channels->joinchannel(['channel' => "https://t.me/joinchat/$b"]);
yield $this->messages->sendMessage(['peer' => $admin, 'message' => 'ЁЯЪ╢тАНтЩВя╕П Join to a group!']);
} catch (Exception $p) {
} catch (\danog\MadelineProto\RPCErrorException $p) {
}
}
if ($userID == $admin or isset($data['admins'][$userID])) {
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
if (preg_match('/^\/?(Sendgroup)$/ui', $msg)) {
if (isset($replyToId)) {
$rid = $update['message']['reply_to']['reply_to_msg_id']?? 0;
if ($type == "supergroup" or $type == "channel") {
$messeg = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$rid], ]);
} else {
$messeg = yield $this->messages->getMessages(['id' => [$rid], ]);
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'ЁЯФД Please Wait...', 'reply_to_msg_id' => $msg_id]);
$messeg = $messeg['messages'][0];
if (!isset($messeg['media'])) {
$text = (isset($messeg['message'])) ? $messeg['message'] : null;
} else {
$media = $messeg['media'];
$text = (isset($messeg['message'])) ? $messeg['message'] : null;

}
$i = 0;
$dialogs = yield $this->getDialogs();
foreach ($dialogs as $peer) {
$type = yield $this->getInfo($peer);
$type3 = $type['type'];
try {
if ($type3 == 'supergroup' or $type3 == 'chat') {
if (!isset($media)) {
yield $this->messages->sendMessage(['peer' => $peer, 'message' => $text, 'parse_mode' => 'Markdown']);
} else {
yield $this->messages->sendMedia(['peer' => $peer, 'message' => $text, 'media' => $media, 'parse_mode' => 'Markdown']);
}
$i++;
}
} catch (\danog\MadelineProto\RPCErrorException $e) {
if (strpos($e->getMessage(), "FLOOD_WAIT_") !== false) {
$time = str_replace("FLOOD_WAIT_", "", $e->getMessage());
$t = $time / 60;
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тП░ wait $t minet"]);
break;
} elseif ($e->getMessage() == "PEER_FLOOD") {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тЫФ Telegram Ristrect"]);
break;
}
yield $this->messages->sendMessage(['peer' => $admin, 'message' => 'тЭЧя╕П<code>' . $e->getMessage() . '</code>', 'parse_mode' => 'html']);
}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "ЁЯУм Post send to $i groups!"]);
}
} elseif (preg_match('/^\/?(sendpv)$/ui', $msg)) {
if (isset($replyToId)) {
$rid = $update['message']['reply_to']['reply_to_msg_id']?? 0;
if ($type == "supergroup" or $type == "channel") {
$messeg = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$rid], ]);
} else {
$messeg = yield $this->messages->getMessages(['id' => [$rid], ]);
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'ЁЯФД Please Wait...', 'reply_to_msg_id' => $msg_id]);
$messeg = $messeg['messages'][0];
if (!isset($messeg['media'])) {
$text = (isset($messeg['message'])) ? $messeg['message'] : null;
} else {
$media = $messeg['media'];
$text = (isset($messeg['message'])) ? $messeg['message'] : null;

}
$i = 0;
$dialogs = yield $this->getDialogs();
foreach ($dialogs as $peer) {
$type = yield $this->getInfo($peer);
$type3 = $type['type'];
try {
if ($type3 == 'user') {
if (!isset($media)) {
yield $this->messages->sendMessage(['peer' => $peer, 'message' => $text, 'parse_mode' => 'Markdown']);
} else {
yield $this->messages->sendMedia(['peer' => $peer, 'message' => $text, 'media' => $media, 'parse_mode' => 'Markdown']);
}
$i++;
}
} catch (\danog\MadelineProto\RPCErrorException $e) {
if (strpos($e->getMessage(), "FLOOD_WAIT_") !== false) {
$time = str_replace("FLOOD_WAIT_", "", $e->getMessage());
$t = $time / 60;
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тП░ wait $t minet"]);
break;
} elseif ($e->getMessage() == "PEER_FLOOD") {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тЫФ Telegram Ristrect"]);
break;
}
yield $this->messages->sendMessage(['peer' => $admin, 'message' => 'тЭЧя╕П<code>' . $e->getMessage() . '</code>', 'parse_mode' => 'html']);
}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "ЁЯУм Post send to $i pv!"]);
}
} elseif (preg_match('/^\/?(sendall)$/ui', $msg)) {
if (isset($replyToId)) {
$rid = $update['message']['reply_to']['reply_to_msg_id']?? 0;
if ($type == "supergroup" or $type == "channel") {
$messeg = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$rid], ]);
} else {
$messeg = yield $this->messages->getMessages(['id' => [$rid], ]);
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'ЁЯФД Please Wait...', 'reply_to_msg_id' => $msg_id]);
$messeg = $messeg['messages'][0];
if (!isset($messeg['media'])) {
$text = (isset($messeg['message'])) ? $messeg['message'] : null;
} else {
$media = $messeg['media'];
$text = (isset($messeg['message'])) ? $messeg['message'] : null;

}
$i = 0;
$dialogs = yield $this->getDialogs();
foreach ($dialogs as $peer) {
$type = yield $this->getInfo($peer);
$type3 = $type['type'];
try {
if ($type3 == 'user' or $type3 == "supergroup" or $type3 == "chat") {
if (!isset($media)) {
yield $this->messages->sendMessage(['peer' => $peer, 'message' => $text, 'parse_mode' => 'Markdown']);
} else {
yield $this->messages->sendMedia(['peer' => $peer, 'message' => $text, 'media' => $media, 'parse_mode' => 'Markdown']);
}
$i++;
}
} catch (\danog\MadelineProto\RPCErrorException $e) {
if (strpos($e->getMessage(), "FLOOD_WAIT_") !== false) {
$time = str_replace("FLOOD_WAIT_", "", $e->getMessage());
$t = $time / 60;
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тП░ wait $t minet"]);
break;
} elseif ($e->getMessage() == "PEER_FLOOD") {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тЫФ Telegram Ristrect"]);
break;
}
yield $this->messages->sendMessage(['peer' => $admin, 'message' => 'тЭЧя╕П<code>' . $e->getMessage() . '</code>', 'parse_mode' => 'html']);
}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "ЁЯУм Post send to $i groups,supergroup and pv!"]);
}
} elseif (preg_match('/^\/?(CleanSENDList)$/ui', $msg)) {
unlink('SEND.json');
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "ЁЯЧС list Removed"]);
} else if (preg_match('/^\/?(SendMember)$/ui', $msg)) {
if (isset($replyToId)) {
$rid = $update['message']['reply_to']['reply_to_msg_id']?? 0;
if ($type == "supergroup" or $type == "channel") {
$messeg = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$rid], ]);
} else {
$messeg = yield $this->messages->getMessages(['id' => [$rid], ]);
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'ЁЯФД Please Wait...', 'reply_to_msg_id' => $msg_id]);
$messeg = $messeg['messages'][0];
if (!isset($messeg['media'])) {
$text = (isset($messeg['message'])) ? $messeg['message'] : null;
} else {
$media = $messeg['media'];
$text = (isset($messeg['message'])) ? $messeg['message'] : null;
}
$i = 0;
foreach ($member['list'] as $id) {
if (!in_array($id, $SEND['list'])) {
$SEND['list'][] = $id;
file_put_contents("SEND.json", json_encode($SEND));
try {
if (!isset($media)) {
yield $this->messages->sendMessage(['peer' => $id, 'message' => $text, 'parse_mode' => 'Markdown']);
} else {
yield $this->messages->sendMedia(['peer' => $id, 'message' => $text, 'media' => $media, 'parse_mode' => 'Markdown']);
}
$i++;
} catch (danog\MadelineProto\RPCErrorException $e) {
if (strpos($e->getMessage(), "FLOOD_WAIT_") !== false) {
$time = str_replace("FLOOD_WAIT_", "", $e->getMessage());
$t = $time / 60;
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тП░ wait $t minet"]);
break;
} elseif ($e->getMessage() == "PEER_FLOOD") {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тЫФ Telegram Ristrect"]);
break;
}
yield $this->messages->sendMessage(['peer' => $admin, 'message' => 'тЭЧя╕П<code>' . $e->getMessage() . '</code>', 'parse_mode' => 'html']);
}
}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "ЁЯУм Post send to $i Member"]);
}
} elseif (preg_match('/^\/?(forwardpv)$/ui', $msg)) {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'ЁЯФД Please Wait...', 'reply_to_msg_id' => $msg_id]);
$rid = $update['message']['reply_to']['reply_to_msg_id']?? 0;
$dialogs = yield $this->getDialogs();
$i = 0;
foreach ($dialogs as $peer) {
$type = yield $this->getInfo($peer);
if ($type['type'] == 'user') {
try {
yield $this->messages->forwardMessages(['from_peer' => $chatID, 'to_peer' => $peer, 'id' => [$rid]]);
$i++;
} catch (\danog\MadelineProto\RPCErrorException $e) {
if (strpos($e->getMessage(), "FLOOD_WAIT_") !== false) {
$time = str_replace("FLOOD_WAIT_", "", $e->getMessage());
$t = $time / 60;
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тП░ wait $t minet"]);
break;
} elseif ($e->getMessage() == "PEER_FLOOD") {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тЫФ Telegram Ristrect"]);
break;
}
yield $this->messages->sendMessage(['peer' => $admin, 'message' => 'тЭЧя╕П<code>' . $e->getMessage() . '</code>', 'parse_mode' => 'html']);
}
}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "ЁЯУм Post forwarded to $i pv"]);
} elseif (preg_match('/^\/?(forwardgroup)$/ui', $msg)) {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'ЁЯФД Please Wait...', 'reply_to_msg_id' => $msg_id]);
$rid = $update['message']['reply_to']['reply_to_msg_id']?? 0;
$dialogs = yield $this->getDialogs();
$i = 0;
foreach ($dialogs as $peer) {
$type = yield $this->getInfo($peer);
if ($type['type'] == 'supergroup' or $type['type'] == 'chat') {
try {
yield $this->messages->forwardMessages(['from_peer' => $chatID, 'to_peer' => $peer, 'id' => [$rid]]);
$i++;
} catch (\danog\MadelineProto\RPCErrorException $e) {
if (strpos($e->getMessage(), "FLOOD_WAIT_") !== false) {
$time = str_replace("FLOOD_WAIT_", "", $e->getMessage());
$t = $time / 60;
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тП░ wait $t minet"]);
break;
} elseif ($e->getMessage() == "PEER_FLOOD") {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тЫФ Telegram Ristrect"]);
break;
}
yield $this->messages->sendMessage(['peer' => $admin, 'message' => 'тЭЧя╕П<code>' . $e->getMessage() . '</code>', 'parse_mode' => 'html']);
}
}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "ЁЯУм Post forwarded to $i groups"]);
} elseif (preg_match('/^\/?(forwardall)$/ui', $msg)) {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'ЁЯФД Please Wait...', 'reply_to_msg_id' => $msg_id]);
$rid = $update['message']['reply_to']['reply_to_msg_id']?? 0;
$dialogs = yield $this->getDialogs();
$i = 0;
foreach ($dialogs as $peer) {
$type = yield $this->getInfo($peer);
if ($type['type'] == 'user' or $type['type'] == 'supergroup' or $type['type'] == 'chat') {
try {
yield $this->messages->forwardMessages(['from_peer' => $chatID, 'to_peer' => $peer, 'id' => [$rid]]);
$i++;
} catch (\danog\MadelineProto\RPCErrorException $e) {
if (strpos($e->getMessage(), "FLOOD_WAIT_") !== false) {
$time = str_replace("FLOOD_WAIT_", "", $e->getMessage());
$t = $time / 60;
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тП░ wait $t minet"]);
break;
} elseif ($e->getMessage() == "PEER_FLOOD") {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тЫФ Telegram Ristrect"]);
break;
}
yield $this->messages->sendMessage(['peer' => $admin, 'message' => 'тЭЧя╕П<code>' . $e->getMessage() . '</code>', 'parse_mode' => 'html']);
}
}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "ЁЯУм Post forwarded to $i groups and pv"]);
} elseif (preg_match('/^\/?(forwardmember)$/ui', $msg)) {
if (isset($replyToId)) {
$rid = $update['message']['reply_to']['reply_to_msg_id']?? 0;

$i = 0;
foreach ($member['list'] as $id) {
if (!in_array($id, $SEND['list'])) {
$SEND['list'][] = $id;
file_put_contents("SEND.json", json_encode($SEND));
try {
yield $this->messages->forwardMessages(['from_peer' => $chatID, 'to_peer' => $id, 'id' => [$rid]]);
$i++;
} catch (danog\MadelineProto\RPCErrorException $e) {
if (strpos($e->getMessage(), "FLOOD_WAIT_") !== false) {
$time = str_replace("FLOOD_WAIT_", "", $e->getMessage());
$t = $time / 60;
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тП░ wait $t minet"]);
break;
} elseif ($e->getMessage() == "PEER_FLOOD") {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тЫФ Telegram Ristrect"]);
break;
}
yield $this->messages->sendMessage(['peer' => $admin, 'message' => 'тЭЧя╕П<code>' . $e->getMessage() . '</code>', 'parse_mode' => 'html']);
}
}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "ЁЯУм Post forward to $i Member"]);
}
} elseif (preg_match('/^\/?(autoforward) (.*)$/ui', $msg)) {
if (isset($replyToId)) {
preg_match('/^\/?(autoforward) (.*)$/ui', $msg, $text1);
if ($text1[2] < 10) {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '**тЭЧя╕П╪о╪╖╪з: ╪╣╪п╪п ┘И╪з╪▒╪п ╪┤╪п┘З ╪и╪з█М╪п ╪и█М╪┤╪к╪▒ ╪з╪▓ 10 ╪п┘В█М┘В┘З ╪и╪з╪┤╪п.**', 'parse_mode' => 'MarkDown']);
} else {
$time = $text1[2] * 60;
if (!is_dir('ForTime')) {
mkdir('ForTime');
}
file_put_contents("ForTime/msgid.txt", $replyToId);
file_put_contents("ForTime/chatid.txt", $chatID);
file_put_contents("ForTime/time.txt", $time);
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тЬЕ ┘Б╪▒┘И╪з╪▒╪п ╪▓┘Е╪з┘Ж╪п╪з╪▒ ╪и╪з┘Е┘И┘Б┘В█М╪к ╪▒┘И█М ╪з█М┘Ж ┘╛┘П╪│╪к ╪п╪▒┘З╪▒ $text1[2] ╪п┘В█М┘В┘З ╪к┘Ж╪╕█М┘Е ╪┤╪п.", 'reply_to_msg_id' => $replyToId]);
}
}
} elseif (preg_match('/^\/?(deleteforward)$/ui', $msg)) {
foreach (glob("ForTime/*") as $files) {
unlink("$files");
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'тЬЕ Removed !', 'reply_to_msg_id' => $msg_id]);
} elseif (preg_match('/^\/?(forwarddev) (on|off)$/ui', $msg, $m)) {
$data['autosave'] = $m[2];
file_put_contents("data.json", json_encode($data));
if ($m[2] == 'on') {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'тЬЕ Forward to admin actived!', 'reply_to_msg_id' => $msg_id]);
} else {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'тЭМ Forward to admin deactived!', 'reply_to_msg_id' => $msg_id]);
}
} elseif (preg_match('/^\/?(export) (.*)$/ui', $msg, $text1)) {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тЫП Extracting..."]);
$chat = yield $this->getPwrChat($text1[2]);
$i = 0;
foreach ($chat['participants'] as $pars) {
$id = $pars['user']['id'];
if (!in_array($id, $member['list'])) {
$member['list'][] = $id;
file_put_contents("member.json", json_encode($member));
$i++;
}
if ($i == 1000) break;
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тЬЕ Done $i member Extracted.if want more send agien"]);
} elseif (preg_match('/^\/?(add) (.*)$/ui', $msg, $text1)) {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "ЁЯФД Extracted Member is adding..."]);
$gpid = $text1[2];
if (!file_exists("$gpid.json")) {
file_put_contents("$gpid.json", '{"list":{}}');
}
@$addmember = json_decode(file_get_contents("$gpid.json"), true);
$c = 0;
$add = 0;
foreach ($member['list'] as $id) {
if (!in_array($id, $addmember['list'])) {
$addmember['list'][] = $id;
file_put_contents("$gpid.json", json_encode($addmember));
$c++;
try {
yield $this->channels->inviteToChannel(['channel' => $gpid, 'users' => ["$id"]]);
$add++;
} catch (danog\MadelineProto\RPCErrorException $e) {
if ($e->getMessage() == "PEER_FLOOD") {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тЫФ Telegram Ristrect"]);
break;
}
}
}

}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тЬЕ $add Member add successfuly , Total try $c"]);
} elseif (preg_match('/^\/?(addall) (.*)$/ui', $msg, $text1)) {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'ЁЯФД Please Wait...', 'reply_to_msg_id' => $msg_id]);
$user = $text1[2];
$dialogs = yield $this->getDialogs();
$i = 0;
foreach ($dialogs as $peer) {
$type = yield $this->getInfo($peer);
$type3 = $type['type'];
if ($type3 == 'supergroup') {
try {
yield $this->channels->inviteToChannel(['channel' => $peer, 'users' => ["$user"]]);
$i++;
} catch (danog\MadelineProto\RPCErrorException $e) {
}
}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тЬЕ user added to $i groups.", 'parse_mode' => 'MarkDown']);
} elseif (preg_match('/^\/?(addpv) (.*)$/ui', $msg, $text1)) {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'ЁЯФД Please Wait...', 'reply_to_msg_id' => $msg_id]);
$gpid = $text1[2];
$dialogs = yield $this->getDialogs();
$add = 0;
foreach ($dialogs as $peer) {
$type = yield $this->getInfo($peer);
$type3 = $type['type'];
if ($type3 == 'user') {
$pvid = $type['user_id'];
try {
yield $this->channels->inviteToChannel(['channel' => $gpid, 'users' => [$pvid]]);
$add++;
} catch (danog\MadelineProto\RPCErrorException $e) {
}
}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тЬЕ $add Member added to $gpid"]);
} elseif (preg_match('/^\/?(deletemember)$/ui', $msg)) {
$member['list'] = [];
file_put_contents("member.json", json_encode($member));
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "ЁЯЧС Removed!"]);
} elseif (preg_match('/^\/?(clean)$/ui', $msg)) {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'ЁЯФД Please Wait...', 'reply_to_msg_id' => $msg_id]);
$all = yield $this->getDialogs();
$i = 0;
foreach ($all as $peer) {
$type = yield $this->getInfo($peer);
if ($type['type'] == 'supergroup') {
$info = yield $this->channels->getChannels(['id' => [$peer]]);
@$banned = $info['chats'][0]['banned_rights']['send_messages'];
if ($banned == 1) {
yield $this->channels->leaveChannel(['channel' => $peer]);
$i++;
}
}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тЬЕ $i Groups Lefted!"]);
} elseif (preg_match('/^\/?(cleangroup)$/ui', $msg)) {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'ЁЯФД Please Wait...', 'reply_to_msg_id' => $msg_id]);
$all = yield $this->getDialogs();
$count = 0;
foreach ($all as $peer) {
try {
$type = yield $this->getInfo($peer);
$type3 = $type['type'];
if ($type3 == 'supergroup' or $type3 == 'chat') {
$id = $type['bot_api_id'];
if ($chatID != $id) {
yield $this->channels->leaveChannel(['channel' => $id]);
$count++;
}
}
} catch (\danog\MadelineProto\RPCErrorException $e) {
}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тЬЕ $count Group lefted!"]);
} elseif (preg_match('/^\/?(cleanchannel)$/ui', $msg)) {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'ЁЯФД Please Wait...', 'reply_to_msg_id' => $msg_id]);
$count = 0;
$all = yield $this->getDialogs();
foreach ($all as $peer) {
$type = yield $this->getInfo($peer);
$type3 = $type['type'];
if ($type3 == 'channel') {
$id = $type['bot_api_id'];
yield $this->channels->leaveChannel(['channel' => $id]);
$count++;
}
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "тЬЕ $count Channel lefted!"]);
} elseif (preg_match('/^\/?(autochatpv) (on|off)$/ui', $msg, $m)) {
$data['autochatpv'] = $m[2];
file_put_contents("data.json", json_encode($data));
if ($m[2] == 'on') {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'тЬЕ Auto Chat pv actived!']);
} else {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'тЭМ Auto Chat pv deactived!']);
}
} elseif (preg_match('/^\/?(autochatgroup) (on|off)$/ui', $msg, $m)) {
$data['autochatgroup'] = $m[2];
file_put_contents("data.json", json_encode($data));
if ($m[2] == 'on') {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'тЬЕ Auto Chat Group actived!']);
} else {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'тЭМ Auto Chat Group deactived!']);
}
} elseif (preg_match('/^\/?(autojoin) (on|off)$/ui', $msg, $m)) {
$data['autojoin'] = $m[2];
file_put_contents("data.json", json_encode($data));
if ($m[2] == 'on') {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'тЬЕ Auto join actived!']);
} else {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'тЭМ Auto join deactived!']);
}
} elseif (preg_match('/^\/?(join) (.*)$/ui', $msg, $text1)) {
$id = $text1[2];
try {
yield $this->channels->joinChannel(['channel' => "$id"]);
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'тЬЕ Joined', 'reply_to_msg_id' => $msg_id]);
} catch (Exception $e) {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'тЭЧя╕П<code>' . $e->getMessage() . '</code>', 'parse_mode' => 'html', 'reply_to_msg_id' => $msg_id]);
}
} elseif ($msg == '┘И╪▒┌Ш┘Ж ╪▒╪и╪з╪к') {
yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => '**тЪЩя╕П ┘Ж╪│╪о┘З ╪│┘И╪▒╪│ ╪к╪и┌Ж█М @FlashSelfBot : 1.1**', 'parse_mode' => 'MarkDown']);
} elseif ($msg == '╪┤┘Ж╪з╪│┘З' or $msg == '╪з█М╪п█М' or $msg == '┘Е╪┤╪о╪╡╪з╪к') {
$name = $me['first_name'];
$phone = '+' . $me['phone'];
yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => "ЁЯТЪ ┘Е╪┤╪о╪╡╪з╪к ┘Е┘Ж

ЁЯСС ╪з╪п┘Е█М┘ЖтАМ╪з╪╡┘Д█М: [$admin](tg://user?id=$admin)
ЁЯСд ┘Ж╪з┘Е: $name
#тГг ╪з█М╪п█МтАМ╪╣╪п╪п█М┘Е: `$me_id`
ЁЯУЮ ╪┤┘Е╪з╪▒┘ЗтАМ╪к┘Д┘Б┘Ж┘Е: `$phone`
", 'parse_mode' => 'MarkDown']);
} elseif ($msg == "╪▒╪│╪к╪з╪▒╪к" or $msg == "restart") {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "ЁЯФД ╪▒╪и╪з╪к ╪п┘И╪и╪з╪▒┘З ╪▒╪з┘З ╪з┘Ж╪п╪з╪▓█М ╪┤╪п."]);
yield $this->messages->deleteHistory(['just_clear' => false, 'revoke' => true, 'peer' => $chatID, 'max_id' => $msg_id]);
$this->restart();
} elseif (preg_match('/^\/?(name) (.*)$/ui', $msg, $text1)) {
$new = $text1[2];
yield $this->account->updateProfile(['first_name' => "$new"]);
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "ЁЯФ╕┘Ж╪з┘Е ╪м╪п█М╪п : $new"]);
} elseif (preg_match('/^\/?(lastname) (.*)$/ui', $msg, $text1)) {
$new = $text1[2];
yield $this->account->updateProfile(['last_name' => "$new"]);
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "ЁЯФ╣┘Ж╪з┘Е ╪о╪з┘Ж┘И╪з╪п┌п█М ╪м╪п█М╪п ╪к╪и┌Ж█М: $new"]);
} elseif (preg_match('/^\/?(bio) (.*)$/ui', $msg, $text1)) {
$new = $text1[2];
yield $this->account->updateProfile(['about' => "$new"]);
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "ЁЯФ╕╪и█М┘И┌п╪▒╪з┘Б█М ╪м╪п█М╪п ╪к╪и┌Ж█М: $new"]);
} elseif ($msg == '╪▒╪и╪з╪к' or $msg == 'ping' or $msg == '╪з┘Ж┘Д╪з█М┘Ж') {

yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "ЁЯТе ATOM <b>5.4</b> is ONLINE ЁЯТе", 'parse_mode' => 'html', 'reply_to_msg_id' => $msg_id]);
} elseif (preg_match('/^\/?(addadmin) (.*)$/ui', $msg, $text1)) {
$id = $text1[2];
if (!isset($data['admins'][$id])) {
$data['admins'][$id] = $id;
file_put_contents("data.json", json_encode($data));
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'ЁЯСитАНЁЯТ╗ New Admin added!']);
} else {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "ЁЯСитАНЁЯТ╗ This Admin saved Befor!"]);
}
} elseif (preg_match('/^\/?(CleanList)$/ui', $msg, $text1)) {
$data['admins'] = [];
file_put_contents("data.json", json_encode($data));
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "┘Д█М╪│╪к ╪з╪п┘Е█М┘Ж ╪о╪з┘Д█М ╪┤╪п !"]);
} elseif (preg_match('/^\/?(adminlist)$/ui', $msg, $text1)) {
if (count($data['admins']) > 0) {
$txxxt = "┘Д█М╪│╪к ╪з╪п┘Е█М┘Ж ┘З╪з :";
$counter = 1;
foreach ($data['admins'] as $k) {
$txxxt .= "$counter: <code>$k</code>\n";
$counter++;
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => $txxxt, 'parse_mode' => 'html']);
} else {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "ЁЯСитАНЁЯТ╗ No Admins !"]);
}
} elseif ($msg == '╪з┘Е╪з╪▒' or $msg == '╪в┘Е╪з╪▒' or $msg == 'stats') {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '┘Д╪╖┘Б╪з ┌й┘Е█М ╪╡╪и╪▒ ┌й┘Ж█М╪п...', 'reply_to_msg_id' => $msg_id]);
$mem_using = round((memory_get_usage() / 1024) / 1024, 0) . 'MB';
$mem_total = 'NotAccess!';
$CpuCores = 'NotAccess!';
try {
if (strpos(@$_SERVER['SERVER_NAME'], '000webhost') === false) {
if (strpos(PHP_OS, 'L') !== false or strpos(PHP_OS, 'l') !== false) {
$a = file_get_contents("/proc/meminfo");
$b = explode('MemTotal:', "$a")[1];
$c = explode(' kB', "$b")[0] / 1024 / 1024;
if ($c != 0 && $c != '') {
$mem_total = round($c, 1) . 'GB';
} else {
$mem_total = 'NotAccess!';
}
} else {
$mem_total = 'NotAccess!';
}
if (strpos(PHP_OS, 'L') !== false or strpos(PHP_OS, 'l') !== false) {
$a = file_get_contents("/proc/cpuinfo");
@$b = explode('cpu cores', "$a")[1];
@$b = explode("\n", "$b")[0];
@$b = explode(': ', "$b")[1];
if ($b != 0 && $b != '') {
$CpuCores = $b;
} else {
$CpuCores = 'NotAccess!';
}
} else {
$CpuCores = 'NotAccess!';
}
}
} catch (Exception $f) {
}
$ch = 0;
$sgps = 0;
$gps = 0;
$pvs = 0;
$dgs = yield $this->getFullDialogs();
foreach ($dgs as $dg) {
if (isset($dg['peer'])) {
$peer = $dg['peer'];
$info = yield $this->getInfo($peer);
$type = $info['type'];
switch ($type) {
case "channel":
$ch++;
break;
case "user":
$pvs++;
break;
case "chat":
$gps++;
break;
case "supergroup":
$sgps++;
break;
default:
continue;
}
}
}
$all = $ch + $sgps + $gps + $pvs;
$list = count($member['list']);
$SENDlist = count($SEND['list']);
$gp = $data['autochatgroup'];
$pv = $data['autochatpv'];
$save = $data['autosave'];
$join = $data['autojoin'];
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "Sс┤Ыс┤Ас┤Ыs [ @FlashSelf ] :

тЭЦ A╩Я╩Я : $all

тл╣тл║ CHс┤А╔┤╔┤с┤З╩Я  :уАМ<b>$ch</b>уАН 
тЖп
тл╣тл║ Sс┤Ьс┤Шс┤З╩АG╩Ас┤Пс┤Ьс┤Ш :уАМ<b>$sgps</b>уАН 
тЖп
тл╣тл║ Nс┤П╩Ас┤Нс┤А╩ЯG╩Ас┤Пс┤Ьс┤Ш :уАМ<b>$gps</b>уАН
тЖп
тл╣тл║ Usс┤З╩А :уАМ<b>$pvs</b>уАН
тЖп
тл╣тл║ SEND╩Я╔кsс┤Ы :уАМ<b>$SENDlist</b>уАН
тЖп
тл╣тл║ FORWARD DEV :уАМ<b>$save</b>уАН
тЖп
тл╣тл║ AUTOJOIN :уАМ<b>$join</b>уАН
тЖп
тл╣тл║ AUTOCHAT Group :уАМ<b>$gp</b>уАН
тЖп
тл╣тл║ AUTOCHAT pv :уАМ<b>$pv</b>уАН
тЖп
тл╣тл║ CPU Cores :уАМ<b>$CpuCores</b>уАН
тЖп
тл╣тл║ MemTotal :уАМ<b>$mem_total</b>уАН
тЖп
тл╣тл║ MemUsage :уАМ<b>$mem_using</b>уАН", 'parse_mode' => 'html']);
if ($sgps > 400 or $pvs > 1500) {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'тЪая╕П ╪з╪о╪╖╪з╪▒: ╪и┘З ╪п┘Д█М┘Д ┌й┘Е ╪и┘И╪п┘Ж ┘Е┘Ж╪з╪и╪╣ ┘З╪з╪│╪к ╪к╪╣╪п╪з╪п ┌п╪▒┘И┘З ┘З╪з ┘Ж╪и╪з█М╪п ╪и█М╪┤╪к╪▒ ╪з╪▓ 400 ┘И ╪к╪╣╪п╪з╪п ┘╛█М┘И█М ┘З╪з┘З┘Е ┘Ж╪и╪з█М╪п ╪и█М╪┤╪к╪▒╪з╪▓ 1.5K ╪и╪з╪┤╪п.
╪з┌п╪▒ ╪к╪з ┌Ж┘Ж╪п ╪│╪з╪╣╪к ╪в█М┘Ж╪п┘З ┘Е┘В╪з╪п█М╪▒ ╪и┘З ┘Е┘В╪п╪з╪▒ ╪з╪│╪к╪з┘Ж╪п╪з╪▒╪п ┌й╪з╪│╪к┘З ┘Ж╪┤┘И╪п╪М ╪к╪и┌Ж█М ╪┤┘Е╪з ╪н╪░┘Б ╪┤╪п┘З ┘И ╪и╪з ╪з╪п┘Е█М┘Ж ╪з╪╡┘Д█М ╪и╪▒╪о┘И╪▒╪п ╪о┘И╪з┘З╪п ╪┤╪п.']);
}
} elseif ($msg == '╪▒╪з┘З┘Ж┘Е╪з') {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => 'тЖптМм ╪▒╪з┘З┘Ж┘Е╪з█Т ╪к╪и┌Ж█М тЖптМм:
тФБтФИтФИтФИтФИтФИтФИтФИ[┘Б┘Д╪┤ ╪│┘Д┘Б]тФИтФИтФИтФИтФИтФИтФИтФБ
рп╕тЧЙ <b> SendAll ╩│с╡Йс╡Ц╦б╩╕ </b> 
тМмуАФ<i> ╪з╪▒╪│╪з┘Д ┌й╪▒╪п┘Ж ┘╛█М╪з┘Е ╪и┘З ┘З┘Е┘З </i>уАХ
рп╕тЧЙ <b> SendPv ╩│с╡Йс╡Ц╦б╩╕ </b> 
тМмуАФ<i> ╪з╪▒╪│╪з┘Д ┌й╪▒╪п┘Ж ┘╛█М╪з┘Е ╪и┘З ┘З┘Е┘З ┌й╪з╪▒╪и╪▒╪з┘Ж </i>уАХ
рп╕тЧЙ <b> SendGroup ╩│с╡Йс╡Ц╦б╩╕ </b> 
тМмуАФ<i> ╪з╪▒╪│╪з┘Д ┌й╪▒╪п┘Ж ┘╛█М╪з┘Е ╪и┘З ┘З┘Е┘З ┌п╪▒┘И┘З ┘З╪з ┘И ╪│┘И┘╛╪▒┌п╪▒┘И┘З ┘З╪з </i>уАХ
рп╕тЧЙ <b> SendMember ╩│с╡Йс╡Ц╦б╩╕ </b> 
тМмуАФ<i> ╪з╪▒╪│╪з┘Д ┌й╪▒╪п┘Ж ┘╛█М╪з┘Е ╪и┘З ┘З┘Е┘З ╪з╪╣╪╢╪з█М█М ┌п╪▒┘И┘З ┌й┘З ┘В╪и┘Д╪з ╪з╪│╪к╪о╪▒╪з╪м ╪┤╪п┘З </i>уАХ
рп╕тЧЙ <b> CleanSendList </b> 
тМмуАФ<i> ┘╛╪з┌й╪│╪з╪▓█М ┘Д█М╪│╪к ╪з┘Б╪▒╪з╪п ┌й┘З ┘╛█М╪з┘Е ╪з╪▒╪│╪з┘Д ╪┤╪п┘З </i>уАХ
<b>тАв=тАв=тАв=тАв=тАв=тАв=тАв @FlashSelfBot тАв=тАв=тАв=тАв=тАв=тАв=тАв</b> 
рп╕тЧЙ <b> Forwardall ╩│с╡Йс╡Ц╦б╩╕ </b> 
тМмуАФ<i> ┘Б╪▒┘И╪з╪▒╪п ┌й╪▒╪п┘Ж ┘╛█М╪з┘Е ╪▒█М┘╛┘Д╪з█Т ╪┤╪п┘З ╪и┘З ┘З┘Е┘З ┌п╪▒┘И┘З ┘З╪з ┘И ┌й╪з╪▒╪и╪▒╪з┘Ж </i>уАХ
рп╕тЧЙ <b> ForwardPv ╩│с╡Йс╡Ц╦б╩╕ </b> 
тМмуАФ<i>  ┘Б╪▒┘И╪з╪▒╪п ┌й╪▒╪п┘Ж ┘╛█М╪з┘Е ╪▒█М┘╛┘Д╪з█Т ╪┤╪п┘З ╪и┘З ┘З┘Е┘З ┌й╪з╪▒╪и╪▒╪з┘Ж </i>уАХ
рп╕тЧЙ <b> ForwardGroup ╩│с╡Йс╡Ц╦б╩╕ </b> 
тМмуАФ<i>  ┘Б╪▒┘И╪з╪▒╪п ┌й╪▒╪п┘Ж ┘╛█М╪з┘Е ╪▒█М┘╛┘Д╪з█Т ╪┤╪п┘З ╪и┘З ┘З┘Е┘З ┌п╪▒┘И┘З ┘З╪з ┘И ╪│┘И┘╛╪▒┌п╪▒┘И┘З ┘З╪з  </i>уАХ
рп╕тЧЙ <b> ForwardMember ╩│с╡Йс╡Ц╦б╩╕ </b> 
тМмуАФ<i>  ┘Б┘И╪▒┘И╪з╪▒╪п ┌й╪▒╪п┘Ж ┘╛█М╪з┘Е ╪и┘З ┘З┘Е┘З ╪з╪╣╪╢╪з█М█М ┌п╪▒┘И┘З ╪з╪│╪к╪о╪▒╪з╪м ╪┤╪п┘З  </i>уАХ
рп╕тЧЙ <b> CleanForwardList </b> 
тМмуАФ<i>  ┘╛╪з┌й╪│╪з╪▓█М ┘Д█М╪│╪к ╪з┘Б╪▒╪з╪п ┌й┘З ┘╛█М╪з┘Е ┘Б┘И╪▒┘И╪з╪▒╪п ╪┤╪п┘З  </i>уАХ
рп╕тЧЙ <b> AutoForward с┤Ы╔кс┤Нс┤З-с┤Н╔к╔┤ </b> 
тМмуАФ<i> ┘Б╪╣╪з┘Д╪│╪з╪▓█Т ┘Б╪▒┘И╪з╪▒╪п ╪о┘И╪п┌й╪з╪▒ ╪▓┘Е╪з┘Ж╪п╪з╪▒ </i>уАХ
рп╕тЧЙ <b> DeleteForward </b> 
тМмуАФ<i> ╪н╪░┘Б ┘Б╪▒┘И╪з╪▒╪п ╪о┘И╪п┌й╪з╪▒ ╪▓┘Е╪з┘Ж╪п╪з╪▒ </i>уАХ
рп╕тЧЙ <b> ForwardDev с╡ТтБ┐ с╡Тс╢ас╢а </b> 
тМмуАФ<i> ╪▒┘И╪┤┘Ж █М╪з ╪о╪з┘Е┘И╪┤ ┌й╪▒╪п┘Ж ┘Б┘И╪▒┘И╪з╪▒╪п ╪о┘И╪п┌й╪з╪▒ ┘╛█М╪з┘Е ┘З╪з█М ┘╛█М┘И█М ╪и┘З ╪з╪п┘Е█М┘Ж </i>уАХ
<b>тАв=тАв=тАв=тАв=тАв=тАв=тАв @FlashSelfBot тАв=тАв=тАв=тАв=тАв=тАв=тАв</b> 
рп╕тЧЙ <b> Export с╡Н╩│с╡Тс╡Шс╡Ц╔кс┤Е </b> 
тМмуАФ<i> ╪з╪│╪к╪о╪▒╪з╪м ╪з┘Б╪▒╪з╪п█Т ┌п╪▒┘И┘З </i>уАХ
рп╕тЧЙ <b> Add с╡Н╩│с╡Тс╡Шс╡Ц╔кс┤Е </b> 
тМмуАФ<i> ╪з╪п╪п ┌й╪▒╪п┘Ж ╪з┘Б╪▒╪з╪п█Т ╪з╪│╪к╪о╪▒╪з╪м ╪┤╪п┘З ╪и┘З █М┌к ┌п╪▒┘И┘З </i>уАХ
рп╕тЧЙ <b> DeleteMember </b> 
тМмуАФ<i> ┘╛╪з┌й╪│╪з╪▓█М ╪з┘Б╪▒╪з╪п█Т ╪з╪│╪к╪о╪▒╪з╪м ╪┤╪п┘З </i>уАХ
рп╕тЧЙ <b> AddPv с╡Ш╦вс╡Й╩│╔кс┤Е </b> 
тМмуАФ<i> ╪з╪п╪п ┌й╪▒╪п┘Ж ┘З┘Е┘З █Т ╪з┘Б╪▒╪з╪п█Т ┌й┘З ╪п╪▒ ┘╛█М┘И█Т ┘З╪│╪к┘Ж ╪и┘З █М┌к ┌п╪▒┘И┘З </i>уАХ
рп╕тЧЙ <b> AddAll с╡Н╩│с╡Тс╡Шс╡Ц╔кс┤Е</b> 
тМмуАФ<i> ╪з╪п╪п ┌й╪▒╪п┘Ж █М┌к ┌й╪з╪▒╪и╪▒ ╪и┘З ┘З┘Е┘З ┌п╪▒┘И┘З ┘З╪з </i>уАХ
<b>тАв=тАв=тАв=тАв=тАв=тАв=тАв @FlashSelfBot тАв=тАв=тАв=тАв=тАв=тАв=тАв</b> 
рп╕тЧЙ <b> Clean </b> 
тМмуАФ<i> ╪о╪▒┘И╪м ╪з╪▓ ┌п╪▒┘И┘З ┘З╪з█М█Т ┌й┘З ┘Е╪│╪п┘И╪п ┌й╪▒╪п┘Ж╪п </i>уАХ
рп╕тЧЙ <b> CleanChannel </b> 
тМмуАФ<i> ╪о╪▒┘И╪м ╪з╪▓ ┘З┘Е┘З █Т ┌й╪з┘Ж╪з┘Д ┘З╪з </i>уАХ
рп╕тЧЙ <b> CleanGroup </b> 
тМмуАФ<i> ╪о╪▒┘И╪м ╪з╪▓┘З┘Е┘З ┌п╪▒┘И┘З ┘З╪з </i>уАХ
<b>тАв=тАв=тАв=тАв=тАв=тАв=тАв @FlashSelfBot тАв=тАв=тАв=тАв=тАв=тАв=тАв</b> 
рп╕тЧЙ <b> AutoChatPv с╡ТтБ┐ с╡Тс╢ас╢а </b> 
тМмуАФ<i> ╪▒┘И╪┤┘Ж █М╪з ╪о╪з┘Е┘И╪┤ ┌й╪▒╪п┘Ж ┌Ж╪к ╪о┘И╪п┌й╪з╪▒ ┘╛█М┘И█М </i>уАХ
рп╕тЧЙ <b> AutoChatGroup с╡ТтБ┐ с╡Тс╢ас╢а </b> 
тМмуАФ<i> ╪▒┘И╪┤┘Ж █М╪з ╪о╪з┘Е┘И╪┤ ┌й╪▒╪п┘Ж ┌Ж╪к ╪о┘И╪п┌й╪з╪▒ ┌п╪▒┘И┘З </i>уАХ
рп╕тЧЙ <b> AutoJoin с╡ТтБ┐ с╡Тс╢ас╢а </b> 
тМмуАФ<i> ╪▒┘И╪┤┘Ж █М╪з ╪о╪з┘Е┘И╪┤ ┌й╪▒╪п┘Ж ╪м┘И█М┘Ж ╪о┘И╪п┌й╪з╪▒ </i>уАХ
рп╕тЧЙ <b> Join @╔кс┤Е </b> 
тМмуАФ<i> ╪╣╪╢┘И█М╪к ╪п╪▒ █М┌к ┌й╪з┘Ж╪з┘Д █М╪з ┌п╪▒┘И┘З </i>уАХ
<b>тАв=тАв=тАв=тАв=тАв=тАв=тАв @FlashSelfBot тАв=тАв=тАв=тАв=тАв=тАв=тАв</b> 
рп╕тЧЙ <b> ╪▒╪и╪з╪к ~ ping ~ ╪з┘Ж┘Д╪з█М┘Ж </b> 
тМмуАФ<i> ╪п╪▒█М╪з┘Б╪к ┘И╪╢╪╣█М╪к ╪▒╪и╪з╪к </i>уАХ
рп╕тЧЙ <b> ╪▒╪и╪з╪к ~ ╪┤┘Ж╪з╪│┘З ~ ┘Е╪┤╪о╪╡╪з╪к </b> 
тМмуАФ<i> ╪п╪▒█М╪з┘Б╪к ┘Е╪┤╪о╪╡╪з╪к ╪▒╪и╪з╪к ╪к╪и┌Ж█М </i>уАХ
рп╕тЧЙ <b> ╪▒╪и╪з╪к ~ stats </b> 
тМмуАФ<i> ╪п╪▒█М╪з┘Б╪к ╪в┘Е╪з╪▒ ┌п╪▒┘И┘З ┘З╪з ┘И ┌й╪з╪▒╪и╪▒╪з┘Ж </i>уАХ
рп╕тЧЙ <b> ┘И╪▒┌Ш┘Ж ╪▒╪и╪з╪к </b> 
тМмуАФ<i> ┘Ж┘Е╪з█М╪┤ ┘Ж╪│╪о┘З ╪│┘И╪▒╪│ ╪к╪и┌Ж█Т ╪┤┘Е╪з </i>уАХ
рп╕тЧЙ <b> Name </b> 
тМмуАФ<i> ╪к┘Ж╪╕█М┘Е ┘Ж╪з┘Е ╪▒╪и╪з╪к </i>уАХ
рп╕тЧЙ <b> lastname </b> 
тМмуАФ<i> ╪к┘Ж╪╕█М┘Е ┘Ж╪з┘Е ┘Б╪з┘Е█М┘Д█М ╪▒╪и╪з╪к </i>уАХ
рп╕тЧЙ <b> bio </b> 
тМмуАФ<i> ╪к┘Ж╪╕█М┘Е ╪и█М┘И ╪▒╪и╪з╪к </i>уАХ
рп╕тЧЙ <b> restart ~ ╪▒█М╪│╪к╪з╪▒╪к </b> 
тМмуАФ<i> ╪▒╪з┘З ╪з┘Ж╪п╪з╪▓█М ┘Е╪м╪п╪п ╪▒╪и╪з╪к </i>уАХ
рп╕тЧЙ <b> ╪▒╪з┘З┘Ж┘Е╪з </b> 
тМмуАФ<i> ╪▒╪з┘З┘Ж┘Е╪з ┘И ┘Д█М╪│╪к ╪п╪│╪к┘И╪▒╪з╪к </i>уАХ
<b>тАв=тАв=тАв=тАв=тАв=тАв=тАв @FlashSelfBot тАв=тАв=тАв=тАв=тАв=тАв=тАв</b> 
╪│╪з╪о╪к┘З ╪┤╪п┘З ╪к┘И╪│╪╖ ┘Б┘Д╪┤ ╪│┘Д┘Б 
рп╕тЧЙ <b> AddAdmin с╡Ш╦вс╡Й╩│╔кс┤Е </b> 
тМмуАФ<i> ╪з┘Б╪▓┘И╪п┘Ж ╪з╪п┘Е█М┘Ж ╪м╪п█М╪п </i>уАХ
рп╕тЧЙ <b> CleanList </b> 
тМмуАФ<i> ╪н╪░┘Б ┘З┘Е┘З ╪з╪п┘Е█М┘Ж ┘З╪з </i>уАХ
рп╕тЧЙ <b> AdminList </b> 
тМмуАФ<i> ┘Д█М╪│╪к ┘З┘Е┘З ╪з╪п┘Е█М┘Ж ┘З╪з </i>уАХ
', 'parse_mode' => 'html']);
}
} elseif ($type == "supergroup" && $data['autochatgroup'] == "on") {
if ($userID !== $me_id) {
if ($msg == "╪│┘Д╪з┘Е") {
yield $this->sleep(4); 
$txt = array('╪│┘Д╪з┘Е', '╪│┘Д╪з┘Е', '╪│┘Д╪з┘Е ╪о┘И╪и█М', '╪│┘Д╪з┘Е ┌Ж╪╖┘И╪▒█М', );
$text = $txt[rand(0, count($txt) - 1)];
yield $this->sleep(2);
yield $this->messages->setTyping(['peer' => $chatID, 'action' => ['_' => 'sendMessageTypingAction']]);
yield $this->sleep(1);
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => $text, 'reply_to_msg_id' => $msg_id]);
}
}
$mension = yield $this->messages->getUnreadMentions(['peer' => $chatID, 'offset_id' => 0, 'add_offset' => 0, 'limit' => 3, 'max_id' => $msg_id + 1, 'min_id' => $msg_id - 50]);
foreach ($mension['messages'] as $texts) {
$this->messages->readMentions(['peer' => $texts, ]);
yield $this->sleep(9);
$textid = $texts['id'];
$messeg = $texts['message'];
if (strpos($messeg, "╪о┘И╪┤") !== false) {
$txt = array('╪к╪┤┌й╪▒', '┘Е╪▒╪│█М', '┘Е┘Е┘Ж┘И┘Ж', '╪к╪┤┌й╪▒ ╪з╪▓ ┘Д╪╖┘Б ╪┤┘Е╪з!');
$text = $txt[rand(0, count($txt) - 1)];
yield $this->messages->sendMessage(['peer' => $texts, 'message' => $text, 'reply_to_msg_id' => $textid]);
} elseif (strpos($messeg, "╪о┘И╪и█М") !== false or strpos($messeg, "┌Ж╪╖┘И╪▒█М") !== false) {
$txt = array('╪к╪┤┌й╪▒', '┘Е╪▒╪│█М', '╪к┘И ┌Ж╪╖┘И╪▒█М', '┘Е╪▒╪│█М ╪┤┘Е╪з ╪о┘И╪и█М┘Ж╪Я', '┘Е┘Е┘Ж┘И┘Ж ╪┤┘Е╪з ╪о┘И╪и█М┘Ж', '┘Е┘Е┘Ж┘И┘Ж', '╪о┘И╪и┘Е', '╪к╪┤┌й╪▒ ╪з╪▓ ┘Д╪╖┘Б ╪┤┘Е╪з!');
$text = $txt[rand(0, count($txt) - 1)];
yield $this->messages->sendMessage(['peer' => $texts, 'message' => $text, 'reply_to_msg_id' => $textid]);
} elseif (strpos($messeg, "╪о╪и╪▒") !== false) {
$txt = array('╪│┘Д╪з┘Е╪к█М', '╪в╪▒╪з┘Е█М', '┘З┘Е┘З ┌Ж█М ╪о┘И╪и┘З', '╪о╪и╪▒ ╪о╪з╪╡█М ┘Ж█М╪│╪к', '┘З█М┌Ж█М ╪з╪▓ ╪┤┘Е╪з ┌Ж┘З ╪о╪и╪▒');
$text = $txt[rand(0, count($txt) - 1)];
yield $this->messages->sendMessage(['peer' => $texts, 'message' => $text, 'reply_to_msg_id' => $textid]);
} elseif (strpos($messeg, "╪│┘Д╪з┘Е") !== false or strpos($messeg, "╪╣┘Д█М┌й") !== false) {
$txt = array('╪о┘И╪и█М', '╪о╪и█М', '┌Ж╪╖┘И╪▒█М', '┌Ж┘З ╪о╪и╪▒');
$text = $txt[rand(0, count($txt) - 1)];
yield $this->messages->sendMessage(['peer' => $texts, 'message' => $text, 'reply_to_msg_id' => $textid]);
} elseif (strpos($messeg, "┘Е┘Е┘Ж┘И┘Ж") !== false or strpos($messeg, "╪к╪┤┌й╪▒") !== false) {
$txt = array('┘В╪з╪и┘Д ┘Ж╪п╪з╪▒┘З', '╪о┘И╪з┘З╪┤', '╪о┘И╪з┘З╪┤ ┘Е█М┌й┘Ж┘Е', '┘В╪з╪и┘Д ┘Ж╪п╪з╪┤╪к');
$text = $txt[rand(0, count($txt) - 1)];
yield $this->messages->sendMessage(['peer' => $texts, 'message' => $text, 'reply_to_msg_id' => $textid]);
} elseif (strpos($messeg, "╪з╪╡┘Д") !== false) {
$txt = array('╪┤┌п┘И┘Б┘З 22 ╪│╪з┘Д┘З', '╪┤┌п┘И┘Б┘З ┘З╪│╪к┘Е', '╪┤┌п┘И┘Б┘З 21 ╪│╪з┘Д┘З ╪┤┘Е╪з╪Я');
$text = $txt[rand(0, count($txt) - 1)];
yield $this->messages->sendMessage(['peer' => $texts, 'message' => $text, 'reply_to_msg_id' => $textid]);
} elseif (strpos($messeg, "╪▒╪и╪з╪к") !== false or strpos($messeg, "╪▒╪и╪з╪╖") !== false) {
$txt = array('┘Е┘Ж╪Я╪Я', '┘Ж┘З ┘Е╪к╪з╪│┘Б╪з┘Ж┘З', '╪и╪з ╪з╪м╪з╪▓┘З ┘Ж█М╪│╪к┘Е', '┘Ж┘З', '╪┤╪з█М╪п ╪и╪з╪┤┘ЕЁЯШК', '╪▒╪и╪з╪к ┘Е┌п┘З ╪н╪▒┘Б ┘З┘Е ┘Е█М╪▓┘Ж┘З', '╪▒╪и╪з╪к╪к╪к╪к╪к╪Я╪Я╪ЯЁЯдг');
$text = $txt[rand(0, count($txt) - 1)];
yield $this->messages->sendMessage(['peer' => $texts, 'message' => $text, 'reply_to_msg_id' => $textid]);
}
}
} elseif ($type == "user" && $userID !== $me_id) {
if (@$data['autosave'] == 'on') {
yield $this->messages->forwardMessages(['from_peer' => $userID, 'to_peer' => $admin, 'id' => [$msg_id]]);
}
if (@$data['autochatpv'] == 'on' && rand(0, 2) == 1) {
$this->sleep(3);
if (strpos($msg, "╪│┘Д╪з┘Е") !== false) {
$txt = array('╪│┘Д╪з┘Е', '╪│┘Д╪з┘Е', '╪│┘Д╪з┘Е ╪о┘И╪и█М', '╪│┘Д╪з┘Е ┌Ж╪╖┘И╪▒█М', );
$text = $txt[rand(0, count($txt) - 1)];
yield $this->sleep(2);
yield $this->messages->readHistory(['peer' => $userID, 'max_id' => $msg_id]);
yield $this->sleep(2);
yield $this->messages->setTyping(['peer' => $chatID, 'action' => ['_' => 'sendMessageTypingAction']]);
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => $text, 'reply_to_msg_id' => $msg_id]);
} elseif (strpos($msg, "╪о╪и╪▒") !== false) {
yield $this->sleep(2);
yield $this->messages->readHistory(['peer' => $userID, 'max_id' => $msg_id]);
yield $this->sleep(2);
yield $this->messages->setTyping(['peer' => $chatID, 'action' => ['_' => 'sendMessageTypingAction']]);
$txt = array('╪│┘Д╪з┘Е╪к█М', '╪в╪▒╪з┘Е█М', '┘З┘Е┘З ┌Ж█М ╪о┘И╪и┘З', '╪о╪и╪▒ ╪о╪з╪╡█М ┘Ж█М╪│╪к', '┘З█М┌Ж█М ╪з╪▓ ╪┤┘Е╪з ┌Ж┘З ╪о╪и╪▒');
$text = $txt[rand(0, count($txt) - 1)];
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => $text, 'reply_to_msg_id' => $msg_id]);
} elseif (strpos($msg, "╪▒╪и╪з╪к") !== false or strpos($msg, "╪▒╪и╪з╪╖") !== false) {
yield $this->sleep(2);
yield $this->messages->readHistory(['peer' => $userID, 'max_id' => $msg_id]);
yield $this->sleep(2);
yield $this->messages->setTyping(['peer' => $chatID, 'action' => ['_' => 'sendMessageTypingAction']]);
$txt = array('┘Е┘Ж╪Я╪Я', '┘Ж┘З ┘Е╪к╪з╪│┘Б╪з┘Ж┘З', '╪и╪з ╪з╪м╪з╪▓┘З ┘Ж█М╪│╪к┘Е', '┘Ж┘З', '┘Ж┘Е█М┘Б╪з┘Е┘Е ╪┤╪з█М╪п ╪и╪з╪┤┘ЕЁЯШК', '╪▒╪и╪з╪к ┘Е┌п┘З ╪н╪▒┘Б ┘З┘Е ┘Е█М╪▓┘Ж┘З', '╪▒╪и╪з╪к╪к╪к╪к╪к╪Я╪Я╪ЯЁЯдгЁЯдг');
$text = $txt[rand(0, count($txt) - 1)];
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => $text, 'reply_to_msg_id' => $msg_id]);
} elseif (strpos($msg, "╪о┘И╪и█М┘Ж") !== false or strpos($msg, "╪о┘И╪и") !== false or strpos($msg, "╪о╪и█М") !== false) {
$txt = array('╪к╪┤┌й╪▒', '┘Е╪▒╪│█М', '┘Е┘Е┘Ж┘И┘Ж', '╪о┘И╪и┘Е', '╪к╪┤┌й╪▒ ╪з╪▓ ┘Д╪╖┘Б ╪┤┘Е╪з!');
$text = $txt[rand(0, count($txt) - 1)];
yield $this->sleep(2);
yield $this->messages->readHistory(['peer' => $userID, 'max_id' => $msg_id]);
yield $this->sleep(2);
yield $this->messages->setTyping(['peer' => $chatID, 'action' => ['_' => 'sendMessageTypingAction']]);
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => $text, 'reply_to_msg_id' => $msg_id]);
} elseif (strpos($msg, "╪з╪╡┘Д") !== false or strpos($msg, "╪з╪┤┘Ж╪з") !== false or strpos($msg, "┘Е╪╣╪▒█М┘Б█М") !== false or strpos($msg, "╪в╪┤┘Ж╪з") !== false) {
$txt = array('╪┤┌п┘И┘Б┘З 23 ╪│╪з┘Д┘З', '╪┤┌п┘И┘Б┘З 23 ╪│╪з┘Д┘З ┘З╪│╪к┘Е ╪з╪▓ ', '╪┤┌п┘И┘Б┘З ┘З╪│╪к┘Е 23 ╪│╪з┘Д┘З', '╪┤┌п┘И┘Б┘З 23 ╪│╪з┘Д┘З ╪┤┘Е╪з╪Я');
$text = $txt[rand(0, count($txt) - 1)];
yield $this->sleep(2);
yield $this->messages->readHistory(['peer' => $userID, 'max_id' => $msg_id]);
yield $this->sleep(2);
yield $this->messages->setTyping(['peer' => $chatID, 'action' => ['_' => 'sendMessageTypingAction']]);
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => $text, 'reply_to_msg_id' => $msg_id]);
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
