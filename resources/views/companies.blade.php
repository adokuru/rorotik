@extends('layouts.public')

@section('title', 'Welcome')

@section('content')
    <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($companies as $item)
        <a href="{{route('select-ticket-types', $item->id)}}">
            <li class="col-span-1 bg-gray-50  rounded-lg shadow divide-y divide-gray-200">
                <div class="w-full flex items-center justify-between p-6 space-x-6">
                    <div class="flex-1 truncate">
                        <div class="flex items-center space-x-3 mb-4">
                            <h3 class="text-gray-900 text-sm font-medium truncate">{{$item->name}}</h3>
                        </div>
                        <p class="mt-1 text-gray-500 text-sm truncate">{{$item->address}}</p>
                    </div>
                    <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" src="{{$item->logo}}" alt="">
                </div>
            </li>
        </a>
        @endforeach

    </ul>

@endsection
