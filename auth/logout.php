<?php
session_start();
session_destroy();
header('Location: /clickra/auth/login.php');
exit;
