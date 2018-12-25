<style>
    .blood_image{
        width: 50px;
        height: auto;
    }
</style>

<template>

        <div class="col-12">
            <div class="card">

                <div class="header pull-left">
                    <h4 class="title">Category</h4>
                    <p class="category">List of Blogs Category</p>
                </div>
                <div class="header pull-right">
                    <button class="btn btn-primary" @click="openaddModal">Add New</button>
                </div>

                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>


                                <th>Id</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Created By</th>
                                <th>Created At</th>
                        </thead>
                        <tbody>
                            <tr v-for="category in categories.data" :key="category.id">
                                <td>{{category.id}}</td>
                                <td>{{category.name}}</td>
                                <td><img :src="getPhoto(category.image)" alt="" class="blood_image img-responsive"></td>
                                <td>{{category.user.name}}</td>
                                <td>{{category.created_at}}</td>
                                <td>
                                    <a href="" @click.prevent="openeditModal(category)"><i class="fa fa-edit"></i></a>
                                    <a href="" @click.prevent="deleteCategory(category.id)"><i class="fa fa-trash text-red"></i></a>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <pagination :data="categories" @pagination-change-page="getCategory"></pagination>
                </div>

            </div>
            <!-- Modal -->
                <div class="modal fade" id="CategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editMode" id="exampleModalLongTitle">Add new</h5>
                            <h5 class="modal-title" v-show="editMode" id="exampleModalLongTitle">Edit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form @submit.prevent="editMode ? editCategory() : addCategory()" @keydown="form.onKeydown($event)">
                        <div class="modal-body">
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                <label>Name</label>
                                                <input v-model="form.name" type="text" name="name"
                                                    class="form-control border-input" :class="{ 'is-invalid': form.errors.has('name') }">
                                                <has-error :form="form" field="name"></has-error>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input  type="file" name="image"
                                                    class="form-control border-input" @change="uploadImage" :class="{ 'is-invalid': form.errors.has('image') }">
                                                <has-error :form="form" field="image"></has-error>
                                            </div>
                                        </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" v-show="!editMode" class="btn btn-primary">Save changes</button>
                             <button type="submit" v-show="editMode" class="btn btn-primary">Update Changes</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            <!-- End -->
        </div>
</template>
<script>
export default {
    data(){
        return{
            categories:{},
            editMode:false,
            form:new Form({
                id:'',
                name:'',
                image:'',
            })
        }
    },
    methods:{
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
        getCategory(page = 1){
            axios.get('api/category?page=' + page)
                .then(response => {
                    this.categories = response.data;
                });
        },
        openaddModal(){
             this.editMode = false;
            $('#CategoryModal').modal('show');
        },
        openeditModal(category){
             this.editMode = true;
            $('#CategoryModal').modal('show');
            this.form.fill(category);
        },
        addCategory(){
           this.$Progress.start();
               this.form.post('api/category').then(()=>{
                    this.$Progress.finish();
                    $('#CategoryModal').modal('hide');
                     Fire.$emit('datauploaded');
                   let input = $("#imageInp");
                   input.replaceWith(input.val('').clone(true));
                    toast({
                            type: 'success',
                            title: 'Added Successfully'
                        })
                        this.form.reset();
               }).catch(()=>{
                    this.$Progress.fail();
                   swal('Oops!!','Something went wrong','warning');
               });
        },
        editCategory(){
             this.$Progress.start();
               this.form.put('api/category/'+ this.form.id).then(()=>{
                    this.$Progress.finish();
                     $('#CategoryModal').modal('hide');
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
               });
        },
        getPhoto(file){
             return "img/category/" + file;
        },
          deleteCategory(id){
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
                                    this.form.delete('api/category/' + id).then(()=>{
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
        this.getCategory();
         Fire.$on('datauploaded',()=>{
            this.getCategory();
        })
    }
}
</script>

