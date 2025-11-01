<?php

namespace App\Modules\Product\Services;

use App\Modules\Product\Repositories\ProductRepositoryInterface;
use App\Modules\Product\Models\ProductStock;
use Str;
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
        if(isset($data['image'])){
            $data['image'] = uploadFile($data->hasFile('image'));
        }

        $data['variations'] = [];

        foreach ($data['selling_price'] as $key => $value) {
            $variationData = [
                'size_id' => $data['sizes'][$key],
                'color_id' => $data['colors'][$key],
                'storage_id' => $data['storages'][$key],
                'purchase_price' => $data['purchase_price'][$key],
                'selling_price' => $value,
                'quantity' => $value['quantity'],
            ];

           if(isset($data['images'][$key])){
             $variationData['image'] = uploadFile($data['images'][$key]);
           }

           $data['variations'][] = $variationData;
        }

        $data['slug'] = Str::slug($data['name']);

        return $this->productRepo->create($data);
    }

    public function update(int $id, array $data)
    {
        if(isset($data['image'])){
            $data['image'] = uploadFile($data->hasFile('image'));
        }

        $data['variations'] = [];

        foreach ($data['selling_price'] as $key => $value) {
            $variationData = [
                'size_id' => $data['sizes'][$key],
                'color_id' => $data['colors'][$key],
                'storage_id' => $data['storages'][$key],
                'purchase_price' => $data['purchase_price'][$key],
                'selling_price' => $value,
                'quantity' => $value['quantity'],
                'line_id' => isset($data['line_id'][$key]) ? $data['line_id'][$key] : null,
            ];

           if(isset($data['images'][$key])){
             $variationData['image'] = uploadFile($data['images'][$key]);
           }


           $data['variations'][] = $variationData;
        }

        $data['slug'] = Str::slug($data['name']);

        return $this->productRepo->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->productRepo->delete($id);
    }
}
