<?php
require_once __DIR__.'/../models/Opinion.php';
require_once __DIR__.'/../models/User.php';

class OpinionUser
{
    private $opinion;
    private $user;

    public function __construct(Opinion $opinion, User $user)
    {
        $this->opinion = $opinion;
        $this->user = $user;
    }


    public function getOpinion()
    {
        return $this->opinion;
    }


    public function setOpinion(Opinion $opinion): void
    {
        $this->opinion = $opinion;
    }


    public function getUser()
    {
        return $this->user;
    }


    public function setUser(User $user): void
    {
        $this->user = $user;
    }


}