<?php

declare(strict_types=1);

namespace App;

class Config
{
  protected array $config = [];
  public function __construct(protected array $env)
  {
    $this->config = [
      'db' => [
        'driver' => $env['DB_DRIVER'] ?? 'mysql',
        'host' => $env['DB_HOST'],
        'database' => $env['DB_DATABASE'],
        'user' => $env['DB_USER'],
        'pass' => $env['DB_PASS'],
      ]
    ];
  }

  public function __get(string $name)
  {
    return $this->config[$name] ?? null;
  }
}

