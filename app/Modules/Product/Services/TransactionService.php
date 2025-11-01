<?php

namespace App\modules\product\services;

use App\Modules\Product\Repositories\Interfaces\ProductRepositoryInterface;
use App\modules\product\repositories\interfaces\TransactionRepositoryInterface;
use App\Modules\Product\Repositories\ProductRepository;

class TransactionService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected TransactionRepositoryInterface $repository, protected ProductRepositoryInterface $productRepo)
    {
        //
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    public function create(array $data)
    {
        $data['items'] = [];
        $data['total'] = 0;

        foreach ($data['products'] as $key => $value) {
            $product = $this->productRepo->find($value['id']);
            $variationStock = $this->repository->getProductStock($value);
            if(!$variationStock || $variationStock->quantity < $value['quantity']){
                throw new \Exception("Insufficient stock for product: " . $product->name);
            }

            $this->repository->decreaseProductStock($variationStock, $value['quantity']);

            $subTotal = $variationStock->selling_price * $value['quantity'];
            $data['total'] += $subTotal;
            
            $data['items'] = [
                'variation_id' => $variationStock->id,
                'quantity' => $value['quantity'],
                'unit_price' => $variationStock->selling_price,
                'total' => $subTotal,
            ];
        }

        return $this->repository->create($data);
    }

    public function update(int $id, array $data)
    {
        $data['items'] = [];
        $data['total'] = 0;

        foreach ($data['products'] as $key => $value) {
            $product = $this->productRepo->find($value['id']);
            $variationStock = $this->repository->getProductStock($value);
            if(!$variationStock || $variationStock->quantity < $value['quantity']){
                throw new \Exception("Insufficient stock for product: " . $product->name);
            }

            $this->repository->decreaseProductStock($variationStock, $value['quantity']);

            $subTotal = $variationStock->selling_price * $value['quantity'];
            $data['total'] += $subTotal;
            
            $data['items'] = [
                'variation_id' => $variationStock->id,
                'quantity' => $value['quantity'],
                'unit_price' => $variationStock->selling_price,
                'total' => $subTotal,
            ];
        }

        return $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
