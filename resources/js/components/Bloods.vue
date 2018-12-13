<style>
    .blood_image{
        width: 50px;
        height: auto;
    }
</style>

<template>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Bloods</h3>
                    <div class="card-tools">
                        <button class="btn btn-primary" @click="openaddModal">Add New</button>
                  </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Id</td>
                                <td>Name</td>
                                <td>Detail</td>
                                <td>Image</td>
                                <td>Options</td>
                            </tr>
                            <tr v-for="blood in bloods.data" :key="blood.id">
                                <td>{{blood.id}}</td>
                                <td>{{blood.name}}</td>
                                <td>{{blood.detail}}</td>
                                <td><img :src="getPhoto(blood.image)" alt="" class="blood_image img-responsive"></td>
                                <td>
                                    <a href="" @click.prevent="openeditModal(blood)"><i class="fas fa-edit"></i></a>
                                    <a href="" @click.prevent="deleteBlood(blood.id)"><i class="fas fa-trash text-red"></i></a>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- Modal -->
                <div class="modal fade" id="BloodModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editMode" id="exampleModalLongTitle">Add new</h5>
                            <h5 class="modal-title" v-show="editMode" id="exampleModalLongTitle">Edit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form @submit.prevent="editMode ? editBlood() : addBlood()" @keydown="form.onKeydown($event)">
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
                                                <label>Image</label>
                                                <input  type="file" name="image"
                                                    class="form-control" @change="uploadImage" :class="{ 'is-invalid': form.errors.has('image') }">
                                                <has-error :form="form" field="image"></has-error>
                                            </div>
                                        </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea name="detail" v-model="form.detail" class="form-control" :class="{ 'is-invalid': form.errors.has('detail') }">
                                    </textarea>
                                    <has-error :form="form" field="detail"></has-error>
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
            bloods:{},
            editMode:false,
            form:new Form({
                id:'',
                name:'',
                detail:'',
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
        getBloods(){
            axios.get('api/bloods').then((data)=>{this.bloods = data});
        },
        openaddModal(){
             this.editMode = false;
            $('#BloodModal').modal('show');
        },
        openeditModal(blood){
             this.editMode = true;
            $('#BloodModal').modal('show');
            this.form.fill(blood);
        },
        addBlood(){
           this.$Progress.start();
               this.form.post('api/bloods').then(()=>{
                    this.$Progress.finish();
                    $('#BloodModal').modal('hide');
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
        editBlood(){
             this.$Progress.start();
               this.form.put('api/bloods/'+ this.form.id).then(()=>{
                    this.$Progress.finish();
                     $('#BloodModal').modal('hide');
                   let input = $("#imageInp");
                   input.replaceWith(input.val('').clone(true));
                     Fire.$emit('datauploaded');
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
             return "img/bloods/" + file;
        },
          deleteBlood(id){
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
                                    this.form.delete('api/bloods/' + id).then(()=>{
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
        this.getBloods();
         Fire.$on('datauploaded',()=>{
            this.getBloods();
        })
    }
}
</script>

