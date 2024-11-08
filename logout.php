<?php

setcookie("login", "", time() - 3600, "/");
setcookie("password", "", time() - 3600, "/");

header("Location: /symulacja-polityki/index.php");
exit();