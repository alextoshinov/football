<?php

namespace AWD\FootballBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * GameRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GameRepository extends EntityRepository
{
    public function AllGames() {
        $query = $this->getEntityManager()->createQuery(
        'SELECT g FROM AWDFootballBundle:Game g');
        return $query->getResult();        
    }
    //
    public function AllWinners() {
        $query = $this->getEntityManager()->createQuery(
        'SELECT g FROM AWDFootballBundle:Game g WHERE g.winner_id  IS NOT NULL');
        return $query->getResult();        
    }
    //
    public function getTeamNameOne() {
        $query = $this->getEntityManager()->createQuery(
        'SELECT g FROM AWDFootballBundle:Game g LEFT JOIN g.teams t'
      );

      return $query->getResult();
    }
}