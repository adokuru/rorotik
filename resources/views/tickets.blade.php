@extends('layouts.public')

@section('title', 'Get Started')

@section('content')
    <div x-data="{ amount: '0.00' }" class="mx-auto w-1/3 my-auto flex flex-col item-center justify-center h-[700px]">
        <div class="text-left">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                {{ $vendor->name }}
            </h2>
            <p class="mt-4 text-lg leading-6  text-blue-600">
                Get your tickets from the best vendors in the industry.
            </p>
        </div>
        <form method="POST" action="{{ route('create-tickets') }}">
            @csrf
            <div class="col-span-6 sm:col-span-3 mt-2">
                <label for="amount" class="block text-sm font-bold text-gray-700">Price</label>
                <input x-model="amount" required type="text" name="amount" id="amount" autocomplete="1000" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="col-span-6 sm:col-span-3 mt-2">
                <label for="name" class="block text-sm font-bold text-gray-700">Full name</label>
                <input required type="text" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="col-span-6 sm:col-span-3 mt-2">
                <label for="email" class="block text-sm font-bold text-gray-700">Email</label>
                <input required type="email" name="email" id="email" autocomplete="david@rorotik.com" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="col-span-6 sm:col-span-3 mt-2">
                <label for="Phone" class="block text-sm font-bold text-gray-700">Phone</label>
                <input required type="text" name="Phone" id="Phone" autocomplete="08033240564" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            @if ($vendor->ticket_type_id == 1)
                <label for="about" class="block text-sm font-bold text-gray-700 mt-2">
                    Ticket Note
                </label>
                <div class="mt-1">
                    <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Rice and Beans 700 with one meat"></textarea>
                </div>
            @endif
            <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
            <input type="hidden" name="ticket_type_id" value="{{ $vendor->ticket_type_id }}">

            <div class="mt-8 flex justify-between">
                <button type="submit" class="flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-500  hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition duration-150 ease-in-out">
                    Next
                </button>
                {{-- show ammount --}}
                <p class="mt-2 text-sm text-blue-600">
                    Amount: <span x-text="amount" class="font-bold" id="amount_price"></span>
                </p>
            </div>
        </form>
    </div>

@endsection
