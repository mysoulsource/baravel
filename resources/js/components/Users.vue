<style>

</style>

<template>
    <div class="col-12">
        <div class="search">
            <form @submit.prevent="Advsearch" @keydown="form.onKeydown($event)">
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Zone" v-model="searchuser.zone">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="District"  v-model="searchuser.district">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Area"  v-model="searchuser.area">
                    </div>
                    <div class="col">
                        <!-- <input type="text" class="form-control" placeholder="Blood Group"  v-model="searchuser.bloodgroup"> -->
                        <select name="" id="" v-model="searchuser.bloodgroup" class="form-control" placeholder="Blood Group">
                            <option :value="bloodgroup.id" v-for="bloodgroup in bloodgroups" :key="bloodgroup.id">{{bloodgroup.name}}</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="submit" class="btn btn-info" value="Advance Search">
                    </div>
                </div>
            </form>

        </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users Table</h3>

                <div class="card-tools">
                  <button class="btn btn-primary" @click="addModal">Add new</button>
                </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody>
                  <tr>
                    <th v-if="$gate.isAdmin()">ID</th>
                    <th>Name</th>
                    <th v-if="$gate.isAdmin()">Email</th>
                    <th  v-if="$gate.isAdmin()">Type</th>
                    <th>Blood Type</th>
                    <th v-if="$gate.isUser()">Zone</th>
                    <th v-if="$gate.isUser()">District</th>
                    <th v-if="$gate.isUser()">Area</th>
                    <th v-if="$gate.isAdmin()">Created</th>
                    <th>Options</th>
                  </tr>
                  <tr v-for="user in users.data" :key="user.id">
                    <td v-if="$gate.isAdmin()">{{user.id}}</td>
                    <td>{{user.name | capitalize}}</td>
                    <td v-if="$gate.isAdmin()">{{user.email}}</td>
                    <td  v-if="$gate.isAdmin()">{{user.type | capitalize}}</td>
                    <td>{{user.bloodgroup.name}}</td>
                    <td v-if="$gate.isUser()">{{user.zone | capitalize}}</td>
                    <td v-if="$gate.isUser()">{{user.district | capitalize}}</td>
                    <td v-if="$gate.isUser()">{{user.area | capitalize}}</td>
                    <td v-if="$gate.isAdmin()">{{user.created_at | dateChange}}</td>
                    <td>
                        <a href="#" @click.prevent="requestblood(user.id)"><i class="fas fa-hands-helping"></i></a>
                        <a href="#" @click.prevent="editModal(user)" v-if="$gate.isAdmin()"><i class="fas fa-edit"></i></a>
                        <a href="#" @click.prevent="deleteUser(user.id)" v-if="$gate.isAdmin()"><i class="fas fa-trash text-red"></i></a>
                    </td>
                  </tr>

                </tbody></table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <pagination :data="users" @pagination-change-page="getResults"></pagination>
              </div>
            </div>
            <!-- /.card -->

            <!-- Modal -->
                <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" >Add new</h5>
                        <h5 class="modal-title" v-show="editmode">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? editUser() : addUser()" @keydown="form.onKeydown($event)">
                        <div class="modal-body">
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                <label>Name</label>
                                                <input v-model="form.name" type="text" name="name"
                                                    class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                                <has-error :form="form" field="name"></has-error>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input v-model="form.email" type="text" name="email"
                                                    class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                                <has-error :form="form" field="email"></has-error>
                                            </div>
                                        </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Blood</label>

                                            <select v-model="form.blood" type="text" name="blood"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('blood') }">
                                                <option class="hidden"  selected disabled>Please select your Blood Type</option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                            </select>
                                        <has-error :form="form" field="blood"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                         <div class="form-group">
                                            <label>Blood</label>

                                                <select v-model="form.type" type="text" name="type"
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                                                    <option class="hidden"  selected disabled>User Type</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="user">Simple User</option>
                                                        <option value="author">Author</option>

                                                </select>
                                            <has-error :form="form" field="type"></has-error>
                                        </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input v-model="form.country" type="text" name="country"
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('country') }">
                                            <has-error :form="form" field="country"></has-error>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                           <div class="form-group">
                                                <label>Zone</label>
                                                <input v-model="form.zone" type="text" name="zone"
                                                    class="form-control" :class="{ 'is-invalid': form.errors.has('zone') }">
                                                <has-error :form="form" field="zone"></has-error>
                                            </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                         <div class="form-group">
                                            <label>District</label>
                                            <input v-model="form.district" type="text" name="district"
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('district') }">
                                            <has-error :form="form" field="district"></has-error>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Area</label>
                                            <input v-model="form.district" type="text" name="area"
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('area') }">
                                            <has-error :form="form" field="area"></has-error>
                                        </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" v-show="!editmode" class="btn btn-primary">Save changes</button>
                            <button type="submit" v-show="editmode" class="btn btn-primary">Update changes</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>


                 <div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"  id="">Request form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="sendRequest" @keydown="form.onKeydown($event)">
                        <div class="modal-body">
                             <div class="row">
                                     <div class="col-md-6">
                                        <div class="form-group">
                                                <label>Date</label>
                                                <input v-model="request.date" type="date" name="date"
                                                    class="form-control" :class="{ 'is-invalid': request.errors.has('date') }">
                                                <has-error :form="request" field="date"></has-error>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Urgency</label>
                                                    <select name="urgency"
                                                    class="form-control" v-model="request.urgency" :class="{ 'is-invalid': request.errors.has('urgency') }">
                                                    <option value="" disabled>Select urgency</option>
                                                    <option value="1">High</option>
                                                    <option value="2">Medium</option>
                                                    <option value="3">Low</option>
                                                    </select>
                                                <has-error :form="request" field="urgency"></has-error>
                                            </div>
                                        </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                                <label>Message</label>
                                                    <textarea v-model="request.message" type="text" name="message"
                                                    class="form-control" :class="{ 'is-invalid': request.errors.has('message') }"></textarea>
                                                <has-error :form="request" field="message"></has-error>
                                    </div>
                                    </div>
                            </div>



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit"  class="btn btn-primary">Send Request</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            <!-- End of Modal -->
          </div>
