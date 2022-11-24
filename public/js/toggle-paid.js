(function () {
    'use strict'

    let show_paid = true;
    let toggle = document.querySelector('button[name="toggle-paid"]');

    if (toggle !== null) {
        toggle.addEventListener('click', function () {

            show_paid = !show_paid;

            document.querySelectorAll('a.budget-item[data-item-paid]').forEach(function (budget_item) {
                if (show_paid === true) {
                    budget_item.style.display = 'block';
                } else {
                    budget_item.style.display = 'none';
                }
            });
        });
    }
})();
