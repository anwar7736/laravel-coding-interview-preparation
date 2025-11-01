<?php

namespace App\modules\product\repositories\interfaces;

use App\Modules\Product\Models\ProductStock;
use App\Modules\Product\Models\Transaction;

interface TransactionRepositoryInterface
{
    public function all();
    public function find(int $id): ?Transaction;
    public function create(array $data): ?Transaction;
    public function update(int $id, array $data): ?Transaction;
    public function delete(int $id): bool;
    public function getProductStock(array $data): ?ProductStock;
    public function increaseProductStock(object $data, int $quantity): ?bool;
    public function decreaseProductStock(object $data, int $quantity): ?bool;
    public function updateProductStock(object $data, int $quantity): ?bool;
}
