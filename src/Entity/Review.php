<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReviewRepository")
 */
class Review
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $rating;

    /**
     * @ORM\Column(type="float")
     */
    private $pricePaid;

    /**
     * @return mixed
     */
    public function getPricePaid()
    {
        return $this->pricePaid;
    }

    /**
     * @param mixed $pricePaid
     */
    public function setPricePaid($pricePaid): void
    {
        $this->pricePaid = $pricePaid;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $username;

    /**
     * @ORM\Column(type="string")
     */
    private $placePurchased;

    /**
     * @return mixed
     */
    public function getPlacePurchased()
    {
        return $this->placePurchased;
    }

    /**
     * @param mixed $placePurchased
     */
    public function setPlacePurchased($placePurchased): void
    {
        $this->placePurchased = $placePurchased;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $description;


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
    public function setDescription($description): void
    {
        $this->description = $description;
    }


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
    public function setId($id): void
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating): void
    {
        $this->rating = $rating;
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
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="reviews") * @ORM\JoinColumn(nullable=true)
     */
    private $user;
    public function getUser(): ?User {
        return $this->user; }

    public function setUser(User $user) {
        $this->user = $user; }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="reviews") * @ORM\JoinColumn(nullable=true)
     */
    private $product;
    public function getProduct(): ?Product {
        return $this->product; }

    public function setProduct(Product $product) {
        $this->product = $product; }
    // add your own fields
}
