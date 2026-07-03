@props([
    'id',
    'message' => 'Are you sure?',
    'confirmUrl' => '#',
    'confirmText' => "Yes, I'm sure",
    'cancelText' => 'No, cancel',
])

<div id="{{ $id }}" class="fixed hidden z-50 inset-0 bg-white bg-opacity-85 overflow-y-auto h-full w-full px-4">
    <div class="relative top-40 mx-auto shadow-xl rounded-md bg-transparent max-w-md">

        <div class="flex justify-end p-2">
            <button onclick="closeModal('{{ $id }}')" type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <div class="p-6 pt-0 text-center">
            <svg class="w-20 h-20 text-BG-IExxass mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">{{ $message }}</h3>
            <a href="{{ $confirmUrl }}" target="_blank" onclick="closeModal('{{ $id }}')"
                class="border border-BG-IExxass text-BG-IExxass hover:bg-BG-IExxass hover:text-white focus:ring-4 font-medium text-base inline-flex items-center px-5 py-2 text-center mr-2">
                {{ $confirmText }}
            </a>
            <a href="" onclick="closeModal('{{ $id }}')"
                class="border border-BG-IExxass text-BG-IExxass hover:bg-BG-IExxass hover:text-white focus:ring-4 font-medium text-base inline-flex items-center px-8 py-2 text-center mr-2">
                {{ $cancelText }}
            </a>
        </div>

    </div>
</div>
