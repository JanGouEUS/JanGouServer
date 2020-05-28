<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
      export default {
        components: {
            
        },
        data() {
            return {
            }
        },
        computed: {

        },
        methods: {
             axiosExample() {
                axios.post(`/create/lenguage`, {
                    code: 'en',
                    language: 'en_US',
                }).then(res => {
                    console.log(res)
                }).catch(error => {
                    console.log(error)
                })
            },
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
