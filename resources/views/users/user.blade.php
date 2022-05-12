@extends('layouts.sidebar')

@section('page', 'User')

@section('content')

    @foreach ($user as $item)
        <!-- component -->
        <!-- This is an example component -->
        {{-- <div class="my-10">
            <div class="bg-white rounded overflow-hidden">
                <div class="text-center p-6 ">
                    <img class="h-24 w-24 rounded-full mx-auto" src="https://randomuser.me/api/portraits/men/24.jpg"
                        alt="img" />
                    <p class="pt-2 text-lg font-semibold">{{ $item['name'] }}</p>
                    <p class="text-sm text-gray-600">{{ $item['email'] }}</p>

                    <div class="mt-5">
                        <a href="#" class="text-sm font-medium text-gray-800 leading-none">
                            {{ $item->country['name'] }}
                        </a>
                    </div>

                    <div class="mt-5">
                        <a href="#" class="text-sm font-medium text-gray-800 leading-none">
                            {{ $item->time_zone['name'] }}
                        </a>
                    </div>

                    <div class="mt-5">
                        <a href="#" class="text-sm font-medium text-gray-800 leading-none">
                            Rol
                        </a>
                    </div>

                </div>

                <div class="flex justify-center items-center space-x-4">
                    <a href="{{ route('users.index') }}" class="bg-red-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                        Cancelar
                    </a>
                    <a class="bg-green-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                        Guardar
                    </a>
                </div> --}}

        <!-- component -->
        <!--
      UI Design Prototype
      Link : https://dribbble.com/shots/10452538-React-UI-Components
    -->

        <form action="">
            <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
                <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                    <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                        <div class="max-w-md mx-auto">
                            <div class="flex items-center space-x-5">
                                <div
                                    class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">
                                    i</div>
                                <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                                    <h2 class="leading-relaxed">{{ $item['name'] }}</h2>
                                    <p class="text-sm text-gray-500 font-normal leading-relaxed">{{ $item['email'] }}</p>
                                    <p class="text-sm text-gray-500 font-normal leading-relaxed">
                                        {{ $item->country['name'] }} - {{ $item->time_zone['name'] }}</p>
                                    <p class="text-sm text-gray-500 font-semibold leading-relaxed">Admin</p>
                                    {{-- <a href="{{ route('password.reset') }}" class="text-sm">Restaurar contraseña</a> --}}
                                </div>
                            </div>
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="p-4">
                                            <div class="flex items-center">
                                                <p>Rol:</p>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-table-search-1" type="checkbox" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="pl-2">Admin</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-table-search-2" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-2" class="pl-2">Lider</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-table-search-3" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-3" class="pl-2">Ingeniero</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-table-search-3" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-3" class="pl-2">Comercial</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="flex justify-center items-center space-x-4">
                                <a href="{{ route('users.index') }}" class="bg-red-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                                    Cancelar
                                </a>
                                <a class="bg-green-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                                    Guardar
                                </a>
                            </div>
                            
                            {{-- <div class="divide-y divide-gray-200">
                                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                    <div class="flex flex-col">
                                        <label class="leading-loose">Event Title</label>
                                        <input type="text"
                                            class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                            placeholder="Event title">
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="leading-loose">Event Subtitle</label>
                                        <input type="text"
                                            class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                            placeholder="Optional">
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <div class="flex flex-col">
                                            <label class="leading-loose">Start</label>
                                            <div class="relative focus-within:text-gray-600 text-gray-400">
                                                <input type="text"
                                                    class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                                    placeholder="25/02/2020">
                                                <div class="absolute left-3 top-2">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col">
                                            <label class="leading-loose">End</label>
                                            <div class="relative focus-within:text-gray-600 text-gray-400">
                                                <input type="text"
                                                    class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                                    placeholder="26/02/2020">
                                                <div class="absolute left-3 top-2">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="leading-loose">Event Description</label>
                                        <input type="text"
                                            class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                            placeholder="Optional">
                                    </div>
                                </div>
                                <div class="pt-4 flex items-center space-x-4">
                                    <a href="{{ route('users.index') }}"
                                        class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none">
                                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg> Cancel
                                    </a>
                                    <button
                                        class="bg-indigo-600 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Create</button>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach

@endsection
