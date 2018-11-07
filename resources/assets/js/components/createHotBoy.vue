<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">List hot boy Neolab Viet Nam</div>
                    <div class="panel-body">
                        <form v-on:submit="saveForm()">
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label class="control-label">Name hot boy</label>
                                    <input type="text" v-model="xxx.name" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <button class="btn btn-success">Create</button>
                                    <router-link :to="{name: 'demo'}" class="btn btn-primary">Back</router-link>
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
                xxx: {
                    name: ''
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                axios.post('/api/cruds', this.xxx)
                    .then((resp) => {
                        this.$router.push('/list-hotboy');
                    })
                    .catch(function (resp) {
                        alert("Could not create your hot boy");
                    });
            },
        }
    }
</script>