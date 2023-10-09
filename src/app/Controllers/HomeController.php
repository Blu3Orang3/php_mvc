<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;

class HomeController
{
  public function index(): View
  {
    return View::make('index',['name' => 'John Doe']);
  }

  public function download()
  {
    $filename = 'krav-maga.txt';
    $filePath = STORAGE_PATH . '/' . $filename;

    if (!file_exists($filePath)) {
      http_response_code(404);
      echo View::make('error/404');
      exit;
    }

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
    header('Content-Length: ' . filesize($filePath));

    readfile($filePath);
  }

  public function upload()
  {

    $filePath = STORAGE_PATH . '/' . $_FILES['myFile']['name'];

    move_uploaded_file(
      $_FILES['myFile']['tmp_name'],
      $filePath
    );

    header('Location: /');

    exit;
  }
}
