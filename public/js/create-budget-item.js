(function () {
    'use strict'

    let frequency = document.querySelector('select#frequency_option');
    let toggleFrequency = function(value_of_select) {
        if (value_of_select === 'monthly') {
            document.querySelectorAll('[data-frequency="annually"]').forEach(element => {
                element.style.display = 'none';
            });
            document.querySelectorAll('[data-frequency="monthly"]').forEach(element => {
                element.style.display = 'block';
            });
            document.querySelectorAll('[data-frequency="one-off"]').forEach(element => {
                element.style.display = 'block';
            });
        } else if (value_of_select === 'annually') {
            document.querySelectorAll('[data-frequency="annually"]').forEach(element => {
                element.style.display = 'block';
            });
            document.querySelectorAll('[data-frequency="monthly"]').forEach(element => {
                element.style.display = 'none';
            });
            document.querySelectorAll('[data-frequency="one-off"]').forEach(element => {
                element.style.display = 'block';
            });
        } else {
            document.querySelectorAll('[data-frequency="annually"]').forEach(element => {
                element.style.display = 'none';
            });
            document.querySelectorAll('[data-frequency="monthly"]').forEach(element => {
                element.style.display = 'none';
            });
            document.querySelectorAll('[data-frequency="one-off"]').forEach(element => {
                element.style.display = 'none';
            });
        }
    }

    if (frequency !== null) {
        toggleFrequency(frequency.value);
        frequency.addEventListener('change', event => toggleFrequency(event.target.value));
    }

    let category = document.querySelector('select#category');
    let toggleCategory = function(value_of_select) {
        let target_account = document.querySelector('[data-savings="target_account"]');
        if (target_account !== null) {
            if (value_of_select === 'savings') {
                document.querySelector('[data-savings="target_account"]').style.display = 'block';
            } else {
                document.querySelector('[data-savings="target_account"]').style.display = 'none';
            }
        }
    }

    if (category !== null) {
        toggleCategory(category.value);
        category.addEventListener('change', event => toggleCategory(event.target.value));
    }
})();
