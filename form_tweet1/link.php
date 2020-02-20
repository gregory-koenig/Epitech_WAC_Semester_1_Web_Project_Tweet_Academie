<?php

require_once "functions.php";

$tesst = new Hashtag();

$o = "#phrase #test #bdd #php #js";

$tesst->check_bdd_hashtags($tesst->get_hashtags($o), 7);

$tweet = new Tweet();
?>