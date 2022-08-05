<?php

namespace Blackjack;

require_once('Game.php');

$game = new Game('あなた', 'ディーラー');
$game->start();
