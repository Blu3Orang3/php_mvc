<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;

class Invoice extends Model
{
  public function create(int $userId, int $amount): int
  {
    $stmt = $this->db->prepare(
      'INSERT INTO invoices (user_id,amount)
      VALUES (?,?)'
    );

    $stmt->execute([$userId, $amount]);

    $invoiceId = (int) $this->db->lastInsertId();

    return $invoiceId;
  }

  public function find(int $id): array
  {
    $stmt = $this->db->prepare(
      'SELECT invoices.id, amount,full_name
        FROM invoices
        LEFT JOIN users ON users.id = user_id 
        WHERE invoices.id = ?'
    );

    $stmt->execute([$id]);

    return $stmt->fetch() ?: [];
  }
}
