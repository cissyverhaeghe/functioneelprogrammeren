<?php
require_once "select.php";

Makeselect($fieldname = "img_lan_id", $sql = "SELECT * FROM land", $list_fields = ["lan_id", "lan_land"]);