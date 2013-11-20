<?php

// src/AWD/FootbalBundle/DataFixtures/ORM/LoadTeamData.php
namespace AWD\FootbalBundle\DataFixtures\ORM;
 
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AWD\FootballBundle\Entity\Team;
 
class LoadTeamData extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $em)
  {
    //1
    $levski = new Team();
    $levski->setName('ФК Левски');
    //2
    $cska = new Team();
    $cska->setName('ЦСКА');
    //3
    $mu = new Team();
    $mu->setName('Manchester United');
     //4
    $barcelona = new Team();
    $barcelona->setName('Barcelona');
    //5
    $milan = new Team();
    $milan->setName('Milan');
    //6
    $paris = new Team();
    $paris->setName('Paris Saint-Germain');
    
    $em->persist($levski);
    $em->persist($cska);
    $em->persist($mu);
    $em->persist($barcelona);
    $em->persist($milan);
    $em->persist($paris);
    
    $em->flush();
 
    $this->addReference('team-levski', $levski);
    $this->addReference('team-cska', $cska);
    $this->addReference('team-mu', $mu);
    $this->addReference('team-barcelona', $barcelona);
    $this->addReference('team-milan', $milan);
    $this->addReference('team-paris', $paris);
  }
 
  public function getOrder()
  {
    return 1; // the order in which fixtures will be loaded
  }


}

