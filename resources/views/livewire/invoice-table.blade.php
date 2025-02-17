<div class="max-w-7xl mx-auto mt-10 p-6">
    <div class="flex justify-between items-center mb-4">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">Invoices</h2>
        </div>
        <div class="flex space-x-2">
            <button class="flex items-center px-3 py-1.5 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-100">
                <svg class="w-4 h-4 mr-2 text-gray-600" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 256 256" xml:space="preserve">
                    <defs>
                    </defs>
                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                        <path d="M 52.537 80.466 V 45.192 L 84.53 2.999 C 85.464 1.768 84.586 0 83.041 0 H 6.959 C 5.414 0 4.536 1.768 5.47 2.999 l 31.994 42.192 v 43.441 c 0 1.064 1.163 1.719 2.073 1.167 l 11.758 -7.127 C 52.065 82.205 52.537 81.368 52.537 80.466 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                    </g>
                    </svg>
                Filter
            </button>

            <button class="flex items-center px-3 py-1.5 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-100">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="gray" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9.36434 4.76444C10.2311 4.56112 11.1156 4.45946 12 4.45946C12.403 4.45946 12.7297 4.13275 12.7297 3.72973C12.7297 3.32671 12.403 3 12 3C11.0037 3 10.0074 3.11452 9.03105 3.34355C6.209 4.00551 4.00551 6.20899 3.34355 9.03104C2.88548 10.9838 2.88548 13.0162 3.34355 14.969C4.00551 17.791 6.209 19.9945 9.03105 20.6565C10.9838 21.1145 13.0162 21.1145 14.969 20.6565C17.791 19.9945 19.9945 17.791 20.6565 14.969C20.8855 13.9925 21 12.9963 21 12C21 11.597 20.6733 11.2702 20.2703 11.2702C19.8673 11.2702 19.5405 11.597 19.5405 12C19.5405 12.8844 19.4389 13.7689 19.2356 14.6357C18.7002 16.9181 16.9181 18.7002 14.6357 19.2356C12.9021 19.6422 11.0979 19.6422 9.36434 19.2356C7.08194 18.7002 5.29982 16.9181 4.76444 14.6357C4.3578 12.9021 4.3578 11.0979 4.76444 9.36434C5.29982 7.08194 7.08194 5.29982 9.36434 4.76444Z" fill="gray"></path> <path d="M16.3784 3C15.9754 3 15.6486 3.32671 15.6486 3.72973C15.6486 4.13275 15.9754 4.45946 16.3784 4.45946H18.5085L13.9164 9.05157C13.6315 9.33655 13.6315 9.79859 13.9164 10.0836C14.2014 10.3685 14.6635 10.3685 14.9484 10.0836L19.5405 5.49145V7.62162C19.5405 8.02464 19.8673 8.35135 20.2703 8.35135C20.6733 8.35135 21 8.02464 21 7.62162V3.72973C21 3.32671 20.6733 3 20.2703 3H16.3784Z" fill="gray"></path> </g></svg>
                Export
            </button>

            <button class="flex items-center px-4 py-1.5 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                </svg>
                Create Invoice
                <span class="ml-2 text-xs font-semibold bg-indigo-500 text-white px-1.5 py-0.5 rounded">N</span>
            </button>
        </div>
    </div>
    <div class="flex border-b overflow-x-auto">
        @foreach (['all' => 'All Invoices', 'draft' => 'Draft', 'outstanding' => 'Outstanding', 'paid' => 'Paid', 'past_due' => 'Past Due'] as $key => $label)
            <button wire:click="setTab('{{ $key }}')"
                class="px-4 py-2 text-sm font-medium focus:outline-none border-b-2
                {{ $activeTab === $key ? 'border-blue-500 text-blue-500' : 'border-transparent text-gray-600' }}">
                {{ $label }}
            </button>
        @endforeach
    </div>

    <div class="overflow-x-auto mt-4">
        <table class="w-full rounded-lg">
            <thead>
                <tr class="text-left text-sm border-b uppercase">
                    <th class="p-3 flex items-center">
                        Amount
                    </th>
                    <th class="p-3"></th>
                    <th class="p-3">Invoice Number</th>
                    
                    <th class="flex items-center">
                        Customer
                        <button class="ml-2 text-gray-500 hover:text-gray-700">
                            <svg height="30px" width="30px" viewBox="-20 0 190 190" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> 
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M119.054 108.803L114.224 125.43L100.271 124.524C98.689 126.782 96.833 128.817 94.727 130.547L95.844 144.535L79.029 148.666L72.069 136.094C71.187 135.933 70.293 135.737 69.383 135.496C67.114 134.899 65.011 134.18 63.058 133.357L50.5 141.415L38.516 128.918L45.812 117.678C44.297 114.504 43.395 111.139 43.054 107.729L30.947 101.07L35.497 85.667L48.361 86.105C50.391 82.949 52.947 80.138 55.946 77.862L55.404 65.597L71.018 61.835L76.808 71.995C78.757 72.169 80.764 72.514 82.828 73.057C85.215 73.686 87.404 74.497 89.41 75.458L100.88 68.515L111.944 80.158L104.609 91.92C105.84 95.209 106.513 98.691 106.665 102.203L119.054 108.803ZM79.292 88.062C58.052 82.469 47.544 115.048 72.09 121.513C92.784 126.964 100.943 93.765 79.292 88.062Z" 
                                fill="gray"></path> </g></svg>
                        </button>
                    </th>
                    <th class="p-3">Due</th>
                    <th class="p-3">Created</th>
                    
                    <th class="p-3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($filteredInvoices as $invoice)
                    <tr class="border-b" wire:key="{{ $invoice['id'] }}">
                        <td class="p-3 flex items-center gap-4">${{ number_format($invoice['amount'], 2) }} {{$invoice['currency']}}
                            @if($invoice['status'] === 'paid')
                                <svg fill="#000000" height="10px" width="10px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                viewBox="0 0 489.698 489.698" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M468.999,227.774c-11.4,0-20.8,8.3-20.8,19.8c-1,74.9-44.2,142.6-110.3,178.9c-99.6,54.7-216,5.6-260.6-61l62.9,13.1 c10.4,2.1,21.8-4.2,23.9-15.6c2.1-10.4-4.2-21.8-15.6-23.9l-123.7-26c-7.2-1.7-26.1,3.5-23.9,22.9l15.6,124.8 c1,10.4,9.4,17.7,19.8,17.7c15.5,0,21.8-11.4,20.8-22.9l-7.3-60.9c101.1,121.3,229.4,104.4,306.8,69.3 c80.1-42.7,131.1-124.8,132.1-215.4C488.799,237.174,480.399,227.774,468.999,227.774z"></path> <path d="M20.599,261.874c11.4,0,20.8-8.3,20.8-19.8c1-74.9,44.2-142.6,110.3-178.9c99.6-54.7,216-5.6,260.6,61l-62.9-13.1 c-10.4-2.1-21.8,4.2-23.9,15.6c-2.1,10.4,4.2,21.8,15.6,23.9l123.8,26c7.2,1.7,26.1-3.5,23.9-22.9l-15.6-124.8 c-1-10.4-9.4-17.7-19.8-17.7c-15.5,0-21.8,11.4-20.8,22.9l7.2,60.9c-101.1-121.2-229.4-104.4-306.8-69.2 c-80.1,42.6-131.1,124.8-132.2,215.3C0.799,252.574,9.199,261.874,20.599,261.874z"></path> </g> </g> </g></svg>
                            @endif
                        </td>
                        <td class="p-3">
                            <span class="px-2 py-1 text-xs font-bold rounded 
                                {{ $invoice['status'] === 'paid' ? 'bg-green-100 text-green-700' : 
                                   ($invoice['status'] === 'draft' ? 'bg-gray-100 text-stone-700' : 
                                   ($invoice['status'] === 'past_due' ? 'bg-red-100 text-red-700' : 'bg-orange-100 text-orange-700')) }}">
                                {{ ucfirst(str_replace('_', ' ', $invoice['status'])) }}
                            </span>
                        </td>
                        <td class="p-3">{{ $invoice['invoice_number'] }}</td>
                        
                        <td class="p-3 flex items-center">
                            {{ $invoice['email'] }}
                        </td>
                        <td class="p-3">{{ $invoice['due'] }}</td>
                        <td class="p-3">{{ $invoice['date'] }}</td>
                        <td class="p-3 relative">
                            <x-dropdown align="right" width="48" contentClasses="py-1 bg-white">
                                <x-slot name="trigger">
                                    <button class="px-2 py-1">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="gray" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M18 12H18.01M12 12H12.01M6 12H6.01M13 12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12ZM19 12C19 12.5523 18.5523 13 18 13C17.4477 13 17 12.5523 17 12C17 11.4477 17.4477 11 18 11C18.5523 11 19 11.4477 19 12ZM7 12C7 12.5523 6.55228 13 6 13C5.44772 13 5 12.5523 5 12C5 11.4477 5.44772 11 6 11C6.55228 11 7 11.4477 7 12Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content" class="text-sm">
                                    <span class="block uppercase text-gray-400 px-3 py-2">Actions</span>
                                    <button class="block px-3 py-1 text-blue-700 hover:bg-gray-200">Download PDF</button>
                                    <button class="block px-3 py-1 text-blue-700 hover:bg-gray-200">Download Invoice</button>
                                    <button class="block px-3 py-1 text-red-600 hover:bg-gray-200">Delete Draft</button>
                                    <hr class="my-1" />
                                    <span class="block uppercase text-gray-400 px-3 py-2">Connections</span>
                                    <button class="flex items-center gap-2 px-3 py-1 text-blue-700 hover:bg-gray-200">View Customer
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="#0000FF" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 12H20M20 12L14 6M20 12L14 18" stroke="#0000FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                    </button>
                                </x-slot>
                            </x-dropdown>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
