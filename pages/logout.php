<?php
session_start(); //memulai session
session_destroy(); //menghapus session
header('location:../'); //redirect ke halaman login
?>