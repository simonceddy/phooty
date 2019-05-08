<?php
namespace Phooty\Orm\Entities;

use Phooty\Orm\Support\Traits\HasUuid;
use Phooty\Orm\Support\Traits\WasCreatedOn;
use Phooty\Orm\Entities\Team;

/**
 * @Entity @Table(name="rosters")
 */
class Roster
{
    use HasUuid, WasCreatedOn;

    /**
     * The Team the roster belongs to
     *
     * @ManyToOne(targetEntity="Team", inversedBy="rosters")
     * @var Team
     */
    protected $team;

    /**
     * The Players belonging to the Roster
     *
     * @OneToMany(targetEntity="RosterPlayer", mappedBy="roster", indexBy="symbol", cascade={"persist"})
     * @var RosterPlayer[]
     */
    protected $players;

    /**
     * The season the roster belongs to
     *
     * @Column(type="integer")
     * @var int
     */
    protected $season;

    public function __construct(array $players)
    {
        $this->created = new \DateTime();
        $this->players = array_filter($players, function ($player) {
            if ($player instanceof RosterPlayer) {
                $player->setRoster($this);
                return true;
            }
            return false;
        });
    }

    /**
     * Get the value of team
     */ 
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set the value of team
     *
     * @return  self
     */ 
    public function setTeam(Team $team)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get the Players belonging to the Roster
     *
     * @return  RosterPlayer[]
     */ 
    public function getRosterPlayers()
    {
        return $this->players;
    }

    /**
     * Get the season the roster belongs to
     *
     * @return  int
     */ 
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Set the season the roster belongs to
     *
     * @param  int  $season  The season the roster belongs to
     *
     * @return  self
     */ 
    public function setSeason(int $season)
    {
        $this->season = $season;

        return $this;
    }
}
