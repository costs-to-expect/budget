(function () {
    'use strict'

    const toggle = document.querySelector('button#navbar-mobile-menu-toggle');

    if (toggle !== null) {

        const open = document.querySelector('svg#navbar-mobile-menu-toggle-open');
        const close = document.querySelector('svg#navbar-mobile-menu-toggle-close');
        const menu = document.querySelector('div#navbar-mobile-menu');

        toggle.addEventListener('click', function () {
            let state = this.getAttribute('aria-expanded') === 'true' || false;
            if (state === false) {
                this.setAttribute('aria-expanded', 'true');
                open.classList.add('hidden')
                close.classList.remove('hidden');
                menu.classList.remove('hidden');
            } else {
                this.setAttribute('aria-expanded', 'false');
                open.classList.remove('hidden')
                close.classList.add('hidden');
                menu.classList.add('hidden');
            }
        });
    }

    /**
     * Toggle the defined submenu and collapse the other submenus
     *
     * @param {string} name
     * @param {string[]} collapse
     */
    function toggleSubmenu(name, collapse) {
        const toggle = document.querySelector('div#' + name + ' button.submenu-toggle');

        if (toggle !== null) {
            const menu = document.querySelector('div#' + name + ' div.submenu');

            toggle.addEventListener('click', function () {
                let state = this.getAttribute('aria-expanded') === 'true' || false;
                if (state === false) {

                    collapse.forEach(function (name) {
                        const toggle = document.querySelector('div#' + name + ' button.submenu-toggle');
                        const menu = document.querySelector('div#' + name + ' div.submenu');
                        toggle.setAttribute('aria-expanded', 'false');
                        menu.classList.add('hidden');
                    });

                    this.setAttribute('aria-expanded', 'true');
                    menu.classList.remove('hidden');
                } else {
                    this.setAttribute('aria-expanded', 'false');
                    menu.classList.add('hidden');
                }
            });
        }
    }

    toggleSubmenu('budgeting', ['features', 'about']);
    toggleSubmenu('about', ['budgeting', 'features']);
    toggleSubmenu('features', ['budgeting', 'about']);
})();