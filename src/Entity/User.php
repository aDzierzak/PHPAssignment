<?php
/**
 * Created by PhpStorm.
 * User: Agata
 * Date: 05/03/2018
 * Time: 10:46
 */

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="app_users")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable {

    /**
     * @ORM\Column(type="integer") * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true) */
    private $username;

    /**
     * @ORM\Column(type="string", length=64) */
    private $password;

    /**
     * @ORM\Column(type="json_array") */
    private $roles = [];


    public function getSalt() {
        // no salt needed since we are using bcrypt
        return null;
    }
    public function eraseCredentials() {
    }

    /** @see \Serializable::serialize() */
    public function serialize(){
        return serialize(array( $this->id,
            $this->username,
            $this->password, ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized) {
        list ( $this->id,
            $this->username,
            $this->password,
            ) = unserialize($serialized);
    }

    public function getRoles() {

        $roles = $this->roles;
        // ensure always contains ROLE_USER $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function setRoles($roles) {
        $this->roles = $roles;
        return $this;
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
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /** /**
     * @ORM\OneToMany(targetEntity="App\Entity\Review", mappedBy="user")
     */
    private $reviews;

    public function __construct() {

        $this->reviews = new ArrayCollection();
        $this->products = new ArrayCollection();
    }

    public function getReviews() {
        return $this->reviews;
    }

    /** /**
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="user")
     */
    private $products;


    public function getProducts() {
        return $this->products;
    }



}