<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" v-bind:style="{ backgroundColor: '#b5bd2c',color: 'black'}">{{$t('createTaberna.foodCards')}}</div>
                    <div class="card-body" v-bind:style="{ backgroundColor: '#535353',color: '#b5bd2c'}">
                        <div class="card">
                            <div class="card-header" v-bind:style="{ backgroundColor: '#b5bd2c',color: 'black'}">
                                <h3 class="card-title">{{$t('createTaberna.foodCardsCreate')}}</h3>
                                <!-- <div class="card-tools">
                                <span class="badge badge-primary">Label</span>
                                </div> -->
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" v-bind:style="{ backgroundColor: '#333333',color: '#b5bd2c'}">
                                <div class="form-group">
                                     <img :src="image" width="200px" class="img-responsive">
                                    <label for="image"> {{$t('createTaberna.foodCardImage')}}</label>
                                    <input id="imageInput" type="file" accept="image/*"  @change="onFileChangeImage" ref="fileInput" 
                                        :class="imageError? 'form-control is-invalid':imageSuccess?'form-control is-valid':'form-control'">
                                    <button class="btn btn-success btn-block" @click="uploadImage">{{$t('createTaberna.upload')}}</button> 
                                    <!-- <button class="btn btn-danger btn-block" @click="deleteImage">Delete</button>                                     -->
                                    <span v-if="imageError!=''" class="invalid-feedback">
                                        <strong>{{ imageError }}</strong>
                                    </span>
                                    <span v-if="imageSuccess!=''" class="valid-feedback">
                                        <strong>{{ imageSuccess }}</strong>
                                    </span>
                                </div>
                                
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer" v-bind:style="{ backgroundColor: '#333333',color: '#b5bd2c'}">
                            <table v-if="imagesURL!=[]" class="table" style="background-color:#66666666">
                                <tbody>
                                    <tr v-for="(image, index) in imagesURL" :key="index">
                                        <td>
                                           <img :src="server+image" width="200px" class="img-responsive">
                                        </td>
                                        <td align="left">
                                            
                                         <button class="btn btn-danger btn-block" @click="deleteModal(image)"><em class="fa fa-trash" style="color:white;"></em></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                <div id="deleteModal" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title">{{$t('createTaberna.delete')}}</h6>
                            </div>
                            <div class="modal-body">
                                <p style="font-size:20px;"><b>{{$t('createTaberna.deleteSure')}}</b></p><br>
                                <button class="btn btn-danger btn-block" @click="deleteImageFC()">{{$t('createTaberna.delete')}}</button>
                                <button class="btn btn-secondary btn-block" @click="cancelImage()">{{$t('createTaberna.cancel')}}</button>

                            </div>                          
                        </div>
                    </div>
                </div>
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
        
        components: {

        },
        data() {
            return {
                imagesURL:[],
                image:'',
                imageDelete:'',
                imageError:'',
                imageSuccess:'',
                imageType:'',
                imageURL:'',
                idTaberna:'',
                server:'https://jangou.eus'

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
            onFileChangeImage(e) {
                this.imageType=e.target.files[0].type.replace('image/','')
                if(this.imageType!='png' && this.imageType!='jpg' && this.imageType!='jpeg' ){
                   this.showToast('error', this.$t('createTaberna.badImageType')) 
                   this.imageError = this.$t('createTaberna.badImageType')
                   document.getElementById('imageInput').value=''
                   this.image =''
                }else{
                this.compressImage(e)
                }
               
            },
            //    onFileChangeImage(e) {
            //     this.imageType=e.target.files[0].type.replace('image/','')
            //     console.log( this.imageType)
            //     let files = e.target.files || e.dataTransfer.files;
            //     if (!files.length)
            //         return;
            //     this.createImage(files[0]);
            // },
            compressImage(e) {
                    const width = 640;
                    const height = 360;
                    const fileName = e.target.files[0].name;
                    const reader = new FileReader();
                    reader.readAsDataURL(e.target.files[0]);
                    reader.onload = event => {
                        const img = new Image();
                        img.src = event.target.result;
                        img.onload = () => {
                                const elem = document.createElement('canvas');
                                elem.width = width;
                                elem.height = (width*img.height)/img.width;
                                const ctx = elem.getContext('2d');
                                // img.width and img.height will contain the original dimensions
                                ctx.drawImage(img, 0, 0,  elem.width, elem.height);
                                ctx.canvas.toBlob((blob) => {
                                    const file = new File([blob], fileName, {
                                        type: 'image/jpeg',
                                        lastModified: Date.now()
                                    });
                                    
                                    this.createImage(file)
                                }, 'image/jpeg', 1);
                                
                            },
                            reader.onerror = error => console.log(error);
                    };
                },
            createImage(file) {
                if(file.size>600000){
                    this.image =''
                   this.showToast('error', this.$t('createTaberna.badImageSize')) 
                   this.imageError = this.$t('createTaberna.badImageSize')
                   document.getElementById('imageInput').value=''
                }else{
                    this.imageError = ''
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.image = e.target.result;
                };
                reader.readAsDataURL(file);
                }
            },
            //   createImage(file) {
            //     let reader = new FileReader();
            //     reader.onload = (e) => {
            //         this.image= e.target.result;
            //         console.log(this.image)
            //     };
            //     reader.readAsDataURL(file);
            // },
        
           uploadImage(){
               var imageID = Math.random().toString(36).slice(-8);
                axios.post('/image/card/upload',{
                    image:this.image,
                    type:this.imageType,
                    idTaberna:this.idTaberna,
                    imageID:imageID
                }).then(response => {
                    this.imagesURL.push(response.data.replace('storage', 'public'))
                    this.image= ''
                    this.imageType=''
                    document.getElementById('imageInput').value=''
                 
                }).catch(error => {
                    console.log(error)
                    this.errorSend('updateTaberna','uploadImage',error.response.data.message)
                });
            },
            removeItemOnce(value) { 
                var index = this.imagesURL.indexOf(value);
                if (index > -1) {
                    this.imagesURL.splice(index, 1);
                }
            },
            deleteModal(image){
                this.deleteImage = image
                this.showDeleteModal()
            },
            cancelImage(){
                this.hideDeleteModal()
                this.deleteImage=''
            },
            showDeleteModal(){
                $('#deleteModal').modal('show')
            },
            hideDeleteModal(){
                $('#deleteModal').modal('hide')  
            },
            deleteImageFC(){
                this.removeItemOnce(this.deleteImage)
               var name=this.deleteImage.split('/')
                axios.post('/image/card/delete',{
                    url:this.deleteImage,
                    name:name[5]
                }).then(response => {
                    this.deleteImage=''
                    this.hideDeleteModal()
                    this.showModalSucess()
                    // console.log(response)
                }).catch(error => {
                    this.hideDeleteModal()
                    this.showModalError()
                    console.log(error)
                    this.errorSend('updateTaberna','deleteImageFC',error.response.data.message)

                });
            },
             getImages(idTaberna){
                axios.get('/image/request/',{
                    params: {
                        idTaberna: idTaberna
                      }                   
                }).then(response => { 
                    response.data.images.forEach(element => {
                        this.imagesURL.push(element.image)
                    });
                }).catch(error => {
                    console.log(error)
                    this.errorSend('updateTaberna','getImages',error.response.data.message)
                });
            },
           
            getIdTaberna(){
                axios.get('/taberna/get/idtaberna').then(response => {
                    this.idTaberna=response.data.idTaberna[0].idTaberna
                    this.getImages(this.idTaberna)
                }).catch(error => {
                    console.log(error)
                    this.errorSend('updateTaberna','getIdTaberna',error.response.data.message)
                });

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
                    text: this.$t('createTaberna.modalsCompleteDeleteText'),
                    //footer: '<a href>Why do I have this issue?</a>'
                })
            },

            showToast(icon, title) {
                Toast.fire({
                    icon: icon,
                    title: title
                })
            },
            errorSend(view,funtz,error) {
                axios.post(`telegram/error`, {
                    view: view,
                    funtz: funtz,
                    error:error
                }).then(res => {
                    if (res.data.valid) {
                        this.successMsg = "Mezua ondo bidali da"
                        this.titulua = ''
                        this.mezua = ''
                    }
                }).catch(error => {
                    this.bidaliError = "Bidalketak huts egin du"
                    console.log(error)
                })
            }, 
            
        },
        mounted() {
            this.getIdTaberna()
            this.errorSend('createTaberna','imageUpload','Image size exceded')


        }
    }

</script>
