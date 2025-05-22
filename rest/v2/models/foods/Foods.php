<?php

class Foods
{
    public $food_item_aid;
    public $food_item_is_active;
    public $food_item_price;
    public $food_item_name;
    public $food_item_datetime;
    public $food_item_created;
    public $food_item_food_category_id;

    public $food_category_aid;
    public $food_category_is_active;
    public $food_category_image;
    public $food_category_name;
    public $food_category_datetime;
    public $food_category_created;

    public $connection;
    public $lastInsertedId;
    public $food_item_start;
    public $food_item_total;
    public $food_item_search;

    public $tblFoods;
    public $tblCategory;

    public function __construct($db)
    {
        $this->connection = $db;
        $this->tblFoods = "food_item";
        $this->tblCategory = "food_category";
    }

      public function readAll()
      {
        try {
          $sql = "select * ";
          $sql = "from {$this->tblFoods} as pagkain,  ";
          $sql = " {$this->tblCategory} as categ ";
          $sql .= "where categ.food_category_aid = pagkain.food_item_food_category_id ";
          $sql .= "order by pagkain.food_item_is_active desc, ";
          $sql .= "pagkain.food_item_aid asc ";
          $query = $this->connection->query($sql);
        } catch (PDOException $ex) {
          $query = false;
        }
        return $query;
      }

      public function readLimit()
      {
        try {
          $sql = "select * ";
          $sql = "from {$this->tblFoods} as pagkain,  ";
          $sql = " {$this->tblCategory} as categ ";
          $sql .= "where categ.food_category_aid = pagkain.food_item_food_category_id ";
          $sql .= "order by pagkain.food_item_is_active desc, ";
          $sql .= "pagkain.food_item_aid asc ";
          $sql .= "limit :start, ";
          $sql .= ":total ";
          $query = $this->connection->prepare($sql);
          $query->execute([
              "start" => $this->food_item_start - 1,
              "total" => $this->food_item_total,
          ]);
      } catch (PDOException $ex) {
          $query = false;
      }
      return $query;
  }
      public function readById()
      {
          try {
              $sql = "select * from {$this->tblFoods} ";
              $sql .= "where food_item_aid = :food_item_aid ";
              $query = $this->connection->prepare($sql);
              $query->execute([
                  "food_item_aid" => $this->food_item_aid,
              ]);
          } catch (PDOException $ex) {
              $query = false;
          }
          return $query;
      }

      public function create()
  {
    try {
      $sql = "insert into {$this->tblFoods} ";
      $sql .= "(food_item_is_active, ";
      // $sql .= "food_item_image, ";
      $sql .= "food_item_name, ";
      $sql .= "food_item_created, ";
      $sql .= "food_item_datetime ) values ( ";
      $sql .= ":food_item_is_active, ";
      // $sql .= ":food_item_image, ";
      $sql .= ":food_item_name, ";
      $sql .= ":food_item_created, ";
      $sql .= ":food_item_datetime ) ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "food_item_is_active" => $this->food_item_is_active,
        // "food_item_image" => $this->food_item_image,
        "food_item_name" => $this->food_item_name,
        "food_item_datetime" => $this->food_item_datetime,
        "food_item_created" => $this->food_item_created,

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
      $sql = "update {$this->tblFoods} set ";
      $sql .= "food_item_image = :food_item_image, ";
      $sql .= "food_item_name = :food_item_name, ";
      $sql .= "food_item_datetime = :food_item_datetime ";
      $sql .= "where food_item_aid  = :food_item_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "food_item_image" => $this->food_item_image,
        "food_item_name" => $this->food_item_name,
        "food_item_datetime" => $this->food_item_datetime,
        "food_item_aid" => $this->food_item_aid
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function delete()
  {
    try {
      $sql = "delete from {$this->tblFoods} ";
      $sql .= "where food_item_aid = :food_item_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "food_item_aid" => $this->food_item_aid,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function active()
    {
    try {
    $sql = "update {$this->tblFoods} set ";
    $sql .= "food_item_is_active = :food_item_is_active, ";
    $sql .= "food_item_datetime = :food_item_datetime ";
    $sql .= "where food_item_aid  = :food_item_aid ";
    $query = $this->connection->prepare($sql);
    $query->execute([
    "food_item_is_active" => $this->food_item_is_active,
    "food_item_datetime" => $this->food_item_datetime,
    "food_item_aid" => $this->food_item_aid,
    ]);
    } catch (PDOException $ex) {
    $query = false;
    }
    return $query;
  }
}

