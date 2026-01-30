<?php
session_start();
session_unset();
session_destroy();

header("Location: /agrokultura/frontend/pages/forms/login.php");
exit;