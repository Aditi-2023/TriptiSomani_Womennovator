<?php
session_start();
if(isset($_SESSION['user_sess']) || !empty($_SESSION['user_sess']))
	{
	    	$_SESSION['user_sess']=$_SESSION['user_sess'];
	}
if(isset($_SESSION['country']) || !empty($_SESSION['country']))
	{
	    	$_SESSION['country']=$_SESSION['country'];
	}
if(isset($_SESSION['LANG']) || !empty($_SESSION['LANG']))
{
    	$_SESSION['LANG']=$_SESSION['LANG'];
}
?>