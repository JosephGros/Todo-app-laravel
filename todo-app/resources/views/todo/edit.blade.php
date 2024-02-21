<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Todo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @isset($todo)
        <form method="post" action="{{ route('todo.update', $todo->id) }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')

            <input type="text" name="title" value="{{ $todo->title }}">
            <input type="text" name="description" value="{{ $todo->description }}">
            <p class="font-semibold">{{ $todo->done ? __('Done!') : __('Not done') }}</p>
            <input type="submit" value="Update">
        </form>
        @endisset

        @isset($todo)
        <form method="post" action="{{ route('todo.store', $todo->id) }}" class="mt-6 space-y-6">
            @csrf
            @method('post')

            <input type="text" name="title" value="">
            <input type="text" name="description" value="">
            <input type="submit" value="Update">
        </form>
        @endisset
        
        </div>
    </div>
</x-app-layout>
