@extends('layouts.sidebar')

@section('page', 'User')

@section('content')



    <!-- component -->
    @if (session('status'))
        <div class="flex bg-gradient-to-r from-green-300 rounded-lg p-4 mb-4 text-sm text-gray-500">
            {{ session('status') }}
        </div>
    @endif
    @foreach ($user as $item)
        <form action="{{ route('users.update', $item->id) }}" method="POST" name="user_form">
            @method('PATCH')
            @csrf
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
                                    <p class="text-sm text-gray-500 font-semibold leading-relaxed">
                                        {{ $item->roles->implode('name') }}</p>
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
                                    @foreach ($roles as $role)
                                        <tr
                                            class="bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="w-4 p-4">
                                                <div class="flex items-center">
                                                    @if ($role->name == $item->roles->implode('name'))
                                                        <input id="{{ $loop->index }}" type="checkbox" checked
                                                            value="{{ $role->name }}" name="role"
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="{{ $loop->index }}"
                                                            class="pl-2">{{ $role->name }}</label>
                                                    @else
                                                        <input id="{{ $loop->index }}" type="checkbox"
                                                            value="{{ $role->name }}" name="role"
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="{{ $loop->index }}"
                                                            class="pl-2">{{ $role->name }}</label>
                                                    @endif

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="flex justify-center items-center space-x-4">
                                <a href="{{ route('users.index') }}"
                                    class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                                    Cancelar
                                </a>
                                <button
                                    class="bg-green-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer"
                                    onclick="return confirm('¿Está seguro que desea guardar los datos efectuados?')">
                                    Guardar
                                </button>
        </form>
        </div>
        <div class="flex justify-center items-center space-x-4 py-2">
            <form action="{{ route('users.destroy', $item->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="bg-red-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer"
                    onclick="return confirm('Recuerde que esta acción es destructiva e irreversible')">
                    Eliminar
                </button>
            </form>
        </div>

        </div>
        </div>
        </div>
        </div>

        <script>
            type = "text/javascript" > checkBoxLimit()

            function checkBoxLimit() {
                var checkBoxGroup = document.forms['user_form']['role'];
                var limit = 1;
                for (var i = 0; i < checkBoxGroup.length; i++) {
                    checkBoxGroup[i].onclick = function() {
                        var checkedcount = 0;
                        for (var i = 0; i < checkBoxGroup.length; i++) {
                            checkedcount += (checkBoxGroup[i].checked) ? 1 : 0;
                        }
                        if (checkedcount > limit) {
                            console.log("Por favor, seleccionar solo " + limit + " checkbox.");
                            alert("Por favor, seleccionar solo " + limit + " checkbox.");
                            this.checked = false;
                        }
                    }
                }
            }
        </script>
    @endforeach
@endsection
