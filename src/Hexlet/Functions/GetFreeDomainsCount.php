<?php

namespace Home\Work\Hexlet\Functions\GetFreeDomainsCount;

$emails = [
    'info@gmail.com',
    'info@yandex.ru',
    'info@hotmail.com',
    'mk@host.com',
    'support@hexlet.io',
    'key@yandex.ru',
    'sergey@gmail.com',
    'vovan@gmail.com',
    'vovan@hotmail.com'
];

const FREE_EMAIL_DOMAINS = [
    'gmail.com', 'yandex.ru', 'hotmail.com'
];

function getFreeDomainsCount($emails)
{
    $domains = array_map(function ($mail) {
        return substr($mail, strpos($mail, '@') + 1);
    }, $emails);

    $freeDomains = array_intersect($domains, FREE_EMAIL_DOMAINS);

    $uniqFreeDomains = array_reduce($freeDomains, function ($acc, $domain) {
        if (!array_key_exists($domain, $acc)) {
            $acc[$domain] = 1;
        } else {
            $acc[$domain] += 1;
        }
        return $acc;
    }, []);

    return $uniqFreeDomains;
}

// $result = getFreeDomainsCount($emails);
// print_r($result);

# Array (
#     'gmail.com' => 3
#     'yandex.ru' => 2
#     'hotmail.com' => 2
#  )