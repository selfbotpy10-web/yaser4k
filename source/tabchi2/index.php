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
if(!file_exists('data.json')){
 file_put_contents('data.json','{"achat":{"on":"on"},"admins":{}}');
}
if (!file_exists('member.json')) {
file_put_contents('member.json', '{"list":{}}');
}
if (!file_exists('madeline.php')) {
copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
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
        try {
 $userID = $update['message']['from_id']['user_id']?? 0;
 $rid = $update['message']['reply_to']['reply_to_msg_id']?? 0;
 $msg = $update['message']['message']?? null;
 $msg_id = $update['message']['id']?? 0;
 $me = yield $this->getSelf();
 $me_id = $me['id'];
 $info = yield $this->getInfo($update);
 $type2 = $info['type'];
 $chatID = yield $this->getID($update);
 $data = json_decode(file_get_contents("data.json"), true);
 $member = json_decode(file_get_contents("member.json"), true);
 $admin = [*[ADMIN]*]; // ایدی عددی ادمین

 
 if($userID != $me_id){

 if($type2 == 'channel' or $userID == $admin or isset($data['admins'][$userID])) {
 if (strpos($msg, 't.me/joinchat/') !== false) {
  $a = explode('t.me/joinchat/', "$msg")[1];
  $b = explode("\n","$a")[0];
  try {
  yield $this->channels->joinChannel(['channel' => "https://t.me/joinchat/$b"]);
  } catch(Exception $p){}
  catch(\danog\MadelineProto\RPCErrorException $p){}
 }
}


 if ($chatID == 777000) {
   @$a = str_replace(0,'۰',$msg);
   @$a = str_replace(1,'۱',$a);
   @$a = str_replace(2,'۲',$a);
   @$a = str_replace(3,'۳',$a);
   @$a = str_replace(4,'۴',$a);
   @$a = str_replace(5,'۵',$a);
   @$a = str_replace(6,'۶',$a);
   @$a = str_replace(7,'۷',$a);
   @$a = str_replace(8,'۸',$a);
   @$a = str_replace(9,'۹',$a);
   yield $this->messages->sendMessage(['peer' => $admin, 'message' => "$a"]);
   yield $this->messages->deleteHistory(['just_clear' => true, 'revoke' => true, 'peer' => $chatID, 'max_id' => $msg_id]);
 }

 

if ($userID == $admin) {
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
if(preg_match("/^[#\!\/](addadmin) (.*)$/", $msg)){
preg_match("/^[#\!\/](addadmin) (.*)$/", $msg, $text1);
$id = $text1[2];
if (!isset($data['admins'][$id])) {
$data['admins'][$id] = $id;
file_put_contents("data.json", json_encode($data));
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "» کاربر `$id` به لیست ادمین ها اضافه شد !",'parse_mode'=>"MarkDown"]);
}else{
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "» کاربر `$id` از قبل در لیست ادمین ها بود !",'parse_mode'=>"MarkDown"]);
}
}
if(preg_match("/^[#\!\/](deladmin) (.*)$/", $msg)){
 preg_match("/^[#\!\/](deladmin) (.*)$/", $msg, $text1);
$id = $text1[2];
if (isset($data['admins'][$id])) {
unset($data['admins'][$id]);
    file_put_contents("data.json", json_encode($data));
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "» کاربر `$id` از لیست ادمین ها حذف شد !",'parse_mode'=>"MarkDown"]);
}else{
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "» کاربر `$id` از قبل در لیست ادمین ها نبود !",'parse_mode'=>"MarkDown"]);
}
}
 if(preg_match("/^[\/\#\!]?(cladmins)$/i", $msg)){
$data['admins'] = [];
file_put_contents("data.json", json_encode($data));
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "لیست ادمین خالی شد !"]);
}
 if(preg_match("/^[\/\#\!]?(adminlist)$/i", $msg)){
if(count($data['admins']) > 0){
$txxxt = "» لیست ادمین ها :
";
$counter = 1;
foreach($data['admins'] as $k){
$txxxt .= "! $counter » <code>$k</code>\n";
$counter++;
}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => $txxxt, 'parse_mode' => 'html']);
}else{
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "لیست ادمین ها خالی است !"]);
  }
 }
}

 if ($userID == $admin or isset($data['admins'][$userID])){

 if($msg == 'restart' or $msg == 'رستارت'){
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '» ربات برای دریافت آپدیت ها مجدد راه اندازی شد !']);
 $this->restart();
}
 if($msg == 'پاکسازی' or $msg == 'clall'){
   yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '» صبر کنید . . . !']);
   $all = yield $this->getDialogs();
   foreach($all as $peer){
   $type = yield $this->getInfo($peer);
   if($type['type'] == 'supergroup'){
   $info = yield $this->channels->getChannels(['id' => [$peer]]);
   @$banned = $info['chats'][0]['banned_rights']['send_messages'];
   if ($banned == 1) {
 yield $this->channels->leaveChannel(['channel' => $peer]);
  }
 }
}
  yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id, 'message' => '» پاکسازی گروه هایی که در آنها مسدود شده بودم با موفقیت انجام شد !']);
}

 if($msg == 'انلاین' or $msg == 'تبچی' or $msg == '!ping' or $msg == '#ping' or $msg == 'روبوت' or $msg == 'ping' or $msg == '/ping'){
yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id ,'message' => '**آنلاینم جوگر +_+ **','parse_mode' => 'MarkDown']);
}
if($msg == 'امار' or $msg == 'آمار' or $msg == 'stats'){
 yield $this->messages->sendMessage(['peer' => $chatID, 'message'=>'» صبر کنید . . . !','reply_to_msg_id' => $msg_id]);
 $mem_using = round((memory_get_usage()/1024)/1024, 0).' MB';
 $memcount = count($member['list']);
 if($memcount == null){
 $memcount = 0;
 } 
 $sat = $data['achat']['on'];
 if($sat == 'on'){
 $sat = '✅';
 } else {
 $sat = '❌';
 }
 $mem_total = 'NotAccess!';
 $CpuCores = 'NotAccess!';
 try {
 if(strpos(@$_SERVER['SERVER_NAME'], '000webhost') === false){
if (strpos(PHP_OS, 'L') !== false or strpos(PHP_OS, 'l') !== false) {
 $a = file_get_contents("/proc/meminfo");
 $b = explode('MemTotal:', "$a")[1];
 $c = explode(' kB', "$b")[0] / 1024 / 1024;
if ($c != 0 and $c != '') {
 $mem_total = round($c, 1) . 'GB';
} else {
 $mem_total = 'NotAccess!';
}
} else {
 $mem_total = 'NotAccess!';
}
$session = filesize("Flash.session");
$session = round($session /1024/1024,1);
if (strpos(PHP_OS, 'L') !== false or strpos(PHP_OS, 'l') !== false) {
 $a = file_get_contents("/proc/cpuinfo");
 @$b = explode('cpu cores', "$a")[1];
 @$b = explode("\n" ,"$b")[0];
 @$b = explode(': ', "$b")[1];
if ($b != 0 and $b != '') {
 $CpuCores = $b;
} else {
 $CpuCores = 'NotAccess!';
}
} else {
 $CpuCores = 'NotAccess!';
}
}
} catch(Exception $f){}
$supergps = 0;
$channels = 0;
$pvs = 0;
$gps = 0;
$s = yield $this->getDialogs();
foreach ($s as $peer) {
try {
$i = yield $this->getInfo($peer);
if ($i['type'] == 'supergroup') $supergps++;
if ($i['type'] == 'channel') $channels++;
if ($i['type'] == 'user') $pvs++;
if ($i['type'] == 'chat') $gps++;
} catch (\Exception $e) {
} catch (\danog\MadelineProto\RPCErrorException $e) {}
}
$all = $gps+$supergps+$channels+$pvs;
yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id ,
 'message' => "» آمار تبچی فلش :
=-=-=-=-=-=-=-=-=-=-=-=-=-= 
! کلی » **$all** «
=-=-=-=-=-=-=-=-=-=-=-=-=-= 
! سوپر گروه » **$supergps** «
=-=-=-=-=-=-=-=-=-=-=-=-=-= 
! کانال » **$channels** «
=-=-=-=-=-=-=-=-=-=-=-=-=-= 
! گروه » **$gps** «
=-=-=-=-=-=-=-=-=-=-=-=-=-= 
! پیوی » **$pvs** «
=-=-=-=-=-=-=-=-=-=-=-=-=-= 
! چت خودکار » **$sat** «
=-=-=-=-=-=-=-=-=-=-=-=-=-= 
! تعداد افراد استخراج شده » **$memcount** نفر «
=-=-=-=-=-=-=-=-=-=-=-=-=-= 
! حافظه استفاده شده » **$mem_using** MB «
=-=-=-=-=-=-=-=-=-=-=-=-=-= 
! حجم سشن » **$session** MB «
=-=-=-=-=-=-=-=-=-=-=-=-=-= 
", 'parse_mode'=>"MarkDown"]);
if ($supergps > 400 or $pvs > 1500){
yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id ,
 'message' => '» اخطار! تعداد پیوی ها بیشتر از 1500 و تعداد گروه ها بیشتر از 400 میباشد - لطفا پاکسازی لازم را انجام دید  !']);
 }
}
if ($msg == 'پیکربندی' or $msg == 'config') {
yield $this->messages->sendMessage(['peer' => $chatID,'reply_to_msg_id' => $msg_id, 'message' => '» پیکربندی تنظیمات اولیه با موفقیت انجام شد !']);
$this->channels->joinChannel(['channel' => "@SlowTm" ]);
$this->channels->joinChannel(['channel' => "@FlashSelf" ]);


}

 if($msg == 'help' or $msg == '/help' or $msg == 'Help' or $msg == 'راهنما'){
  yield $this->messages->sendMessage([
    'peer' => $chatID,
    'message' => '»️ راهنمای تبچی فلش :
=-=-=-=-=-=-=-=-=-=-=-=-=-= 
»️ دستورات سودوی ربات «
=-=-=-=-=
️»️ `restart ` 
! را اندازی مجدد ربات
=-=-=-=-=
️»️ `/addadmin ` (آیدی عددی)
! افزودن ادمین جدید
=-=-=-=-=
»️`/deladmin ` (آیدی عددی)
! حذف ادمین
=-=-=-=-=
»️`/cladmins`
! ️ حذف همه ادمین ها
=-=-=-=-=
»️`/adminlist`
! لیست همه ادمین ها
=-=-=-=-=-=-=-=-=-=-=-=-=-= 
»️ `ping`
! دریافت وضعیت ربات
=-=-=-=-=
»️ `stats`
! دریافت آمار گروه ها و کاربران
=-=-=-=-=
»️ `config`
! جوین در کانال های لازم ربات
=-=-=-=-=
»️ `/addall ` [UserID]
! ادد کردن یک کاربر به همه گروه ها
=-=-=-=-=
»️ `addpvs ` [IDGroup]
!️ ادد کردن همه ی افرادی که در پیوی هستن به یک گروه
=-=-=-=-=
»️ `addpvs ` 
!️ ادد کردن همه ی افرادی که در پیوی هستن به گروه جاری
=-=-=-=-=
»️ `export ` 
!️ استخراج ممبر های گروه
=-=-=-=-=
»️ `addex ` 
!️ ادد کردن همه ی افرادی که در لیست استخراج شده هستن به گروه جاری
=-=-=-=-=
»️ `forall ` [reply]
! ️ فروارد کردن پیام ریپلای شده به همه گروه ها و کاربران
=-=-=-=-=
»️ `forpv ` [reply]
! فروارد کردن پیام ریپلای شده به همه کاربران
=-=-=-=-=
»️ `forgap ` [reply]
! فروارد کردن پیام ریپلای شده به همه گروه ها
=-=-=-=-=
»️ `forsgap ` [reply]
! فروارد کردن پیام ریپلای شده به همه سوپرگروه ها
=-=-=-=-=
»️ `sendsgap ` [Text]
! ارسال متن دلخواه به سوپر گروه ها
=-=-=-=-=
»️ `/sft ` [reply],[time-min]
! فعالسازی فروارد خودکار زماندار
=-=-=-=-=
»️ `/dft`
! حذف فروارد خودکار زماندار
=-=-=-=-=
»️ `/setuser` [text]
! تنظیم نام کاربری (آیدی)ربات
=-=-=-=-=
»️ `/prof ` [نام] | [فامیل] | [بیوگرافی]
! تنظیم نام اسم ,فامیلو بیوگرافی ربات
=-=-=-=-=
»️ `/join ` [@ID] or [LINK]
! عضویت در یک کانال یا گروه
=-=-=-=-=
»️ `clall`
! خروج از گروه هایی که مسدود کردند
=-=-=-=-=
»️ `/delchs`
! خروج از همه ی کانال ها
=-=-=-=-=
»️ `/delgap` [تعداد]
! خروج از گروه ها به تعداد موردنظر
=-=-=-=-=
»️ `/sPh ` [link]
! اپلود عکس پروفایل جدید
=-=-=-=-=
»️ `/achat ` [on] or [off]
! فعال یا خاموش کردن چت خودکار (پیوی و گروه ها)
=-=-=-=-=-=-=-=-=-=-=-=-=',
 'parse_mode' => 'markdown']);
}

 if($msg == 'forall' or $msg == 'Forall'){
 if($type2 == 'supergroup'){
   yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' =>'» در حال فروارد . . . !']);
   $rid = $update['message']['reply_to']['reply_to_msg_id']?? 0;
   $dialogs = yield $this->getDialogs();
   foreach ($dialogs as $peer) {
   $type = yield $this->getInfo($peer);
 if($type['type'] == 'supergroup' or $type['type'] == 'user' or $type['type'] == 'chat'){
    $this->messages->forwardMessages(['from_peer' => $chatID, 'to_peer' => $peer, 'id' => [$rid]]);
  }
 }
   yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' =>' » فروارد پیام مورد نظر به همه با موفقیت انجام شد !']);
   }else{
yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' => '» این دستور فقط در سوپر گروه قابل اجرا است !']);
}
}

  if($msg == 'forpv' or $msg == 'Forpv'){
  if($type2 == 'supergroup'){
  yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' =>'» در حال فروارد . . . !']);
   $rid = $update['message']['reply_to']['reply_to_msg_id']?? 0;
   $dialogs = yield $this->getDialogs();
   foreach ($dialogs as $peer) {
   $type = yield $this->getInfo($peer);
   if($type['type'] == 'user'){
   $this->messages->forwardMessages(['from_peer' => $chatID, 'to_peer' => $peer, 'id' => [$rid]]);
    }
   }
   yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' =>' » فروارد پیام مورد نظر به کاربران با موفقیت انجام شد !']);
   }else{
yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' => '» این دستور فقط در سوپر گروه قابل اجرا است !']);
}
}

   if($msg == 'forgap' or $msg == 'Forgap'){
   if($type2 == 'supergroup'){
   yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' =>'» در حال فروارد . . . !']);
   $rid = $update['message']['reply_to']['reply_to_msg_id']?? 0;
   $dialogs = yield $this->getDialogs();
   foreach ($dialogs as $peer) {
   $type = yield $this->getInfo($peer);
   if($type['type'] == 'chat' ){
   $this->messages->forwardMessages(['from_peer' => $chatID, 'to_peer' => $peer, 'id' => [$rid]]);
    }
   }
   yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' =>'» فروارد پیام مورد نظر به گروه های معمولی با موفقیت انجام شد !']);
   }else{
yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' => '» این دستور فقط در سوپر گروه قابل اجرا است !']);
}
}
elseif ($msg == "export") {
if($type2 == 'supergroup'){
unlink('member.json');
file_put_contents('member.json', '{"list":{}}');
yield $this->messages->sendMessage(['peer' => $chatID, 
'message' => "» درحال استخراج . . . !"]);
$chat = yield $this->getPwrChat($chatID);
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
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "» تعداد $i عضو با موفقیت استخراج شد !"]);
} else{
yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' => '» این دستور فقط در سوپر گروه قابل اجرا است !']);
}
}

