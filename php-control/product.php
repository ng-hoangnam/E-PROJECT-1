<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator <taithanh95.dev@gmail.com>
 * Date: 10/08/2022
 * Time: 2:45 PM
 */

// Include File Config Database
include('./php-control/config.php');

$list = select_list("SELECT * FROM Product");
var_dump($list);
?>