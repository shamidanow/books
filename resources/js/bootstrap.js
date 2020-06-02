window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.Vue = require('vue');

//Vue.component('parse-component', require('./components/Parse.vue').default);

const app = new Vue({
    el: '#app'
});

Vue.component('parse-component', {
    template:
        `<div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="lable-name">Строка, содержащая email адреса</label>
                                <textarea class="form-control" v-model="string" placeholder="Введите строку"></textarea>
                            </div>
                            <button type="button" class="button is-link" @click="parse">Отправить</button>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label class="lable-name">Результат парсинга</label>
                                <textarea class="form-control">{{ this.result }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`,
    data: function () {
        return {
            string: "test test@mail.ru mail test2@gmail.com gmail",
            result: ""
        }
    },
    methods: {
        parse: function () {
            let self = this;
            const sendData = {
                string: this.string
            };
            axios.post('/parseRequest', sendData)
                .then(function (response) {
                    console.log(response.data);
                    self.result = response.data;
                })
                .catch(function (error) {
                    console.log('Ошибка: ' + error);
                });
        }
    },
    mounted() {
        console.log('Component mounted.');
    }
});

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
