<?php

namespace App\Modules\Product\Services;

use App\Modules\Product\Repositories\ProductRepositoryInterface;

class ProductService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected ProductRepositoryInterface $productRepo)
    {

    }

    public function all()
    {
        return $this->productRepo->all();
    }

    public function find(int $id)
    {
        return $this->productRepo->find($id);
    }

    public function create(array $data)
    {
        return $this->productRepo->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->productRepo->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->productRepo->delete($id);
    }
}
