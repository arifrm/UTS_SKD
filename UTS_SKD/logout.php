<?php
session_start();
unset($_SESSION['username']);

session_destroy();
echo "<script>alert('Anda telah Logout');document.location='index.php'</script>";