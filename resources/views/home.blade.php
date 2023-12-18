<x-app-layout title="Home Page">
    <div class="block md:flex justify-evenly">
        <x-task-list>
            @slot('tasks', $tasks)
        </x-task-list>
    </div>
</x-app-layout>
