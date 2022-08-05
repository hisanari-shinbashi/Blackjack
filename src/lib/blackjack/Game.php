<?php

namespace Blackjack;

require_once('Deck.php');
require_once('Player.php');
require_once('Dealer.php');
require_once('HandEvaluator.php');

class Game
{
    private const FIRST_DRAW_NUM = 2;
    private const ADD_DRAW_NUM = 1;

    private Deck $deck;
    private HandEvaluator $handEvaluator;

    public function __construct(private string $name1, private string $name2)
    {
    }

    public function start(): void
    {
        $player = new Player($this->name1);
        $dealer = new Dealer($this->name2);
        $this->deck = new Deck();
        $this->handEvaluator = new HandEvaluator();

        echo 'ブラックジャックを開始します。' . PHP_EOL . PHP_EOL;

        $player->drawCard($this->deck, self::FIRST_DRAW_NUM);
        $dealer->drawCard($this->deck, self::FIRST_DRAW_NUM);

        $this->selectAction($player);
        $this->selectAction($dealer);

        $winner = $this->handEvaluator->getWinner($player, $dealer);
        $this->handEvaluator->decideWinner($winner);

        echo 'ブラックジャックを終了します。' . PHP_EOL;
    }

    private function selectAction(object $players): void
    {
        while (true) {
            $players->calculateHandScore();
            if ($this->handEvaluator->isBust($players->getHandScore())) {
                break;
            }
            $answer = $players->selectAnswer();
            if ($answer === 'y') {
                $players->drawCard($this->deck, self::ADD_DRAW_NUM);
            } elseif ($answer === 'n') {
                break;
            } else {
                echo 'y または n を入力してください。' . PHP_EOL;
            }
        }
    }
}
