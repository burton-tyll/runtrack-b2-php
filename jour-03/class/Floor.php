<?php

require_once ('Database.php');

Class Floor extends Database {
    private ?int $id;
    private ?string $name;
    private ?int $level;

    public function __construct(
        ?int $id = null,
        ?string $name = null,
        ?int $level = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->level = $level;
        parent::__construct();
    }

    public function getId(): int
    {
        return $this->id;
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

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getRooms(): Array
    {
        $query = "SELECT * FROM room WHERE floor_id = :floor_id";
        $stmt = $this->bdd->prepare($query);
        $stmt->execute([":floor_id" => $this->id]);

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

}