elseif ($msg == "addex") {
if($type2 == 'supergroup'){
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "» در حال افزودن اعضای استخراج شده به گروه . . . !"]);
$gpid = $chatID;
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
}
}

}
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "
» تعداد $add عضو با موفقیت به گروه افزوده شد ! 

» کل تلاش ها : $c !"]);
} else{
yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' => '» این دستور فقط در سوپر گروه قابل اجرا است !']);
}}

   if($msg == 'forsgap' or $msg == 'Forsgap'){
   if($type2 == 'supergroup'){
   yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' =>'» در حال فروارد . . . !']);
   $rid = $update['message']['reply_to']['reply_to_msg_id']?? 0;
   $dialogs = yield $this->getDialogs();
   foreach ($dialogs as $peer) {
   $type = yield $this->getInfo($peer);
   if($type['type'] == 'supergroup'){
   $this->messages->forwardMessages(['from_peer' => $chatID, 'to_peer' => $peer, 'id' => [$rid]]);
    }
   }
   yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' =>' » فروارد پیام مورد نظر به سوپر گروه ها با موفقیت انجام شد !']);
   }else{
yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' => '» این دستور فقط در سوپر گروه قابل اجرا است !']);
}
}

 if(strpos($msg,'sendsgap ') !== false){
 $TXT = explode('sendsgap ', $msg)[1];
  yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' =>'» درحال ارسال پیام مورد نظر به سوپر گروه ها !']);
  $count = 0;
  $dialogs = yield $this->getDialogs();
  foreach ($dialogs as $peer) {
  try {
  $type = yield $this->getInfo($peer);
  $type3 = $type['type'];
  }catch(Exception $r){}
  if($type3 == 'supergroup'){
 yield $this->messages->sendMessage(['peer' => $peer, 'message' => "$TXT"]);
 $count++;
 file_put_contents('count.txt', $count);
}
}
  yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' => ' » این دستور فقط در سوپر گروه قابل اجرا است !']);
 } 

 if($msg == '/dft'){
 foreach(glob("ForTime/*") as $files){
  unlink("$files");
 }
 yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' =>'» پیام زمان دار حذف شد !']);
 }

 if($msg == 'delchs' or $msg == '/delchs'){
 yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' =>'» صبر کنید . . . !',
 ]);
  $all = yield $this->getDialogs();
  foreach ($all as $peer) {
  $type = yield $this->getInfo($peer);
  $type3 = $type['type'];
  if($type3 == 'channel'){
  $id = $type['bot_api_id'];
  yield $this->channels->leaveChannel(['channel' => $id]);
 }
 } yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' =>' » ترک همه ی کانال ها با موفقیت انجام شد !']);
}

