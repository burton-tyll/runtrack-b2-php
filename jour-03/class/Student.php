<?php

Class Student {

    private $id;
    private $grade;
    private $email;
    private $fullname;
    private $birthdate;
    private $gender;

    public function __construct(
        int $id = null,
        int $grade = null,
        string $email = null,
        string $fullname = null,
        string $birthdate = null,
        string $gender = null
    ) {
        $this->id = $id;
        $this->grade = $grade;
        $this->email = $email;
        $this->fullname = $fullname;
        $this->birthdate = $birthdate ? new \DateTime($birthdate) : null;
        $this->gender = $gender;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getGrade(): int
    {
        return $this->grade;
    }

    public function setGrade(int $grade): static
    {
        $this->grade = $grade;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getFullname(): string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): static
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getBirthdate(): DateTime
    {
        return $this->birthdate;
    }

    public function setBirthdate(string $birthdate): static
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function setGender(string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

}