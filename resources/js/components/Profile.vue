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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header text-white"
                         style="background: linear-gradient(to top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 59%, rgba(0, 0, 0, 0.65) 100%),url('./img/userbg.jpg'); background-size:cover; background-position:center center;height:250px;">
                        <h3 class="widget-user-username">{{ form.name }}</h3>
                        <h5 class="widget-user-desc">Web Designer</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" v-if="changePhoto" :src="getUserPhoto()" alt="User Avatar">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">3,200</h5>
                                    <span class="description-text">SALES</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">13,000</h5>
                                    <span class="description-text">FOLLOWERS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">35</h5>
                                    <span class="description-text">PRODUCTS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link " href="#activity" data-toggle="tab">Activity</a></li>
                            <li class="nav-item"><a class="nav-link" href="#code" data-toggle="tab">Code</a></li>
                            <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane" id="activity">

                                <!-- /.post -->
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="code">
                                 <form @submit.prevent="submitCode" @keydown="form.onKeydown($event)" class="form-horizontal">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputCode" class="col-sm-4 control-label">Name</label>

                                                <div class="col-sm-10">
                                                    <input  v-model="codeform.code" type="text" name="code" class="form-control" id="inputCode" placeholder="Enter code here" :class="{ 'is-invalid': codeform.errors.has('code') }">
                                                    <has-error :form="codeform" field="name"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!-- /.tab-pane -->

                            <div class=" active tab-pane" id="settings">
                                <form @submit.prevent="updateInfo" @keydown="form.onKeydown($event)" class="form-horizontal">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-4 control-label">Name</label>

                                                <div class="col-sm-10">
                                                    <input  v-model="form.name" type="text" name="name" class="form-control" id="inputName" placeholder="Name" :class="{ 'is-invalid': form.errors.has('name') }">
                                                    <has-error :form="form" field="name"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputEmail" class="col-sm-4 control-label">Email</label>

                                                <div class="col-sm-10">
                                                    <input type="email"  v-model="form.email" disabled name="email" class="form-control" id="inputEmail" placeholder="Email" :class="{ 'is-invalid': form.errors.has('email') }">
                                                    <has-error :form="form" field="email"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputCountry" class="col-sm-4 control-label">Country</label>

                                                <div class="col-sm-10">
                                                    <input type="text"  v-model="form.country"  name="country" class="form-control" id="inputCountry" placeholder="Country" :class="{ 'is-invalid': form.errors.has('country') }">
                                                    <has-error :form="form" field="country"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputZone" class="col-sm-4 control-label">Zone</label>

                                                <div class="col-sm-10">
                                                    <input type="text"  v-model="form.zone"  name="zone" class="form-control" id="inputZone" placeholder="Zone" :class="{ 'is-invalid': form.errors.has('zone') }">
                                                    <has-error :form="form" field="zone"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputDistrict" class="col-sm-4 control-label">District</label>

                                                <div class="col-sm-10">
                                                    <input type="text"  v-model="form.district"  name="district" class="form-control" id="inputDistrict" placeholder="district" :class="{ 'is-invalid': form.errors.has('district') }">
                                                    <has-error :form="form" field="district"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputArea" class="col-sm-4 control-label">Area</label>

                                                <div class="col-sm-10">
                                                    <input type="text"  v-model="form.area"  name="area" class="form-control" id="inputArea" placeholder="Area" :class="{ 'is-invalid': form.errors.has('area') }">
                                                    <has-error :form="form" field="area"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputPhone" class="col-sm-4 control-label">Phone</label>

                                                <div class="col-sm-10">
                                                    <input type="text"  v-model="form.phone"  name="phone" class="form-control" id="inputPhone" placeholder="Phone" :class="{ 'is-invalid': form.errors.has('phone') }">
                                                    <has-error :form="form" field="phone"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputUrl" class="col-sm-4 control-label">Facebook Url</label>

                                                <div class="col-sm-10">
                                                    <input type="text"  v-model="form.f_url"  name="f_url" class="form-control" id="inputUrl" placeholder="Facebook Url" :class="{ 'is-invalid': form.errors.has('f_url') }">
                                                    <has-error :form="form" field="f_url"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputPhoto" class="col-sm-4 control-label">img</label>

                                                <div class="col-sm-10">
                                                    <input name="img" @change="updatePhoto" type="file" class="form-control" id="inputPhoto" :class="{ 'is-invalid': form.errors.has('img') }">
                                                    <has-error :form="form" field="img"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select v-model="form.status" type="text" name="status"
                                                            class="form-control" :class="{ 'is-invalid': form.errors.has('status') }">
                                                        <option value="1">Active</option>
                                                        <option value="2">Inactive</option>

                                                    </select>
                                                    <has-error :form="form" field="status"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Share Info</label>
                                                    <select v-model="form.info_status" type="text" name="info_status"
                                                            class="form-control" :class="{ 'is-invalid': form.errors.has('info_status') }">
                                                        <option value="1">Share It</option>
                                                        <option value="2">Hide It</option>

                                                    </select>
                                                    <has-error :form="form" field="info_status"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputPassword" class="col-sm-4 control-label">Password</label>

                                                <div class="col-sm-10">
                                                    <input name="password" type="password" v-model="form.password" class="form-control" id="inputPassword" placeholder="Password" :class="{ 'is-invalid': form.errors.has('password') }">
                                                    <has-error :form="form" field="password"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
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
                    password:''

                }),
                codeform: new Form({
                    code:'',
                })
            }
        },
        methods:{
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
                        let input = $("#imageInp");
                        input.replaceWith(input.val('').clone(true));
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
                console.log(file);
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
