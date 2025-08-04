<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class StaffController extends Controller
{
    //
    public function index(Request $request)
    {
        // $users = User::all();
        return view('staffs',[
            'users' => User::all(),
        ]); 
    }

    public function staffHours()
    {
        return view('hours'); 
    }

    public function getStaffs(Request $request)
    {
        if ($request->ajax()) {
            $users = User::with('accessControl')->select(['id','name', 'email', 'created_at','access_control']);
            return DataTables::of($users)
                ->editColumn('created_at', function ($user) {
                    return $user->created_at->format('Y-m-d'); // Format date
                })
                ->addColumn('access_control', function ($staff) {
                    // Show the access control name instead of ID
                    return $staff->accessControl ? $staff->accessControl->name : 'N/A';
                })
                ->make(true);
        }
    }

    public function deleteStaffs($id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();
            return redirect()->route('staffs.index')->with('message', 'User deleted successfully.');
        }
        return redirect()->route('staffs.index')->with('error', 'User not found');
    }

}
