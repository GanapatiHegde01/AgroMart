<?php
session_start();
session_destroy();
header("location:Login/loginform.html");
