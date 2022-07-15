@extends('layouts.public')

@section('title', 'Get Started')

@section('content')
    <div class="mx-auto w-1/3 my-auto flex flex-col item-center justify-center h-[500px]">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


        <div class="text-left">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                {{ $vendor->name }} Ticket
            </h2>
            <p class="mt-4 text-lg leading-6 text-gray-600 mb-4">
                Hi {{ $ticket->customer_name }}, kindly pay your ticket here.
            </p>
        </div>
        <form method="POST" action="{{ route('pay-tickets') }}">
            @csrf
            @method('POST')
            <div class="flex justify-between px-4 mt-4">
                <p class="text-sm font-bold text-gray-700">
                    {{ $ticketType->name }}
                </p>
                <p class="text-sm font-bold text-gray-700">
                    {{ $ticket->quantity }}
                </p>
            </div>
            <div class="flex justify-between px-4 mt-4">
                <p class="text-sm font-bold text-gray-700">
                    Amount
                </p>
                <p class="text-sm font-bold text-gray-700">
                    &#8358;{{ $ticket->amount }}
                </p>
            </div>
            <div class="flex justify-between px-4 mt-4">
                <p class="text-sm font-bold text-gray-700">
                    Fee
                </p>
                <p class="text-sm font-bold text-gray-700">
                   3.5%
                </p>
            </div>
            <input type="hidden" name="email" value="{{ $ticket->customer_email }}"> {{-- required --}}
            <input type="hidden" name="orderID" value="{{ $ticket->ticket_code }}">
            <input type="hidden" name="amount" value="{{ $amount * 100 }}"> {{-- required in kobo --}}
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="currency" value="NGN">
            <input type="hidden" name="reference" value="{{ $ticket->reference }}"> {{-- required --}}
            <div class="mt-8 flex flex-col items-center justify-center">
                <button type="submit" value="Pay Now!" class=" w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-500  hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition duration-150 ease-in-out">
                    Pay Now! &#8358;{{ $amount }}
                </button>
                <a href="/" class="flex justify-center mt-4 py-2 px-4 border border-transparent text-sm font-medium rounded-md text-black active:bg-blue-700 transition duration-150 ease-in-out ml-4">
                    Cancel
                </a>
            </div>
        </form>
    </div>

@endsection
