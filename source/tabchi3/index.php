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
date_default_timezone_set('Asia/Tehran');

if(file_exists('MadelineProto.log') and (filesize('MadelineProto.log') / 1024 ) > 1024) unlink('MadelineProto.log');
if(!file_exists('eshtrak.txt')){
echo 'The subscription date of this bot has expired : @FlashSelfBot';
exit();
}

if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
if (!is_dir("data")){
mkdir ("data");
}
if (!file_exists ("data/link.txt")){
file_put_contents("data/link.txt","");
}
if (!file_exists ("data/admin.txt")){
file_put_contents("data/admin.txt","[*[ADMIN]*]");
}
if(!file_exists('res.txt')){
file_put_contents('res.txt', '');
}
if (!file_exists ("data/number.txt")){
file_put_contents("data/number.txt","0");
}
if (!file_exists ("data/join.txt")){
file_put_contents("data/join.txt","off");
}
if (!file_exists ("data/timer.txt")){
file_put_contents("data/timer.txt","0");
}
include 'madeline.php';
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
$randi = rand (100,1600);
$timer = file_get_contents("data/timer.txt");
$number = file_get_contents("data/number.txt");
$join = file_get_contents("data/join.txt");
$admin = "[*[ADMIN]*]";
$msg  = $update['message']['message']?? null;
$msg_id = $update['message']['id']?? 0;
$userID = $update['message']['from_id']['user_id']?? 0;
$getInfo = yield $this->getInfo($update);
$chatID = yield $this->getID($update);  
$reply_id = $update['message']['reply_to']['reply_to_msg_id']?? 0;
$admin_list = file_get_contents("data/admin.txt");
$exp=explode("\n",$admin_list);
if(in_array($userID,$exp)){
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
if($msg == '!restart'){
yield $this->messages->deleteHistory(['just_clear' => true, 'revoke' => true, 'peer' => $chatID, 'max_id' => $msg_id]);
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '♻️ فـایـل هـای تـبـچـی بـا مـوفـقـیـت بـازنـگـری شـد

❇️ لـطـفـا بـعـد از 1 دقـیـقـه دسـتـور بـفـرسـتـیـد']);
yield $this->restart();
}

if (strpos ($msg,"http://t.me/joinchat/") !== false or strpos ($msg,"https://t.me/joinchat/") !== false or strpos ($msg,"https://telegram.me/joinchat/") !== false or strpos ($msg,"http://telegram.me/joinchat/") !== false){
$link=explode("https://t.me/joinchat/",$msg);
$link_count=0;
$linkk = file_get_contents("data/link.txt");
$link3=explode(',',$linkk);
foreach ($link as $link2){
$pm="https://t.me/joinchat/".$link2;
$msg1 = explode("https://t.me/joinchat/",$pm)[1];
$msg2 = explode("\n","$msg1")[0];
if (is_english($msg2)==true){
$msg5="https://t.me/joinchat/$msg2";
if(!in_array($msg5,$link3)){
$link_count++;
$myfile2 = fopen("data/link.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "https://t.me/joinchat/$msg2,");
fclose($myfile2);
}else{
continue;
}
}
}
yield $this->messages->sendMessage(['peer' => $chatID,'reply_to_msg_id' =>$msg_id , 'message' => "📬 تـعـداد $link_count لـیـنـک بـا مـوفـقـیـت ذخـیـره شـد

♻️ تـبـچـی در اولـیـن فـرصـت جـویـن مـی شـود"]);
}
if($msg == "!stats"){
$mem_usage = round((memory_get_usage()/1024)/1024, 1).' مـگـابـایـت';
$rand = rand(1,9);
$urmia = $rand;
$next =  360 - (time() - filectime('res.txt'));
$linkk = file_get_contents("data/link.txt");
$link3=explode(',',$linkk);
$colink=count($link3)-1;
$co1=$colink-$number;
$allpv = 0;$allchannel = 0; $allgroup=0;
$dialogs = yield $this->getDialogs();
foreach ($dialogs as $k=>$v) {
if($v["_"] == "peerUser"){
$allpv ++;
}
if($v["_"] == "peerChat"){
$allgroup ++;
}
if($v["_"] == "peerChannel"){
$allchannel ++;
}
}
$all=$allpv+$allgroup+$allchannel;
yield $this->messages->sendMessage(['peer' =>$chatID,'reply_to_msg_id' =>$msg_id,'message' => "🤖 تـبـچـی فـلش ورژن 1.9
🔐 آمـار هـمـه : $all
🎈 ربـات هـا : $urmia
⛱ پـیـوی هـا : $allpv
🎊 گــروه هـــا : $allgroup
🔗 سـوپـر گـروه و کـانـال هـا : $allchannel
 
⚜ تـعـداد لـیـنـک هـای ذخـیـره شـده : $colink
Ⓜ️ تـعـداد لـیـنـک هـای در انـتظـار جـویـن : $co1
📣 تـعـداد لیـنـک هـای جـویـن شـده : $number
⏱ تـایـم جـویـن در لـیـنـک بـعـدی : $randi ثـانـیـه

✅ وضـعـیـت جـویـن : $join

🧭 تـایـم ری اسـتـارت بـعـدی : $next

🔋 مـیـزان مـصـرف رم : $mem_usage",
'parse_mode'=> 'markdown' ,]);
if ($allchannel > 200 or $mem_usage > 100){
yield $this->messages->sendMessage(['peer' => $chatID, 'message' =>"‼️ بـه دلـیـل بـیـشـتـر بـودن مـنـابـع تـبـچـی و کـانـال هـاش ری اسـتـارت خـوکـار انـجـام شـد 2 دقـیـقـه صـبـر کـنـیـد تـا آپـدیــت تـکـمـیـل شـود و هـیـچ دسـتـوری نـفـرسـتـیـد :)"]);
yield $this->restart();
}
}

if($msg == "!help" or $msg == "راهنما"){
 yield $this->messages->sendMessage(['peer' =>$chatID,'reply_to_msg_id' =>$msg_id,'message' => "🤖 راهـنـمـای تـبـچـی فـلش ورژن 1.9

┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄
• ری اسـتـارت تـبـچـی فـقـط در پـیـوی
`!restart`
• تـسـت فـروارد تـبـچـی
`!bot`
• اطـلـاع از آنـلـیـایـنـی تـبـچـی
`!ping`
• دیـدن آمـار تـبـچـی 
`!stats`
• دریـافـت لـیـنـک هـای ذخـیـره شـده
`!listlink`
• روشـن کـردن جـویـن خـودکـار
`!join on`
• خـامـوش کـردن جـویـن خـودکـار
`!join off`
• خـروج از هـمـه گـروه هـا
`!delgroups`
• خـروج از هـمـه کـانـال هـا 
`!delchannel`
• ادد یـک عـضـو بـه هـمـه گـروه هـا
`!addall` (آیـدی عـددی)
• ادد تـمـام پـیـوی هـا بـه گـروه 
`!addpvs` (آیـدی عـددی گـروه)
• ادد کـاربـر مـورد نـظـر بـه گـروه
`!adduser` (آیـدی کـاربـر) (آیـدی گـروه)
• فـروارد بـه گـروه هـا
`!f2gps` (ریـپـلای)
• فـروارد بـه سـوپـرگـروه هـا
`!f2sgps` (ریـپـلای)
• فـروارد بـه پـیـوی هـا
`!f2pv` (ریـپـلای)
• فـروارد بـه هـمـه
`!f2all` (ریـپـلای)
┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄
🚫 از ایـن بـخـش فـقـط مـدیـر اصـلـی مـی تـوانـد اسـتـفـاده کـنـد

• دریـافـت اطـلاعـات کـاربـر
`!whois` (یـوزرنـیـم کـاربـر)
• افـزودن ادمـیـن
`!setsudo` (ریـپـلای)
• حـذف ادمـیـن
`!remsudo` (ریـپـلای)
• دریـافـت لـیـسـت ادمـیـن هـا
`!sudolist`
• پـاکـسـازی لـیـسـت ادمـیـن هـا
`!cleansudo`
┄┅┄┅┄┄┅┄┅┄┄┅┄┅┄

🔐 نـویـسـنـده و سـازنـده : @FlashSelfBot
🆑 کـانـال مـا : @FlashSelf",
'parse_mode'=> 'markdown' ,]);
}

if(preg_match('/^!sendpv (.*)/',$msg , $paramter)){
yield $this->messages->sendMessage(['peer' =>$chatID,'reply_to_msg_id' =>$msg_id,'message' => "🍀 بـرای تـمـامـی کـاربـران ارسـال شـد :)"]);
$dialogs =  yield $this->getDialogs();
foreach ($dialogs as $k=>$v) {
if($v["_"] == "peerUser"){
yield $this->messages->sendMessage(['peer' =>$v["user_id"],'message' =>$paramter[1]]);
}
}
}

if($msg =="!f2pv" and isset ($reply_id)){
yield $this->messages->sendMessage(['peer' =>$chatID,'reply_to_msg_id' =>$msg_id,'message' => "✅ بـرای تـمـامـی کـاربـران فـوروارد شـد :)"]);
$dialogs =  yield $this->getDialogs();
foreach ($dialogs as $k=>$v) {
if($v["_"] == "peerUser"){
yield $this->messages->forwardMessages(['from_peer' =>$chatID, 'id' =>[$reply_id],'to_peer' =>$v["user_id"]]);

}
}
}
if($msg=="!delgroups" or $msg=="delgroups" ){
$dialogs = yield $this->getDialogs();
$c=0;
foreach( $dialogs as $peer){
$type = yield $this->getInfo($peer);
$type3 = $type['type'];
if($type3=="supergroup"){
try{
yield $this->channels->leaveChannel(['channel' => $peer, ]);
$c++;
}
catch (\danog\MadelineProto\RPCErrorException $e) {
}
catch (\danog\MadelineProto\Exception $e) {
}
}
}
$_T ="🍀 تـبـچـی بـا مـوفـقـیـت از $c سـوپـر گـروه لـفـت داد :)";
yield $this->messages->sendMessage(['peer' => $update, 'message' =>"$_T"]);
}
if($msg=="!delchannel" or $msg=="/delchs" ){
$dialogs = yield $this->getDialogs();
$c=0;
foreach( $dialogs as $peer){
$type = yield $this->getInfo($peer);
$type3 = $type['type'];
if($type3=="channel" ){
try{
yield $this->channels->leaveChannel(['channel' => $peer, ]);
$c++;
}
catch (\danog\MadelineProto\RPCErrorException $e) {
}
catch (\danog\MadelineProto\Exception $e) {
}
}
}
$_T = "🤟 تـبـچـی بـا مـوفـقـیـت از $c کـانـال لـفـت داد :)";
yield $this->messages->sendMessage(['peer' => $update, 'message' =>"$_T"]);
}
if(strpos($msg,"!addall ")!==false or strpos($msg,"addall ")!==false){
$user = str_replace(["/addall " , "addall "] , "" , $msg);
$dialogs = yield $this->getDialogs();
$c=0;
foreach( $dialogs as $peer){
$type = yield $this->getInfo($peer);
$type3 = $type['type'];
if($type3=="supergroup"){
try{
yield $this->channels->inviteToChannel(['channel' => $peer, 'users' => [$user] ]);
$c++;
}
catch (\danog\MadelineProto\RPCErrorException $e) {
}
catch (\danog\MadelineProto\Exception $e) {
}
}
}
$_T = "🤍 کـاربـر $user بـا مـوفـقـیـت بـه $c سـوپـر گـروه دعـوت شـد :)";
yield $this->messages->sendMessage(['peer' => $update, 'message' =>"$_T"]);
}
if(strpos($msg, "!addpvs ")!==false or strpos($msg, "addpvs ")!==false ){
$group = str_replace(["/addpvs " , "addpvs "] , "" , $msg);
$dialogs = yield $this->getDialogs();
$c=0;
$ar=[];
foreach( $dialogs as $peer){
$type = yield $this->getInfo($peer);
$type3 = $type['type'];
if($type3 =="user" ){
try{
yield $this->channels->inviteToChannel(['channel' => $group, 'users' => [$peer] ]);
$c++;
}
catch (\danog\MadelineProto\RPCErrorException $e) {
}
catch (\danog\MadelineProto\Exception $e) {
}
}
}
$_T = "🆑 تـعـداد $c کـاربـر پـیـوی ربـات بـه گـروه $group افـزوده شـدنـد :)";
yield $this->messages->sendMessage(['peer' => $update, 'message' =>"$_T"]);
}
if(strpos($msg,"!adduser ")!==false or strpos($msg,"/adduser ")!==false ){
$p = str_replace(["adduser ","/adduser "] , "" , $msg);
$p = explode("|",$p);
$user = $p[0];
$gp = $p[1];
try{
yield $this->channels->inviteToChannel(['channel' => $gp, 'users' => [$user] ]);
$_T = "👽 کـاربـر $user بـا مـوفـقـیـت بـه گـروه $gp افـزوده شـد :)";
yield $this->messages->sendMessage(['peer' => $update, 'message' =>"$_T"]);
}
catch (\danog\MadelineProto\RPCErrorException $e) {
}
catch (\danog\MadelineProto\Exception $e) {
}
}

if($msg=="!f2gps" or $msg=="/f2gps" ){
$rid =  $update['message']['reply_to']['reply_to_msg_id']?? 0;
$dialogs = yield $this->getDialogs();
$c=0;
foreach( $dialogs as $peer){
$type = yield $this->getInfo($peer);
$type3 = $type['type'];
if($type3=="chat"){
try{
yield $this->messages->forwardMessages(['from_peer' => $update, 'to_peer' => $peer, 'id' => [$rid], ]);
$c++;
yield $this->sleep(3);
}
catch (\danog\MadelineProto\RPCErrorException $e) {
}
catch (\danog\MadelineProto\Exception $e) {
}
}
}
$_T = "👀 پـیـام ریـپـلای شـده شـمـا بـه $c گـروه مـعـمـولـی ارسـال شـد :)";
yield $this->messages->sendMessage(['peer' => $update, 'message' =>"$_T"]);
}

if($msg=="!f2sgps" or $msg=="/f2sgps"){
$rid =  $update['message']['reply_to']['reply_to_msg_id']?? 0;
$dialogs = yield $this->getDialogs();
$c=0;
foreach( $dialogs as $peer){
$type = yield $this->getInfo($peer);
$type3 = $type['type'];
if($type3=="supergroup"){
	try{
	yield $this->messages->forwardMessages(['from_peer' => $update, 'to_peer' => $peer, 'id' => [$rid], ]);
	 $c++;
	 yield $this->sleep(3);
}
	catch (\danog\MadelineProto\RPCErrorException $e) {
}
	catch (\danog\MadelineProto\Exception $e) {
}
}
}
$_T = "🤡 پـیـام ریـپـلای شـده شـمـا بـه $c سـوپـر گـروه ارسـال شـد :)";
yield $this->messages->sendMessage(['peer' => $update, 'message' =>"$_T"]);
}

if($msg=="!f2all" or $msg=="/f2all" ){
$rid =  $update['message']['reply_to']['reply_to_msg_id']?? 0;
$dialogs = yield $this->getDialogs();
$c=0;
foreach( $dialogs as $peer){
$type = yield $this->getInfo($peer);
$type3 = $type['type'];
if($type3=="supergroup" or $type3=="user"){
try{
yield $this->messages->forwardMessages(['from_peer' => $update, 'to_peer' => $peer, 'id' => [$rid], ]);
$c++;
yield $this->sleep(3);
}
catch (\danog\MadelineProto\RPCErrorException $e) {
}
catch (\danog\MadelineProto\Exception $e) {
}
}
}
$_T = "☠ پـیـام ریـپـلای شـده شـمـا بـه $c گـروه و کـاربـر ارسـال شـد :)";
yield $this->messages->sendMessage(['peer' => $update, 'message' =>"$_T"]);
}

if($msg == "!bot" or $msg == "bot" or $msg == "انلاینی"){
yield $this->messages->forwardMessages(['from_peer' =>$chatID, 'id' =>[$msg_id],'to_peer' =>$chatID]);
}
if($msg == "!join on" or $msg == "جوین خودکار روشن"){
if ($join != "on"){
file_put_contents("data/join.txt","on");
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "✅ جـویـن در لـیـنـک هـا **فـعـال** شـد",'reply_to_msg_id' => $msg_id, 'parse_mode'=> 'markdown' ,]);
}else{
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "❗️ ایـن دسـتـور از **قـبـل فـعـال** بـود",'reply_to_msg_id' => $msg_id, 'parse_mode'=> 'markdown' ,]);
 }
}
 if($msg == "!join off" or $msg == "جوین خودکار خاموش"){
if ($join == "off"){
file_put_contents("data/join.txt","off");
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "❌ جـویـن در لـیـنـک هـا **خـامـوش** شـد",'reply_to_msg_id' => $msg_id, 'parse_mode'=> 'markdown' ,]);
}else{
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "❗️ ایـن دسـتـور از **قـبـل غـیـر فـعـال** بـود",'reply_to_msg_id' => $msg_id, 'parse_mode'=> 'markdown' ,]);
 }
}
 if ($msg =="!listlink" or $msg == "listlink" or $msg == "لیست لینک ها"){
 	
 	$linkkk = file_get_contents("data/link.txt");
 	$links=count(explode(",",$linkkk))-1;
 if ($links > 10){
 $alll=explode (",",$linkkk);
 $s="";
 foreach ($alll as $m){
 	$s.="$m\n";
 }
 file_put_contents("link.txt","in The Name Of God\n〰〰〰〰〰〰〰〰〰〰〰\nlist Link For Tabchi Flash\n〰〰〰〰〰〰〰〰〰〰〰\nCreator : @FlashSelfBot\n\n"."$s\nend links :)");
 
$Updates = yield $this->messages->sendMedia([ 'peer' => $chatID,'reply_to_msg_id' => $msg_id , 'media' =>  ['_' => 'inputMediaUploadedDocument', 'file' => 'link.txt', 'attributes' => [['_' => 'documentAttributeFilename', 'file_name' => 'Tabchi_Links.txt']]], 'message' => "
🔗 تـعـداد لـیـنـک هـا : $links

🧸 سـازنـده : @FlashSelfBot",  'parse_mode' => 'html', ]);
unlink("link.txt");

}else{
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "🔗 تـعـداد لـیـنـک هـا کـمـتـر از **10** اسـت",'reply_to_msg_id' => $msg_id, 'parse_mode'=> 'markdown' ,]);
 }
}
 
   if($msg == "!ping"){
 yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "✅ تـبـچـی فـلش آنـلایـن مـی بـاشـد :)",'reply_to_msg_id' => $msg_id, 'parse_mode'=> 'markdown' ,]);
 }
}
 
 if ($join == "on"){
 	$linkkk = file_get_contents("data/link.txt");
 	$links=count(explode(",",$linkkk))-1;
 if (($links - $number) > 5){
 	
 	if (date ("i") != $timer){


$i12345=explode(",",$linkkk);
file_put_contents("data/timer.txt",date ("i"));


file_put_contents("data/number.txt",$number +1);
yield $this->messages->importChatInvite([
'hash' =>"$i12345[$number]",
 ]);


}
}
}

 
 
 
 if ($userID==$admin){
   	if(preg_match('/^!whois (.*)/',$msg , $m)){
   	$meee = yield $this->getFullInfo($m[1]);
$meeee = $meee['User'];
$first_name1 = $meeee['first_name'];
$id1= $meeee['id'];
$iii = '<a href="mention:'.$id1.'">'.$id1.'</a>';
yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' =>$msg_id , 'message' => "🔗 اطـلاعـات کـاربـر

 🔖 آیـدی عـددی : $iii

🔐 اسـم کـاربـر : $first_name1",'parse_mode' => 'html']);
}
   
   
   
   if($msg == '!setsudo'){
if(isset($reply_id)){
$reply_id2 = yield $this->channels->getMessages(['channel' => $chatID, 'id' => [$reply_id],]);
$reply_from_id = $reply_id2['messages'][0]['from_id'];
$admin_list = file_get_contents("data/admin.txt");
$exp=explode("\n",$admin_list);
if(!in_array($reply_from_id,$exp)){
   $meee = yield $this->getFullInfo($reply_from_id);
$meeee = $meee['User'];
$first_name1 = $meeee['first_name'];
$id1= $meeee['id'];
$myfile2 = fopen("data/admin.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "\n$id1");
fclose($myfile2);
$iii = '<a href="mention:'.$id1.'">'.$id1.'</a>';
yield $this->messages->sendMessage(['peer' => $chatID,  'reply_to_msg_id' =>$msg_id ,'message' => "🔍 کـاربـر مـورد نـظـر ادمـیـن شـد

 🔖 آیـدی عـددی : $iii

🔐 اسـم کـاربـر : $first_name1",'parse_mode' => 'html']);
}else{
yield $this->messages->sendMessage(['peer' => $chatID,  'reply_to_msg_id' =>$msg_id ,'message' => "🔐 ایـن کـاربـر از قـبل ادمـیـن بـود", 'parse_mode' => 'html']);
}
}
}

if($msg == '!sudolist'){
$admin2="";
$admin3="";
foreach($exp as $admin){
$admin2.="$admin \n";
}


if (count ($exp)-1 > 0){
   yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' =>$msg_id , 'message' => "🔐 ادمـیـن هـای تـبـچـی

$admin2",'parse_mode' => 'html']);
}else{
yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' =>$msg_id , 'message' => "⚙ لـیـسـت ادمـیـن هـا خـالـی هـسـت",'parse_mode' => 'html']);
}
}

  if($msg == '!remsudo'){
if(isset($reply_id)){
$reply_id2 = yield $this->channels->getMessages(['channel' => $chatID, 'id' => [$reply_id],]);
$reply_from_id = $reply_id2['messages'][0]['from_id'];
$admin_list = file_get_contents("data/admin.txt");
$exp=explode("\n",$admin_list);
if(in_array($reply_from_id,$exp)){

$meee = yield $this->getFullInfo($reply_from_id);
$meeee = $meee['User'];
$first_name1 = $meeee['first_name'];
$id1= $meeee['id'];
$source = file_get_contents("data/admin.txt");
$source1 = str_replace("$reply_from_id","",$source);
file_put_contents("data/admin.txt",$source1);
$ooo='<a href="mention:'.$id1.'">'.$id1.'</a>';
yield $this->messages->sendMessage(['peer' => $chatID,  'reply_to_msg_id' =>$msg_id ,'message' => "✂️ کـاربـر از ادمیـنـی بـرکـنـار شـد

🔐 اسـم کـاربـر : $first_name1

🔖 آیـدی عـددی : $ooo", 'parse_mode' => 'html']);
}else{
yield $this->messages->sendMessage(['peer' => $chatID,  'reply_to_msg_id' =>$msg_id ,'message' => "🔆 کـاربـر از قـبـل ادمـیـن نـبـود",'parse_mode' => 'html']);
}
}
}
if($msg == '!cleansudo'){
unlink("data/admin.txt");
yield $this->messages->sendMessage(['peer' => $chatID, 'reply_to_msg_id' =>$msg_id , 'message' => "🚫 لـیـسـت ادمـیـن هـا بـا مـوفـقـیـت پـاکـسـازی شـد",'parse_mode' => 'html']);
}
}
//••••••••••••••••••••••••••••••••••••••••••••••••••//
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
