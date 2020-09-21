<?php

namespace Home\Work\Hexlet\PHP\OOP;

use Tightenco\Collect\Support;

require __DIR__ . '/../../../../vendor/autoload.php';

class DeckOfCards
{
    private $cards;

    public function __construct(array $cards)
    {
        $this->cards = collect($cards)->unique()->map(
            function ($card, $key) {
                return array_fill(0, 4, $card);
            }
        )->collapse();
    }

    public function getShuffled()
    {
        return $this->cards->shuffle()->all();
    }
}
