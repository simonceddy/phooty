<?php
require __DIR__.'/vendor/autoload.php';

$team = new Phooty\Commentary\CommentaryTeam();

$team->setCommentatorA(new Phooty\Commentary\Commentators\Bt());

$team->setCommentatorB(new Phooty\Commentary\Commentators\Dennis());

dd($team);
