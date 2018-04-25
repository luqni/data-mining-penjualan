<?php
session_start();
if(! (session_is_registered(SES_MGR)))
{
		echo "<script>window.alert('Untuk mengakses, Anda harus Login Sebagai Manager');
        window.location=('../home')</script>";
}
?>