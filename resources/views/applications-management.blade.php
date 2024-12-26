@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <!-- Add Application Button -->
    <button type="button" onclick="showAddApplicationModal()" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
        Add Application
    </button>    

    <!-- Add Application Modal -->
    <div id="add-application-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center mt-5">
        <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-2/3 lg:w-1/2 p-6 relative max-h-[90%] overflow-y-auto">
            <button onclick="closeAddApplicationModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-xl">&times;</button>
            <h2 class="text-2xl font-bold mb-4">Add New Application</h2>
            <form method="POST" action="{{ route('applications-management.store') }}">
                @csrf
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                    </div>
                    <div>
                        <label for="requirements" class="block text-sm font-medium text-gray-700">Requirements (JSON Format)</label>
                        <textarea name="requirements" id="requirements" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                    </div>
                    <div>
                        <label for="guides" class="block text-sm font-medium text-gray-700">Guides (JSON Format)</label>
                        <textarea name="guides" id="guides" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                    </div>
                    <div>
                        <label for="source_code_link" class="block text-sm font-medium text-gray-700">Source Code Link</label>
                        <input type="text" name="source_code_link" id="source_code_link" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="file_path" class="block text-sm font-medium text-gray-700">File Path</label>
                        <input type="text" name="file_path" id="file_path" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="thumbnail" class="block text-sm font-medium text-gray-700">Thumbnail</label>
                        <input type="text" name="thumbnail" id="thumbnail" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="latest_version" class="block text-sm font-medium text-gray-700">Latest Version</label>
                        <input type="text" name="latest_version" id="latest_version" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="active">Active</option>
                            <option value="in-development">In Development</option>
                            <option value="deprecated">Deprecated</option>
                        </select>
                    </div>
                </div>
                <div class="mt-4 flex justify-end">
                    <button type="button" onclick="closeAddApplicationModal()" class="text-gray-500 bg-gray-100 hover:bg-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2">Cancel</button>
                    <button type="submit" class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Application Modal -->
    <div id="edit-application-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center mt-5">
        <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-2/3 lg:w-1/2 p-6 relative max-h-[90%] overflow-y-auto">
            <button onclick="closeEditApplicationModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-xl">&times;</button>
            <h2 class="text-2xl font-bold mb-4">Edit Application</h2>
            <form method="POST" action="" id="edit-application-form">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label for="edit-name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="edit-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div>
                        <label for="edit-description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="edit-description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                    </div>
                    <div>
                        <label for="edit-requirements" class="block text-sm font-medium text-gray-700">Requirements (JSON Format)</label>
                        <textarea name="requirements" id="edit-requirements" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                    </div>
                    <div>
                        <label for="edit-guides" class="block text-sm font-medium text-gray-700">Guides (JSON Format)</label>
                        <textarea name="guides" id="edit-guides" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                    </div>
                    <div>
                        <label for="edit-source_code_link" class="block text-sm font-medium text-gray-700">Source Code Link</label>
                        <input type="text" name="source_code_link" id="edit-source_code_link" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="edit-file_path" class="block text-sm font-medium text-gray-700">File Path</label>
                        <input type="text" name="file_path" id="edit-file_path" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="edit-thumbnail" class="block text-sm font-medium text-gray-700">Thumbnail</label>
                        <input type="text" name="thumbnail" id="edit-thumbnail" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="edit-latest_version" class="block text-sm font-medium text-gray-700">Latest Version</label>
                        <input type="text" name="latest_version" id="edit-latest_version" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="edit-status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="edit-status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="active">Active</option>
                            <option value="in-development">In Development</option>
                            <option value="deprecated">Deprecated</option>
                        </select>
                    </div>
                </div>
                <div class="mt-4 flex justify-end">
                    <button type="button" onclick="closeEditApplicationModal()" class="text-gray-500 bg-gray-100 hover:bg-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2">Cancel</button>
                    <button type="submit" class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Applications name
                </th>
                <th scope="col" class="px-6 py-3">
                    Descriptions
                </th>
                <th scope="col" class="px-6 py-3">
                    Latest Version
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $a)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $a->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $a->description }}
                </td>
                <td class="px-6 py-4">
                    {{ $a->latest_version }}
                </td>
                <td class="px-6 py-4">
                    {{ $a->status }}
                </td>
                <td class="px-6 py-4">
                    <button onclick="showEditApplicationModal({{ json_encode($a) }})" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button> |
                    <form method="POST" action="{{ route('applications-management.destroy', $a->id) }}" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this application?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                    </form>                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function showAddApplicationModal() {
        document.getElementById('add-application-modal').classList.remove('hidden');
    }

    function closeAddApplicationModal() {
        document.getElementById('add-application-modal').classList.add('hidden');
    }

    function showEditApplicationModal(application) {
        const form = document.getElementById('edit-application-form');
        form.action = `/applications-management/${application.id}`;
        document.getElementById('edit-name').value = application.name;
        document.getElementById('edit-description').value = application.description;
        document.getElementById('edit-requirements').value = application.requirements;
        document.getElementById('edit-guides').value = application.guides;
        document.getElementById('edit-source_code_link').value = application.source_code_link;
        document.getElementById('edit-file_path').value = application.file_path;
        document.getElementById('edit-thumbnail').value = application.thumbnail;
        document.getElementById('edit-latest_version').value = application.latest_version;
        document.getElementById('edit-status').value = application.status;

        document.getElementById('edit-application-modal').classList.remove('hidden');
    }

    function closeEditApplicationModal() {
        document.getElementById('edit-application-modal').classList.add('hidden');
    }
</script>

@endsection
