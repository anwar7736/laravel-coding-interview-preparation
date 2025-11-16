<?php

namespace App\Modules\Product\Services;

use App\Modules\Product\Repositories\Interfaces\ProductRepositoryInterface;
use App\modules\product\repositories\interfaces\TransactionRepositoryInterface;
use App\Modules\Product\Repositories\ProductRepository;
use App\Modules\Product\Models\TransactionLine;

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
        $data['line_ids'] = [];

        foreach ($data['products'] as $key => $value) {
            $product = $this->productRepo->find($value['id']);
            $variationStock = $this->repository->getProductStock($value);
            $subTotal = $variationStock->selling_price * $value['quantity'];
            $data['total'] += $subTotal;
            if(isset($value['line_id'])){
                $data['line_ids'][] = $value['line_id'];
                $transactionLine = TransactionLine::active()->findOrFail($value['line_id']);
                $diffQuantity = $value['quantity'] - $transactionLine->quantity;

                if(!$variationStock || $variationStock->quantity < $diffQuantity){
                    throw new \Exception("Insufficient stock for product: " . $product->name);
                }else{
                    $this->repository->decreaseProductStock($variationStock, $diffQuantity);
                    $transactionLine->update([
                        'variation_id' => $variationStock->id,
                        'quantity' => $value['quantity'],
                        'unit_price' => $variationStock->selling_price,
                        'total' => $subTotal,
                    ]);
                }

            }else{
                 if(!$variationStock || $variationStock->quantity < $value['quantity']){
                    throw new \Exception("Insufficient stock for product: " . $product->name);
                }

                $this->repository->decreaseProductStock($variationStock, $value['quantity']);
                
                $data['items'] = [
                    'variation_id' => $variationStock->id,
                    'quantity' => $value['quantity'],
                    'unit_price' => $variationStock->selling_price,
                    'total' => $subTotal,
                ];
            }

           
        }

        return $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
