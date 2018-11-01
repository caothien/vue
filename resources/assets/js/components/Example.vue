<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
                        <button @click="demo">Demo</button>
                        <p>Full name: {{ name }}</p>
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
                name: ''
            }
        },
        mounted() {
            console.log('Component mounted.');
        },
        methods: {
            demo() {
                axios.get('http://www.mocky.io/v2/5bd66f683500005800fd7b80')
                    .then(response => {
                        this.name = response.data;
                        console.log(response.data)
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        }
    }
</script>
