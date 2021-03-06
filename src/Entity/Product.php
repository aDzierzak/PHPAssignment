<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */


class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $username;

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     */
    private $ingredients;

    /**
     * @return mixed
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * @param mixed $ingredients
     */
    public function setIngredients($ingredients): void
    {
        $this->ingredients = $ingredients;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }


    /**
     * @ORM\Column(type="string") */
    private $description;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Price", inversedBy="products") * @ORM\JoinColumn(nullable=true)
     */
    private $price;
    public function getPrice(): ?Price {
        return $this->price;
    }
    public function setPrice(Price $price = null) {
        $this->price = $price;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="products") * @ORM\JoinColumn(nullable=true)
     */
    private $category;

    public function getCategory(): ?Category {
        return $this->category;
    }
    public function setCategory(Category $category = null) {
        $this->category = $category;
    }

    /** /**
     * @ORM\OneToMany(targetEntity="App\Entity\Review", mappedBy="product")
     */
    private $reviews;

    public function __construct() {

        $this->reviews = new ArrayCollection();
    }

    public function getReviews() {
        return $this->reviews; }


    public function __toString()
    {
        return $this->id . ': ' . $this->getDescription();
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="products") * @ORM\JoinColumn(nullable=true)
     */
    private $user;
    public function getUser(): ?User {
        return $this->user; }

    public function setUser(User $user) {
        $this->user = $user; }



    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     * @Assert\File(mimeTypes={"image/jpeg", "image/gif", "image/png" })
     */
    private $brochure;

    public function getBrochure()
    {
        return $this->brochure;
    }

    public function setBrochure($brochure)
    {
        $this->brochure = $brochure;

        return $this;
    }






}


