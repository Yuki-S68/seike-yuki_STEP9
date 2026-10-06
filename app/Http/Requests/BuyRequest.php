<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;

class BuyRequest extends FormRequest
{
    public function rules()
    {
        $productId = $this->route('id');

        $product = Product::find($productId);

        return [
            'quantity' => [
                'required',
                'integer',
                'min:1',
            ],
        ];
    }
}
