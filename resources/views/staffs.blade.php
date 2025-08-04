@extends('layouts.app')

@section('content')
<section>
    
<table id="search-table">
    <thead>
        <tr>
            <th>
                <span class="flex items-center">
                   Name
                </span>
            </th>
            <th>
                <span class="flex items-center">
                    Email
                </span>
            </th>
            <th>
                <span class="flex items-center">
                    Date Created
                </span>
            </th>
            <th>
                <span class="flex items-center">
                    Role
                </span>
            </th>
            <th>
                <span class="flex items-center">
                    Action
                </span>
            </th>
            {{-- <th>
                <span class="flex items-center">
                    Options
                </span>
            </th> --}}
        </tr>
        <tbody>
            
        </tbody>
    </thead>
    {{-- <tbody>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Apple Inc.</td>
            <td>AAPL</td>
            <td>$192.58</td>
            <td>$3.04T</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Microsoft Corporation</td>
            <td>MSFT</td>
            <td>$340.54</td>
            <td>$2.56T</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Alphabet Inc.</td>
            <td>GOOGL</td>
            <td>$134.12</td>
            <td>$1.72T</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Amazon.com Inc.</td>
            <td>AMZN</td>
            <td>$138.01</td>
            <td>$1.42T</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">NVIDIA Corporation</td>
            <td>NVDA</td>
            <td>$466.19</td>
            <td>$1.16T</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Tesla Inc.</td>
            <td>TSLA</td>
            <td>$255.98</td>
            <td>$811.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Meta Platforms Inc.</td>
            <td>META</td>
            <td>$311.71</td>
            <td>$816.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Berkshire Hathaway Inc.</td>
            <td>BRK.B</td>
            <td>$354.08</td>
            <td>$783.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">TSMC</td>
            <td>TSM</td>
            <td>$103.51</td>
            <td>$538.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">UnitedHealth Group Incorporated</td>
            <td>UNH</td>
            <td>$501.96</td>
            <td>$466.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Johnson & Johnson</td>
            <td>JNJ</td>
            <td>$172.85</td>
            <td>$452.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">JPMorgan Chase & Co.</td>
            <td>JPM</td>
            <td>$150.23</td>
            <td>$431.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Visa Inc.</td>
            <td>V</td>
            <td>$246.39</td>
            <td>$519.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Eli Lilly and Company</td>
            <td>LLY</td>
            <td>$582.97</td>
            <td>$552.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Walmart Inc.</td>
            <td>WMT</td>
            <td>$159.67</td>
            <td>$429.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Samsung Electronics Co., Ltd.</td>
            <td>005930.KS</td>
            <td>$70.22</td>
            <td>$429.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Procter & Gamble Co.</td>
            <td>PG</td>
            <td>$156.47</td>
            <td>$366.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Nestlé S.A.</td>
            <td>NESN.SW</td>
            <td>$120.51</td>
            <td>$338.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Roche Holding AG</td>
            <td>ROG.SW</td>
            <td>$296.00</td>
            <td>$317.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Chevron Corporation</td>
            <td>CVX</td>
            <td>$160.92</td>
            <td>$310.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">LVMH Moët Hennessy Louis Vuitton</td>
            <td>MC.PA</td>
            <td>$956.60</td>
            <td>$478.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Pfizer Inc.</td>
            <td>PFE</td>
            <td>$35.95</td>
            <td>$200.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Novo Nordisk A/S</td>
            <td>NVO</td>
            <td>$189.15</td>
            <td>$443.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">PepsiCo, Inc.</td>
            <td>PEP</td>
            <td>$182.56</td>
            <td>$311.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">ASML Holding N.V.</td>
            <td>ASML</td>
            <td>$665.72</td>
            <td>$273.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">The Coca-Cola Company</td>
            <td>KO</td>
            <td>$61.37</td>
            <td>$265.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Oracle Corporation</td>
            <td>ORCL</td>
            <td>$118.36</td>
            <td>$319.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Merck & Co., Inc.</td>
            <td>MRK</td>
            <td>$109.12</td>
            <td>$276.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Broadcom Inc.</td>
            <td>AVGO</td>
            <td>$861.80</td>
            <td>$356.00B</td>
        </tr>
        <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Mastercard Incorporated</td>
            <td>MA</td>
            <td>$421.44</td>
            <td>$396.00B</td>
        </tr>
    </tbody> --}}
</table>

<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-labelledby="cancel icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-labelledby="info icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this staff?</h3>
                <form id='deleteUserForm' method='POST' action="">
                    @csrf
                    @method('DELETE')
                    <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </button>
                </form>
                <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
            </div>
        </div>
    </div>
</div>

</section>
@endsection