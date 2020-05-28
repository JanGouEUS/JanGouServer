
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ">
                    <div v-bind:style="{ backgroundColor: '#b5bd2c',color: 'black'}" class="card-header">{{$t('createTaberna.cardTitle')}}</div>
                    <div class="card-body dark" v-bind:style="{ backgroundColor: '#535353',color: '#b5bd2c'}">
                        <!-- <div class="row justify-content-center"> -->
                        <div class="form-group">
                            <label for="name"><b style="color:#b5bd2c">* </b>{{$t('createTaberna.name')}}</label>
                            <input v-on:change="nameError='',nameSuccess=''" type="text" v-model="name"
                                :class="nameError? 'form-control is-invalid':nameSuccess?'form-control is-valid':'form-control'">
                            <span v-if="nameError!=''" class="invalid-feedback">
                                <strong>{{ nameError }}</strong>
                            </span>
                            <span v-if="nameSuccess!=''" class="valid-feedback">
                                <strong>{{ nameSuccess }}</strong>
                            </span>
                        </div>
                        <!-- </div> -->
                        <div class="card card-primary  card-tabs">
                            <div v-bind:style="{ backgroundColor: '#b5bd2c',color: 'black'}" class="card-header p-0 pt-1 row">
                                <ul class="nav nav-tabs" v-for="(language, index) in languagesSelected" :key="index">
                                    <li class="nav-item">
                                        <a :class="languageSelect==language?'nav-link active':'nav-link'"
                                            v-bind:style="[languageSelect==language? {color:'#b5bd2c'} : {color:'black'}]"
                                            @click="languageSelect=language">{{language}}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body" v-bind:style="{ backgroundColor: '#333333',color: '#b5bd2c'}">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-content" id="myTabContent"
                                        v-for="(language, index) in languagesSelected" :key="index">
                                        <div v-if="languageSelect==language" class="form-group">
                                            <div class="alert" v-bind:style="{ backgroundColor:'#059ee066' ,color: '#fff'}" role="alert">
                                                {{$t('createTaberna.languageRecordatory')}}
                                            </div>
                                            <label for="description"><b style="color:#b5bd2c">* </b>{{$t('createTaberna.description')}} |
                                                {{language}}</label>
                                                <p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.descriptionText')}}</p>
                                            <textarea
                                                v-on:change="descriptionErrors[language]='',descriptionSuccess[language]=''"
                                                type="text" rows="3" v-model="descriptions[language]"
                                                :class="descriptionErrors[language]? 'form-control is-invalid':descriptionSuccess[language]?'form-control is-valid':'form-control'" />
                                            <span v-if="descriptionErrors[language]!=''" class="invalid-feedback">
                                                <strong>{{ descriptionErrors[language] }}</strong>
                                            </span>
                                            <span v-if="descriptionSuccess[language]!=''" class="valid-feedback">
                                                <strong>{{descriptionSuccess[language] }}</strong>
                                            </span>
                                        </div>
                                       <div v-if="languageSelect==language" class="form-group">
                                            <label for="timetable"><b style="color:#b5bd2c">* </b>{{$t('createTaberna.timeTable')}} | {{language}}</label>
                                            <p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.timeTableText')}}</p>
                                            <textarea
                                                v-on:change="timetablesErrors[language]='',timetablesSuccess[language]=''"
                                                type="text" rows="3" v-model="timetables[language]"
                                                :class="timetablesErrors[language]? 'form-control is-invalid':timetablesSuccess[language]?'form-control is-valid':'form-control'"/>
                                            <span v-if="timetablesErrors[language]!=''" class="invalid-feedback">
                                                <strong>{{ timetablesErrors[language] }}</strong>
                                            </span>
                                            <span v-if="timetablesSuccess[language]!=''" class="valid-feedback">
                                                <strong>{{timetablesSuccess[language] }}</strong>
                                            </span>
                                        </div>
                                        <div v-if="languageSelect==language" class="form-group">
                                            <label for="moreInfo">{{$t('createTaberna.moreInfo')}} | {{language}}</label>
                                            <p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.moreInfoText')}}</p>
                                            <textarea
                                                v-on:change="moreInfosErrors[language]='',moreInfosSuccess[language]=''"
                                                type="text" rows="3" v-model="moreInfos[language]"
                                                :class="moreInfosErrors[language]? 'form-control is-invalid':moreInfosSuccess[language]?'form-control is-valid':'form-control'"/>
                                            <span v-if="moreInfosErrors[language]!=''" class="invalid-feedback">
                                                <strong>{{ moreInfosErrors[language] }}</strong>
                                            </span>
                                            <span v-if="moreInfosSuccess[language]!=''" class="valid-feedback">
                                                <strong>{{moreInfosSuccess[language] }}</strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- MAP - DIRECCTION -->
                        <div class="card">
                            <div class="card-header" v-bind:style="{ backgroundColor: '#b5bd2c',color: 'black'}">
                                <h3 class="card-title">{{$t('createTaberna.place')}}</h3>
                                <!-- <div class="card-tools">
                                <span class="badge badge-primary">Label</span>
                                </div> -->
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" v-bind:style="{ backgroundColor: '#333333',color: '#b5bd2c'}">
                        <!-- <div class="row justify-content-center"> -->
                        <div class="form-group">
                            <label for="place"><b style="color:#b5bd2c">* </b>{{$t('createTaberna.place')}}</label>
                             <p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.placeText')}}</p>
                            
                            <p v-bind:style="{color: '#b5bd2c'}" >{{$t('createTaberna.placeADB')}}</p>
                            <div class="input-group">
                                <input id="place" v-on:change="placeError='',placeSuccess=''" type="text" v-model="place"
                                    :class="placeError? 'form-control is-invalid':placeSuccess?'form-control is-valid':'form-control'">
                                <div class="input-group-prepend">
                                    <button type="button" @click="getPlaceCoordenates"
                                        class="btn  btn-sm" v-bind:style="{ backgroundColor: '#b5bd2c',color: 'black'}">{{$t('createTaberna.search')}}</button>
                                </div>
                                <span v-if="placeError!=''" class="invalid-feedback">
                                    <strong>{{ placeError }}</strong>
                                </span>
                                <span v-if="placeSuccess!=''" class="valid-feedback">
                                    <strong>{{ placeSuccess }}</strong>
                                </span>
                            </div>
                        </div>
                        <!-- </div> -->
                        <!-- <div class="row justify-content-center"> -->
                        <div class="panel-body" style="max-height: 200px;overflow-y: scroll;">
                            <table v-if="places!=[]" class="table" style="background-color:#66666666">
                                <tbody id="lista">
                                    <tr v-for="(item,index) in places" :key="index">
                                        <td @click="selectPlace(item)">{{item.place_name}}[{{item.center[0]}} ,
                                            {{item.center[1]}}]</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- </div> -->
                            </div>
                            <!-- /.card-body -->
                            <div   class="card-footer" v-bind:style="{ backgroundColor: '#333333',color: '#b5bd2c'}">
                                <p v-bind:style="{color: '#b5bd2c'}" >{{$t('createTaberna.placeText2')}}</p>
                                <div id='map' style='width:100%; height: 300px;'></div>
                                <div class="row justify-content-center"> 
                                    <input id="lat" v-model="lat"/> <input id="lng" v-model="lng"/> 
                                </div>
                                <pre id="info"></pre>
                                <!-- <mapbox
                                style='width:100%; height: 300px;'
                                    access-token="pk.eyJ1IjoiYXJrYWl0enNrdXJhIiwiYSI6ImNqdzdlbHN5ZTAzamg0OXAyeW13Mm12dGMifQ.YGh-O7mP9Dv4sGTtg2hsIw"
                                    :map-options="{
                                        style: 'mapbox://styles/mapbox/light-v9',
                                        center: [-96, 37.8],
                                        zoom: 3,
                                    }"
                                    /> -->
                              
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                        <!-- kontaktua eta sare sozialak -->
                        <div class="card">
                            <div class="card-header" v-bind:style="{ backgroundColor: '#b5bd2c',color: 'black'}">
                                <h3 class="card-title">{{$t('createTaberna.social')}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" v-bind:style="{ backgroundColor: '#333333',color: '#b5bd2c'}">
                                <div class="form-group">
                                    <label for="telephone"><b style="color:#b5bd2c">* </b>{{$t('createTaberna.telephone')}}</label>
                                    <!-- <p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.telephoneText')}}</p> -->
                                    <p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.telephoneADB')}}</p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span v-bind:style="{ backgroundColor: 'green',justifyContent:'center',display:'flex',alignItems:'center',padding:'5px'}" ><i v-bind:style="{ color: 'white'}" class="fas fa-fw fa-phone"></i></span>
                                        </div>
                                        <input v-on:change="telephoneError='',telephoneSuccess=''" type="text" v-model="telephone"
                                            :class="telephoneError? 'form-control is-invalid':telephoneSuccess?'form-control is-valid':'form-control'">
                                        <span v-if="telephoneError!=''" class="invalid-feedback">
                                            <strong>{{ telephoneError }}</strong>
                                        </span>
                                        <span v-if="telephoneSuccess!=''" class="valid-feedback">
                                            <strong>{{ telephoneSuccess }}</strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email"><b style="color:#b5bd2c">* </b>{{$t('createTaberna.email')}}</label>
                                    <!-- <p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.emailText')}}</p> -->
                                    <p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.emailADB')}}</p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span v-bind:style="{ backgroundColor: 'red',justifyContent:'center',display:'flex',alignItems:'center',padding:'5px'}" ><i v-bind:style="{ color: 'white'}" class="fas fa-fw fa-envelope"></i></span>
                                        </div>
                                        <input v-on:change="emailError='',emailSuccess=''" type="text" v-model="email"
                                            :class="emailError? 'form-control is-invalid':emailSuccess?'form-control is-valid':'form-control'">
                                        <span v-if="emailError!=''" class="invalid-feedback">
                                            <strong>{{ emailError }}</strong>
                                        </span>
                                        <span v-if="emailSuccess!=''" class="valid-feedback">
                                            <strong>{{ emailSuccess }}</strong>
                                        </span>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="web">{{$t('createTaberna.web')}}</label>
                                       <!-- <p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.webText')}}</p> -->
                                    <p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.webADB')}}</p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span v-bind:style="{ backgroundColor: 'black',justifyContent:'center',display:'flex',alignItems:'center',padding:'5px'}" ><i v-bind:style="{ color: 'white'}" class="fas fa-fw fa-globe"></i></span>
                                        </div>
                                        <input v-on:change="webError='',webSuccess=''" v-model="web" type="text" 
                                            :class="webError? 'form-control is-invalid':webSuccess?'form-control is-valid':'form-control'">
                                        <span v-if="webError!=''" class="invalid-feedback">
                                            <strong>{{ webError }}</strong>
                                        </span>
                                        <span v-if="webSuccess!=''" class="valid-feedback">
                                            <strong>{{ webSuccess }}</strong>
                                        </span>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="twitter">{{$t('createTaberna.twitter')}}</label>
                                    <!-- <p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.twitterText')}}</p> -->
                                    <p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.twitterADB')}}</p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span v-bind:style="{ backgroundColor: '#00acee',justifyContent:'center',display:'flex',alignItems:'center',padding:'5px'}" >
                                                <i v-bind:style="{ color: 'white'}" class="fab fa-twitter"></i>
                                            </span>
                                        </div>
                                        <input v-on:change="twitterError='',twitterSuccess=''" v-model="twitter" type="text" 
                                            :class="twitterError? 'form-control is-invalid':twitterSuccess?'form-control is-valid':'form-control'">
                                        <span v-if="twitterError!=''" class="invalid-feedback">
                                            <strong>{{ twitterError }}</strong>
                                        </span>
                                        <span v-if="twitterSuccess!=''" class="valid-feedback">
                                            <strong>{{ twitterSuccess }}</strong>
                                        </span>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="facebook">{{$t('createTaberna.facebook')}}</label>
                                    <!-- <p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.facebookText')}}</p> -->
                                    <p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.facebookADB')}}</p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span v-bind:style="{ backgroundColor: '#3b5998',justifyContent:'center',display:'flex',alignItems:'center',padding:'5px'}" >
                                                <i v-bind:style="{ color: 'white'}" class="fab fa-facebook"></i>
                                            </span>
                                        </div>
                                        <input v-on:change="facebookError='',facebookSuccess=''" v-model="facebook" type="text" 
                                            :class="facebookError? 'form-control is-invalid':facebookSuccess?'form-control is-valid':'form-control'">
                                        <span v-if="facebookError!=''" class="invalid-feedback">
                                            <strong>{{ facebookError }}</strong>
                                        </span>
                                        <span v-if="facebookSuccess!=''" class="valid-feedback">
                                            <strong>{{ facebookSuccess }}</strong>
                                        </span>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="instagram">{{$t('createTaberna.instagram')}}</label>
                                     <!-- <p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.instagramText')}}</p> -->
                                    <p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.instagramADB')}}</p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span v-bind:style="{ backgroundColor: '#bc2a8d',justifyContent:'center',display:'flex',alignItems:'center',padding:'5px'}" >
                                                <i v-bind:style="{ color: 'white'}" class="fab fa-instagram"></i>
                                            </span>
                                        </div>
                                        <input v-on:change="instagramError='',instagramSuccess=''" v-model="instagram" type="text" 
                                            :class="instagramError? 'form-control is-invalid':instagramSuccess?'form-control is-valid':'form-control'">
                                        <span v-if="instagramError!=''" class="invalid-feedback">
                                            <strong>{{ instagramError }}</strong>
                                        </span>
                                        <span v-if="instagramSuccess!=''" class="valid-feedback">
                                            <strong>{{ instagramSuccess }}</strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telegram">{{$t('createTaberna.telegram')}}</label>
                                    <!-- <p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.telegramText')}}</p> -->
                                    <p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.telegramADB')}}</p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span v-bind:style="{ backgroundColor: '#00acee',justifyContent:'center',display:'flex',alignItems:'center',padding:'5px'}" >
                                                <i v-bind:style="{ color: 'white'}" class="fab fa-telegram"></i>
                                            </span>
                                        </div>
                                        <input v-on:change="telegramError='',telegramSuccess=''" v-model="telegram" type="text" 
                                            :class="telegramError? 'form-control is-invalid':telegramSuccess?'form-control is-valid':'form-control'">
                                        <span v-if="telegramError!=''" class="invalid-feedback">
                                            <strong>{{ telegramError }}</strong>
                                        </span>
                                        <span v-if="telegramSuccess!=''" class="valid-feedback">
                                            <strong>{{ telegramSuccess }}</strong>
                                        </span>
                                    </div>
                                </div>     
                        </div>
                            <!-- /.card-body -->
                            <!-- <div class="card-footer">
                                The footer of the card
                            </div> -->
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header" v-bind:style="{ backgroundColor: '#b5bd2c',color: 'black'}">
                                <h3 class="card-title">{{$t('createTaberna.images')}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" v-bind:style="{ backgroundColor: '#333333',color: '#b5bd2c'}">
                                <div class="form-group">
                            <img :src="imageLink" width="200px" class="img-responsive">
                            <label for="imageLink"> {{$t('createTaberna.imageLink')}}</label>
                             <p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.imageLinkText')}}</p>
                                    <b><p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.imageLinkADB')}}</p></b>
                             <input id="imageLinkInput" type="file" data-max-size="6048" accept="image/*" @change="onFileChangeImageLink"  
                             :class="imageLinkError? 'form-control is-invalid':imageLinkSuccess?'form-control is-valid':'form-control'">                               
                            <!-- <button class="btn btn-success btn-block" @click="preUpload">Upload</button>  -->
                            <!-- <button class="btn btn-danger btn-block" @click="deleteImage">Delete</button>                                     -->
                            <span v-if="imageLinkError!=''" class="invalid-feedback">
                                <strong>{{ imageLinkError }}</strong>
                            </span>
                            <span v-if="imageLinkSuccess!=''" class="valid-feedback">
                                <strong>{{ imageLinkSuccess }}</strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <img :src="logoLink" width="200px" class="img-responsive">
                            <label for="miniBanner"> {{$t('createTaberna.logoLink')}}</label>
                              <p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.logoLinkText')}}</p>
                                    <b><p v-bind:style="{color: '#c0c6c6'}" >{{$t('createTaberna.logoLinkADB')}}</p></b>
                             <input id="logoLinkInput" type="file" accept="image/*" @change="onFileChangeLogoLink" 
                             :class="logoLinkError? 'form-control is-invalid':logoLinkSuccess?'form-control is-valid':'form-control'">                               
                            <!-- <button class="btn btn-success btn-block" @click="upload">Upload</button> -->                                   
                            <span v-if="logoLinkError!=''" class="invalid-feedback">
                                <strong>{{ logoLinkError }}</strong>
                            </span>
                            <span v-if="imageLinkSuccess!=''" class="valid-feedback">
                                <strong>{{ imageLinkSuccess }}</strong>
                            </span>
                        </div>
                            </div>
                            <!-- /.card-body -->
                            <!-- <div class="card-footer">
                                The footer of the card
                            </div> -->
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header" v-bind:style="{ backgroundColor: '#b5bd2c',color: 'black'}">
                                <h3 class="card-title">{{$t('createTaberna.request')}}</h3>
                                 <div class="card-tools" v-for="(method, index) in requestSelected" :key="index">
                                    <span class="badge badge-secondary mx-2">{{ method }}</span>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" v-bind:style="{ backgroundColor: '#333333',color: '#b5bd2c'}">
                                <span v-if="requestMethodError!=''" style="color:red">{{ requestMethodError }}</span>
                                <p v-bind:style="{color: '#c0c6c6'}" ><b style="color:#b5bd2c">* </b>{{$t('createTaberna.requestText')}}</p>
                                 <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Telephone"
                                           v-model="requestSelected">
                                        <label class="form-check-label">
                                            {{$t('createTaberna.telephone')}}
                                        </label>
                                    </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Whatsapp"
                                           v-model="requestSelected">
                                        <label class="form-check-label">
                                            Whatsapp
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Telegram"
                                           v-model="requestSelected">
                                        <label class="form-check-label">
                                            {{$t('createTaberna.telegram')}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Email"
                                           v-model="requestSelected">
                                        <label class="form-check-label">
                                            {{$t('createTaberna.email')}}
                                        </label>
                                    </div>
                                <div v-for="(method, index) in newRequestLinks" :key="index">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" :value="method"
                                             v-model="requestSelected">
                                        <label class="form-check-label">
                                                {{method}}
                                        </label>
                                        
                                    </div>
                                </div>
                                 <label class="form-check-label mt-2">
                                               {{$t('createTaberna.other')}}
                                        </label>
                                <div class="input-group">
                                     
                                <input v-on:change="newRequestMethodError='',newRequestMethodSuccess=''" v-model="newRequestMethod" type="text" 
                                            :class="newRequestMethodError? 'form-control is-invalid':newRequestMethodSuccess?'form-control is-valid':'form-control'">
                                <button type="button" @click="addRequestMethod()" class="btn btn-xs" v-bind:style="{ backgroundColor: '#b5bd2c',color: 'black'}">ADD</button>
   
                                        <span v-if="newRequestMethodError!=''" class="invalid-feedback">
                                            <strong>{{ newRequestMethodError }}</strong>
                                        </span>
                                        <span v-if="newRequestMethodSuccess!=''" class="valid-feedback">
                                            <strong>{{ newRequestMethodSuccess }}</strong>
                                        </span>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header" v-bind:style="{ backgroundColor: '#b5bd2c',color: 'black'}">
                                <h3 class="card-title">{{$t('createTaberna.pay')}}</h3>
                                <div class="card-tools" v-for="(method, index) in payProcedimentsSelected" :key="index">
                                    <span class="badge badge-secondary mx-2">{{ method }}</span>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" v-bind:style="{ backgroundColor: '#333333',color: '#b5bd2c'}">
                                    <span v-if="payProcedimentError!=''" style="color:red">{{ payProcedimentError }}</span>
                                    <p v-bind:style="{color: '#c0c6c6'}" ><b style="color:#b5bd2c">* </b>{{$t('createTaberna.payProcedimentText')}}</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Card"
                                           v-model="payProcedimentsSelected">
                                        <label class="form-check-label">
                                            {{$t('createTaberna.card')}}
                                        </label>
                                    </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Coin"
                                           v-model="payProcedimentsSelected">
                                        <label class="form-check-label">
                                            {{$t('createTaberna.coin')}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Bizum"
                                           v-model="payProcedimentsSelected">
                                        <label class="form-check-label">
                                            Bizum
                                        </label>
                                    </div>
                                <div v-for="(method, index) in newPayProcediments" :key="index">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" :value="method"
                                             v-model="payProcedimentsSelected">
                                        <label class="form-check-label">
                                                {{method}}
                                        </label>                       
                                    </div>
                                </div>
                                <label class="form-check-label mt-2">
                                               {{$t('createTaberna.other')}}
                                        </label>
                                <div class="input-group">
                                <input v-on:change="newPayProcedimentError='',newPayProcedimentError=''" v-model="newPayProcediment" type="text" 
                                            :class="newPayProcedimentError? 'form-control is-invalid':newPayProcedimentSuccess?'form-control is-valid':'form-control'">
                                <button type="button" @click="addPayMethod()" class="btn btn-xs" v-bind:style="{ backgroundColor: '#b5bd2c',color: 'black'}">ADD</button>
                                        <span v-if="newPayProcedimentError!=''" class="invalid-feedback">
                                            <strong>{{ newPayProcedimentError }}</strong>
                                        </span>
                                        <span v-if="newPayProcedimentSuccess!=''" class="valid-feedback">
                                            <strong>{{ newPayProcedimentSuccess }}</strong>
                                        </span>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header" v-bind:style="{ backgroundColor: '#b5bd2c',color: 'black'}">
                                <h3 class="card-title">{{$t('createTaberna.services')}}</h3>
                                <div class="card-tools" v-for="(service, index) in servicesSelected" :key="index">
                                    <span class="badge badge-secondary mx-2">{{ service }}</span>
                                </div>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                             <div class="card-body" v-bind:style="{ backgroundColor: '#333333',color: '#b5bd2c'}">
                                    <span v-if="servicesError!=''" style="color:red">{{ servicesError }}</span>
                                    <p v-bind:style="{color: '#c0c6c6'}" ><b style="color:#b5bd2c">* </b>{{$t('createTaberna.servicesText')}}</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="TakeAway"
                                           v-model="servicesSelected">
                                        <label class="form-check-label">
                                            {{$t('createTaberna.takeAway')}}
                                        </label>
                                    </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="pickUp"
                                           v-model="servicesSelected">
                                        <label class="form-check-label">
                                            {{$t('createTaberna.pickUp')}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="eatHere"
                                           v-model="servicesSelected">
                                        <label class="form-check-label">
                                            {{$t('createTaberna.eatHere')}}
                                        </label>
                                    </div>
                            </div>
                            <!-- /.card-body -->
                            <!-- <div class="card-footer">
                                The footer of the card
                            </div> -->
                        <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                <div id="loadingModal" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title">{{$t('createTaberna.loading')}}</h6>
                            </div>
                            <div class="modal-body">
                                <p style="font-size:20px;"><b>{{$t('createTaberna.loadingText')}}</b></p><br>
                                <lottie  :options="defaultOptions" :height="200" :width="200" />
                            </div>                          
                        </div>
                    </div>
                </div>
                   <div class="card-footer" v-bind:style="{ backgroundColor: '#535353',color: '#b5bd2c'}">
                              <div class="row justify-content-center" v-bind:style="{ backgroundColor: '#535353',color: '#b5bd2c'}">
                            <button type="button" @click="check" class="btn" v-bind:style="{ backgroundColor: '#b5bd2c',color: 'black'}">{{$t('createTaberna.send')}}</button>
                        </div>
                            </div>
                            <!-- /.card-footer -->
  
                       

                    </div>
                </div>
            </div>
        </div>
   

</template>
<style>
 .skura-back{
     background-color: '#b5bd2c';
 }
 .skura-color{
     color: '#b5bd2c';
 }
 .dark{
     background-color: '#333333';
     color:'#b5bd2c';
 }
</style>
<script>
    import loadingJson from "../../../views/animazioak/loading.json";
    import Lottie from "vue-lottie";
    import Mapbox from 'mapbox-gl-vue'
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
    //  mapboxgl.accessToken = '<your access token here>';
    //     var map = new mapboxgl.Map({
    //     container: 'map',
    //     style: 'mapbox://styles/mapbox/streets-v9'
    //     });
    export default {
        components: {
            Mapbox,
            Lottie
        },
        data() {
            return {
                  img: "",
                    scale: 20,
                    quality: 50,
                    originalSize: true,
                    original: {},

                languagesSelected: ['eu', 'es'],
                languageSelect: 'eu',

                key:'',
                timeKey:'',
                hash:'',

                name: '',
                nameError: '',
                nameSuccess: '',

                descriptions: [],
                descriptionErrors: [],
                descriptionSuccess: [],

                timetables:[],
                timetablesErrors: [],
                timetablesSuccess: [],

                moreInfos:[],
                moreInfosErrors: [],
                moreInfosSuccess: [],

                place: '',
                placeItem: null,
                places: [],
                placeError: '',
                placeSuccess: '',
                lat:-1.8756579,
                lng:43.3043107,
                mapVisible:false,

                telephone:'',
                telephoneError:'',
                telephoneSuccess:'',

                email:'',
                emailError:'',
                emailSuccess:'',

                web:'',
                webError:'',
                webSuccess:'',

                twitter:'',
                twitterError:'',
                twitterSuccess:'',

                facebook:'',
                facebookError:'',
                facebookSuccess:'',

                instagram:'',
                instagramError:'',
                instagramSuccess:'',

                telegram:'',
                telegramError:'',
                telegramSuccess:'',

                imageLink:'',
                imageLinkURL:'',
                imageLinkType:'',
                imageLinkError:'',
                imageLinkSuccess:'',

                logoLink:'',
                logoLinkURL:'',
                logoLinkType:'',
                logoLinkError:'',
                logoLinkSuccess:'',

                requestSelected:[],
                requestMethodError:'',
                requestMethodSuccess:'',

                newRequestMethod:'',
                newRequestMethodError:'',
                newRequestMethodSuccess:'',

                newRequestLinks:[],
               

                payProcedimentsSelected:[],
                payProcedimentError:'',
                payProcedimentSuccess:'',

                newPayProcediments:[],
                newPayProcediment:'',
                newPayProcedimentError:'',
                newPayProcedimentSuccess:'',

                servicesSelected:[],
                servicesError:'',
                servicesSuccess:'',

                tabernaProcess:false,
                imageLinkProcess:false,
                logoLinkProcess:false,
                descriptionProcess:false,
                timetableProcess:false,
                moreInfoProcess:false,

                defaultOptions: {
                    animationData: loadingJson,
                    loop: true
                },
                accessToken: 'mapbox_access_token',
                mapStyle: 'mapbox://styles/mapbox/satellite-streets-v10'

            }
        },
        computed: {

        },
        methods: {

            /*
            |--------------------------------------------------------------------------
            | GEOCODING
            |--------------------------------------------------------------------------
            */

            getPlaceCoordenates() {
                this.places = []
                axios.get(
                    `https://api.mapbox.com/geocoding/v5/mapbox.places/${this.place}.json?access_token=${this.accessToken}`,
                ).then(res => {
                    if (res.data.features.length != 0) {
                        this.places = res.data.features
                    } else {
                        this.placeError = this.$t('createTaberna.placeError')
                    }
                }).catch(error => {
                    this.showToast('error',this.$t('createTaberna.place') +' '+ this.$t('createTaberna.emptyError'))
                    console.log(error)
                     this.errorSend('createTaberna','getPlaceCoordenates',error.response.data.message)
                })
            },
            selectPlace(item) {
                this.lat =item.center[0]
                this.lng =item.center[1]
                this.placeItem = item
                this.place = item.place_name.replace('Spain', 'EuskalHerria')
                this.placeSuccess = this.$t('createTaberna.placeSucces')
                this.places = []
        
                this.mapVisible=true
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
            showLoadingModal(){
                $('#loadingModal').modal('show')
            },
            hideLoadingModal(){
                $('#loadingModal').modal('hide')  
            },

            /*
            |--------------------------------------------------------------------------
            | CHECK-S 
            |--------------------------------------------------------------------------
            */
            
            check() {
                this.checkName()
                this.checkDescriptions()
                this.checkTimetables()
                this.checkPlaces()
                this.checkTelephone()
                this.checkEmail()
                this.checkWeb()
                this.checkTwitter()
                this.checkFacebook()
                this.checkInstagram()
                this.checkTelegram()
                this.checkRequest()
                this.checkPay()
                this.checkServices()
                if (this.checkName() && 
                    this.checkDescriptions() && 
                    this.checkTimetables() &&
                    this.checkPlaces() &&
                    this.checkTelephone() &&
                    this.checkEmail() &&
                    this.checkWeb() &&
                    this.checkTwitter() &&
                    this.checkFacebook() &&
                    this.checkInstagram() &&
                    this.checkTelegram() &&
                    this.checkRequest() &&
                    this.checkPay() &&
                    this.checkServices() 
                    ){
                        this.showLoadingModal()
                    //this.showModalSucess()
                    if(this.imageLink!=''){
                    this.uploadImage(this.imageLink,this.imageLinkType,'imageLink',this.hash)
                    }
                    if(this.logoLink!=''){
                    this.uploadLink(this.logoLink,this.logoLinkType,'logoLink',this.hash)
                    } 
                    this.createDescriptions()
                    this.createTimetables()
                    this.createMoreInfos()
                    this.createRequestMethod()
                    this.createPayMethod()
                    this.createServices()

                    if(this.logoLink=='' && this.imageLink==''){
                       this.createTaberna()
                    }
                   

                } else {
                    //this.showModalError()
                }
            },
              checkName() {
                var isGood = true;
                this.nameError = '';
                    if (this.name == null || this.name == '') {
                        this.showToast('error', this.$t('createTaberna.name')+' '+ this.$t('createTaberna.emptyError'))
                        this.nameError = this.$t('createTaberna.name')+' '+ this.$t('createTaberna.emptyError')
                        isGood = false
                    } else {
                        if (!this.validateOnlyString(this.name)) {
                            this.nameError =  this.$t('createTaberna.nameError')
                            this.showToast('error', this.$t('createTaberna.nameError'))
                            isGood = false                        
                        }else{
                          this.nameSuccess =  this.$t('createTaberna.nameSucces')  
                        }
                    }
                return isGood;
            },
            checkDescriptions() {
                var isGood = true;
                this.descriptionErrors = [];
                this.languagesSelected.forEach(element => {
                    if (this.descriptions[element] == null || this.descriptions[element] == '') {
                        this.languageSelect = element
                        this.showToast('error', '[' + element + ']'+' '+ this.$t('createTaberna.description') +' '+ this.$t('createTaberna.emptyError'))
                        this.descriptionErrors[element] = '[' + element + ']' +' '+ this.$t('createTaberna.description')+' '+ this.$t(
                            'createTaberna.emptyError')
                        isGood = false
                    } else {
                        this.descriptionSuccess[element]='[' + element + ']'+' '+ this.$t('createTaberna.descriptionSucces')                     
                    }
                });
                return isGood;
            },
            checkTimetables() {
                var isGood = true;
                this.timetablesErrors = [];
                this.languagesSelected.forEach(element => {
                    if (this.timetables[element] == null || this.timetables[element] == '') {
                        this.languageSelect = element
                        this.showToast('error', '[' + element + ']'+' '+ this.$t('createTaberna.timeTable') +' '+ this.$t('createTaberna.emptyError'))
                        this.timetablesErrors[element] = '[' + element + ']' +' '+ this.$t('createTaberna.timeTable')+' '+ this.$t(
                            'createTaberna.emptyError')
                        isGood = false
                    } else {
                        this.timetablesSuccess[element]='[' + element + ']'+' '+ this.$t('createTaberna.timeTableSucces')                     
                    }
                });
                return isGood;
            },
            checkMoreInfo() {
                var isGood = true;
                this.moreInfosErrors = [];
                this.languagesSelected.forEach(element => {
                    if (this.moreInfos[element] == null || this.moreInfos[element] == '') {
                        this.showToast('error', '[' + element + ']'+' '+ this.$t('createTaberna.moreInfo') +' '+ this.$t('createTaberna.emptyError'))
                        this.moreInfosErrors[element] = '[' + element + ']' +' '+ this.$t('createTaberna.moreInfo')+' '+ this.$t(
                            'createTaberna.emptyError')
                        isGood = false
                    } else {
                        this.moreInfosSuccess[element]='[' + element + ']'+' '+ this.$t('createTaberna.moreInfoSucces')
                    }
                });
                return isGood;
            },
            checkPlaces() {
                var isGood = true;
                this.placeError = '';
                    if (this.placeItem == null || this.placeItem == {}||this.placeItem.length ==0) {
                        this.showToast('error',this.$t('createTaberna.place') +' '+ this.$t('createTaberna.emptyError'))
                        this.placeError =  this.$t('createTaberna.place')+' '+ this.$t('createTaberna.emptyError')
                        isGood = false
                    } else {
                        this.placeSucces=this.$t('createTaberna.placeSucces')
                    }
               
                return isGood;
            },

            checkTelephone(){
                var isGood = true;
                this.telephoneError='';
                      if (this.telephone == null || this.telephone == '') {
                        this.showToast('error', this.$t('createTaberna.telephone')+' '+ this.$t('createTaberna.emptyError'))
                        this.telephoneError = this.$t('createTaberna.telephone')+' '+ this.$t('createTaberna.emptyError')
                        isGood = false
                    } else {
                        if (!this.validateTelephone(this.telephone)) {
                            this.telephoneError =  this.$t('createTaberna.telephoneError')
                            this.showToast('error', this.$t('createTaberna.telephoneError'))
                            isGood = false                        
                        }else{
                          this.telephoneSuccess =  this.$t('createTaberna.telephoneSucces')  
                        }
                    }
                return isGood;

            },

            checkEmail(){
                var isGood = true;
                this.emailError='';
                      if (this.email == null || this.email == '') {
                        this.showToast('error', this.$t('createTaberna.email')+' '+ this.$t('createTaberna.emptyError'))
                        this.emailError = this.$t('createTaberna.email')+' '+ this.$t('createTaberna.emptyError')
                        isGood = false
                    } else {
                        if (!this.validateEmail(this.email)) {
                            this.emailError =  this.$t('createTaberna.emailError')
                            this.showToast('error', this.$t('createTaberna.emailError'))
                            isGood = false                        
                        }else{
                          this.emailSuccess =  this.$t('createTaberna.emailSucces')  
                        }
                    }
                return isGood;
            },

            checkWeb(){
                var isGood = true;
                this.webError='';
                if(this.web!=''){
                        if (!this.validateWeb(this.web)) {
                            this.webError =  this.$t('createTaberna.webError')
                            this.showToast('error', this.$t('createTaberna.webError'))
                            isGood = false                        
                        }else{
                            this.webSuccess =  this.$t('createTaberna.webSucces')  
                        }
                }  
                return isGood;
            },

            checkTwitter(){
                var isGood = true;
                this.twitterError='';
                if(this.twitter!=''){
                        if (!this.validateTwitter(this.twitter)) {
                            this.twitterError =  this.$t('createTaberna.twitterError')
                            this.showToast('error', this.$t('createTaberna.twitterError'))
                            isGood = false                        
                        }else{
                            this.twitterSuccess =  this.$t('createTaberna.twitterSucces')  
                        }  
                }
                return isGood;
            },

            checkFacebook(){
                var isGood = true;
                this.facebookError='';
                if(this.facebook!=''){
                        if (!this.validateFacebook(this.facebook)) {
                            this.facebookError =  this.$t('createTaberna.facebookError')
                            this.showToast('error', this.$t('createTaberna.facebookError'))
                            isGood = false                        
                        }else{
                            this.facebookSuccess =  this.$t('createTaberna.facebookSucces')  
                        }  
                }
                return isGood;
            },

            checkInstagram(){
                var isGood = true;
                this.instagramError='';
                if(this.instagram!=''){
                        if (!this.validateInstagram(this.instagram)) {
                            this.instagramError =  this.$t('createTaberna.instagramError')
                            this.showToast('error', this.$t('createTaberna.instagramError'))
                            isGood = false                        
                        }else{
                            this.instagramSuccess =  this.$t('createTaberna.instagramSucces')  
                        }  
                }
                return isGood;
            },

            checkTelegram(){
                var isGood = true;
                this.telegramError='';
                if(this.telegram!=''){
                        if (!this.validateTelegram(this.telegram)) {
                            this.telegramError =  this.$t('createTaberna.telegramError')
                            this.showToast('error', this.$t('createTaberna.telegramError'))
                            isGood = false                        
                        }else{
                            this.telegramSuccess =  this.$t('createTaberna.telegramSucces')  
                        }  
                }
                return isGood;
            },
            checkImages(){
                var isGood = true;
                this.imageLinkError='';
                        if (this.imageLink == null || this.imageLink == ''||this.logoLink == null || this.logoLink == '') {
                            this.telegramError =this.$t('createTaberna.imageLink')+' - '+  this.$t('createTaberna.logoLink')+' '+ this.$t('createTaberna.emptyError')
                            this.showToast('error', this.$t('createTaberna.imageLink')+' - '+  this.$t('createTaberna.logoLink')+' '+ this.$t('createTaberna.emptyError'))
                            isGood = false                        
                        }else{
                            this.telegramSuccess =  this.$t('createTaberna.imageLinkSucces')  
                        }  
                return isGood;
            },


            checkRequest(){
                var isGood = true;
                this.requestMethodError='';
                        if (this.requestSelected.length == 0) {
                            this.requestMethodError =  this.$t('createTaberna.request')+' '+ this.$t('createTaberna.emptyError')
                            this.showToast('error', this.$t('createTaberna.request')+' '+ this.$t('createTaberna.emptyError'))
                            isGood = false                        
                        }
                return isGood;
            },

            checkPay(){
                var isGood = true;
                this.payProcedimentError='';
                        if (this.payProcedimentsSelected.length == 0) {
                            this.payProcedimentError =  this.$t('createTaberna.pay')+' '+ this.$t('createTaberna.emptyError')
                            this.showToast('error', this.$t('createTaberna.pay')+' '+ this.$t('createTaberna.emptyError'))
                            isGood = false                        
                        }
                return isGood;
            },

            checkServices(){
                var isGood = true;
                this.servicesError='';
                        if (this.servicesSelected.length == 0) {
                            this.servicesError =  this.$t('createTaberna.services')+' '+ this.$t('createTaberna.emptyError')
                            this.showToast('error', this.$t('createTaberna.services')+' '+ this.$t('createTaberna.emptyError'))
                            isGood = false                        
                        }
                return isGood;
            },

         
            /*
            |--------------------------------------------------------------------------
            | EXPRESIO REGULARRAK
            |--------------------------------------------------------------------------
            */

            validateOnlyString(value) {
                return /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}/i.test(value)
            },
            validateTelephone(value) {
               // return/^[679]{1}[0-9]{8}$/.test(value);
                return /^(\+34|0034|34|\+33|0033|33)?[ -]*(6|7|9)[ -]*([0-9][ -]*){8}/.test(value);
            },
            validateEmail(mail) {
                return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(mail);
            },
            validateWeb(web) {
                return /((?:http:\/\/)?|(?:https:\/\/)?)?(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/.test(web);
            },
            validateTwitter(acount) {
                return /^((?:http:\/\/)?|(?:https:\/\/)?)?(www\.)?twitter\.com\/(\w+)+$/.test(acount);
            },
             validateFacebook(acount) {
                return /^((?:http:\/\/)?|(?:https:\/\/)?)?(www\.)?facebook\.com\/(\w+)+$/.test(acount);
            },
            validateInstagram(acount) {
                return /^((?:http:\/\/)?|(?:https:\/\/)?)?(www\.)?instagram\.com\/(\w+)+$/.test(acount);
            },
            validateTelegram(acount) {
                return /^((?:http:\/\/)?|(?:https:\/\/)?)?(www\.)?t\.me\/(\w+)+$/.test(acount);
            },


             /*
            |--------------------------------------------------------------------------
            | IRUDIEN TRATAERA
            |--------------------------------------------------------------------------
            */

            onFileChangeImageLink(e) {
                this.imageLinkType=e.target.files[0].type.replace('image/','')
                if(this.imageLinkType!='png' && this.imageLinkType!='jpg' && this.imageLinkType!='jpeg' ){
                   this.showToast('error', this.$t('createTaberna.badImageType')) 
                   this.imageLinkError = this.$t('createTaberna.badImageType')
                   document.getElementById('imageLinkInput').value=''
                   this.imageLink =''
                }else{
                this.compressImage(e)
                // let files = e.target.files || e.dataTransfer.files;
                // if (!files.length)
                //     return;
               
                // this.createImageLink(files[0]);
                }
               
            },
            onFileChangeLogoLink(e) { 
                 this.logoLinkType=e.target.files[0].type.replace('image/','')
                if(this.logoLinkType!='png' && this.logoLinkType!='jpg' && this.logoLinkType!='jpeg' ){
                   this.showToast('error', this.$t('createTaberna.badImageType')) 
                   this.logoLinkError = this.$t('createTaberna.badImageType')
                   document.getElementById('logoLinkInput').value=''
                   this.logoLink =''
                    
                }else{
                this.compressLogo(e)
                // let files = e.target.files || e.dataTransfer.files;
                // if (!files.length)
                //     return;
                // this.createLogoLink(files[0]);
                }
            },
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
                                    
                                    this.createImageLink(file)
                                }, 'image/jpeg', 1);
                                
                            },
                            reader.onerror = error => console.log(error);
                    };
                },
             compressLogo(e) {
                const width = 200;
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
                                
                                this.createLogoLink(file)
                            }, 'image/jpeg', 1);
                            
                        },
                        reader.onerror = error => console.log(error);
                };
            },
            createImageLink(file) {
                if(file.size>600000){
                    this.imageLink =''
                   this.showToast('error', this.$t('createTaberna.badImageSize')) 
                   this.imageLinkError = this.$t('createTaberna.badImageSize')
                   document.getElementById('imageLinkInput').value=''
                }else{
                    this.imageLinkError = ''
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.imageLink = e.target.result;
                };
                reader.readAsDataURL(file);
                }
            },
             createLogoLink(file) {
                 if(file.size>600000){
                     this.logoLink =''
                   this.showToast('error', this.$t('createTaberna.badImageSize')) 
                   this.logoLinkError = this.$t('createTaberna.badImageSize')
                   document.getElementById('logoLinkInput').value=''
                }else{
                     this.logoLinkError = ''
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.logoLink = e.target.result;
                };
                reader.readAsDataURL(file);
                }
            },
            preUpload(){
                this.upload(this.imageLink,this.imageLinkType,'imageLink','1111')
            },
            uploadImage(image,type,imageFunction,idTaberna){
                axios.post('/image/upload',{
                    image,
                    type,
                    imageFunction,
                    idTaberna
                }).then(response => {
                    this.imageLinkURL=response.data.replace('storage', 'public')
                    if(this.logoLink == ''){
                       this.hideLoadingModal()
                       this.createTaberna()
                    }       
                }).catch(error => {
                    this.hideLoadingModal()
                    this.showModalError()
                    console.log(error)
                    this.errorSend('createTaberna','uploadImage',error.response.data.message)

                });
            },
              uploadLink(image,type,imageFunction,idTaberna){
                axios.post('/image/upload',{
                    image,
                    type,
                    imageFunction,
                    idTaberna
                }).then(response => {
                    this.logoLinkURL=response.data.replace('storage', 'public')
                    this.createTaberna()                   
                }).catch(error => {
                    this.hideLoadingModal()
                    this.showModalError()
                    console.log(error)
                    this.errorSend('createTaberna','uploadLink',error.response.data.message)

                });
            },
            deleteImage(url){

                axios.post('/image/delete',{
                    url:url
                }).then(response => {
                    console.log(response)
                }).catch(error => {
                    this.hideLoadingModal()
                    this.showModalError()
                    console.log(error)
                });
            },

              /*
            |--------------------------------------------------------------------------
            | REQUEST-s
            |--------------------------------------------------------------------------
            */

            addRequestMethod(){
                this.newRequestLinks.push(this.newRequestMethod);
                this.newRequestMethod=''
            },
            createRequestMethod(){
              this.requestSelected.forEach(element => {   
                axios.post('/request/create',{
                    idTaberna:this.hash,
                    title:element,
                    method:element
                }).then(response => {
                    if(response.status==200)
                    this.showToast('success',this.$t('createTaberna.request'))
                }).catch(error => {
                    this.hideLoadingModal()
                    this.showModalError()
                    console.log(error)
                    this.errorSend('createTaberna','createRequestMethod',error.response.data.message)

                });
              })
            },
            /*
            |--------------------------------------------------------------------------
            | PAY-s
            |--------------------------------------------------------------------------
            */

            addPayMethod(){
                this.newPayProcediments.push(this.newPayProcediment);
                this.newPayProcediment=''
            },
            createPayMethod(){
              this.payProcedimentsSelected.forEach(element => {   
                axios.post('/pay/create',{
                    idTaberna:this.hash,
                    method:element
                }).then(response => {
                    if(response.status==200)
                    this.showToast('success',this.$t('createTaberna.pay'))
                }).catch(error => {
                    this.hideLoadingModal()
                    this.showModalError()
                    console.log(error)
                    this.errorSend('createTaberna','createPayMethod',error.response.data.message)

                });
              })
            },
             /*
            |--------------------------------------------------------------------------
            | Service-s
            |--------------------------------------------------------------------------
            */
              createServices(){
              this.servicesSelected.forEach(element => {   
                axios.post('/service/create',{
                    idTaberna:this.hash,
                    services:element
                }).then(response => {
                    if(response.status==200)
                    this.showToast('success',this.$t('createTaberna.services'))
                }).catch(error => {
                    this.hideLoadingModal()
                    this.showModalError()
                    console.log(error)
                    this.errorSend('createTaberna','createServices',error.response.data.message)

                });
              })
            },

            /*
            |--------------------------------------------------------------------------
            | HASH
            |--------------------------------------------------------------------------
            */

            createHash(){
                this.key = Math.random().toString(36).slice(-8);
                (this.key)
                axios.post('/key/generate',{
                    key:this.key,
                }).then(response => {
                    this.timeKey =response.data.timeKey
                    this.hash =response.data.hash
                }).catch(error => {
                    this.hideLoadingModal()
                    this.showModalError()
                    console.log(error)
                });
              
            },
            /*
            |--------------------------------------------------------------------------
            | Taberna
            |--------------------------------------------------------------------------
            */

            createTaberna(){
                axios.post('/taberna/create',{
                    idTaberna:this.hash,
                    key:this.key,
                    timeKey:this.timeKey,
                    name:this.name,
                    address:this.place,
                    latitude:this.lat,
                    longitude:this.lng,
                    web:this.web,
                    email:this.email,
                    telephone:this.telephone,
                    facebook:this.facebook,
                    twitter:this.twitter,
                    instagram:this.instagram,
                    telegram:this.telegram,
                    imagelink:this.imageLinkURL,
                    logolink:this.logoLinkURL,
                }).then(response => {
                    if(response.status==200)
                    this.hideLoadingModal()
                    this.showModalSucess();
                    this.clearAllValues()
                    window.location.href ='/foodcard/upload'
                }).catch(error => {
                    this.hideLoadingModal()
                    this.showModalError()
                    console.log(error)
                    this.errorSend('createTaberna','createTaberna',error.response.data.message)

                });
              
            },
             /*
            |--------------------------------------------------------------------------
            | Description
            |--------------------------------------------------------------------------
            */

            createDescriptions(){
              this.languagesSelected.forEach(element => {   
                axios.post('/description/create',{
                    idTaberna:this.hash,
                    language:element,
                    description:this.descriptions[element]
                }).then(response => {
                    if(response.status==200)
                    this.showToast('success',this.$t('createTaberna.description'))
                }).catch(error => {
                    this.hideLoadingModal()
                    this.showModalError()
                    console.log(error)
                    this.errorSend('createTaberna','createDescriptions',error.response.data.message)

                });
              })
            },
            /*
            |--------------------------------------------------------------------------
            | Timetable
            |--------------------------------------------------------------------------
            */

            createTimetables(){
              this.languagesSelected.forEach(element => {   
                axios.post('/timetable/create',{
                    idTaberna:this.hash,
                    language:element,
                    timetable:this.timetables[element]
                }).then(response => {
                    if(response.status==200)
                    this.showToast('success',this.$t('createTaberna.timeTable'))
                }).catch(error => {
                    this.hideLoadingModal()
                    this.showModalError()
                    console.log(error)
                    this.errorSend('createTaberna','createTimetables',error.response.data.message)

                });
              })
            },
            createMoreInfos(){
              this.languagesSelected.forEach(element => { 
                  if (this.moreInfos[element] == null || this.moreInfos[element] == ''){
                  } else{ 
                axios.post('/moreinfo/create',{
                    idTaberna:this.hash,
                    language:element,
                    moreInfo:this.moreInfos[element]
                }).then(response => {
                    if(response.status==200)
                    this.showToast('success',this.$t('createTaberna.moreInfo'))
                }).catch(error => {
                    this.hideLoadingModal()
                    this.showModalError()
                    console.log(error)
                    this.errorSend('createTaberna','createMoreInfos',error.response.data.message)

                });
                 } 
              })
             
            },
            errorSend(view,funtz,error) {
                axios.post('/telegram/error', {
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
            clearAllValues(){
                this.key=''
                this.timeKey=''
                this.hash=''

                this.name= ''
                this.nameError= ''
                this.nameSuccess= ''

                this.descriptions= []
                this.descriptionErrors= []
                this.descriptionSuccess= []

                this.timetables=[]
                this.timetablesErrors= []
                this.timetablesSuccess= []

                this.moreInfos=[]
                this.moreInfosErrors= []
                this.moreInfosSuccess= []

                this.place= ''
                this.placeItem= null
                this.places= []
                this.placeError= ''
                this.placeSuccess= ''

                this.telephone=''
                this.telephoneError=''
                this.telephoneSuccess=''

                this.email=''
                this.emailError=''
                this.emailSuccess=''

                this.web=''
                this.webError=''
                this.webSuccess=''

                this.twitter=''
                this.twitterError=''
                this.twitterSuccess=''

                this.facebook=''
                this.facebookError=''
                this.facebookSuccess=''

                this.instagram=''
                this.instagramError=''
                this.instagramSuccess=''

                this.telegram=''
                this.telegramError=''
                this.telegramSuccess=''

                this.imageLink=''
                this.imageLinkURL=''
                this.imageLinkType=''
                this.imageLinkError=''
                this.imageLinkSuccess=''

                this.logoLink=''
                this.logoLinkURL=''
                this.logoLinkType=''
                this.logoLinkError=''
                this.logoLinkSuccess=''

                this.requestSelected=[]
                this.requestMethodError=''
                this.requestMethodSuccess=''

                this.newRequestMethod=''
                this.newRequestMethodError=''
                this.newRequestMethodSuccess=''

                this.newRequestLinks=[]
               

                this.payProcedimentsSelected=[]
                this.payProcedimentError=''
                this.payProcedimentSuccess=''

                this.newPayProcediments=[]
                this.newPayProcediment=''
                this.newPayProcedimentError=''
                this.newPayProcedimentSuccess=''

                this.servicesSelected=[]
                this.servicesError=''
               this.servicesSuccess=''

                this.tabernaProcess=false
                this.imageLinkProcess=false
                this.logoLinkProcess=false
                this.descriptionProcess=false
                this.timetableProcess=false
                this.moreInfoProcess=false


            }
            
        },
        mounted() {
            this.createHash()
        }
    }

</script>
