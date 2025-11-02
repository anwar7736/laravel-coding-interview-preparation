<?php

namespace App\modules\product\repositories;

use App\Modules\Product\Models\ProductStock;
use App\Modules\Product\Models\Transaction;
use App\Modules\Product\Models\TransactionLine;

class TransactionRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected Transaction $model)
    {
        //
    }

    public function all()
    {
        return $this->model->active()
                    ->with(['contact', 'payments', 'details'])
                    ->get();
    }

    public function find(int $id): ?Transaction
    {
        return $this->model->active()                    
                    ->with(['contact', 'payments', 'details'])
                    ->findOrFail($id);
    }

    public function create(array $data): ?Transaction
    {
        $date = now();
        $transaction = $this->model->create([
            'contact_id' => $data['contact_id'],
            'date' => $date,
            'invoice_no' => 'INV-' . $date->format('Ymd') . '-' . rand(1000, 9999),
            'total' => $data['total'],
            'final_total' => $data['total'],
            'payment_status' => 'paid',
            'note' => $data['sell_note'] ?? null,
        ]);

        $transaction->details()->createMany($data['items']);
        $transaction->payments()->create([
            'payment_date' => $transaction->date,
            'amount' => $data['total'],
            'payment_method_id' => $data['payment_method_id'],
            'account_number' => $data['account_number'] ?? null,
            'card_number' => $data['card_number'] ?? null,
            'note' => $data['payment_note'] ?? null,
        ]);

        return $transaction;

    }

    public function update(int $id, array $data): ?Transaction
    {
        $date = now();
        $transaction = $this->find($id);
        $transaction->update([
            'contact_id' => $data['contact_id'],
            'date' => $date,
            'total' => $data['total'],
            'final_total' => $data['total'],
            'note' => $data['sell_note'] ?? null,
        ]);

        if(count($data['items']) > 0){
            $transaction->details()->createMany($data['items']);
        }

        $deletedTransactionLines = TransactionLine::whereNotIn('id', $data['line_ids'])->get();

        if($deletedTransactionLines->count()){
            foreach ($deletedVariations as $key => $dtl) {
               $variation = ProductStock::active()->findOrFail($dtl->variation_id);
               $this->increaseProductStock($variation, $dtl->quantity);
               $dtl->delete();
            }
        }
        $transaction->payments()->update([
            'payment_date' => $transaction->date,
            'amount' => $data['total'],
            'payment_method_id' => $data['payment_method_id'],
            'account_number' => $data['account_number'] ?? null,
            'card_number' => $data['card_number'] ?? null,
            'note' => $data['payment_note'] ?? null,
        ]);

        return $transaction;
    }

    public function delete(int $id): bool
    {
        $transaction = $this->find($id);
        foreach ($transaction->details as $key => $item) {
          $this->increaseProductStock($item->variation, $item->quantity);
          $item->delete();
        }
        return $transaction->delete();
    }
    
    public function getProductStock(array $data): ?ProductStock
    {
        return ProductStock::active()->where('product_id', $data['id'])
                        ->where('size_id', $data['size_id'] ?? null)
                        ->where('color_id', $data['color_id'] ?? null)
                        ->where('storage_id', $data['storage_id'] ?? null)
                        ->firstOrFail();
    }

    public function increaseProductStock(object $data, int $quantity): ?bool 
    {
        $data->quantity += $quantity;
        return $data->save();
    }
    public function decreaseProductStock(object $data, int $quantity): ?bool 
    {
        $data->quantity -= $quantity;
        return $data->save();
    }
    public function updateProductStock(object $data, int $quantity): ?bool 
    {
        $data->quantity += $quantity;
        return $data->save();
    }
}
