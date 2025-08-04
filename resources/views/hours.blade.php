@extends('layouts.app')

@section('content')
<section>
    
<table id="hours-table">
    <label for="month" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Filtering by month:</label>
    <input type="month" id="monthPicker">
    <thead>
        <tr>
            <th>
                <span class="flex items-center">
                   Staff Name
                </span>
            </th>
            <th>
                <span class="flex items-center">
                    Hours Worked
                </span>
            </th>
            <th>
                <span class="flex items-center">
                    Date
                </span>
            </th>

        </tr>
        <tbody>
            
        </tbody>
    </thead>

</table>



</section>
@endsection