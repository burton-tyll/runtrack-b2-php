<?php
require_once ('Database.php');
Class Grade extends Database {
    private ?int $id;
    private ?int $room_id;
    private ?string $name;
    private ?string $year;

    public function __construct(
        int $id = null,
        int $room_id = null,
        string $name = null,
        string $year = null,
    ) {
        $this->id = $id;
        $this->room_id = $room_id;
        $this->name = $name;
        $this->year = $year;
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

    public function getRoomId(): int
    {
        return $this->room_id;
    }

    public function setRoomId(int $room_id): static
    {
        $this->room_id = $room_id;

        return $this;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function setYear(string $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getStudents(): array{
        $query = "SELECT * FROM student WHERE grade_id = :grade_id";
        $stmt = $this->bdd->prepare($query);
        $stmt->execute([":grade_id" => $this->id]);

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
}