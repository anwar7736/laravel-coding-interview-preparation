<?php

namespace App\Modules\Product\Repositories;

use App\Modules\Product\Models\Product;
use App\Modules\Product\Models\ProductStock;
use App\Modules\Product\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected Product $model)
    {
        //
    }

    public function all()
    {
        return $this->model->active()
                    ->with([
                        'varations', 'brand', 'unit', 
                        'warranty', 'categories', 
                        'slug', 'primaryImage'
                    ])
                    ->get();
    }

    public function find(int $id): ?Product
    {
        return $this->model::active()
                    ->with([
                        'varations', 'brand', 'unit', 
                        'warranty', 'categories', 
                        'slug', 'primaryImage'
                    ])
                    ->findOrFail($id);
    }

    public function create(array $data): ?Product
    {
        $product = $this->model::create([
            'name' => $data['name'],
            'brand_id' => $data['brand_id'],
            'unit_id' => $data['unit_id'],
            'warranty_id' => $data['warranty_id'],
            'alert_quantity' => $data['alert_quantity'],
            'type' => $data['type'],
            'short_description' => $data['short_description'],
            'description' => $data['description'],
            'seo_meta_title' => $data['seo_meta_title'],
            'seo_meta_description' => $data['seo_meta_description'],
        ]);

        $product->categories()->attach($data['categories']);
        $product->slug()->create([
            'slug' => $data['slug'],
        ]);

        $product->primaryImage()->create([
            'file_path' => $data['image'],
            'is_primary' => 1,
        ]);

        foreach ($data['variations'] as $key => $variation) {
           $variation = $product->variations()->create([
                'size_id' => $variation['size_id'],
                'color_id' => $variation['color_id'],
                'storage_id' => $variation['storage_id'],
                'purchase_price' => $variation['purchase_price'],
                'selling_price' => $variation['selling_price'],
                'quantity' => $variation['quantity'],
           ]);

           $variation->image()->create([
                'file_path' => $variation['image'],
            ]);
        }

        return $product;

    }

    public function update(int $id, array $data): ?Product
    {
        $product = $this->find($id);
        $product->update([
            'name' => $data['name'],
            'brand_id' => $data['brand_id'],
            'unit_id' => $data['unit_id'],
            'warranty_id' => $data['warranty_id'],
            'alert_quantity' => $data['alert_quantity'],
            'type' => $data['type'],
            'short_description' => $data['short_description'],
            'description' => $data['description'],
            'seo_meta_title' => $data['seo_meta_title'],
            'seo_meta_description' => $data['seo_meta_description'],
        ]);

        $product->categories()->sync($data['categories']);
        $product->slug()->update([
            'slug' => $data['slug'],
        ]);

        if(isset($data['image'])){
            deleteFile($product->primaryImage);
            $product->primaryImage()->create([
                'file_path' => $data['image'],
                'is_primary' => 1,
            ]);
        }

        foreach ($data['variations'] as $key => $variation) {
           if(isset($variation['line_id'])){
               $variationData = ProductStock::findOrFail($variation['line_id']);
               $variationData->update([
                    'size_id' => $variation['size_id'],
                    'color_id' => $variation['color_id'],
                    'storage_id' => $variation['storage_id'],
                    'purchase_price' => $variation['purchase_price'],
                    'selling_price' => $variation['selling_price'],
                    'quantity' => $variation['quantity'],
               ]);

               if(isset($variation['image'])){
                    deleteFile($variationData->image);
                    $variationData->image()->create([
                        'file_path' => $variation['image'],
                    ]);
               }
           }

           else{
                $variation = $product->variations()->create([
                    'size_id' => $variation['size_id'],
                    'color_id' => $variation['color_id'],
                    'storage_id' => $variation['storage_id'],
                    'purchase_price' => $variation['purchase_price'],
                    'selling_price' => $variation['selling_price'],
                    'quantity' => $variation['quantity'],
            ]);

            if(isset($variation['image'])){
                $variation->image()->create([
                    'file_path' => $variation['image'],
                ]);
            }
           }

        }

        $deletedVariations = ProductStock::whereNotIn('id', $data['variations']['line_id'])->get();

        if($deletedVariations->count()){
            foreach ($deletedVariations as $key => $dv) {
               $dv->image()->delete();
               $dv->delete();
            }
        }

        return $product;
    }

    public function delete(int $id): bool
    {
        $product = $this->find($id);
        $product->categories()->delete();
        $product->primaryImage()->delete();
        $product->slug()->delete();
        foreach ($product->variations as $key => $variation) {
          $variation->image()->delete();
          $variation->delete();
        }
        
        return $product->delete();
    }
}
