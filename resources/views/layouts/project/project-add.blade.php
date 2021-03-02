
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Supplier') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="col-sm-12">
                        <form action="{{ route('project.save') }}" method="POST">
                            @csrf

                            <div class="flex flex-col mb-4">
                                <label>Project Name</label>
                                <input type="text" class="" name="project_name">
                            </div>
                            <div class="flex flex-col mb-4">
                                <label>Description</label>
                                <input type="text" class="" name="description">
                            </div>
                            <div class="flex flex-col mb-4">
                                <label>Status</label>
                                <Select name="status">
                                    <option value="standby">standby</option>
                                    <option value="running">running</option>
                                    <option value="completed">completed</option>
                                </Select>
                            </div>

                            <button class="block p-2 px-4 rounded text-center no-underline text-sm text-white text-lg bg-blue-500">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
