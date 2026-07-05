export class PriceFormatter {
    constructor(selector) {
        this.inputs = document.querySelectorAll(selector);
        if (this.inputs.length > 0) {
            this.init();
        }
    }

    init() {
        this.inputs.forEach(input => {
            // Apply formatting immediately on load if the value is purely numeric (or already formatted)
            this.format(input);
            // Apply formatting on input
            input.addEventListener('input', (e) => this.format(e.target));
        });
    }

    format(input) {
        let val = input.value;
        let clean = val.replace(/Rp\.?\s?/gi, '').replace(/\./g, '');
        if (/^\d*$/.test(clean)) {
            if (clean.length > 0) {
                input.value = 'Rp. ' + new Intl.NumberFormat('id-ID').format(clean);
            } else if (val.match(/^(Rp\.?\s?)$/i)) {
                input.value = '';
            }
        }
    }
}

export function initPriceFormatter() {
    new PriceFormatter('input[name="price"], .auto-price-format');
}
