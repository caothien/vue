<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq</div>

                    <div class="panel-body">
                        <button @click="demo">Demo</button>
                        qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq
                        <ol>
                            <li v-for="todo in student">
                                {{ todo.name }}
                            </li>
                        </ol>


                        <form v-on:submit="saveForm()">
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label class="control-label">Name student</label>
                                    <input type="text" v-model="xxx.name" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <button class="btn btn-success">Create</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                name: '',
                student: null,
                xxx: {
                    name: ''
                }
            }
        },
        mounted() {
            console.log('abc');
            axios.get('/api/cruds')
                .then(response => {
                    this.student = response.data
                    console.log(this.student);
                })
                .catch(error => {
                    console.log(error)
                })
        },
        methods: {
            demo() {

            },
            saveForm() {
                event.preventDefault();
                console.log(this.xxx)
                // event.preventDefault();
                // var app = this;
                // var newCompany = app.company;
                axios.post('/api/cruds', this.xxx)
                    .then(function (resp) {
                        this.router.push('/cruds')
                        console.log('ok');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your company");
                    });
            }
        }
    }
</script>