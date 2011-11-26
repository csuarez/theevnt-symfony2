<?php

namespace TheEvnt\LibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="category")
 */
class Category {
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
     * @ORM\ManyToMany(targetEntity="Book", mappedBy="categories")
     */
    private $books;

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