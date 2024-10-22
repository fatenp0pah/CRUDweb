@extends('layouts.app')

@section('content')
<section>
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="bg-white bg-opacity-90 dark:bg-gray-800 dark:bg-opacity-90 relative shadow-lg sm:rounded-lg overflow-hidden">

            <!-- Search Bar and Add Customer Button Section -->
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                
                <!-- Search Bar -->
                <div class="w-full md:w-1/2">
                    <form class="flex items-center w-full" action="{{ route('customers.index') }}" method="GET">
                        <label for="customer-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <input 
                                type="text" 
                                id="customer-search" 
                                name="search"  
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-brown-500 focus:border-brown-500 block w-full pl-10 pr-4 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-brown-500 dark:focus:border-brown-500" 
                                placeholder="Search Customers" 
                                value="{{ request('search') }}"
                            >
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-brown-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Search Button -->
                        <button 
                            type="submit" 
                            class="ml-2 px-4 py-2 focus:ring-4 focus:ring-brown-300 font-medium rounded-lg text-sm text-white" 
                            style="background-color: #6f4f1b;"
                        >
                            Search
                        </button>
                    </form>
                </div>

                <!-- "Back to All List" Button (Visible Only When Searching) -->
                @if(request('search'))
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <a href="{{ route('customers.index') }}" class="back-btn px-4 py-2 text-brown-900 hover:text-brown-700 font-medium rounded-lg text-sm">
                        Back to All List
                    </a>
                </div>
                @endif

                <!-- Add Customer Button -->
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <button 
                        type="button" 
                        onclick="window.location='{{ route('customers.create') }}'" 
                        class="flex items-center justify-center text-white focus:ring-4 focus:ring-brown-300 font-medium rounded-lg text-sm px-4 py-2" 
                        style="background-color: #8c6a4a;"
                    >
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Add Customer
                    </button>
                </div>
            </div>

            <!-- Page Title -->
            <h1 class="text-3xl font-semibold text-center text-brown-900 dark:text-white mb-4 page-title">Customers</h1>

            <!-- Warning Messages -->
            @if (session()->has('message'))
                <div class="text-center p-4 bg-red-200 text-red-800 rounded-md">
                    {{ session('message') }}
                </div>
            @elseif ($customers->isEmpty() && request('search'))
                <div class="text-center p-4 bg-red-100 text-red-800 rounded-md">
                    No customers found.
                </div>
            @endif

            <!-- Customers Table -->
            @if ($customers->isNotEmpty())
            <div class="table-container overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Name</th>
                            <th scope="col" class="px-4 py-3">Email</th>
                            <th scope="col" class="px-4 py-3">Phone Number</th>
                            <th scope="col" class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50">
                                <td class="px-4 py-3">{{ $customer->name }}</td>
                                <td class="px-4 py-3">{{ $customer->email }}</td>
                                <td class="px-4 py-3">{{ $customer->phone_number }}</td>
                                <td class="px-4 py-3 text-right">
                                    <div class="flex space-x-2">
                                        <!-- Edit Button -->
                                        <form action="{{ route('customers.edit', $customer->id) }}" method="GET" class="inline-block">
                                            <button type="submit" class="px-4 py-2 text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm">Edit</button>
                                        </form>
                                        
                                        <!-- Delete Button with Confirmation -->
                                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="button" 
                                                onclick="confirmDelete({{ $customer->id }})" 
                                                class="px-4 py-2 text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm"
                                            >
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif

            <!-- Back to Homepage Button -->
            <div class="p-4 text-center">
                <a href="{{ route('admin.dashboard') }}" class="back-btn text-brown-900 hover:bg-brown-200 px-4 py-2 rounded-lg">Back to Homepage</a>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript for Delete Confirmation -->
<script>
    function confirmDelete(customerId) {
        if (confirm('Are you sure you want to delete this customer?')) {
            document.querySelector(`form[action$="customers/${customerId}"]`).submit();
        }
    }
</script>
@endsection
