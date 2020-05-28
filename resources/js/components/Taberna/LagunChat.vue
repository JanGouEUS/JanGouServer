<template>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                        <div class="card">
                            <div class="card-header" v-bind:style="{ backgroundColor: '#b5bd2c',color: 'black'}">
                                <h3 class="card-title">{{$t('createTaberna.help')}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" v-bind:style="{ backgroundColor: '#333333',color: '#b5bd2c'}">
                                <label for="image"> {{$t('createTaberna.msgTitle')}}</label>
                                <input type="text" class="form-control" v-model="titulua" name="izenburua"
                                     required autofocus>
                                <br>
                                <label for="image"> {{$t('createTaberna.msg')}}</label>
                                    <textarea type="text" rows="3" v-model="mezua" :class="'form-control'" />
                                            
                                <br>
                                <center>
                                    <button class="btn" v-bind:style="{ backgroundColor: '#b5bd2c',color: 'black'}" type="submit"
                                        @click="bidaliMezua()">{{$t('createTaberna.sendMsg')}}</button>
                                </center>
                            </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    import Swal from 'sweetalert2'

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    export default {
        data() {
            return {
                mezua: '',
                titulua: '',
                successMsg: '',
                bidaliError: '',
            }
        },
        methods: {

            bidaliMezua() {
                axios.post(`telegram/send`, {
                    mezua: this.mezua,
                    izenburua: this.titulua,
                }).then(res => {
                    if (res.data.valid) {
                        this.showToast('success', this.$t('createTaberna.sendSuccess'))
                        this.showModalSucess()
                        this.titulua = ''
                        this.mezua = ''
                    }
                }).catch(error => {
                    this.showToast('error', this.$t('createTaberna.sendError'))
                    this.showModalError()
                    console.log(error)
                })
            },
            errorSend(view, funtz, error) {
                axios.post(`/telegram/error`, {
                    view: view,
                    funtz: funtz,
                    error: error
                }).then(res => {
                    if (res.data.valid) {
                        this.showToast('success', this.$t('createTaberna.pay'))
                        this.successMsg = "Mezua ondo bidali da"
                        this.titulua = ''
                        this.mezua = ''
                    }
                }).catch(error => {
                    this.showToast('error', this.$t('createTaberna.name') + ' ' + this.$t(
                        'createTaberna.emptyError'))
                    this.bidaliError = "Bidalketak huts egin du"
                    console.log(error)
                })
            },
            /*
            |--------------------------------------------------------------------------
            | MODAL - TOAST
            |--------------------------------------------------------------------------
            */

            showToast(icon, title) {
                Toast.fire({
                    icon: icon,
                    title: title
                })
            },
            showModalError() {
                Swal.fire({
                    icon: 'error',
                    title: this.$t('createTaberna.help'),
                    text: this.$t('createTaberna.sendError'),
                    //footer: '<a href>Why do I have this issue?</a>'
                })
            },
            showModalSucess() {
                Swal.fire({
                    icon: 'success',
                    title: this.$t('createTaberna.help'),
                    text: this.$t('createTaberna.sendSuccess'),
                    //footer: '<a href>Why do I have this issue?</a>'
                })
            },

        },
        mounted() {}
    }

</script>
