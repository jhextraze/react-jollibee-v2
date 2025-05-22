<?php

class Branches
{
    public $branch_aid;
    public $branch_is_active;
    public $branch_name;
    public $branch_datetime;
    public $branch_created;

    public $connection;
    public $lastInsertedId;
    public $branch_start;
    public $branch_total;
    public $branch_search;

    public $tblBranches;

    public function __construct($db)
    {
        $this->connection = $db;
        $this->tblBranches = "branches";
    }

      public function readAll()
      {
        try {
          $sql = "select * from {$this->tblBranches} ";
          $sql .= "order by branch_is_active desc, ";
          $sql .= "branch_aid asc ";
          $query = $this->connection->query($sql);
        } catch (PDOException $ex) {
          $query = false;
        }
        return $query;
      }

      public function readLimit()
      {
        try {
           $sql = "select * from {$this->tblBranches} ";
          $sql .= "order by branch_is_active desc, ";
          $sql .= "branch_aid asc ";
          $sql .= "limit :start, ";
          $sql .= ":total ";
          $query = $this->connection->prepare($sql);
          $query->execute([
              "start" => $this->branch_start - 1,
              "total" => $this->branch_total,
          ]);
      } catch (PDOException $ex) {
          $query = false;
      }
      return $query;
  }
      public function readById()
      {
          try {
              $sql = "select * from {$this->tblBranches} ";
              $sql .= "where branch_aid = :branch_aid ";
              $query = $this->connection->prepare($sql);
              $query->execute([
                  "branch_aid" => $this->branch_aid,
              ]);
          } catch (PDOException $ex) {
              $query = false;
          }
          return $query;
      }

      public function create()
  {
    try {
      $sql = "insert into {$this->tblBranches} ";
      $sql .= "(branch_is_active, ";
      // $sql .= "branch_image, ";
      $sql .= "branch_name, ";
      $sql .= "branch_created, ";
      $sql .= "branch_datetime ) values ( ";
      $sql .= ":branch_is_active, ";
      // $sql .= ":branch_image, ";
      $sql .= ":branch_name, ";
      $sql .= ":branch_created, ";
      $sql .= ":branch_datetime ) ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "branch_is_active" => $this->branch_is_active,
        // "branch_image" => $this->branch_image,
        "branch_name" => $this->branch_name,
        "branch_datetime" => $this->branch_datetime,
        "branch_created" => $this->branch_created,

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
      $sql = "update {$this->tblBranches} set ";
      // $sql .= "branch_image = :branch_image, ";
      $sql .= "branch_name = :branch_name, ";
      $sql .= "branch_datetime = :branch_datetime ";
      $sql .= "where branch_aid  = :branch_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        // "branch_image" => $this->branch_image,
        "branch_name" => $this->branch_name,
        "branch_datetime" => $this->branch_datetime,
        "branch_aid" => $this->branch_aid
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function delete()
  {
    try {
      $sql = "delete from {$this->tblBranches} ";
      $sql .= "where branch_aid = :branch_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "branch_aid" => $this->branch_aid,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function active()
    {
    try {
    $sql = "update {$this->tblBranches} set ";
    $sql .= "branch_is_active = :branch_is_active, ";
    $sql .= "branch_datetime = :branch_datetime ";
    $sql .= "where branch_aid  = :branch_aid ";
    $query = $this->connection->prepare($sql);
    $query->execute([
    "branch_is_active" => $this->branch_is_active,
    "branch_datetime" => $this->branch_datetime,
    "branch_aid" => $this->branch_aid,
    ]);
    } catch (PDOException $ex) {
    $query = false;
    }
    return $query;
  }
}

