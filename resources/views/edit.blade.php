<x-app-layout title="Edit Page">
    <div class="block md:flex justify-evenly">
        <x-task-edit list="{{ $bahanEdit[0]->list }}" created="{{ $bahanEdit[0]->created_at }}"></x-task-edit>
    </div>
</x-app-layout>
