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
                    @can('roles.update')
                        <form action="{{ route('roles.update', $role->id) }}" method="POST" name="user_form"
                              id="user_form">
                            @method('PATCH')
                            @csrf
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

                                            <div class="flex items-center">

                                                <input id="" type="checkbox" value="{{ $permission->name }}"
                                                       name="permissions[]"
                                                       {{ $role->hasPermissionTo($permission) ? 'checked' : '' }}
                                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="" class="pl-2">{{ $permission->name }}</label>

                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                @endcan
                                </tbody>
                            </table>

                            <div class="flex justify-center items-center space-x-4">
                                <a href="{{ route('roles.index') }}"
                                   class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                                    Cancelar
                                </a>
                                @can('roles.update')
                                    <button type="submit"
                                            class="bg-green-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer"
                                            onclick="return confirm('¿Está seguro que desea guardar los datos efectuados?')">
                                        Guardar
                                    </button>
                            @endcan
                        </form>
                </div>
                @can('roles.destroy')
                    <div class="flex justify-center items-center space-x-4 py-2">
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button
                                class="bg-red-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer"
                                onclick="return confirm('Recuerde que esta acción es destructiva e irreversible.')">
                                @method('DELETE')
                                @csrf
                                Eliminar
                            </button>
                        </form>
                    </div>
                @endcan
            </div>
        </div>
    </div>
    </div>

@endsection
