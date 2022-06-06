<?php

class Product
{
    private int $id;
    private string $name;
    private int $price;
    private int $quantity_available;
    private string $brand;
    private string $type_label;
    private string $composition;
    private string $gender;
    private string $color;
    private string $made;
    private ?int $age;
    private string $image_path;

    /**
     * @param int $id
     * @param string $name
     * @param int $price
     * @param int $quantity_available
     * @param string $brand
     * @param string $type_label
     * @param string $composition
     * @param string $gender
     * @param string $color
     * @param string $made
     * @param int|null $age
     * @param string $image_path
     */
    public function __construct(int $id, string $name, int $price, int $quantity_available, string $brand, string $type_label, string $composition, string $gender, string $color, string $made, ?int $age, string $image_path)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity_available = $quantity_available;
        $this->brand = $brand;
        $this->type_label = $type_label;
        $this->composition = $composition;
        $this->gender = $gender;
        $this->color = $color;
        $this->made = $made;
        $this->age = $age;
        $this->image_path = $image_path;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getQuantityAvailable(): int
    {
        return $this->quantity_available;
    }

    /**
     * @param int $quantity_available
     */
    public function setQuantityAvailable(int $quantity_available): void
    {
        $this->quantity_available = $quantity_available;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return string
     */
    public function getTypeLabel(): string
    {
        return $this->type_label;
    }

    /**
     * @param string $type_label
     */
    public function setTypeLabel(string $type_label): void
    {
        $this->type_label = $type_label;
    }

    /**
     * @return string
     */
    public function getComposition(): string
    {
        return $this->composition;
    }

    /**
     * @param string $composition
     */
    public function setComposition(string $composition): void
    {
        $this->composition = $composition;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getMade(): string
    {
        return $this->made;
    }

    /**
     * @param string $made
     */
    public function setMade(string $made): void
    {
        $this->made = $made;
    }

    /**
     * @return int|null
     */
    public function getAge(): ?int
    {
        return $this->age;
    }

    /**
     * @param int|null $age
     */
    public function setAge(?int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getImagePath(): string
    {
        return $this->image_path;
    }

    /**
     * @param string $image_path
     */
    public function setImagePath(string $image_path): void
    {
        $this->image_path = $image_path;
    }



}