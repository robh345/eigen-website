<?php
/**
 * Created by PhpStorm.
 * User: Rob Holterman
 * Date: 27-1-2018
 * Time: 18:29
 */

include "function.php";

session_start();
session_destroy();
redirect("login_pagina.php");