@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div class="container mx-auto my-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Applications</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($applications as $application)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="flex justify-center items-center">
                        <img src="{{ asset('/images/folder-icon.png') }}" alt="{{ $application->name }}"
                            class="w-48 h-48 rounded-lg object-cover">
                    </div>
                    <div class="p-4">
                        <h2 class="text-lg font-bold">{{ $application->name }}</h2>
                        <p class="text-gray-600">{{ $application->description }}</p>
                        <p class="text-sm text-gray-500 mt-2">Version: {{ $application->latest_version }}</p>
                        <div class="flex items-center">
                            <span
                                class="w-2 h-2 rounded-full mt-2
                                    {{ $application->status === 'active' ? 'bg-green-400' : ($application->status === 'in-development' ? 'bg-yellow-400' : 'bg-gray-400') }}">
                            </span>
                            <span class="ml-2 text-sm text-gray-500 mt-2">{{ ucfirst($application->status) }}</span>
                        </div>

                        <button onclick="showDetails({{ json_encode($application) }})"
                            class="text-blue-500 hover:underline mt-4 inline-block">View Detail</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal Popup -->
    <div id="application-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center">
        <div class="bg-white rounded-lg shadow-lg w-3/4 md:w-1/2 p-6 relative">
            <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">&times;</button>
            <h2 id="modal-title" class="text-2xl font-bold mb-4"></h2>
            <div class="flex justify-center items-center mb-4">
                <img id="modal-thumbnail" src="" alt="Application Thumbnail"
                    class="w-48 h-48 rounded-lg object-cover">
            </div>
            <p id="modal-description" class="text-gray-600 mb-4"></p>
            <p><strong>Version:</strong> <span id="modal-version"></span></p>
            <p><strong>Status:</strong> <span id="modal-status"></span></p>
            <p><strong>Source Code:</strong> <a id="modal-source-link" href="#" target="_blank"
                    class="text-blue-500 hover:underline"></a></p>
            <hr class="my-4">

            <div>
                <p class="text-lg font-semibold mb-2">Requirements:</p>
                <ul id="modal-requirements" class="list-disc ml-6 text-gray-600 mb-4"></ul>

                <p class="text-lg font-semibold mb-2">Guides:</p>
                <ul id="modal-guides" class="list-decimal ml-6 text-gray-600 mb-4"></ul>
            </div>
        </div>
    </div>

    <script>
        function showDetails(application) {
            const baseUrl = "{{ asset('') }}";
            document.getElementById('modal-thumbnail').src = `${baseUrl}/images/folder-icon.png`;
            document.getElementById('modal-title').innerText = application.name;
            document.getElementById('modal-description').innerText = application.description;
            document.getElementById('modal-version').innerText = application.latest_version;
            document.getElementById('modal-status').innerText = application.status;
            document.getElementById('modal-source-link').innerText = 'Download Source Code';
            document.getElementById('modal-source-link').href = application.source_code_link;


            // Populate Requirements
            const requirementsList = document.getElementById('modal-requirements');
            requirementsList.innerHTML = '';
            if (application.requirements) {
                JSON.parse(application.requirements).forEach(req => {
                    const li = document.createElement('li');
                    li.innerText = req;
                    requirementsList.appendChild(li);
                });
            } else {
                requirementsList.innerHTML = '<li>No requirements specified.</li>';
            }

            // Populate Guides
            const guidesList = document.getElementById('modal-guides');
            guidesList.innerHTML = '';
            if (application.guides) {
                Object.entries(JSON.parse(application.guides)).forEach(([key, value]) => {
                    const li = document.createElement('li');
                    li.innerText = `${key}: ${value}`;
                    guidesList.appendChild(li);
                });
            } else {
                guidesList.innerHTML = '<li>No guides available.</li>';
            }

            document.getElementById('application-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('application-modal').classList.add('hidden');
        }
    </script>

@endsection
