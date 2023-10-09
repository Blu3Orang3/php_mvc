<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;

class AboutController
{
  public function index(): View
  {
    return View::make('about/index');
  }

  public function create(): View
  {
    return View::make('about/create');
  }

  public function store(): string
  {
    $name = $_POST['name'] ?? null;

    if (!$name) {
      return 'Name is required';
    }

    return "Hello, $name";
  }
}
