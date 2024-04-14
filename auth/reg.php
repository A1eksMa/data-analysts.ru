<?php
function getIP()
{
$client  = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote  = @$_SERVER['REMOTE_ADDR'];
if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
else $ip = $remote;
return $ip;
}

$date = date('Y-m-d', (time()+3600*3));
$time = date('H:i:s', (time()+3600*3));

if (isset($_COOKIE['userlog'])) {$userlog = $_COOKIE['userlog'];} else {$userlog = "guest";}
if (isset($_COOKIE['username'])) {$username = $_COOKIE['username'];} else {$username = "guest";}
if (isset($_COOKIE['userpass'])) {$userpass = $_COOKIE['userpass'];} else {$userpass = "guest";}

/************ Check $_POST ************/

if (isset($_POST['login'])) {

$userlog = $_POST['login'];

$userpass = $_POST['password'];

                                                                                                                                              

$tryreglog = getIP()." ".$date." ".$time." ".$userlog." ".$userpass."\n";

file_put_contents('tryreg.log', $tryreglog, FILE_APPEND | LOCK_EX);

/**
$authorized_users = [

['guest','@Лёша','@ksyshanew2002','@sveta'],

['guest','Лёша Ма','Ксения Новикова','Света'],

['guest','123','123456','123']

];


$found = array_search($userlog, $authorized_users[0]);

if ($found) {echo $found;} else {echo 'not found';}




#$reglog = getIP()." ".$date." ".$time." ".$userlog." ".$userpass."\n";

#file_put_contents('reg.log', $reglog, FILE_APPEND | LOCK_EX);

**/
}                                                                                                                                             

/************ end ************/  

                                                                                                                                         

setcookie('userlog',$userlog,time()+60,"/");

setcookie('username',$username,time()+60,"/");

setcookie('userpass',$userpass,time()+60,"/");

                                                                                                                                              

                                                                                                                                              

$log = getIP()." ".$date." ".$time." ".$username."\n";

file_put_contents('user.log', $log, FILE_APPEND | LOCK_EX);



echo '<pre>';                                                                                                                                              

print_r($authorized_users);

echo '</pre>';

                                                                                                                                              

header("location: https://data-analysts.ru/da-sprints/");                                                                                     

exit(); 



/**

if (getIP()=='10.33.0.48') {setcookie('username','Лёша Ма',0,"/");}

if (getIP()=='185.210.217.154') {setcookie('username','Ксения Новикова',0,"/");}

**/

?>
