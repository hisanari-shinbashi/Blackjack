<?php

namespace Blackjack;

require_once('AbstractPlayers.php');

class Dealer extends AbstractPlayers
{
    private const SECOND_CARD_INDEX = 1;
    public const DRAW_CARD_STOP = 17;

    public function __construct(private string $name)
    {
        parent::__construct($name);
    }

    public function drawCard(Deck $deck, int $drawNum): void
    {
        $cards = $deck->drawCard($drawNum);
        foreach ($cards as $index => $card) {
            $this->addHand($card);
            if ($index === self::SECOND_CARD_INDEX) {
                echo $this->name . 'の引いた2枚目のカードは分かりません。' .  PHP_EOL;
                break;
            }
            echo $this->name . 'の引いたカードは' . $card->getSuit() . 'の' . $card->getNumber() . 'です。' .  PHP_EOL;
        }
    }

    public function selectAnswer(): string
    {
        $hand = $this->getHand();
        if (count($hand) === 2) {
            echo $this->name . 'の引いた2枚目のカードは' . $hand[1]->getSuit() . 'の' . $hand[1]->getNumber() . 'でした。' . PHP_EOL;
        }

        $answer = 'n';
        if ($this->getHandScore() < self::DRAW_CARD_STOP) {
            $answer = 'y';
            echo $this->name . 'の現在の得点は' . $this->getHandScore() . 'です。' . PHP_EOL;
        }
        return $answer;
    }
}
