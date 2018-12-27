<style>
    .event_image{
        width: 50px;
        height: auto;
    }
</style>

<template>
    <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
                <div class="header pull-left">
                    <h4 class="title">Events</h4>
                    <p class="category">List of all events</p>
                </div>
                <div class="header pull-right">
                    <button class="btn btn-primary"><a href="/adminaddevent">Add new</a></button>
                </div>

                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>

                              <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Organizer</th>
                                <th>Date</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Options</th>
                              </tr>
                        </thead>
                        <tbody>
                  <tr v-for="event in events.data" :key="event.id">
                    <td>{{event.id}}</td>
                    <td>{{event.title | capitalize}}</td>
                    <td>{{event.organizer}}</td>
                    <td>{{event.date | capitalize}}</td>
                    <td><img :src="getPhoto(event.img)" alt="" class="image-responsive event_image"></td>
                    <td>{{event.status | stringConv}}</td>
                    <td>{{event.created_at | dateChange}}</td>
                    <td>
                        <a href="#" @click.prevent="imageModal(event)"><i class="fa fa-image text-teal"></i></a>
                        <a href="#" @click.prevent="editModal(event)"><i class="fa fa-edit"></i></a>
                        <a href="#" @click.prevent="deleteEvent(event.id)"><i class="fa fa-trash text-red"></i></a>
                    </td>
                  </tr>

                </tbody></table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Modal -->
                <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editEvent" @keydown="form.onKeydown($event)">
                        <div class="modal-body">
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                <label>Title</label>
                                                <input v-model="form.title" type="text" name="name"
                                                    class="form-control border-input" :class="{ 'is-invalid': form.errors.has('title') }">
                                                <has-error :form="form" field="title"></has-error>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Organizer</label>
                                                <input v-model="form.organizer" type="text" name="email"
                                                    class="form-control border-input" :class="{ 'is-invalid': form.errors.has('organizer') }">
                                                <has-error :form="form" field="organizer"></has-error>
                                            </div>
                                        </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-4" v-if="$gate.isAdminOrAuthor()">
                                         <div class="form-group">
                                        <label>status</label>
                                            <select v-model="form.status" type="text" name="status"
                                            class="form-control border-input" :class="{ 'is-invalid': form.errors.has('status') }" >
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                            </select>
                                            <has-error :form="form" field="status"></has-error>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label>Date</label>
                                            <input v-model="form.date" type="date" name="date"
                                                class="form-control border-input" :class="{ 'is-invalid': form.errors.has('date') }">
                                            <has-error :form="form" field="date"></has-error>
                                        </div>
                                    </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                            <label>Location</label>
                                            <input v-model="form.location" type="text" name="location"
                                                class="form-control border-input" :class="{ 'is-invalid': form.errors.has('location') }">
                                            <has-error :form="form" field="location"></has-error>
                                        </div>
                                    </div>

                            </div>

                            <div class="row">
                               <div class="col-md-12">
                                  <div class="form-group">
                                    <label>Detail</label>
                                        <textarea v-model="form.detail" type="text" name="detail"
                                        class="form-control border-input" :class="{ 'is-invalid': form.errors.has('detail') }" cols="10" rows="5">  </textarea>
                                        <has-error :form="form" field="detail"></has-error>
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
            <div class="modal fade" id="updateImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="changeImage" @keydown="form.onKeydown($event)">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <input id="imageInp" type="file" @change="uploadImage" name="img" class="form-control border-input" :class="{ 'is-invalid': form.errors.has('img') }">
                                    <has-error :form="form" field="img"></has-error>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            <button type="submit"  class="btn btn-primary">Update changes</button>
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
            events:{},
            editmode:false,
            form : new Form({
                    id:'',
                    title : '',
                    organizer: '',
                    detail: '',
                    img : '',
                    date : '',
                    status: '',
                    created_at:'',
                    location:''
                }),
           }
       },
       methods:{
            uploadImage(e){
               var file = e.target.files[0];
                var reader = new FileReader();
                 if(file['size'] < 5242880){
                        reader.onloadend = (file) => {
                         this.form.img = reader.result;
                        }
                   }else{
                        let input = $("#imageInp");
                        input.replaceWith(input.val('').clone(true));
                       swal('Oops!!','File is too Large','warning');
                   }

                reader.readAsDataURL(file);
           },
           changeImage(){
                this.$Progress.start();
               this.form.put('api/event/image/' + this.form.id).then(()=>{
                    this.$Progress.finish();
                     $('#updateImage').modal('hide');
                     Fire.$emit('datauploaded');
                   let input = $("#imageInp");
                   input.replaceWith(input.val('').clone(true));
                      toast({
                            type: 'success',
                            title: 'Updated Successfully'
                        })

               }).catch(()=>{
                   this.$Progress.fail();
                   swal('Oops!!','Something went wrong','warning');
               })
           },
                deleteEvent(id){
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
                                    this.form.delete('api/event/' + id).then(()=>{
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
           getEvents(){
                axios.get("api/event")
               .then(({ data }) => (this.events=data));
           },

            editModal(event){
               this.editmode = true,
               $('#eventModal').modal('show');
               this.form.fill(event);
           },
           imageModal(event){
               $('#updateImage').modal('show');
               this.form.fill(event);
           },
           editEvent(){
               this.$Progress.start();
               this.form.put('api/event/' + this.form.id).then(()=>{
                    this.$Progress.finish();
                     $('#eventModal').modal('hide');
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
           getPhoto(photo){
               return "img/events/" + photo;
           },
             checkuser(){
                if(!this.$gate.isAdminOrAuthor()){
                this.$router.push("empty")
                }  
            }
       },
       created(){
          // this.checkuser();
           this.getEvents();
           Fire.$on('datauploaded',()=>{
               this.getEvents();
           });

       }
    }
</script>
