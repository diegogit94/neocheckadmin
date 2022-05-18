@extends('layouts.sidebar')

@section('page', 'Roles')

@section('content')
    
@if (session('status'))
    <div class="flex bg-gradient-to-r from-green-300 rounded-lg p-4 mb-4 text-sm text-gray-500">
        {{ session('status') }}
    </div>
@endif
<div class="-mx-4 sm:-mx-8 px-4 sm:px-8  overflow-x-auto">
    <div class=" flex items-center justify-between pb-6">
        <div></div>
        <div class="flex items-center justify-between">
            <div class="lg:ml-40 ml-10 space-x-8 p-2">
                <a href="#"
                    class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">Crear</a>
            </div>
        </div>
    </div>
    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal w-full">
            <thead>
                <tr>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Roles
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Permisos
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <div class="flex items-center">
                                <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $role->name }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $role->permissions->implode('name', ' / ') }}
                            </p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-12">
                {{ $roles->links() }}
            </div>
        </div>

</div>
</div>

@endsection