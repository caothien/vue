<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">List hot boy Việt Nam</div>
                    <div class="panel-body">
                        <router-link :to="{name: 'createStudent'}" class="btn btn-success" style="margin-bottom: 8px; float: right;">New hot boy</router-link>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="todo, index in student">
                                <td>{{ index + 1 }}</td>
                                <td>{{ todo.name }}</td>
                                <td>{{ todo.created_at }}</td>
                                <td>
                                    <button class="btn btn-info">Show</button>
                                    <button class="btn btn-primary">Update</button>
                                    <button class="btn btn-danger" v-on:click="deleteEntry(todo.id, index)">Delete</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <p class="test">1233</p>
                        <img :src="'/images/12333.jpg'">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import "@/style.scss";
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
        created() {
            axios.get('/api/cruds')
                .then(response => {
                    this.student = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/cruds/' + id)
                        .then(function (resp) {
                            app.student.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete company");
                        });
                }
            }
        }
    }
</script>