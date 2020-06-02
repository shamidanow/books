<template>
    <div class="container">
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
    </div>
</template>

<script>
    export default {
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
    }
</script>
