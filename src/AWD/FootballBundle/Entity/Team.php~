<?php

namespace AWD\FootballBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 */
class Team
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $players;
    //
    private $team_games;
    //
    private $games;
    //
    private $active_players;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->players = new \Doctrine\Common\Collections\ArrayCollection();
        $this->games = new \Doctrine\Common\Collections\ArrayCollection();
    }
    //
    public function setActivePlayers($players)
    {
      $this->active_players = $players;
    }
    //
    public function getActivePlayers()
    {
      return $this->active_players;
    }
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
     * Set name
     *
     * @param string $name
     * @return Team
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add players
     *
     * @param \AWD\FootballBundle\Entity\Player $players
     * @return Team
     */
    public function addPlayer(\AWD\FootballBundle\Entity\Player $players)
    {
        $this->players[] = $players;
    
        return $this;
    }

    /**
     * Remove players
     *
     * @param \AWD\FootballBundle\Entity\Player $players
     */
    public function removePlayer(\AWD\FootballBundle\Entity\Player $players)
    {
        $this->players->removeElement($players);
    }

    /**
     * Get players
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlayers()
    {
        return $this->players;
    }
    //
    public function __toString()
    {
      return $this->getName();
    }
   
    //

    /**
     * Add team_games
     *
     * @param \AWD\FootballBundle\Entity\TeamGame $teamGames
     * @return Team
     */
    public function addTeamGame(\AWD\FootballBundle\Entity\TeamGame $teamGames)
    {
        $this->team_games[] = $teamGames;
    
        return $this;
    }

    /**
     * Remove team_games
     *
     * @param \AWD\FootballBundle\Entity\TeamGame $teamGames
     */
    public function removeTeamGame(\AWD\FootballBundle\Entity\TeamGame $teamGames)
    {
        $this->team_games->removeElement($teamGames);
    }

    /**
     * Get team_games
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeamGames()
    {
        return $this->team_games;
    }
}