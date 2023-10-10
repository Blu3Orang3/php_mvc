<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;
use Throwable;  

class SignUp extends Model
{

  public function __construct(protected User $userModel, protected Invoice $invoiceModel)
  {
    parent::__construct();
  }

  public function signUp(array $userData, array $invoiceData): int
  {
    try {
      $this->db->beginTransaction();

      $userId = $this->userModel->create($userData['email'], $userData['name']);
      $invoiceId = $this->invoiceModel->create($userId, $invoiceData['amount']);

      $this->db->commit();
    } catch (Throwable $e) {
      if ($this->db->inTransaction()) {
        $this->db->rollBack();
      }
      throw $e;
    }
    return $invoiceId;
  }
}