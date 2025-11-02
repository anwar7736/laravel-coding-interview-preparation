<?php

namespace App\Modules\Product\Http\Controllers;

use App\Modules\Product\Models\Transaction;
use Illuminate\Http\Request;
use App\Modules\Product\Services\TransactionService;
use App\Modules\Product\Http\Requests\TransactionStoreRequest;

class TransactionController
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(protected TransactionService $service){}

    public function index()
    {
        $data = $this->service->all();
        // return view('Product::product.index', compact('data'));
        return apiResponse(true, 'Transaction list fetched', $data);
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
    public function store(TransactionStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $this->service->create($request->validated());
            DB::commit();
            return apiResponse(true, 'Transaction created successfully', $data);
        } catch (\Throwable $th) {
            DB::rollBack();
            return apiResponse(false, 'Failed to create transaction: ' . $th->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->service->find($id);
        return apiResponse(true, 'Transaction data fetched', $data);
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
            return apiResponse(true, 'Transaction updated successfully', $data);
        } catch (\Throwable $th) {
            DB::rollBack();
            return apiResponse(false, 'Failed to update transaction: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         try {
            $this->service->delete($id);
            return apiResponse(true, 'Transaction deleted successfully');
        } catch (\Throwable $th) {
            return apiResponse(false, 'Failed to delete transaction: ' . $th->getMessage());
        }
    }
}
