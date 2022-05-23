@extends('layouts.sidebar')

@section('page', 'Role')

@section('content')

    @if (session('status'))
        <div class="flex bg-gradient-to-r from-green-300 rounded-lg p-4 mb-4 text-sm text-gray-500">
            {{ session('status') }}
        </div>
    @endif

    @csrf
    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                <div class="max-w-md mx-auto">
                    <div class="flex items-center space-x-5">
                    </div>
                    <form action="#" method="POST" name="user_form" id="user_form">
                        <label for="">Nombre del rol</label>
                        <input name="role_name" value="{{ $role->name }}"
                               class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                               type="text">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <p>Permisos:</p>
                                    </div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($permissions as $permission)
                                <tr
                                    class="bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="w-4 p-4">

                                        {{--must show all permissions as checkbox only checking the assigned to the actual role--}}

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="flex justify-center items-center space-x-4">
                            <a href="{{ route('roles.index') }}"
                               class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                                Cancelar
                            </a>
                            <button type="submit"
                                    class="bg-green-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer"
                                    onclick="return confirm('¿Está seguro que desea guardar los datos efectuados?')">
                                Guardar
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
