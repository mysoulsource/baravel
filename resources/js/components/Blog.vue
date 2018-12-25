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
                    <h4 class="title">Blogs</h4>
                    <p class="category">List of all posts</p>
                </div>
                <div class="header pull-right">
                    <button class="btn btn-primary"><a href="/adminaddpost">Add new</a></button>
                </div>

                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>


                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <!--<th>Tags</th>-->
                            <!--<th>Slugs</th>-->
                            <th>Published</th>
                            <th>Image</th>
                            <th>Created By</th>
                            <!--<th>Created On</th>-->
                            <th>Options</th>

                        </thead>
                        <tbody>
                    <tr v-for="post in posts.data" :key="post.id">
                    <td>{{post.id}}</td>
                    <td>{{post.title}}</td>
                    <td>{{post.category.name}}</td>
                    <!--<td>{{post.tags}}</td>-->
                    <!--<td>{{post.slug}}</td>-->
                     <td>{{post.published_on | published}}</td>
                    <td>
                    <a :href="getPhoto(post.image)" target="_blank">View Image</a>
                    </td>
                    <td>{{post.user.name}}</td>
                    <!--<td>{{post.created_at | dateChange}}</td>-->
                    <td>
                        <a href="#" @click.prevent="publish(post.id)"><i class="fa fa-eye text-teal"></i></a>
                        <a href="#" @click.prevent="imageModal(post)"><i class="fa fa-image text-teal"></i></a>
                        <a href="#" @click.prevent="editModal(post)"><i class="fa fa-edit"></i></a>
                        <a href="#" @click.prevent="openContent(post.content,post.id)"><i class="fa fa-edit"></i></a>
                        <a href="#" @click.prevent="deletePost(post.id)"><i class="fa fa-trash text-red"></i></a>
                    </td>
                  </tr>

                </tbody></table>
              </div>
              <!-- /.card-body -->
                <div class="card-footer">
                    <pagination :data="posts" @pagination-change-page="getPosts"></pagination>
                </div>
            </div>
            <!-- /.card -->

            <!-- Modal -->
                <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editPost" @keydown="form.onKeydown($event)">
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
                                                <label>Category</label>
                                              <select v-model="form.category_id" type="text" name="category_id"
                                            class="form-control border-input" :class="{ 'is-invalid': form.errors.has('category_id') }" >
                                     <option v-for="category in categories" :key="category.id" :value="category.id" :selected="form.category_id">{{category.name}}</option>
                                            </select>
                                            <has-error :form="form" field="category_id"></has-error>
                                            </div>
                                        </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-6">
                                         <div class="form-group">
                                        <label>Tags</label>
                                            <input v-model="form.tags" type="text" name="tags"
                                                class="form-control border-input" :class="{ 'is-invalid': form.errors.has('tags') }">
                                            <has-error :form="form" field="tags"></has-error>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                          <div class="form-group">
                                            <label>Publish On</label>
                                            <input v-model="form.published_on" type="date" name="published_on"
                                                class="form-control border-input" :class="{ 'is-invalid': form.errors.has('published_on') }">
                                            <has-error :form="form" field="published_on"></has-error>
                                        </div>
                                    </div>

                            </div>

                            <div class="row">
                               <div class="col-md-12">
                                  <div class="form-group">
                                   <label>Slugs</label>
                                            <input v-model="form.slug" type="text" name="slug"
                                                class="form-control border-input" :class="{ 'is-invalid': form.errors.has('slug') }">
                                            <has-error :form="form" field="slug"></has-error>
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
                        <h5 class="modal-title" id="">Edit Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="changeImage" @keydown="form.onKeydown($event)">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="imageInp">File input</label>
                                    <input id="imageInp" type="file" @change="uploadImage" name="image" class="form-control border-input" :class="{ 'is-invalid': form.errors.has('image') }">
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
        <div class="modal fade" id="contentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editContent" @keydown="form.onKeydown($event)">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Content</label>
                                        <vue-editor v-model="form.content" :editorToolbar="customToolbar">
                                        </vue-editor>
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
        components: {
            VueEditor
        },
       data(){
           return {
            posts:{},

            categories:{},
            editmode:false,
            form : new Form({
                    id:'',
                    title : '',
                    category_id: '',
                    tags: '',
                    published_on : '',
                    slug : '',
                    image: '',
                    created_at:'',
                    user_id:'',
                    content:'',
                }),
               customToolbar: [
                   ['bold', 'italic', 'underline','strike'],
                   [{ 'list': 'ordered'}, { 'list': 'bullet' },{'align':'center'},{'align':'right'},{'align':'justify'},],
                   ['code-block','blockquote',]
               ]

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
           changeImage(){
                this.$Progress.start();
               this.form.put('api/post/image/' + this.form.id).then(()=>{
                    this.$Progress.finish();
                     $('#updateImage').modal('hide');
                     this.form.reset();
                   let input = $("#imageInp");
                   input.replaceWith(input.val('').clone(true));
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
                deletePost(id){
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
                                    this.form.delete('api/post/' + id).then(()=>{
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
           getPosts(page = 1){
               axios.get('api/post?page=' + page)
                   .then(response => {
                       this.posts = response.data;
                   });
           },
            getCategories(){
                axios.get("api/post/category")
               .then(({ data }) => (this.categories=data));
           },

            editModal(post){
                this.form.reset();
               this.editmode = true,
               $('#postModal').modal('show');
               this.form.fill(post);
           },
           imageModal(post){
               this.form.reset();
               $('#updateImage').modal('show');
               this.form.fill(post);
           },
           editPost(){
               this.$Progress.start();
               this.form.put('api/post/' + this.form.id).then(()=>{
                    this.$Progress.finish();
                     $('#postModal').modal('hide');
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
               return "img/posts/" + photo;
           },
           openContent(content,id){
               this.form.reset();
               $('#contentModal').modal('show');
                this.form.content = content;
                this.form.id = id;
           },
           editContent(){
            this.$Progress.start();
            this.form.put('api/post/content/' + this.form.id).then(()=>{
                $('#contentModal').modal('hide');
                Fire.$emit('datauploaded');
                toast({
                  type:'success',
                  title:'Updated Successfully'
                })
            }).catch(()=>{
              this.$Progress.fail();
              swal('Oops!!','Something went wrong','warning');
            })
           },
           checkuser(){
                if(!this.$gate.isAdminOrAuthor()){
                this.$router.push("empty")
                }  
            },
           publish(id){
               this.$Progress.start();
               axios.get("api/post/publish/" + id)
                   .then(()=>{
                       Fire.$emit('datauploaded');
                       toast({
                           type:'success',
                           title:'Updated Successfully'
                       })
                   }).catch(()=>{
                   this.$Progress.fail();
                   swal('Oops!!','Something went wrong','warning');
               });
           }

       },
       created(){
           this.checkuser();
           this.getPosts();
           this.getCategories();
           Fire.$on('datauploaded',()=>{
               this.getPosts();
           });

       }
    }
</script>
