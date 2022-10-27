(function() {
    'use strict';

    const TableFilter = (function () {
        let Arr = Array.prototype;
        let input;

        function onInputEvent(e) {
            input = e.target;
            let table1 = document.getElementsByClassName(input.getAttribute('data-table'));

            console.log(table1);

            Arr.forEach.call(table1, function (table) {
                Arr.forEach.call(table.tBodies, function (tbody) {
                    Arr.forEach.call(tbody.rows, filter);
                });
            });
        }

        function filter(row) {
            let text = row.textContent.toLowerCase();
            let val = input.value.toLowerCase();
            row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
        }

        return {
            init: function () {
                let inputs = document.getElementsByClassName('table-filter');
                Arr.forEach.call(inputs, function (input) {
                    input.oninput = onInputEvent;
                });
            }
        };

    })();

    TableFilter.init();
})();