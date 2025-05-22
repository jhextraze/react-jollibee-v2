<?php

class Category
{
    public $food_category_aid;
    public $food_category_is_active;
    public $food_category_image;
    public $food_category_name;
    public $food_category_datetime;
    public $food_category_created;

    public $connection;
    public $lastInsertedId;
    public $food_category_start;
    public $food_category_total;
    public $food_category_search;

    public $tblCategory;

    public function __construct($db)
    {
        $this->connection = $db;
        $this->tblCategory = "food_category";
    }

      public function readAll()
      {
        try {
          $sql = "select * from {$this->tblCategory} ";
          $sql .= "order by food_category_is_active desc, ";
          $sql .= "food_category_aid asc ";
          $query = $this->connection->query($sql);
        } catch (PDOException $ex) {
          $query = false;
        }
        return $query;
      }

      public function readLimit()
      {
        try {
           $sql = "select * from {$this->tblCategory} ";
          $sql .= "order by food_category_is_active desc, ";
          $sql .= "food_category_aid asc ";
          $sql .= "limit :start, ";
          $sql .= ":total ";
          $query = $this->connection->prepare($sql);
          $query->execute([
              "start" => $this->food_category_start - 1,
              "total" => $this->food_category_total,
          ]);
      } catch (PDOException $ex) {
          $query = false;
      }
      return $query;
  }
      public function readById()
      {
          try {
              $sql = "select * from {$this->tblCategory} ";
              $sql .= "where food_category_aid = :food_category_aid ";
              $query = $this->connection->prepare($sql);
              $query->execute([
                  "food_category_aid" => $this->food_category_aid,
              ]);
          } catch (PDOException $ex) {
              $query = false;
          }
          return $query;
      }

      public function create()
  {
    try {
      $sql = "insert into {$this->tblCategory} ";
      $sql .= "(food_category_is_active, ";
      // $sql .= "food_category_image, ";
      $sql .= "food_category_name, ";
      $sql .= "food_category_created, ";
      $sql .= "food_category_datetime ) values ( ";
      $sql .= ":food_category_is_active, ";
      // $sql .= ":food_category_image, ";
      $sql .= ":food_category_name, ";
      $sql .= ":food_category_created, ";
      $sql .= ":food_category_datetime ) ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "food_category_is_active" => $this->food_category_is_active,
        // "food_category_image" => $this->food_category_image,
        "food_category_name" => $this->food_category_name,
        "food_category_datetime" => $this->food_category_datetime,
        "food_category_created" => $this->food_category_created,

      ]);
      $this->lastInsertedId = $this->connection->lastInsertId();
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function checkName()
  {
    try {
      $sql = "select other_name from {$this->tblOther} ";
      $sql .= "where other_name = :other_name ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "other_name" => "{$this->other_name}",
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function update()
  {
    try {
      $sql = "update {$this->tblCategory} set ";
      $sql .= "food_category_image = :food_category_image, ";
      $sql .= "food_category_name = :food_category_name, ";
      $sql .= "food_category_datetime = :food_category_datetime ";
      $sql .= "where food_category_aid  = :food_category_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "food_category_image" => $this->food_category_image,
        "food_category_name" => $this->food_category_name,
        "food_category_datetime" => $this->food_category_datetime,
        "food_category_aid" => $this->food_category_aid
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function delete()
  {
    try {
      $sql = "delete from {$this->tblCategory} ";
      $sql .= "where food_category_aid = :food_category_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "food_category_aid" => $this->food_category_aid,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function active()
    {
    try {
    $sql = "update {$this->tblCategory} set ";
    $sql .= "food_category_is_active = :food_category_is_active, ";
    $sql .= "food_category_datetime = :food_category_datetime ";
    $sql .= "where food_category_aid  = :food_category_aid ";
    $query = $this->connection->prepare($sql);
    $query->execute([
    "food_category_is_active" => $this->food_category_is_active,
    "food_category_datetime" => $this->food_category_datetime,
    "food_category_aid" => $this->food_category_aid,
    ]);
    } catch (PDOException $ex) {
    $query = false;
    }
    return $query;
  }
}

