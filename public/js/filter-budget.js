(function () {
    'use strict'

    const filter = document.querySelector('input[name="budget-filter"]');
    const clear_filter = document.querySelector('button[name="clear-filter"]');

    if (filter !== null && clear_filter !== null) {

        filter.addEventListener('keyup', function () {
            let filter_value = this.value.toLowerCase();
            const budget_items = document.querySelectorAll('a.budget-item');

            if (filter_value.length > 3) {
                budget_items.forEach(function (budget_item) {

                    if (budget_item.dataset.itemName.toLowerCase().includes(filter_value)) {
                        budget_item.style.display = 'block';
                    } else {
                        budget_item.style.display = 'none';
                    }
                });
            } else {
                document.querySelectorAll('a.budget-item').forEach(function (budget_item) {
                    budget_item.style.display = 'block';
                });
            }
        });

        clear_filter.addEventListener('click', function () {
            filter.value = '';
            document.querySelectorAll('a.budget-item').forEach(function (budget_item) {
                budget_item.style.display = 'block';
            });
        });
    }
})();
