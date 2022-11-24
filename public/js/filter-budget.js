(function () {
    'use strict'

    let filter = document.querySelector('input[name="budget-filter"]');
    let clear_filter = document.querySelector('button[name="clear-filter"]');

    filter.addEventListener('keyup', function() {
        let filter_value = this.value.toLowerCase();
        let budget_items = document.querySelectorAll('a.budget-item');

        if (filter_value.length > 3) {
            budget_items.forEach(function (budget_item) {

                if (budget_item.dataset.itemName.toLowerCase().includes(filter_value)) {
                    budget_item.style.display = 'block';
                } else {
                    budget_item.style.display = 'none';
                }
            });
        }
    });

    clear_filter.addEventListener('click', function() {
        filter.value = '';
        document.querySelectorAll('a.budget-item').forEach(function (budget_item) {
            budget_item.style.display = 'block';
        });
    });
})();
