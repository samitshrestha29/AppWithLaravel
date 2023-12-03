<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'category_name' => $this->category_name,
            'amount' => number_format($this->amount / 100, 2), // Assuming the amount is in cents
            'transaction_date' => is_string($this->transaction_date) ? $this->transaction_date : $this->transaction_date?->format('m/d/y') ?? null,
            'description' => $this->description,
            'created_at' => $this->created_at,
        ];
    }
}

