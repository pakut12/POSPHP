<?php
class customerdetails
{
    private $user_id;
    private $user_code;
    private $user_prefix;
    private $user_firstname;
    private $user_lastname;
    private $date_create;
    // set user's first name

    public function setID($user_id)
    {
        $this->user_id = $user_id;
    }

    // get user's first name
    public function getID()
    {
        return $this->user_id;
    }

    public function setCode($user_code)
    {
        $this->user_code = $user_code;
    }

    // get user's first name
    public function getCode()
    {
        return $this->user_code;
    }

    public function setFirstname($user_firstname)
    {
        $this->user_firstname = $user_firstname;
    }
    public function getFirstname()
    {
        return $this->user_firstname;
    }


    public function setLastname($user_lastname)
    {
        $this->user_lastname = $user_lastname;
    }
    public function getLastname()
    {
        return $this->user_lastname;
    }

    public function setPrefix($user_prefix)
    {
        $this->user_prefix = $user_prefix;
    }
    public function getPrefix()
    {
        return $this->user_prefix;
    }

    public function setDate($date_create)
    {
        $this->date_create = $date_create;
    }
    public function getDate()
    {
        return $this->date_create;
    }
}
