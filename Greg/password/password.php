<?php

function hash_password($password, $salt)
{
    $hash = hash_hmac('ripemd160', $password, $salt);
    return $hash;
}