<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-base font-bold py-4">Search a ticket</h1>
                    <form action="{{ route('search_results') }}">
                        <div class="relative">
                            <input type="text" class="p-2 pl-8 rounded border border-gray-200 bg-gray-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent" placeholder="search..." name="code" />
                            <svg class="w-4 h-4 absolute left-2.5 top-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </form>
                </div>
            </div>


            @if (isset($ticket))
                @if ($ticket->status == 1)
                    <article class="bg-white overflow-hidden shadow-lg rounded-lg pt-4 pb-8 mt-4">
                        <!-- Tabs -->
                        <div class="mt-6 sm:mt-2 2xl:mt-5">
                            <div class="border-b border-white">
                                <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                        <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                                        <a href="#" class="border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" aria-current="page">
                                            Search Results
                                        </a>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <!-- Description list -->
                        <div class="mt-6 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Name
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {{ $ticket->customer_name }}
                                    </dd>
                                </div>

                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Email
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {{ $ticket->customer_email }}
                                    </dd>
                                </div>

                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Phone
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {{ $ticket->customer_phone }}
                                    </dd>
                                </div>

                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Amount
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        &#8358; {{ $ticket->amount }}
                                    </dd>
                                </div>


                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Note 
                                    </dt>
                                    <dd class="mt-1 max-w-prose text-sm text-gray-900 space-y-5">
                                        <p>
                                            {{ $ticket->note }}
                                        </p>
                                        {!! QrCode::size(250)->generate(url('/') . '/search-results?code='.$ticket->ticket_code) !!}
                                    </dd>
                                </div>
                            </dl>
                        </div>

        </div>
    </div>
    </article>
@else
    Ticket Expired
    @endif
    @endif
    </div>
    </div>
</x-app-layout>
