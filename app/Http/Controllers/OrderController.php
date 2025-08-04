<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodOrder;
use App\Models\FoodInventory;
use App\Traits\ResponseTrait;
use Carbon\Carbon;

class OrderController extends Controller
{
    use ResponseTrait;
    //CRUD FOR ORDERS

    public function index(){
        //Get all the data in the DB
        $orders = FoodOrder::all();
        return view('orders.index', compact('orders'));
    }


    public function store(Request $request){

        // Logic to store a new order
        try{
            // validate
            // $validated = $request->validate([
            //     'food_inventory_id' => 'required|integer|exists:food_inventories,id',
            //     'quantity' => 'nullable|integer',
            //     'total_price' => 'required|float'
            // ]);

            $basket = session('basket', []);
            if (empty($basket)) {
                return $this->errorResponse('Basket is empty', 400);
            }
            
            //generate order ID
            $today = Carbon::now()->format('Ymd');
            $countToday = FoodOrder::whereDate('created_at', Carbon::today())->count() + 1;
            $orderId = 'ORD-' . $today . '-' . str_pad($countToday, 4, '0', STR_PAD_LEFT);
            $validated['order_id'] = $orderId;

            $order = FoodOrder::create([
                'order_id' => $orderId,
            ]);

             // Save each basket item as order item
            foreach ($basket as $item) {

                // Check if food inventory exists
                $foodInventory = FoodInventory::findOrFail($item['food_inventory_id']);
                
                // Ensure quantity is available
                if ($foodInventory->quantity < $item['quantity']) {
                    return $this->errorResponse('Insufficient quantity in inventory', 400);
                }

                // create order
                $order->items()->create([
                    'food_inventory_id' => $item['food_inventory_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);

                // Update food inventory quantity
                $foodInventory->quantity -= $item['quantity'];
                $foodInventory->save();
            }

            // Clear basket
            session()->forget('basket');

            return redirect()->back()->with('success', 'Food item added successfully!');
        } catch(\Exception $e){
            return $this->errorResponse($e->getMessage(), 500);
        }
        
    }


    //still working on this
    public function updateOrder(Request $request, $id){
        try{
            // validate
            $validated = $request->validate([
                'food_inventory_id' => 'required|integer|exists:food_inventories,id',
                'quantity' => 'nullable|integer',
                'total_price' => 'required|float'
            ]);

            $order = FoodOrder::findOrFail($id);
            $order->update($validated);

            return redirect()->back()->with('success', 'Order updated successfully!');
        } catch(\Exception $e){
            return $this->errorResponse($e->getMessage(), 500);
        }
    }


    public function deleteOrder(FoodOrder $order)
    {
        try{
            $order->delete(); 

            return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
        } catch(\Exception $e){
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
