<style>
    .gallery_image{
        width: 50px;
        height: auto;
    }
</style>

<template>
    <div class="col-12">
        <div class="card">
            <div class="header pull-left">
                <h4 class="title">Gallery</h4>
                <p class="category">List Gallery</p>

            </div>
            <div class="header pull-right">
                <button class="btn btn-primary" @click="addModal">Add New</button>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>


                            <th>Id</th>
                            <th>Title</th>
                            <th>Source</th>
                            <th>image</th>
                            <th>Uploaded By</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Options</th>

                    </thead>
                    <tbody>
                        <tr v-for="gallery in gallerys.data" :key="gallery.id">
                            <td>{{gallery.id}}</td>
                            <td>{{gallery.title}}</td>
                            <td>{{gallery.source}}</td>
                            <td><img :src="getPhoto(gallery.image)" class="gallery_image img-responsive" alt=""></td>
                            <td>{{gallery.uploaded_by}}</td>
                            <td>{{gallery.status}}</td>
                            <td>{{gallery.created_at}}</td>
                            <td>
                               <a href="#" @click.prevent="editModal(gallery)"><i class="fa fa-edit"></i></a>
                               <a href="#" @click.prevent="deleteGallery(gallery.id)"><i class="fa fa-trash text-red"></i></a>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- card end -->
        <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" v-show="!editMode" id="exampleModalLongTitle">Add new</h5>
                <h5 class="modal-title" v-show="editMode" id="exampleModalLongTitle">Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="editMode ? editGallery() : addGallery()" @keydown="form.onKeydown($event)">
            <div class="modal-body">
                        <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input v-model="form.title" type="text" name="title"
                                                class="form-control border-input" :class="{ 'is-invalid': form.errors.has('title') }">
                                            <has-error :form="form" field="title"></has-error>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                           <div class="form-group">
                                                <label>Source</label>
                                                <input v-model="form.source" type="text" name="source"
                                                    class="form-control border-input" :class="{ 'is-invalid': form.errors.has('source') }">
                                                <has-error :form="form" field="source"></has-error>
                                            </div>
                                </div>
                            </div>
                              <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input id="imageInp" type="file" v-if="uploadReady" @change="imageUpload" name="image"
                                                class="form-control border-input" :class="{ 'is-invalid': form.errors.has('image') }">
                                            <has-error :form="form" field="image"></has-error>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                           <div class="form-group">
                                             <label>Status</label>
                                            <select v-model="form.status" type="text" name="status"
                                                    class="form-control border-input" :class="{ 'is-invalid': form.errors.has('status') }">
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>

                                            </select>
                                                <has-error :form="form" field="status"></has-error>
                                            </div>
                                </div>
                            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" v-show="!editMode" class="btn btn-primary">Save changes</button>
                <button type="submit" v-show="editMode" class="btn btn-primary">Update changes</button>
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
        return{
            uploadReady: true,
            gallerys:{},
            editMode:false,
            form : new Form({
                id:'',
                title:'',
                source:'',
                uploaded_by:'',
                image:'',
                status:'',
                created_at:''

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
        getGallerys(){
            axios.get('api/gallery')
            .then((data)=>{
                this.gallerys = data
            })
        },
        editModal(gallery){
            this.editMode = true;
            $('#galleryModal').modal('show');
            this.form.fill(gallery);
        },
        addModal(){
            this.editMode = false;
            $('#galleryModal').modal('show');
        },
        editGallery(){
            this.$Progress.start();
            this.form.put('api/gallery/' + this.form.id).then(()=>{
                this.$Progress.finish();
                $('#galleryModal').modal('hide');
                 Fire.$emit('datauploaded');
                      toast({
                            type: 'success',
                            title: 'Updated Successfully'
                        })
                        this.form.reset();
                        this.clear();
                let input = $("#imageInp");
                input.replaceWith(input.val('').clone(true));

            }).catch(()=>{
                this.$Progress.fail();
                swal('Oops!!','Something went wrong','warning');
            })
        },
        addGallery(){
            this.form.post('api/gallery').then(()=>{
                this.$Progress.start();
                $('#galleryModal').modal('hide');
                Fire.$emit('datauploaded');
                this.form.reset();
                      toast({
                            type: 'success',
                            title: 'Updated Successfully'
                        })
               this.clear();
            })
            .catch(()=>{
                this.$Progress.fail();
                swal('Oops!!','Something went wrong','warning');
            })
        },
        imageUpload(e){
                  var file = e.target.files[0];
                var reader = new FileReader();
                 if(file['size'] < 5242880){
                        reader.onloadend = (file) => {
                         this.form.image = reader.result;
                        }
                   }else{
                        this.clear();
                       swal('Oops!!','File is too Large','warning');
                   }

                reader.readAsDataURL(file);
        },
         getPhoto(photo){
               return "img/gallery/" + photo;
           },
           deleteGallery(id){
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
                                    this.form.delete('api/gallery/' + id).then(()=>{
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
             checkuser(){
                if(!this.$gate.isAdminOrAuthor()){
                this.$router.push("empty")
                }  
            }


    },
    created(){
        this.checkuser();
        this.getGallerys();
        Fire.$on('datauploaded',()=>{
            this.getGallerys();
        })
    }

}
</script>

