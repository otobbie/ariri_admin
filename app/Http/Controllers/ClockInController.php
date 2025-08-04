<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ClockIn;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class ClockInController extends Controller
{
    //
    public function index(Request $request)
    {
        //get logged in user
        $user = Auth::user();

        //get 7 days of clock in data
        $clockIns = ClockIn::where('user_id', $user->id)
                    ->whereDate('clock_in_time', '>=', Carbon::now()->subDays(6))
                    ->get();


        // get today clock in data           
        $todayClockIn = ClockIn::where('user_id', $user->id)
                            ->whereDate('clock_in_time', Carbon::today())
                            ->first();

        $users = User::all();
                            

        return view('clockin', compact('clockIns', 'todayClockIn','user'));
    }

    public function clockIn()
    {
        //get logged in user
        $user = Auth::user();

        //get clock in data for today
        $existingClockIn = ClockIn::where('user_id', $user->id)
                            ->whereDate('clock_in_time', Carbon::today())
                            ->whereNull('clock_out_time')
                            ->first();

        //check if user has clocked in, if not clock in
        if (!$existingClockIn) {
            ClockIn::create([
                'user_id' => $user->id,
                'clock_in_time' => Carbon::now(),
            ]);
            session(['clockin' => True]);
            return redirect()->route('clock.index')->with('success', 'Clocked in successfully.');
        }

        return redirect()->route('clock.index')->with('warning', 'You are clocked in already.');
    }

    public function clockOut()
    {
        //get logged in user
        $user = Auth::user();

        //get users clocked in data for today where he has not clocked out
        $clockIn = ClockIn::where('user_id', $user->id)
                        ->whereDate('clock_in_time', Carbon::today())
                        ->whereNull('clock_out_time')
                        ->first();
        //check if the user has clocked in today and if clocked in then clockout
        if ($clockIn) {
            $clockInTime = Carbon::parse($clockIn->clock_in_time);
            $clockOutTime = Carbon::now();

            // Calculate the difference in hours
            $hoursWorked = $clockInTime->diffInHours($clockOutTime);
            // var_dump( $hoursWorked); exit;

            // If you need the exact hours and minutes (in case it's less than an hour):
            // $hoursAndMinutes = $clockInTime->diff($clockOutTime);

            if((float)$hoursWorked < 1){
                $hoursWorked = 1;
            }

            $clockIn->update([
                'clock_out_time' => Carbon::now(),
                'hours_worked' => $hoursWorked,
            ]);
        }
        session()->forget('clockin');
        return redirect()->route('clock.index')->with('success', 'Clocked out successfully.');
    }

    public function getClockIn(Request $request)
    {
        if ($request->ajax()) {
            $hours = ClockIn::with('User')->select(['id','user_id','hours_worked','created_at']);
            return DataTables::of($hours)
                ->addColumn('staff_name', function ($staff) {
                    // Show the access control name instead of ID
                    return $staff->User ? $staff->User->name : 'N/A';
                })
                ->editColumn('created_at', function ($user) {
                    return $user->created_at->format('Y-m-d'); // Format date
                })
                ->make(true);
        }
    }

}
