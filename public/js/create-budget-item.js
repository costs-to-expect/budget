(function () {
    'use strict'

    let frequency = document.querySelector('select#frequency_option');

    let toggleFrequency = function(value_of_select)
    {
        if (value_of_select === 'monthly') {
            document.querySelectorAll('[data-frequency="annually"]').forEach(element => {
                element.style.display = 'none';
            });
            document.querySelectorAll('[data-frequency="monthly"]').forEach(element => {
                element.style.display = 'block';
            });
        } else {
            document.querySelectorAll('[data-frequency="annually"]').forEach(element => {
                element.style.display = 'block';
            });
            document.querySelectorAll('[data-frequency="monthly"]').forEach(element => {
                element.style.display = 'none';
            });
        }
    }

    if (frequency !== null) {
        toggleFrequency(frequency.value);
        frequency.addEventListener('change', event => toggleFrequency(event.target.value));
    }
})();
