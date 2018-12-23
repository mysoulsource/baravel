<style>
    .widget-user .widget-user-image{
        top:60%;
        left:50%;
        transform:translate(-20%,-50%);
    }
    .widget-user .widget-user-image > img {
        width: 150px;
    }
</style>

<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card card-user">
                    <div class="image">
                        <img src="img/background.jpg"  alt="..."/>
                    </div>
                    <div class="content">
                        <div class="author">
                            <img class="avatar border-white" v-if="changePhoto" :src="getUserPhoto()" alt="..."/>
                            <h4 class="title">{{ form.name }}<br />
                                <a href="#"><small>{{form.email}}</small></a>
                            </h4>
                        </div>
                        <p class="description text-center">
                            "I like the way you work it <br>
                            No diggity <br>
                            I wanna bag it up"
                        </p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1">
                                <h5>{{form.userdetail.count}}<br /><small>Donation Count</small></h5>
                            </div>
                            <div class="col-md-4">
                                <h5>{{form.bloodgroup.name}}<br /><small>Blood Group</small></h5>
                            </div>
                            <div class="col-md-3">
                                <h5>{{form.status | stringConv}}<br /><small>Status</small></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h4 class="title">Insert Code</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <form @submit.prevent="submitCode" @keydown="form.onKeydown($event)">
                            <div class="col-md-12">
                                <div class="form-group">

                                    <input type="text" class="form-control border-input" placeholder="Code">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Submit Code</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Edit Profile</h4>
                    </div>
                    <div class="content">
                        <form @submit.prevent="updateInfo" @keydown="form.onKeydown($event)">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input  v-model="form.name" type="text" name="name" class="form-control border-input" id="inputName" placeholder="Name" :class="{ 'is-invalid': form.errors.has('name') }">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email"  v-model="form.email" disabled name="email" class="form-control border-input" id="inputEmail" placeholder="Email" :class="{ 'is-invalid': form.errors.has('email') }">
                                        <has-error :form="form" field="email"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text"  v-model="form.phone"  name="phone" class="form-control border-input" id="inputPhone" placeholder="Phone" :class="{ 'is-invalid': form.errors.has('phone') }">
                                        <has-error :form="form" field="phone"></has-error>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Zone</label>
                                        <input type="text"  v-model="form.zone"  name="zone" class="form-control border-input" id="inputZone" placeholder="Zone" :class="{ 'is-invalid': form.errors.has('zone') }">
                                        <has-error :form="form" field="zone"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>District</label>
                                        <input type="text"  v-model="form.district"  name="district" class="form-control border-input" id="inputDistrict" placeholder="district" :class="{ 'is-invalid': form.errors.has('district') }">
                                        <has-error :form="form" field="district"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Area</label>
                                        <input type="text"  v-model="form.area"  name="area" class="form-control border-input" id="inputArea" placeholder="Area" :class="{ 'is-invalid': form.errors.has('area') }">
                                        <has-error :form="form" field="area"></has-error>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Country</label>
                                        <input type="text"  v-model="form.country"  name="country" class="form-control border-input" id="inputCountry" placeholder="Country" :class="{ 'is-invalid': form.errors.has('country') }">
                                        <has-error :form="form" field="country"></has-error>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input name="img" v-if="uploadReady" @change="updatePhoto" type="file" class="form-control border-input" id="inputPhoto" :class="{ 'is-invalid': form.errors.has('img') }">
                                        <has-error :form="form" field="img"></has-error>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" type="password" v-model="form.password" class="form-control border-input" id="inputPassword" placeholder="Password" :class="{ 'is-invalid': form.errors.has('password') }">
                                        <has-error :form="form" field="password"></has-error>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select v-model="form.status" type="text" name="status"
                                                class="form-control border-input" :class="{ 'is-invalid': form.errors.has('status') }">
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Share Info</label>
                                        <select v-model="form.info_status" type="text" name="info_status"
                                                class="form-control border-input" :class="{ 'is-invalid': form.errors.has('info_status') }">
                                            <option value="1">Share It</option>
                                            <option value="0">Hide It</option>

                                        </select>
                                        <has-error :form="form" field="info_status"></has-error>
                                    </div>
                                </div>
                                <!--<div class="col-md-4">-->
                                    <!--<div class="form-group">-->
                                        <!--<label>About Me</label>-->

                                    <!--</div>-->
                                <!--</div>-->
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                 uploadReady: true,
                changePhoto : true,
                form : new Form({
                    id:'',
                    name : '',
                    country: '',
                    zone : '',
                    district : '',
                    area : '',
                    phone : '',
                    f_url : '',
                    img : '',
                    status : '',
                    info_status : '',
                    email:'',
                    password:'',
                    bloodgroup:'',
                    userdetail:''

                }),

                codeform: new Form({
                    code:'',
                })
            }
        },
        methods:{
            clear () {
              this.uploadReady = false
              this.$nextTick(() => {
                this.uploadReady = true
              })
            },
            updateInfo(){
                this.$Progress.start();
                if(this.form.password == ''){
                    this.form.password = undefined;
                }
                this.form.put('api/profile/update')
                    .then(()=>{

                        this.$Progress.finish();
                        this.changePhoto = true;
                        toast({
                            type: 'success',
                            title: 'Profile Updated Successfully!!'
                        })
                        Fire.$emit('profileUpdated');
                        this.clear();
                    })
                    .catch(()=>{
                        this.$Progress.fail();
                        toast({
                            type: 'error',
                            title: 'Something Went Wrong!!'
                        })
                    });
            },
            updatePhoto(e){
                this.changePhoto = false;
                //grab the image file
                let file = e.target.files[0];

                if(file['size'] < 5242880){
                    let reader = new FileReader();
                    reader.onloadend = (file)=> {
                        //after change what
                        //assign the result to form img
                        this.form.img = reader.result;
                        

                    }

                    // function to change to bas64
                    reader.readAsDataURL(file);
                }else{
                    this.clear();
                    swal('Oops!!','Image size limit is 5MB','error');
                }


            },
            getUserdata(){
                axios.get('api/profile')
                    .then(({data})=> (this.form.fill(data)));
            },
            getUserPhoto(){
                if(this.form.img.length <= 100){
                    return "img/profile/" + this.form.img
                }
            },
            submitCode(){
                 this.$Progress.start();
                   this.codeform.put('api/profile/code')
                    .then(()=>{

                        this.$Progress.finish();
                        toast({
                            type: 'success',
                            title: 'Profile Updated Successfully!!'
                        })
                       
                    })
                    .catch(()=>{
                        this.$Progress.fail();
                        toast({
                            type: 'error',
                            title: 'Code Incorrect or Already been used!!!'
                        })
                        this.codeform.reset();
                    });
            }
        },
        created(){
            this.getUserdata();
            Fire.$on('profileUpdated',()=>{
                this.getUserdata();
            });
        }
    }
</script>
