<?php
namespace Phooty\App\Listener;

use Symfony\Component\Console\Input\StringInput;

class DataListener
{
    private static $exit_commands = [
        'quit',
        'exit',
        'retire',
    ];

    private static $emit_strings = [
        0 => [
            'You missed the lot and Parko is livid.',
            'You kicked that like my wife would and she hates playing full forward.',
            'Absolute shocker. Out on the full.',
            'Doesn\'t make the distance!'
        ],
        1 => [
            'Just scraped through for a minor.',
            'Lucky to score. One behind added.',
            'Never looked like it.'
        ],
        2 => [
            'Just scraped it through',
            'Hits the left hand goal post halfway up.',
            'Sandy is back to swat it through for a rushed behind',
            'Always slightly to the right.'
        ],
        3 => [
            'Sneaks it through from the pocket!',
            'Soccered through on the goal line!',
            'Good kick and the umpire barely moves!',
            'Slots it through! What a contest within a contest!'
        ],
        4 => [
            'Unleashed a magnificent barrel from 55!',
            'Buddy, BUddy, BUDDY!',
            'Eddie, EDdie, EDDIE!',
            'HE\'S KICKED. THE IMPOSSIBLE. GOAL.'
        ],
    ];

    public function __invoke($data)
    {
        $data = strtolower(new StringInput($data));
    
        if (in_array($data, static::$exit_commands)) {
            echo 'Quitting Phooty. Bring on Mad Monday.' . PHP_EOL;
            exit(1);
        }

        switch ((string) $data) {
            case 'sim':
                //$sim = new Phooty\Simulation\Kernel();
                echo 'SIM' . PHP_EOL;
                break;
            case 'goal':
                echo $this->emitGoal() . PHP_EOL;
                break;
            default:
                echo 'data' . PHP_EOL;
        }
    }

    private function emitGoal()
    {
        $result = mt_rand(0, 4);
        $set = static::$emit_strings[$result];
        return $set[array_rand($set)];
    }
}