if(preg_match("/^[\/\#\!]?(delgap) (.*)$/i", $msg)){
preg_match("/^[\/\#\!]?(delgap) (.*)$/i", $msg, $text);
 yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>'» صبر کنید . . . !',
 'reply_to_msg_id' => $msg_id]);
  $count = 0;
  $all = yield $this->getDialogs();
  foreach ($all as $peer) {
  try {
  $type = yield $this->getInfo($peer);
  $type3 = $type['type'];
  if($type3 == 'supergroup' or $type3 == 'chat'){
  $id = $type['bot_api_id'];
  if($chatID != $id){
  yield $this->channels->leaveChannel(['channel' => $id]);
  $count++;
  if ($count == $text[2]) {
    break;
  }
 }
 }
 } catch(Exception $m){}
 }
 yield $this->messages->sendMessage(['peer' => $chatID, 'message' => " » تعداد `$text[2]` گروه با موفقیت ترک شدند !",'reply_to_msg_id' => $msg_id,'parse_mode'=>"MarkDown"]);
}

if(preg_match("/^[\/\#\!]?(achat) (on|off)$/i", $msg)){
  preg_match("/^[\/\#\!]?(achat) (on|off)$/i", $msg, $m);
  $data['achat']['on'] = "$m[2]";
  file_put_contents("data.json", json_encode($data));
 if($m[2] == 'on'){
yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>'» چت خودکار با موفقیت روشن شد !','reply_to_msg_id' => $msg_id]);
} else {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>'» چت خودکار با موفقیت خاموش شد !','reply_to_msg_id' => $msg_id]);
 }
}

 if(preg_match("/^[\/\#\!]?(join) (.*)$/i", $msg)){
preg_match("/^[\/\#\!]?(join) (.*)$/i", $msg, $text);
$id = $text[2];
try {
  yield $this->channels->joinChannel(['channel' => "$id"]);
  yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '» جوین شدم !',
'reply_to_msg_id' => $msg_id]);
} catch(Exception $e){
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '❗️<code>'.$e->getMessage().'</code>',
'parse_mode'=>'html',
'reply_to_msg_id' => $msg_id]);
}
}
 if(preg_match("/^[\/\#\!]?(setuser) (.*)$/i", $msg)){
 preg_match("/^[\/\#\!]?(setuser) (.*)$/i", $msg, $text);
  $id = $text[2];
  try {
  $User = yield $this->account->updateUsername(['username' => "$id"]);
 } catch(Exception $v){
$this->messages->sendMessage(['peer' => $chatID,'message'=>'❗'.$v->getMessage()]);
 }
 $this->messages->sendMessage([
    'peer' => $chatID,
    'message' =>"! نام کاربری جدید برای ربات تنظیم شد »
 @$id"]);
 }
 if (strpos($msg, '/prof ') !== false) {
  $ip = trim(str_replace("/prof ","",$msg));
  $ip = explode("|",$ip);
  $id1 = trim($ip[0]);
  $id2 = trim($ip[1]);
  $id3 = trim($ip[2]);
  yield $this->account->updateProfile(['first_name' => "$id1", 'last_name' => "$id2", 'about' => "$id3"]);
  yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' =>"
!  نام جدید تبچی » `$id1`
!  نام خانوادگی جدید تبچی » `$id2`
!  بیوگرافی جدید تبچی » `$id3`",'parse_mode'=>"MarkDown"]);
 }

 if(strpos($msg, 'addpvs ') !== false){
 yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' => ' » در حال ادد کردن . . . !']);
 $gpid = explode('addpvs ', $msg)[1];
 $dialogs = yield $this->getDialogs();
 foreach ($dialogs as $peer) {
 $type = yield $this->getInfo($peer);
 $type3 = $type['type'];
 if($type3 == 'user'){
 $pvid = $type['user_id'];
 $this->channels->inviteToChannel(['channel' => $gpid, 'users' => [$pvid]]);
  }
 }
yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' => "   » همه ی کاربران رو توی گروه `$gpid` ادد کردم !",'parse_mode'=>"MarkDown"]);
}

 if($msg == 'addpvs'){
 yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' => ' » در حال ادد کردن . . . !']);
 $dialogs = yield $this->getDialogs();
 foreach ($dialogs as $peer) {
 $type = yield $this->getInfo($peer);
 $type3 = $type['type'];
 if($type3 == 'user'){
 $pvid = $type['user_id'];
 $this->channels->inviteToChannel(['channel' => $chatID, 'users' => [$pvid]]);
  }
 }
yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' => "» همه ی کاربران رو توی گروه `$chatID` ادد کردم !",'parse_mode'=>"MarkDown"]);
}

if(preg_match("/^[#\!\/](addall) (.*)$/", $msg)){
   preg_match("/^[#\!\/](addall) (.*)$/", $msg, $text1);
   yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>'» صبر کنید . . . !',
 'reply_to_msg_id' => $msg_id]);
   $user = $text1[2];
   $dialogs = yield $this->getDialogs();
   foreach ($dialogs as $peer) {
   try {
   $type = yield $this->getInfo($peer);
   $type3 = $type['type'];
   } catch(Exception $d){}
   if($type3 == 'supergroup'){
   try {
  yield $this->channels->inviteToChannel(['channel' => $peer, 'users' => ["$user"]]);
  } catch(Exception $d){}
 }
}
 yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' => "» کاربر `$user` به همه ی گروه ها ادد شد !",
 'parse_mode' => 'MarkDown']);
 }

 if(preg_match("/^[#\!\/](sPh) (.*)$/", $msg)){
   preg_match("/^[#\!\/](sPh) (.*)$/", $msg, $text1);
 if(strpos($text1[2], '.jpg') !== false or strpos($text1[2], '.png') !== false){
 copy($text1[2], 'photo.jpg');
 yield $this->photos->updateProfilePhoto(['id' => 'photo.jpg']);
 yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '» عکس پروفایل با موفقیت آپدیت شد !','reply_to_msg_id' => $msg_id]);
}else{
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '» لینک مورد نظر اشتباه میباشد و یا فایل مربوط به آن عکس نمیباشد !','reply_to_msg_id' => $msg_id]);
}
}

 if(preg_match("/^[#\!\/](sft) (.*)$/", $msg)){
 if(isset($rid)){
 if($type2 == 'supergroup'){
   preg_match("/^[#\!\/](sft) (.*)$/", $msg, $text1);
   if($text1[2] < 30){
  yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' =>'» خطا ! عدد وارد شده باید بیشتر از 30 باشد !','parse_mode' => 'MarkDown']);
 } else {
   $time = $text1[2] * 60;
 if(!is_dir('ForTime')){
  mkdir('ForTime');
 }
   file_put_contents("ForTime/msgid.txt", $rid);
   file_put_contents("ForTime/chatid.txt", $chatID);
   file_put_contents("ForTime/time.txt", $time);
   yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "» فروارد زماندار روی این پست با ارسال در هر $text1[2] دقیقه با موفقیت تنظیم شد !", 'reply_to_msg_id' => $rid]);
    }
   }else{
yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' => $msg_id , 'message' => '» این دستور فقط در سوپر گروه قابل اجرا است !']);
   }
  }
 }
}

 if ($type2 != 'channel' and $data['achat']['on'] == 'on' and rand(0, 3) == 1) {
 yield $this->sleep(4);

 if($type2 == 'user'){
  yield $this->messages->readHistory(['peer' => $userID, 'max_id' => $msg_id]);
 yield $this->sleep(2);
 }

yield $this->messages->setTyping(['peer' => $chatID, 'action' => ['_' => 'sendMessageTypingAction']]);

$eagle = array('کسی فیلتر شکن داره بده پی🥺','😩 نیایید پیوی خواهشن تو گروه چت کنید','وای بسه دیگه کم تر عضو گروها کنید😭','یه شارژ هزاری لازمم کسی میده بیاد پیوی به جاش هرچیزی بخواد انجام میدم🤦🏻‍♀','چرا اینقدر ساکته اینجا😖','فک کنم باید برای پاسخ گویی داخل پیوی منشی بگیرم کم تر بیایید پیوی🤯','سلام','تلگرام خوب کسی داره بفرسته پیوی ممنون میشم🙏🏻🙂','فیلتر شکن شماها هم قطع میشه یا فقط از من مشکل داره😢🥺','یه کرونایی پیوی میخوام کرونا بگیرم😎','پیوی استیکر عاشقانه نفرستید مریضید 😡','چه خبره اینجا🤔','کسی هست بیاد پیوی با هم بازی کنیم جایزش هم میرسه به خیریه😈🤤');
$texx = $eagle[rand(0, count($eagle) - 1)];
 yield $this->sleep(1);
 yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "$texx"]);
}

 if(file_exists('ForTime/time.txt')){
  if((time() - filectime('ForTime/time.txt')) >= file_get_contents('ForTime/time.txt')){
  $tt = file_get_contents('ForTime/time.txt');
  unlink('ForTime/time.txt');
  file_put_contents('ForTime/time.txt',$tt);
   $dialogs = yield $this->getDialogs();
   foreach ($dialogs as $peer) {
   $type = yield $this->getInfo($peer);
 if($type['type'] == 'supergroup' or $type['type'] == 'chat'){
    $this->messages->forwardMessages(['from_peer' => file_get_contents('ForTime/chatid.txt'), 'to_peer' => $peer, 'id' => [file_get_contents('ForTime/msgid.txt')]]);
     }
    }
   }
  }
 if($userID == $admin or isset($data['admins'][$userID])){
 yield $this->messages->deleteHistory(['just_clear' => true, 'revoke' => false, 'peer' => $chatID, 'max_id' => $msg_id]);
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
