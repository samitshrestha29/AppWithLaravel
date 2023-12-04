<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrasactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     try {
    //         return TransactionResource::collection(Transaction::paginate(10));
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => 'Unable to fetch transactions.'], 500);
    //     }
    // }

    public function index()
    {
        try {
            return TransactionResource::collection(Transaction::with('category')->get());
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch transactions.'], 500);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrasactionRequest $request)
    {
        return new TransactionResource(Transaction::create($request->validated()));
    }






    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return new TransactionResource($transaction);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
