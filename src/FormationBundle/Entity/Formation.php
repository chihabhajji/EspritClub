<?php
namespace FormationBundle\Entity;

use ClubBundle\Entity\Club as Club;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="formations")
 */
class Formation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $ref;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;
    /**
     * @ORM\Column(type="datetime")
     */
    private $datedebut;
    /**
     * @ORM\Column(type="datetime")
     */
    private $datefin;
    /**
     * @ORM\Column(type="integer")
     */
    private $nbrParticipant;
    /**
     * @ORM\ManyToOne(targetEntity="ClubBundle\Entity\Club",inversedBy="formations")
     * @ORM\JoinColumn(name="clubs",referencedColumnName="id")
     *
     */
    private $club;

    /**
     * Formation constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param mixed $ref
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->Titre;
    }

    /**
     * @param mixed $Titre
     */
    public function setTitre($Titre)
    {
        $this->Titre = $Titre;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * @param mixed $datedebut
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;
    }

    /**
     * @return mixed
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * @param mixed $datefin
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    }

    /**
     * @return mixed
     */
    public function getNbrParticipant()
    {
        return $this->nbrParticipant;
    }

    /**
     * @param mixed $nbrParticipant
     */
    public function setNbrParticipant($nbrParticipant)
    {
        $this->nbrParticipant = $nbrParticipant;
    }

    /**
     * @return mixed
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * @param mixed $club
     */
    public function setClub($club)
    {
        $this->clubs = $club;
    }

}