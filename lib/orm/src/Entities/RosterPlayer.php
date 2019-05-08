<?php
namespace Phooty\Orm\Entities;

use Phooty\Orm\Support\Traits\HasUuid;
use Phooty\Orm\Support\Traits\WasCreatedOn;

/**
 * @Entity @Table(name="roster_players")
 */
class RosterPlayer
{
    use HasUuid, WasCreatedOn;

    /**
     * The Player entity
     *
     * ManyToOne(targetEntity="Player", inversedBy="rosters")
     * @var Player
     */
    protected $player;

    /**
     * The Roster the player belongs to
     *
     * @ManyToOne(targetEntity="Roster", inversedBy="players")
     * @var Roster
     */
    protected $roster;

    /**
     * The RosterPlayer's season stats
     *
     * @OneToOne(targetEntity="SeasonStats")
     * @JoinColumn(name="season_stats_id", referencedColumnName="id")
     * @var SeasonStats
     */
    protected $season_stats;

    public function __construct()
    {
        $this->created = new \DateTime();
    }

    /**
     * Get the Player entity
     *
     * @return  Player
     */ 
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * Set the Player entity
     *
     * @param  Player  $player  The Player entity
     *
     * @return  self
     */ 
    public function setPlayer(Player $player)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get the Roster the player belongs to
     *
     * @return  Roster
     */ 
    public function getRoster()
    {
        return $this->roster;
    }

    /**
     * Set the Roster the player belongs to
     *
     * @param  Roster  $roster  The Roster the player belongs to
     *
     * @return  self
     */ 
    public function setRoster(Roster $roster)
    {
        $this->roster = $roster;

        return $this;
    }
}