</template>

<script>
    export default {
       data(){
           return {
            users:{},
            editmode:false,
            form : new Form({
                    id:'',
                    name : '',
                    email: '',
                    blood: '',
                    country : '',
                    zone : '',
                    district: '',
                    area:'',
                    type:'',
                    created_at:''
                }),
                request: new Form({
                    id:'',
                    date:'',
                    urgency:'',
                    message:''
                }),
               searchuser : new Form({
                   zone:'',
                   district:'',
                   area:'',
                   bloodgroup:''
               }),
               bloodgroups:{}

           }
       },
       methods:{
           Advsearch(){
               this.$Progress.start();
               this.searchuser.post('api/advsearch').then(({data})=>{
                   this.$Progress.finish();
                   this.users = data;

               }).catch(()=>{
                   this.$Progress.fail();
                   swal('Oops!!','Something went wrong','warning');
               })
           },
                deleteUser(id){
                        swal({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {

                                if (result.value) {
                                      //send ajax request to server
                                    this.form.delete('api/user/' + id).then(()=>{
                                        //fire the event trigger
                                        Fire.$emit('datauploaded');
                                            swal(
                                                'Deleted!',
                                                'Your file has been deleted.',
                                                'success'
                                                )
                                    }).catch(()=>{
                                        swal('Oops!!','Something went wrong','warning');
                                    });
                                }

                            })
           },
           getUsers(){
                axios.get("api/user")
               .then(({ data }) => (this.users=data));
           },
            //get Result
            getResults(page = 1) {
            axios.get('api/user?page=' + page)
                .then(response => {
                    this.users = response.data;
                });
             },
           addModal(){
               this.editmode = false,
               $('#userModal').modal('show');
           },
            editModal(user){
               this.editmode = true,
               $('#userModal').modal('show');
               this.form.fill(user);
           },
           addUser(){

           },
           editUser(){
               this.$Progress.start();
               this.form.put('api/user/' + this.form.id).then(()=>{
                    this.$Progress.finish();
                     $('#userModal').modal('hide');
                     Fire.$emit('datauploaded');
                      toast({
                            type: 'success',
                            title: 'Updated Successfully'
                        })

               }).catch(()=>{
                   this.$Progress.fail();
                   swal('Oops!!','Something went wrong','warning');
               })
           },
           requestblood(id){
               $('#requestModal').modal('show');
               this.request.id = id;

           },
           sendRequest(){
               this.$Progress.start();
                this.request.post('api/request').then(()=>{
                     this.$Progress.finish();
                      $('#requestModal').modal('hide');
                       toast({
                            type: 'success',
                            title: 'Requested Successfully'
                        })
                }).catch((error)=>{
                    console.log(error);
                     this.$Progress.fail();
                      swal('Oops!!','Something went wrong','warning');
                });
           },
           userSearch(){
               let query = this.$parent.search;
               axios.get('api/usersearch?q=' + query)
                   .then(response => {
                       this.users = response.data;
                   });
           },
           getBloodgroups(){
              axios.get("api/bloodgroup")
               .then(({ data }) => (this.bloodgroups=data));
           }
       },
       created(){
           this.getResults();
           this.getBloodgroups();
           Fire.$on('datauploaded',()=>{
               this.getResults();
           });
           Fire.$on('searching',()=>{
               this.userSearch();
           });

       }
    }
</script>
