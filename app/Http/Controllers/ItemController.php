<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Item::orderBy('created_at', 'desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nItem = new Item();
        $nItem->name = $request->item['name'];
        $nItem->save();

        return $nItem;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $existtItem = Item::find($id);
        if ($existtItem) {
            $existtItem->name = $request->item['name'] ? "{$request->item['name']}" : "";
            $existtItem->completed = $request->item['completed'] ? true : false;
            $existtItem->updated_at = Carbon::now();
            $existtItem->save();
            return $existtItem;
        }
        return "Item not found!!";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $existtItem = Item::find($id);
        if ($existtItem) {
            $existtItem->delete();
            return "Item deleted";
        }
        return "Item not found!!";
    }
}
