(function () {
    'use strict'

    let filter = document.querySelector('input[name="table-filter"]');

    if (filter !== null) {

        filter.addEventListener('keyup', function () {
            let filter_value = this.value.toLowerCase();
            let budget_items = document.querySelectorAll('table.budget-items tr.item-data');

            if (filter_value.length > 3) {
                budget_items.forEach(function (budget_item) {

                    if (
                        budget_item.dataset.itemName.toLowerCase().includes(filter_value) ||
                        budget_item.dataset.itemDescription.toLowerCase().includes(filter_value) ||
                        budget_item.dataset.itemAmount.toLowerCase().includes(filter_value)
                    ) {
                        budget_item.style.display = 'table-row';
                    } else {
                        budget_item.style.display = 'none';
                    }
                });
            } else {
                budget_items.forEach(function (budget_item) {
                    budget_item.style.display = 'table-row';
                });
            }
        });
    }
})();
