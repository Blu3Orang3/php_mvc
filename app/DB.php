<?php

declare(strict_types=1);

namespace App;

use PDO;


class DB
{
  private PDO $pdo;
  public function __construct(protected array $config)
  {
    $defaultOptions = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_EMULATE_PREPARES => false,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    try {
      //load env variables from env superglobal
      $this->pdo = new PDO(
        $config['driver'] . ':host=' . $config['host'] . ';dbname=' . $config['database'],
        $config['user'],
        $config['pass'],
        $config['options'] ?? $defaultOptions
      );
    } catch (\PDOException $e) {
      throw new \PDOException($e->getMessage(), (int) $e->getCode());
    }
  }

  public function __call(string $name, array $arguments)
  {
    return $this->pdo->{$name}(...$arguments);
  }
}
