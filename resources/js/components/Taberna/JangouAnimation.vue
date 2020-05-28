<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <lottie  :options="defaultOptions" :height="200" :width="200" />
            </div>
        </div>
    </div>
</template>

<script>
    import Lottie from "vue-lottie";
    // import loadingJson from "../../../views/animazioak/loading.json";
    import loadingJson from "../../../views/animazioak/jangou_dark_animation.json";


      export default {
        components: {
            Lottie
            
        },
        data() {
            return {
                  defaultOptions: {
                    animationData: loadingJson,
                    loop: true
                },
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
