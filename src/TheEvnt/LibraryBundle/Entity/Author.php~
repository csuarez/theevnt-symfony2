<?php

namespace TheEvnt\LibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="author")
 */
class Author {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string", length=140)
	 */
	protected $name;

    /**
     * @ORM\OneToMany(targetEntity="Book", mappedBy="author")
     */
    protected $books;

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
     */
    public function setName($name)
    {
        $this->name = $name;
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
    public function __construct()
    {
        $this->books = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add books
     *
     * @param TheEvnt\LibraryBundle\Entity\Book $books
     */
    public function addBook(\TheEvnt\LibraryBundle\Entity\Book $books)
    {
        $this->books[] = $books;
    }

    /**
     * Get books
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getBooks()
    {
        return $this->books;
    }
}