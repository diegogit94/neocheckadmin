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
                        @endcan
                        @can('roles.duplicate')
                            <form id="modalButton">
                                <a
                                    class="bg-yellow-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                                    Duplicar
                                </a>
                            </form>
                        @endcan
                    </div>
            </div>
        </div>
    </div>
    </div>

    {{-- modal --}}

    <div id="defaultModal" tabindex="-1" aria-hidden="true"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto mx-auto">

            {{-- modal height--}}
            <div class="relative bg-white w-1/2 rounded-lg shadow dark:bg-gray-700 m-auto">

                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Nombre del rol
                    </h3>
                    <button id="closeButton" type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="defaultModal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <form action="{{ route('roles.duplicate', $role) }}" method="POST">
                    @csrf
                    <div class="p-6 space-y-6">
                        <input type="text" name="role_name"
                               class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                    </div>

                    <div
                        class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <button id="cancelButton" data-modal-toggle="defaultModal" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Cancelar
                        </button>
                        <button id="saveButton" data-modal-toggle="defaultModal" type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Guardar
                        </button>
                </form>
            </div>
        </div>
    </div>
    </div>

    {{-- end-modal --}}

    </div>
    </div>

    <script>
        let modal = document.getElementById("defaultModal");

        let modalButton = document.getElementById("modalButton");

        let closeButton = document.getElementById("closeButton");

        let cancelButton = document.getElementById("cancelButton");

        // let saveButton = document.getElementById("saveButton");

        // We want the modal to open when the "edit" button is clicked
        modalButton.onclick = function () {
            modal.style.display = "block";
        }
        // We want the modal to close when the "x" button is clicked
        closeButton.onclick = function () {
            modal.style.display = "none";
        }

        // We want the modal to close when the "cancel" button is clicked
        cancelButton.onclick = function () {
            modal.style.display = "none";
        }

        // The modal will close when the user clicks anywhere outside the modal
        // window.onclick = function(event) {
        // if (event.target == modal) {
        //     modal.style.display = "none";
        // }
        // }
    </script>

@endsection
