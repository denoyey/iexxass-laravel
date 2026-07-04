@props(['id', 'pdfUrl', 'downloadUrl'])

<div id="{{ $id }}" data-lenis-prevent="true"
    class="fixed hidden z-99999 inset-0 bg-black/80 overflow-hidden overscroll-none h-full w-full">
    <div class="min-h-full w-full flex items-center justify-center p-4 md:p-8"
        onclick="closeModal('{{ $id }}')">
        <div class="relative shadow-2xl rounded-md bg-white w-full max-w-4xl h-[75vh] flex flex-col overflow-hidden"
            onclick="event.stopPropagation()">

            <!-- Header -->
            <div class="flex justify-between items-center px-4 py-3 border-b border-gray-200 bg-gray-50">
                <h3 class="text-base md:text-lg font-bold text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-BG-IExxass" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                    E-Book Portofolio
                </h3>
                <div class="flex items-center gap-2 md:gap-3">
                    <a href="{{ $downloadUrl }}"
                        class="bg-BG-IExxass hover:bg-blue-800 text-white font-medium text-xs md:text-sm px-3 md:px-4 py-2 rounded-md transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        <span class="hidden sm:inline">Download</span>
                    </a>
                    <button onclick="closeModal('{{ $id }}')" type="button"
                        class="text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-md text-sm p-1.5 md:p-2 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- PDF Viewer -->
            <div class="flex-1 w-full bg-gray-200 overflow-y-auto" style="-webkit-overflow-scrolling: touch;">
                <div id="pdf-render-container-{{ $id }}"
                    class="flex flex-col items-center gap-4 p-4 min-h-full">
                    <!-- Loading Spinner -->
                    <div id="pdf-loader-{{ $id }}"
                        class="flex flex-col items-center justify-center py-20 text-gray-500">
                        <svg class="animate-spin h-8 w-8 mb-4 text-BG-IExxass" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        <p class="font-medium tracking-wider text-sm">Menyiapkan Dokumen...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const url = '{{ $pdfUrl }}';
            const container = document.getElementById('pdf-render-container-{{ $id }}');
            const loader = document.getElementById('pdf-loader-{{ $id }}');

            if (!container) return;

            const pdfjsLib = window['pdfjs-dist/build/pdf'];
            pdfjsLib.GlobalWorkerOptions.workerSrc =
                'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

            pdfjsLib.getDocument(url).promise.then(function(pdfDoc) {
                loader.style.display = 'none';

                for (let pageNum = 1; pageNum <= pdfDoc.numPages; pageNum++) {
                    const canvas = document.createElement('canvas');
                    canvas.id = 'pdf-page-{{ $id }}-' + pageNum;
                    canvas.className = 'w-full max-w-3xl rounded-sm shadow-md bg-white';
                    container.appendChild(canvas);

                    pdfDoc.getPage(pageNum).then(function(page) {
                        // Use scale 2.0 for high DPI / Retina crispness
                        const viewport = page.getViewport({
                            scale: 2.0
                        });
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        const renderContext = {
                            canvasContext: canvas.getContext('2d'),
                            viewport: viewport
                        };
                        page.render(renderContext);
                    });
                }
            }).catch(function(error) {
                loader.innerHTML = '<p class="text-red-500 font-bold">Gagal memuat dokumen PDF.</p>';
                console.error('Error loading PDF:', error);
            });
        });
    </script>
@endpush
