(function () {
    'use strict'

    document.querySelectorAll('input.to-fixed').forEach(fixed_input =>
        fixed_input.addEventListener('blur', function() {
            this.value = parseFloat(this.value).toFixed(parseInt(this.dataset.points));
        })
    );
})();
