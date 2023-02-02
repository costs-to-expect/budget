(function () {
    'use strict'

    const account_filter = document.querySelector('select[name="account-filter"]');

    if (account_filter !== null) {

        account_filter.addEventListener('change', function () {

            const account_id = this.value;
            const items = document.querySelectorAll('a.budget-item');

            if (account_id !== '') {
                items.forEach(function (budget_item) {
                    if (budget_item.dataset.itemAccount === account_id) {
                        budget_item.style.display = 'block';
                    } else {
                        budget_item.style.display = 'none';
                    }
                });
            } else {
                items.forEach(function (budget_item) {
                    budget_item.style.display = 'block';
                });
            }
        });
    }
})();
