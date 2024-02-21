<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @foreach (Auth::user()->todos as $todo)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-12">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="font-semibold text-5xl text-grey-800 leadning-tight">{{ $todo->title }}</h2>
                    <p>{{ $todo->description }}</p>
                    <p class="font-semibold">{{ $todo->done ? __('Done!') : __('Not done') }}</p>

                    <x-primary-button class="ms-3">
                        <a href="{{ route('todo.edit', $todo->id) }}">Edit</a>
                    </x-primary-button>

                    <form method="post" action="{{ route('todo.destroy', $todo->id) }}">
                        @csrf 
                        @method('delete')
                        <x-primary-button class="ms-3">
                            <input type="submit" value="Delete">
                        </x-primary-button>
                    </form>
                    
                </div>
            </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
