<?php


namespace App\Http\Controllers;


class Tutor
{
    public $firstName;
    public $lastName;
    public $userName;
    public $email;
    public $password;
    public $uid;
    public $courses;
    public $availableFrom;
    public $availableUpto;
    public $location;
    public $rating;

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
    public function getAvailableFrom()
    {
        return $this->availableFrom;
    }

    /**
     * @param mixed $availableFrom
     */
    public function setAvailableFrom($availableFrom): void
    {
        $this->availableFrom = $availableFrom;
    }

    /**
     * @return mixed
     */
    public function getAvailableUpto()
    {
        return $this->availableUpto;
    }

    /**
     * @param mixed $availableUpto
     */
    public function setAvailableUpto($availableUpto): void
    {
        $this->availableUpto= $availableUpto;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location): void
    {
        $this->location = $location;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getCourses() {
        return $this->courses;
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

    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param mixed $uid
     */
    public function setUid($uid): void
    {
        $this->uid = $uid;
    }

    public function setCourses($courses) {
        $this->courses = $courses;
    }

    /**
     * @return mixed availability
     */
    public function getAvailability()
    {
        if($this->availableFrom != null && $this->availableUpto != null) {
            return "$this->availableFrom to $this->availableUpto";
        }

        if($this->availableFrom != null) {
            return $this->availableFrom;
        }

        if($this->availableUpto != null) {
            return $this->availableUpto;
        }

        return "";
    }
}