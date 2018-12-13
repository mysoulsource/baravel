<style>
    .gallery_image{
        width: 50px;
        height: auto;
    }
</style>

<template>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Banner Images</h3>

                <div class="card-tools">
                    <button class="btn btn-primary" @click="addModal">Add New</button>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>Id</td>
                            <td>Title</td>
                            <td>Sub Title</td>
                            <td>image</td>
                            <td>Status</td>
                            <td>Created At</td>
                            <td>Options</td>
                        </tr>
                        <tr v-for="banner in banners.data" :key="banner.id">
                            <td>{{banner.id}}</td>
                            <td>{{banner.title}}</td>
                            <td>{{banner.sub_title}}</td>
                            <td><img :src="getPhoto(banner.img)" class="gallery_image img-responsive" alt=""></td>
                            <td>{{banner.uploaded_by}}</td>
                            <td>{{banner.status}}</td>
                            <td>{{banner.created_at}}</td>
                            <td>
                               <a href="#" @click.prevent="editModal(banner)"><i class="fas fa-edit"></i></a>
                               <a href="#" @click.prevent="deleteBanner(banner.id)"><i class="fas fa-trash text-red"></i></a>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- card end -->
        <div class="modal fade" id="bannerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" v-show="!editMode" id="">Add new</h5>
                <h5 class="modal-title" v-show="editMode" id="">Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="editMode ? editBanner() : addBanner()" @keydown="form.onKeydown($event)">
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
                                                <label>Sub Title</label>
                                                <input v-model="form.sub_title" type="text" name="sub_title"
                                                    class="form-control" :class="{ 'is-invalid': form.errors.has('sub_title') }">
                                                <has-error :form="form" field="sub_title"></has-error>
                                            </div>
                                </div>
                            </div>
                              <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input id="imageInp" type="file" @change="imageUpload" name="img"
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('img') }">
                                            <has-error :form="form" field="img"></has-error>
                                        </div>
                                </div>
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
            banners:{},
            editMode:false,
            form : new Form({
                id:'',
                title:'',
                sub_title:'',
                img:'',
                status:'',
                created_at:''

            })
        }
    },
    methods:{
        getBanners(){
            axios.get('api/banner')
            .then((data)=>{
                this.banners = data
            })
        },
        editModal(banner){
            this.editMode = true;
            $('#bannerModal').modal('show');
            this.form.fill(banner);
        },
        addModal(){
            this.editMode = false;
            $('#bannerModal').modal('show');
        },
        editBanner(){
            this.$Progress.start();
            this.form.put('api/banner/' + this.form.id).then(()=>{
                this.$Progress.finish();
                $('#bannerModal').modal('hide');
                 Fire.$emit('datauploaded');
                let input = $("#imageInp");
                input.replaceWith(input.val('').clone(true));
                      toast({
                            type: 'success',
                            title: 'Updated Successfully'
                        })
                        this.form.reset();

            }).catch(()=>{
                this.$Progress.fail();
                swal('Oops!!','Something went wrong','warning');
            })
        },
        addBanner(){
            this.form.post('api/banner').then(()=>{
                this.$Progress.start();
                $('#bannerModal').modal('hide');
                Fire.$emit('datauploaded');
                let input = $("#imageInp");
                input.replaceWith(input.val('').clone(true));
                this.form.reset();
                      toast({
                            type: 'success',
                            title: 'Updated Successfully'
                        })
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
                         this.form.img = reader.result;
                        }
                   }else{
                        let input = $("#imageInp");
                        input.replaceWith(input.val('').clone(true));
                       swal('Oops!!','File is too Large','warning');
                   }

                reader.readAsDataURL(file);
        },
         getPhoto(photo){
               return "img/banners/" + photo;
           },
           deleteBanner(id){
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
                                    this.form.delete('api/banner/' + id).then(()=>{
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
                if(!this.$gate.isAdmin()){
                this.$router.push("empty")
                }  
            }


    },
    created(){
        this.checkuser();
        this.getBanners();
        Fire.$on('datauploaded',()=>{
            this.getBanners();
        })
    }

}
</script>

