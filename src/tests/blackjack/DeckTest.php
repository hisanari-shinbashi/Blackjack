<?php

namespace Blackjack\Tests;

use PHPUnit\Framework\TestCase;
use Blackjack\Deck;

require_once(__DIR__ . '/../../lib/blackjack/Player.php');

class DeckTest extends TestCase
{
    public function testDrawCad()
    {
        $deck = new Deck();
        $cards = $deck->drawCard(2);
        $this->assertSame(2, count($cards));
    }
}
