<?php

use Illuminate\Http\JsonResponse;

    function apiResponse(bool $status = true, string $message = '', $data = [], string $url = ''): ?JsonResponse {
        return response()->json([
            'status' => $status,
            'data' => $data,
            'message' => $message,
            'url' => $url,
        ]);
    }

    function uploadFile($file, $fileName = null){
        if(isset($file)){
            $fileName = $fileName ?? $file->getClientOriginalName().rand(1111,9999).$file->getClientOriginalExtension();
            $path = $file->store('products', 'public');
            return $path;
        }
    }

    function deleteFile($filePath){
        if(isset($filePath) && file_exists($filePath)){
            unlink($filePath);
        }
        
        return true;
    }
?>