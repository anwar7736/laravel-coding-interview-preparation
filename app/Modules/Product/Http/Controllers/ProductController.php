<?php

namespace App\Modules\Product\Http\Controllers;

use App\Modules\Product\Http\Requests\ProductStoreRequest;
use App\Modules\Product\Http\Requests\ProductUpdateRequest;
use App\Modules\Product\Models\Brand;
use App\Modules\Product\Models\Category;
use App\Modules\Product\Models\Color;
use App\Modules\Product\Models\Size;
use App\Modules\Product\Models\Storage;
use App\Modules\Product\Models\Unit;
use App\Modules\Product\Models\Warranty;
use App\Modules\Product\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController
{

    public function __construct(protected ProductService $service){}

    public function index()
    {
        $data = $this->service->all();
        // return view('Product::product.index', compact('data'));
        return apiResponse(true, 'Product list fetched', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::forDropdown();
        $categories = Category::forDropdown();
        $units = Unit::forDropdown();
        $warranties = Warranty::forDropdown();
        $sizes = Size::forDropdown();
        $colors = Color::forDropdown();
        $storages = Storage::forDropdown();
        return view('Product::product.create', compact('brands', 'categories', 'units', 'warranties', 'sizes', 'colors', 'storages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $this->service->create($request->validated());
            DB::commit();
            return apiResponse(true, 'Product created successfully', $data, route('products.index'));
        } catch (\Throwable $th) {
            DB::rollBack();
            return apiResponse(false, 'Failed to create product: ' . $th->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->service->find($id);
        return apiResponse(true, 'Product data fetched', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->service->find($id);
        $brands = Brand::forDropdown();
        $categories = Category::forDropdown();
        $units = Unit::forDropdown();
        $warranties = Warranty::forDropdown();
        $sizes = Size::forDropdown();
        $colors = Color::forDropdown();
        $storages = Storage::forDropdown();
        return view('Product::product.edit', compact('data', 'brands', 'categories', 'units', 'warranties', 'sizes', 'colors', 'storages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {
         try {
            DB::beginTransaction();
            $data = $this->service->update($id, $request->validated());
            DB::commit();
            return apiResponse(true, 'Product updated successfully', $data, route('products.index'));
        } catch (\Throwable $th) {
            DB::rollBack();
            return apiResponse(false, 'Failed to update product: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         try {
            $this->service->delete($id);
            return apiResponse(true, 'Product deleted successfully');
        } catch (\Throwable $th) {
            return apiResponse(false, 'Failed to delete product: ' . $th->getMessage());
        }
    }
}
