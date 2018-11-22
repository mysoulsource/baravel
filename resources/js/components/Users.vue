<template>
    <div class="col-12">
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
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Blood Type</th>
                    <th>Country</th>
                    <th>Zone</th>
                    <th>District</th>
                    <th>Area</th>
                    <th>Options</th>
                  </tr>
                  <tr v-for="user in users" :key="user.id">
                    <td>{{user.id}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.blood}}</td>
                    <td>{{user.country}}</td>
                    <td>{{user.zone}}</td>
                    <td>{{user.district}}</td>
                    <td>{{user.area}}</td>
                    <td>
                        <a href="#"><i class="fas fa-edit"></i></a>
                        <a href="#"><i class="fas fa-trash text-red"></i></a>
                    </td>
                  </tr>

                </tbody></table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Modal -->
                <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? addUser() : editUser()" @keydown="form.onKeydown($event)">
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
                                                    <option>A+</option>
                                                    <option>A-</option>
                                                    <option>B+</option>
                                            </select>
                                        <has-error :form="form" field="blood"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                         <div class="form-group">
                                            <label>Blood</label>

                                                <select v-model="form.blood" type="text" name="blood"
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('blood') }">
                                                    <option class="hidden"  selected disabled>Please select your Blood Type</option>
                                                        <option>A+</option>
                                                        <option>A-</option>
                                                        <option>B+</option>
                                                </select>
                                            <has-error :form="form" field="blood"></has-error>
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
                            <button type="button" class="btn btn-primary">Save changes</button>
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
                }),
           }
       },
       methods:{
           getUsers(){
                axios.get("api/user")
               .then(({ data }) => (this.users=data));
           },
           addModal(){
               this.editmode = false,
               $('#userModal').modal('show');
           },
           addUser(){

           },
           editUser(){

           }
       },
       created(){
           this.getUsers();
       }
    }
</script>
