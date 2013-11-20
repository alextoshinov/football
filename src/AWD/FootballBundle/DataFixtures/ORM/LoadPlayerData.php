<?php
// src/AWD/FootballBundle/DataFixtures/ORM/LoadPlayerData.php
namespace AWD\FootballBundle\DataFixtures\ORM;
 
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AWD\FootballBundle\Entity\Player;
 
class LoadPlayerData extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $em)
  {
            for($i = 1; $i <= 10; $i++)
           {
                 $player_levski = new Player();
                 $player_levski->setTeam($em->merge($this->getReference('team-levski')));
                 $player_levski->setType('center-forward');
                 $player_levski->setFirstName('Georgi_'.$i);
                 $player_levski->setLastName('Georgiev_'.$i);
                 $player_levski->setAge(12);
                 $player_levski->setIsPenalized(false);
                 $player_levski->setIsActivated(true);
                 $player_levski->setToken('fk_levski_'.$i);
                 $player_levski->setExpiresAt(new \DateTime('2014-10-10'));
                 //
                 $em->persist($player_levski);
           }
           //
           for($i = 1; $i <= 10; $i++)
           {
             $player_cska = new Player();
             $player_cska->setTeam($em->merge($this->getReference('team-cska')));
             $player_cska->setType('center-forward');
             $player_cska->setFirstName('Luboslav_'.$i);
             $player_cska->setLastName('Penev_'.$i);
             $player_cska->setAge(13);
             $player_cska->setIsPenalized(false);
             $player_cska->setIsActivated(true);
             $player_cska->setToken('fk_cska_'.$i);
             $player_cska->setExpiresAt(new \DateTime('2015-10-10'));
             //
             $em->persist($player_cska);
           }
           //
           for($i = 1; $i <= 10; $i++)
           {
             $player_mu = new Player();
             $player_mu->setTeam($em->merge($this->getReference('team-mu')));
             $player_mu->setType('center-forward');
             $player_mu->setFirstName('Dimitar_'.$i);
             $player_mu->setLastName('Berbatov_'.$i);
             $player_mu->setAge(15);
             $player_mu->setIsPenalized(false);
             $player_mu->setIsActivated(true);
             $player_mu->setToken('fk_mu_'.$i);
             $player_mu->setExpiresAt(new \DateTime('2015-10-10'));
               //
             $em->persist($player_mu);
           }
             $player_barcelona = new Player();
             $player_barcelona->setTeam($em->merge($this->getReference('team-barcelona')));
             $player_barcelona->setType('right-half');
             $player_barcelona->setFirstName('Leo');
             $player_barcelona->setLastName('Massi');
             $player_barcelona->setAge(13);
             $player_barcelona->setIsPenalized(false);
             $player_barcelona->setIsActivated(true);
             $player_barcelona->setToken('fk_barcelona_1');
             $player_barcelona->setExpiresAt(new \DateTime('2014-10-10'));

             $player_milan = new Player();
             $player_milan->setTeam($em->merge($this->getReference('team-milan')));
             $player_milan->setType('striker');
             $player_milan->setFirstName('Antonio');
             $player_milan->setLastName('Mucherino');
             $player_milan->setAge(13);
             $player_milan->setIsPenalized(false);
             $player_milan->setIsActivated(true);
             $player_milan->setToken('fk_milan_1');
             $player_milan->setExpiresAt(new \DateTime('2015-10-10'));

             $player_paris = new Player();
             $player_paris->setTeam($em->merge($this->getReference('team-paris')));
             $player_paris->setType('striker');
             $player_paris->setFirstName('Conte');
             $player_paris->setLastName('Antoine');
             $player_paris->setAge(14);
             $player_paris->setIsPenalized(false);
             $player_paris->setIsActivated(true);
             $player_paris->setToken('fk_paris_1');
             $player_paris->setExpiresAt(new \DateTime('2014-07-10'));


             
             
             $em->persist($player_barcelona);
             $em->persist($player_milan);
             $em->persist($player_paris);
 
    $em->flush();
  }
 
  public function getOrder()
  {
    return 6; // the order in which fixtures will be loaded
  }
}

