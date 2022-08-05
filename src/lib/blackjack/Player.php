<?php

namespace Blackjack;

require_once('AbstractPlayers.php');

class Player extends AbstractPlayers
{
    public function __construct(private string $name)
    {
        parent::__construct($name);
    }

    public function drawCard(Deck $deck, int $drawNum): void
    {
        $cards = $deck->drawCard($drawNum);
        foreach ($cards as $card) {
            echo $this->name . 'の引いたカードは' . $card->getSuit() . 'の' . $card->getNumber() . 'です。' .  PHP_EOL;
            $this->addHand($card);
        }
    }

    public function selectAnswer(): string
    {
        echo $this->name . 'の現在の得点は' . $this->getHandScore() . 'です。カードを引きますか？（y/n）';
        return trim(fgets(STDIN));
    }
}
