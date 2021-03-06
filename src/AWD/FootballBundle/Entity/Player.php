<?php

namespace AWD\FootballBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AWD\FootballBundle\Utils\Football as Football;
/**
 * Player
 */
class Player
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $first_name;

    /**
     * @var string
     */
    private $last_name;

    /**
     * @var integer
     */
    private $age;

    /**
     * @var string
     */
    private $token;

    /**
     * @var boolean
     */
    private $is_penalized;

    /**
     * @var boolean
     */
    private $is_activated;

    /**
     * @var \DateTime
     */
    private $expires_at;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \AWD\FootballBundle\Entity\Team
     */
    private $team;


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
     * Set type
     *
     * @param string $type
     * @return Player
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
     //
    public static function getTypes()
    {
    	return array('center-forward' => 'Center Forward',
                                    'left-midfield' => 'Left Midfield',
                                    'center-midfield' => 'Center Midfield',
                                    'right-midfield' => 'Right Midfield',
                                    'left-back' => 'Left Back',
                                    'center-back' => 'Center Back',
                                    'right-back' => 'Right Back',
                                    'goalkeeper' => 'Goalkeeper');
    }
    //
    public static function getTypeValues()
    {
    	return array_keys(self::getTypes());
    }
	//
    /**
     * Set first_name
     *
     * @param string $firstName
     * @return Player
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
    
        return $this;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set last_name
     *
     * @param string $lastName
     * @return Player
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;
    
        return $this;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return Player
     */
    public function setAge($age)
    {
        $this->age = $age;
    
        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set token
     *
     * @param string $token
     * @return Player
     */
    public function setToken($token)
    {
        $this->token = $token;
    
        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set is_penalized
     *
     * @param boolean $isPenalized
     * @return Player
     */
    public function setIsPenalized($isPenalized)
    {
        $this->is_penalized = $isPenalized;
    
        return $this;
    }

    /**
     * Get is_penalized
     *
     * @return boolean 
     */
    public function getIsPenalized()
    {
        return $this->is_penalized;
    }

    /**
     * Set is_activated
     *
     * @param boolean $isActivated
     * @return Player
     */
    public function setIsActivated($isActivated)
    {
        $this->is_activated = $isActivated;
    
        return $this;
    }

    /**
     * Get is_activated
     *
     * @return boolean 
     */
    public function getIsActivated()
    {
        return $this->is_activated;
    }

    /**
     * Set expires_at
     *
     * @param \DateTime $expiresAt
     * @return Player
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
     * @return Player
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
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Player
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set team
     *
     * @param \AWD\FootballBundle\Entity\Team $team
     * @return Player
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
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        $this->updated_at = new \DateTime();
    }
    //
    public function setTokenValue()
    {
      if(!$this->getToken())
      {
        $this->token = sha1($this->getFirstName().rand(11111, 99999));
      }
    }
    // ...
    public function getFirstNameSlug()
    {
        return Football::slugify($this->getFirstName());
    }
 
    public function getLastNameSlug()
    {
        return Football::slugify($this->getLastName());
    }
    //
    static public function getLuceneIndex()
    {
        if (file_exists($index = self::getLuceneIndexFile())) {
            return \Zend_Search_Lucene::open($index);
        }
 
        return \Zend_Search_Lucene::create($index);
    }
 
    static public function getLuceneIndexFile()
    {
        return __DIR__.'/../../../../web/data/player.index';
    }
    //

    /**
     * @ORM\PrePersist
     */
    public function updateLuceneIndex()
    {
        $index = self::getLuceneIndex();
 
        // remove existing entries
        foreach ($index->find('pk:'.$this->getId()) as $hit)
        {
          $index->delete($hit->id);
        }
 
        // don't index expired and non-activated jobs
        if ($this->isExpired() || !$this->getIsActivated())
        {
          return;
        }
 
        $doc = new \Zend_Search_Lucene_Document();
 
        // store job primary key to identify it in the search results
        $doc->addField(\Zend_Search_Lucene_Field::Keyword('pk', $this->getId()));
 
        // index job fields
        $doc->addField(\Zend_Search_Lucene_Field::UnStored('first_name', $this->getPosition(), 'utf-8'));
        $doc->addField(\Zend_Search_Lucene_Field::UnStored('last_name', $this->getCompany(), 'utf-8'));
        $doc->addField(\Zend_Search_Lucene_Field::UnStored('type', $this->getLocation(), 'utf-8'));
        
 
        // add job to the index
        $index->addDocument($doc);
        $index->commit();
    }

    /**
     * @ORM\PostRemove
     */
    public function deleteLuceneIndex()
    {
        $index = self::getLuceneIndex();
 
        foreach ($index->find('pk:'.$this->getId()) as $hit) {
            $index->delete($hit->id);
        }
    }
}