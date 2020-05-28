<template>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6">
                <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{$t('createTaberna.changePass')}}</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body " style="">
                <div class='row justify-content-center '>
                    <div class="alert alert-success" v-if="successMsg!=''">
                        {{ successMsg }}
                        <button type="button" class="close" v-on:click="noValidate()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="alert alert-danger" v-if="dangerMsg!=''">
                        {{ dangerMsg }}
                        <button type="button" class="close" v-on:click="noValidate()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                
                <div class='col-md-12 text-center'>
                    <div class="col-md-1 ">
                        <h4 v-bind:style="{ backgroundColor: '#333333',color: '#b5bd2c'}"><i class="fas fa-fw fa-lock"></i> {{$t('createTaberna.password')}}</h4>
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="pass" class="form-control" v-model="pass"
                            :placeholder="$t('createTaberna.password')">
                    </div>
                </div>
                <br>
                <div class='col-md-12 text-center'>
                    <div class="col-md-1  ">
                        <h4 v-bind:style="{ backgroundColor: '#333333',color: '#b5bd2c'}" ><i class="fas fa-fw fa-lock"></i>{{ $t('createTaberna.repeatPassword')}}</h4>
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="pass2" class="form-control" v-model="pass2"
                            :placeholder="$t('createTaberna.repeatPassword')">
                    </div>
                </div>
                <!-- <div class="row"> -->
                    <!-- <div class="col-md-12 text-center"> -->
                       
                    <!-- </div> -->
                </div>
                 <a class="btn mt-3" v-bind:style="{ backgroundColor: '#b5bd2c',color: 'black'}" v-on:click="changePass()">
                            <em class="fa fa-envelope" style="color:white;"> {{$t('createTaberna.send')}}</em>
                        </a>
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
                pass: '',
                //nanMota: this.$t('strings.nan'),
                pass2: '',
                successMsg: '',
                dangerMsg: '',
            }
        },
        methods: {
            changePass() {
                if (this.pass == this.pass2) {
                    axios.post('/changePass', {
                        pass: this.pass
                    }).then(res => {
                        this.valid = res.data.valid;
                        if (!res.data.valid) {
                            this.showToast('error',this.$t('createTaberna.modalsErrorTitle'))
                            this.dangerMsg = this.$t('createTaberna.modalsErrorTitle')

                        } else {
                            // this.successMsg = this.$t('createTaberna.passwordSuccess')
                             this.showToast('success',this.$t('createTaberna.passwordSuccess'))
                             this.showModalSucess()
                            this.pass=""
                            this.pass2=""
                        }
                    }).catch(error => {
                        console.log(error)
                    })
                } else {
                     this.showToast('error',this.$t('createTaberna.passwordError'))
                    this.dangerMsg = this.$t('createTaberna.passwordError')
                }
            },
            noValidate() {
                this.dangerMsg = ''
                this.successMsg = ''
            },
              showToast(icon, title) {
                Toast.fire({
                    icon: icon,
                    title: title
                })
            },
            showModalError() {
                Swal.fire({
                    icon: 'error',
                    title: this.$t('createTaberna.modalsErrorTitle'),
                    text: this.$t('createTaberna.modalsErrorText'),
                    //footer: '<a href>Why do I have this issue?</a>'
                })
            },
            showModalSucess() {
                Swal.fire({
                    icon: 'success',
                    title: this.$t('createTaberna.modalsCompleteTitle'),
                    text: this.$t('createTaberna.modalsCompleteText'),
                    //footer: '<a href>Why do I have this issue?</a>'
                })
            },

        },
        mounted() {
        }
    }

</script>
