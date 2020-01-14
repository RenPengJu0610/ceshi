<?php
	$me		=	new Memcache();
	$flag	=	$me->connect('localhost',11211);
	$name	=	$me->set('name'=>'任鹏举');
	var_dump($name);
?>