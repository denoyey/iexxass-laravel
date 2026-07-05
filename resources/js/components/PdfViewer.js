import * as pdfjsLib from 'pdfjs-dist';
import pdfWorkerUrl from 'pdfjs-dist/build/pdf.worker.mjs?url';

export default class PdfViewer {
    constructor(element) {
        this.container = element;
        this.url = element.dataset.pdfUrl;
        this.loader = element.querySelector('.pdf-loader');
    }

    async render() {
        if (!this.url) return;

        try {
            pdfjsLib.GlobalWorkerOptions.workerSrc = pdfWorkerUrl;
            const pdfDoc = await pdfjsLib.getDocument({ url: this.url }).promise;

            if (this.loader) {
                this.loader.style.display = 'none';
            }

            for (let pageNum = 1; pageNum <= pdfDoc.numPages; pageNum++) {
                await this.renderPage(pdfDoc, pageNum);
            }
        } catch (error) {
            if (this.loader) {
                this.loader.innerHTML = '<p class="text-red-500 font-bold">Gagal memuat dokumen PDF.</p>';
            }
            console.error('Error loading PDF:', error);
        }
    }

    async renderPage(pdfDoc, pageNum) {
        const canvas = document.createElement('canvas');
        canvas.className = 'w-full max-w-3xl rounded-sm shadow-md bg-white mb-4';
        this.container.appendChild(canvas);

        const page = await pdfDoc.getPage(pageNum);
        const viewport = page.getViewport({ scale: 2.0 });

        canvas.height = viewport.height;
        canvas.width = viewport.width;

        const renderContext = {
            canvasContext: canvas.getContext('2d'),
            viewport: viewport
        };

        await page.render(renderContext).promise;
    }
}
