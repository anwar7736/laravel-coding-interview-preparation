<?php

namespace App\Modules\Product\Services;

use App\Modules\Product\Repositories\Interfaces\ProductRepositoryInterface;
use App\Modules\Product\Repositories\Interfaces\repositorysitoryInterface;
use Illuminate\Support\Str;
class ProductService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected ProductRepositoryInterface $repository)
    {

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
        if(isset($data['image'])){
            $data['image'] = uploadFile($data['image']);
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

        return $this->repository->create($data);
    }

    public function update(int $id, array $data)
    {
        if(isset($data['image'])){
            $data['image'] = uploadFile($data['image']);
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

        return $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
