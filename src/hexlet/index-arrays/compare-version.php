<?php

namespace HomeWork\Hexlet\IndexArrays\CompareVersion;

function compareVersion(string $ver1, string $ver2): int
{
    $nums1 = explode('.', $ver1);
    $nums2 = explode('.', $ver2);
    
    return $nums1 <=> $nums2;
}

$result = compareVersion('2.3', '2.12');
print_r($result);