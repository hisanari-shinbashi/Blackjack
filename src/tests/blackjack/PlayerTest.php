<?php

namespace Blackjack\Tests;

use PHPUnit\Framework\TestCase;
use Blackjack\Player;
use Blackjack\Card;

require_once(__DIR__ . '/../../lib/blackjack/Player.php');

class PlayerTest extends TestCase
{
    public function testGetName()
    {
        $player = new Player('田中');
        $name = $player->getName();
        $this->assertSame('田中', $name);
    }

    public function testGetHand()
    {
        $player = new Player('田中');
        $card = new Card('クラブ', '5');
        $player->addHand($card);
        $this->assertSame([$card], $player->getHand());
    }

    public function testGetHandScore()
    {
        $player = new Player('田中');
        $player->addHand(new Card('クラブ', '5'));
        $player->addHand(new Card('スペード', 'A'));
        $player->calculateHandScore();
        $this->assertSame(16, $player->getHandScore());
    }
}
