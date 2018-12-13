<style>
 .event_image{
        width: 50px;
        height: auto;
    }
</style>

<template>
    <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users Table</h3>

                <div class="card-tools">
                  <!-- <button class="btn btn-primary" @click="addModal">Add new</button> -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>

                    <th>Image</th>
                    <th>Updated_by</th>
                    <th>Updated_at</th>
                    <th>Status</th>
                    <th>Options</th>
                  </tr>
                  <tr v-for="notice in notices" :key="notice.id">
                    <td>{{notice.id}}</td>
                    <td>{{notice.title | capitalize}}</td>
                    <td><img :src="getPhoto(notice.image)" class="event_image" alt=""></td>
                    <td>{{notice.updatedby.name}}</td>
                    <td>{{notice.updated_at | dateChange}}</td>
                    <td>{{notice.status | stringConv}}</td>
                    <td>
                        <a href="#" @click.prevent="editModal(notice)"><i class="fas fa-edit"></i></a>
                        <a href="#" @click.prevent="imageModal(notice)"><i class="fas fa-image text-teal"></i></a>
                    </td>
                  </tr>

                </tbody></table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Edit Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editNotice" @keydown="form.onKeydown($event)">
                        <div class="modal-body">
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                <label>Title</label>
                                                <input v-model="form.title" type="text" name="title"
                                                    class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                                                <has-error :form="form" field="title"></has-error>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                         <div class="form-group">
                                        <label>status</label>
                                            <select v-model="form.status" type="text" name="status"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('status') }" >
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                            </select>
                                            <has-error :form="form" field="status"></has-error>
                                        </div>
                                    </div>


                            </div>
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label>Detail</label>
                                            <textarea v-model="form.detail" type="text" name="detail"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('detail') }" cols="10" rows="5">  </textarea>
                                            <has-error :form="form" field="detail"></has-error>
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
                <!-- end -->
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
                                    <label for="">File input</label>
                                    <input id="imageInp" type="file" @change="uploadImage" name="image" class="form-control" :class="{ 'is-invalid': form.errors.has('image') }">
                                    <has-error :form="form" field="image"></has-error>
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

          </div>
</template>

<script>
    export default {
       data(){
           return {
            notices:{},
            editmode:false,
            form : new Form({
                    id:'',
                    title : '',
                    detail: '',
                    blood: '',
                    updated_by : '',
                    updated_at : '',
                    status: '',
                    image:'',
                }),
           }
       },
       methods:{
           editNotice(){
               this.$Progress.start();
               this.form.put('api/notice/' + this.form.id)
               .then(()=>{
                     this.$Progress.finish();
                     $('#noticeModal').modal('hide');
                     Fire.$emit('datauploaded');

                      toast({
                            type: 'success',
                            title: 'Updated Successfully'
                        })
               })
               .catch(()=>{
                    this.$Progress.fail();
                   swal('Oops!!','Something went wrong','warning');
               });
           },
           changeImage(){
                this.$Progress.start();
               this.form.put('api/notice/image/' + this.form.id).then(()=>{
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
           uploadImage(e){
                var file = e.target.files[0];
                var reader = new FileReader();
                 if(file['size'] < 5242880){
                        reader.onloadend = (file) => {
                         this.form.image = reader.result;
                        }
                   }else{
                        let input = $("#imageInp");
                        input.replaceWith(input.val('').clone(true));
                       swal('Oops!!','File is too Large','warning');
                   }

                reader.readAsDataURL(file);
           },
           getNotice(){
                axios.get("api/notice")
               .then(({ data }) => (this.notices=data));
           },
           getPhoto(photo){
               return "img/notice/" + photo;
           },
           editModal(notice){
               $('#noticeModal').modal('show');
               this.form.fill(notice);
           },
           imageModal(notice){
               $('#updateImage').modal('show');
               this.form.fill(notice);
           },
             checkuser(){
                if(!this.$gate.isAdmin()){
                this.$router.push("empty")
                }  
            }
       },
       created(){
        this.checkuser();
           this.getNotice();
           Fire.$on('datauploaded',()=>{
               this.getNotice();
           });

       }
}
</script>
