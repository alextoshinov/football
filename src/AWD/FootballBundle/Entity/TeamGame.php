<?php

namespace AWD\FootballBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TeamGame
 */
class TeamGame
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AWD\FootballBundle\Entity\Team
     */
    private $team;

    /**
     * @var \AWD\FootballBundle\Entity\Game
     */
    private $game;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set team
     *
     * @param \AWD\FootballBundle\Entity\Team $team
     * @return TeamGame
     */
    public function setTeam(\AWD\FootballBundle\Entity\Team $team = null)
    {
        $this->team = $team;
    
        return $this;
    }

    /**
     * Get team
     *
     * @return \AWD\FootballBundle\Entity\Team 
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set game
     *
     * @param \AWD\FootballBundle\Entity\Game $game
     * @return TeamGame
     */
    public function setGame(\AWD\FootballBundle\Entity\Game $game = null)
    {
        $this->game = $game;
    
        return $this;
    }

    /**
     * Get game
     *
     * @return \AWD\FootballBundle\Entity\Game 
     */
    public function getGame()
    {
        return $this->game;
    }
}