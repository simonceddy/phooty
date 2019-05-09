<?php
namespace Phooty\Crawler\Processor\Node;

use Phooty\Crawler\Support\TeamResolver;
use Phooty\Crawler\Support\RegexUtils;

class TeamFromTableHeading implements NodeProcessor
{
    protected $teamResolver;

    public function __construct(TeamResolver $teamResolver)
    {
        $this->teamResolver = $teamResolver;
    }

    public function process(\DOMNode $node)
    {
        $team = RegexUtils::getTeamFromHeading(
            $node->textContent
        );
        $teamData = $this->teamResolver->resolve($team);
        if (!$teamData) {
            throw new \LogicException('Invalid team: '.$team);
        }
        return $teamData;
    }
}
