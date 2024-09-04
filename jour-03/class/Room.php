<?php

require_once('Database.php');

Class Room extends Database {
    private $id;
    private $floor_id;
    private $name;
    private $capacity;

    public function __construct(
        int $id = null,
        int $floor_id = null,
        string $name = null,
        int $capacity = null
    ) {
        $this->id = $id;
        $this->floor_id = $floor_id;
        $this->name = $name;
        $this->capacity = $capacity;
        parent::__construct();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFloorId(): int
    {
        return $this->floor_id;
    }

    public function setFloorId(int $floor_id): static
    {
        $this->floor_id = $floor_id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): static
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getGrades(): array{
        $query = "SELECT * FROM grade WHERE room_id = :room_id";
        $stmt = $this->bdd->prepare($query);
        $stmt->execute([":room_id" => $this->id]);

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

}