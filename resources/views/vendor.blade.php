@extends('layouts.public')

@section('title', 'Get Started')

@section('content')
    <div class="mx-auto w-1/3 my-auto flex flex-col item-center justify-center h-[500px]">
        <div class="text-left">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Select Vendor
            </h2>
            <p class="mt-4 text-lg leading-6  text-blue-600">
                Get your tickets from the best vendors in the industry.
            </p>
        </div>
        <form method="POST" action="{{ route('get-tickets') }}">
            @csrf
            <label for="vendor" class="block text-sm font-medium text-gray-600 mt-8">vendor</label>
            <select id="vendor" name="vendor_id" class="mt-1 block w-full pl-3 pr-10 py-4 text-base border-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                <option>select</option>
                @forelse ($vendors as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @empty
                    <option>No vendors avaiable</option>
                @endforelse
            </select>

            <div class="mt-8">
                <button class="flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-500  hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition duration-150 ease-in-out">
                    Next
                </button>
            </div>
        </form>
    </div>

@endsection
