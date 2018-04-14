<?php
/**
 * Created by PhpStorm.
 * User: Agata
 * Date: 14/04/2018
 * Time: 20:39
 */

namespace App\Entity;


class Admin
{
    private $user;

    public function getUser(): ?User {
        return $this->user; }

    public function setUser(User $user) {
        $this->user = $user; }
}