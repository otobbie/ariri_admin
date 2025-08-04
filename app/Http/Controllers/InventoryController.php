<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodInventory;
use App\Traits\ResponseTrait;

class InventoryController extends Controller
{
    use ResponseTrait;

    //CRUD FOR FOOD INVENTORY


    public function index(){
        //Get all the data in the DB
        $inventory = FoodInventory::all();
        return view('inventory.index', compact('inventory'));
    }

    public function store(Request $request){
        try{
            // validate
            $validated = $request->validate([
                'name' => 'required|string',
                'description' => 'nullable|string',
                'quantity' => 'required|integer',
                'price' => 'required|numeric',
            ]);

            // Save to database
            FoodInventory::create($validated);

            return redirect()->back()->with('success', 'Food item added successfully!');
        } catch(\Exception $e){
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function update(Request $request, $id){

        try{
            // validate
            $validated = $request->validate([
                'name' => 'required|string',
                'description' => 'nullable|string',
                'quantity' => 'required|integer',
                'price' => 'required|numeric',
            ]);

            $food = FoodInventory::findOrFail($id);

            $food->update($validated);

            return redirect()->back()->with('success', 'Food item updated successfully!');
        } catch(\Exception $e){
            //still working on the error handling
            return $this->errorResponse($e->getMessage(), 500);
        }


    }

    public function delete(Request $request, $id){
        try{
            $food = FoodInventory::findOrFail($id);
            $food->delete();

            return redirect()->route('inventory.index')->with('success', 'Food item deleted successfully.');
        } catch(\Exception $e){
            //still working on the error handling
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function getInventoryById($id){
        // Get food inventory by ID
        $foodInventory = FoodInventory::findOrFail($id);
        return response()->json($foodInventory);
    }

}
