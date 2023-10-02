<?php

namespace root\src\Helpers;

function substrParams($url) {
    $paramPos = strpos($url, '?');
    $pureUrl = substr($url, 0, $paramPos);

    return $pureUrl;
}