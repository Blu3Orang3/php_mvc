<?php

declare(strict_types=1);

namespace App\Controllers;

use App\App;
use App\View;
use PDO;
use Throwable;
use App\Models\User;
use App\Models\Invoice;
use App\Models\SignUp;

class HomeController
{
  public function index(): View
  {

    $email = 'Jenna@gmail.com';
    $name = 'Jenna';
    $amount = 150;

    $userModel = new User();
    $invoiceModel = new Invoice();

    $invoiceId = (new SignUp($userModel, $invoiceModel))->signUp(
      [
        'email' => $email,
        'name' => $name
      ],
      [
        'amount' => $amount
      ]
    );

    return View::make('index', ['invoice' => $invoiceModel->find($invoiceId)]);
  }
}
