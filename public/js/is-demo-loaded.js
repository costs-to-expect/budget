(function (axios) {
    'use strict'

    let sleep = time => new Promise(resolve => setTimeout(resolve, time))
    let poll = (promiseFn, time) => promiseFn().then(
        sleep(time).then(() => poll(promiseFn, time)))

    let check_for_loaded_demo = function() {
        let continue_button = document.querySelector('p.continue-to-demo')
        let loading_message = document.querySelector('p.demo-loading')

        axios.get('/is-demo-loaded')
            .then(response => {
                if (response.data.demo === true) {
                    continue_button.classList.remove('d-none');
                    loading_message.classList.add('d-none');
                }
            });
    }

    poll(() => new Promise(() => check_for_loaded_demo()), 1000 * 2)
})(axios);
