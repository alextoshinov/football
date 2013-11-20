<?php

namespace AWD\FootballBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 */
class Game
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $team_one_id;

    /**
     * @var integer
     */
    private $team_two_id;

    /**
     * @var integer
     */
    private $winner_id;

    /**
     * @var integer
     */
    private $team_one_score;

    /**
     * @var integer
     */
    private $team_two_score;

    /**
     * @var \DateTime
     */
    private $expires_at;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $team_games;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->team_games = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set team_one_id
     *
     * @param integer $teamOneId
     * @return Game
     */
    public function setTeamOneId($teamOneId)
    {
        $this->team_one_id = $teamOneId;
    
        return $this;
    }

    /**
     * Get team_one_id
     *
     * @return integer 
     */
    public function getTeamOneId()
    {
        return $this->team_one_id;
    }

    /**
     * Set team_two_id
     *
     * @param integer $teamTwoId
     * @return Game
     */
    public function setTeamTwoId($teamTwoId)
    {
        $this->team_two_id = $teamTwoId;
    
        return $this;
    }

    /**
     * Get team_two_id
     *
     * @return integer 
     */
    public function getTeamTwoId()
    {
        return $this->team_two_id;
    }

    /**
     * Set winner_id
     *
     * @param integer $winnerId
     * @return Game
     */
    public function setWinnerId($winnerId)
    {
        $this->winner_id = $winnerId;
    
        return $this;
    }

    /**
     * Get winner_id
     *
     * @return integer 
     */
    public function getWinnerId()
    {
        return $this->winner_id;
    }

    /**
     * Set team_one_score
     *
     * @param integer $teamOneScore
     * @return Game
     */
    public function setTeamOneScore($teamOneScore)
    {
        $this->team_one_score = $teamOneScore;
    
        return $this;
    }

    /**
     * Get team_one_score
     *
     * @return integer 
     */
    public function getTeamOneScore()
    {
        return $this->team_one_score;
    }

    /**
     * Set team_two_score
     *
     * @param integer $teamTwoScore
     * @return Game
     */
    public function setTeamTwoScore($teamTwoScore)
    {
        $this->team_two_score = $teamTwoScore;
    
        return $this;
    }

    /**
     * Get team_two_score
     *
     * @return integer 
     */
    public function getTeamTwoScore()
    {
        return $this->team_two_score;
    }

    /**
     * Set expires_at
     *
     * @param \DateTime $expiresAt
     * @return Game
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expires_at = $expiresAt;
    
        return $this;
    }

    /**
     * Get expires_at
     *
     * @return \DateTime 
     */
    public function getExpiresAt()
    {
        return $this->expires_at;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Game
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Add team_games
     *
     * @param \AWD\FootballBundle\Entity\TeamGame $teamGames
     * @return Game
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
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
         if(!$this->getCreatedAt())
      {
        $this->created_at = new \DateTime();
      }
    }

    /**
     * @ORM\PrePersist
     */
    public function setExpiresAtValue()
    {
        if(!$this->getExpiresAt())
        {
          $now = $this->getCreatedAt() ? $this->getCreatedAt()->format('U') : time();
          $this->expires_at = new \DateTime(date('Y-m-d H:i:s', $now + 5400)); //1,5 h
        }
    }
    //
    
    //
}
