<?php 
//--------session
session_start(); 

function destroy_session_and_data() { 
session_unset(); 
if (session_id() != "" || isset($_COOKIE[session_name()])) 
setcookie(session_name(), session_id(), time() + 3600, '/');
// time()-2592000, '/'); 
session_destroy();
setcookie("user_req",0, time() - 3600, '/'); 
} 


function count_requests() { 
//--------cookie
if(!isset($_COOKIE['var_req'])){
	$user_req = "user_req";
	$value = 1;
	setcookie($user_req,$value, time()+36000 , "/");
}

if (!isset($_SESSION['requests'])){ 
// $_SESSION['requests'] = 1;
	if(!isset($_COOKIE['var_req']))
	$_SESSION['requests'] = 1;
	else
	$_SESSION['requests'] = $_COOKIE["user_req"];
		
} 
else {
	$_SESSION['requests']++; 
	$_COOKIE['user_req'] = $_SESSION['requests'];
}
return $_SESSION['requests']; 
} ?> 
