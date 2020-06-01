<?php

namespace Home\Work\Hexlet\OOP;

class Truncater
{
    public const OPTIONS = [
        'separator' => '...',
        'length' => 200,
    ];

    private $options = [];

    // BEGIN (write your solution here)
    public function __construct(array $options = [])
    {
        $this->options = array_merge(self::OPTIONS, $options);
    }

    public function truncate(string $text, array $options = [])
    {
        $options = array_merge($this->options, $options);

        if (strlen($text) > $options['length']) {
            return substr($text, 0, $options['length']) . $options['separator'];
        }
        
        return $text;
    }
    // END
}
