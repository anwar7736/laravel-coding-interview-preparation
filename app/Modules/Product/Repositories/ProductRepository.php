<?php

namespace App\Modules\Product\Repositories;

use App\Modules\Product\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function all()
    {
        return Product::all();
    }

    public function find(int $id): ?Product
    {
        return Product::findOrFail($id);
    }

    public function create(array $data): ?Product
    {
        return Product::create($data);
    }

    public function update(int $id, array $data): ?Product
    {
        return Product::findOrFail($id)->update($data);
    }

    public function delete(int $id): bool
    {
        return Product::destroy($id);
    }
}
