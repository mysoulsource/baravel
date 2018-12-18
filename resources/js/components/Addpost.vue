<template>

        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add new post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form @submit.prevent="addPost" @keydown="form.onKeydown($event)">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                             <div class="form-group">
                                <label>Title</label>
                                <input v-model="form.title" type="text" name="title"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('title') }" >
                                <has-error :form="form" field="title"></has-error>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Category</label>
                                <select v-model="form.category_id" type="text" name="category_id"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('category_id') }" >
                                    <option v-for="category in categories" :key="category.id" :value="category.id">{{category.name}}</option>
                                </select>
                                <has-error :form="form" field="status"></has-error>
                            </div>
                        </div>
                         <div class="col-md-4">
                              <div class="form-group">
                                <label>Publish On</label>
                                  <input v-model="form.published_on" type="date" name="published_on"
                                         class="form-control" :class="{ 'is-invalid': form.errors.has('published_on') }">
                                  <has-error :form="form" field="published_on"></has-error>
                            </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                                  <div class="form-group">
                                    <label>Content</label>
                                      <vue-editor v-model="form.content" :editorToolbar="customToolbar">
                                      </vue-editor>
                                    </div>
                        </div>
                    </div>

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tags</label>

                            <input v-model="form.tags" type="text" name="tags"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('tags') }">
                            <has-error :form="form" field="tags"></has-error>
                         </div>
                        </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Slug</label>

                            <input v-model="form.slug" type="text" name="slug"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('slug') }">
                            <has-error :form="form" field="slug"></has-error>
                        </div>
                    </div>
                    <div class="col-md-4">
                         <div class="form-group">
                    <label for="imageInp">File input</label>
                    <input id="imageInp" type="file" @change="uploadImage" name="image" class="form-control" :class="{ 'is-invalid': form.errors.has('image') }">
                    <has-error :form="form" field="image"></has-error>
                  </div>
                    </div>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
</template>

<script>
    export default {
        components: {
            VueEditor
        },
        data(){
           return {
              uploadReady: true,
               categories:{},
            events:{},
            form : new Form({
                    id:'',
                    content : '',
                    category_id: '',
                    tags: '',
                    published_on : '',
                    slug : '',
                    image: '',

                }),
               customToolbar: [
                   ['bold', 'italic', 'underline','strike'],
                   [{ 'list': 'ordered'}, { 'list': 'bullet' },{'align':'center'},{'align':'right'},{'align':'justify'},],
                   ['code-block','blockquote',]
               ]
           }
       },
       methods:{
        clear () {
              this.uploadReady = false
              this.$nextTick(() => {
                this.uploadReady = true
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
                      this.clear();
                       swal('Oops!!','File is too Large','warning');
                   }

                reader.readAsDataURL(file);
           },
           addPost(){
               this.$Progress.start();
               this.form.post('api/post').then(()=>{
                    this.$Progress.finish();
                    toast({
                            type: 'success',
                            title: 'Added Successfully'
                        })
                        this.form.reset();
                        this.clear();
               }).catch(()=>{
                    this.$Progress.fail();
                   swal('Oops!!','Something went wrong','warning');
               });
           },
           getCategories(){
               axios.get("api/post/category")
                   .then(({ data }) => (this.categories=data));
           },
            checkuser(){
                if(!this.$gate.isAdminOrAuthor()){
                this.$router.push("empty")
                }  
            }
       },
        created(){
            this.checkuser();
            this.getCategories();
        }
    }
</script>
