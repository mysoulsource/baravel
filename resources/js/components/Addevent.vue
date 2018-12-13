<template>

        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add new event</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form @submit.prevent="addEvent" @keydown="form.onKeydown($event)">
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
                                <label>Organizer</label>
                                <input v-model="form.organizer" type="text" name="organizer"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('organizer') }" >
                                <has-error :form="form" field="organizer"></has-error>
                            </div>
                        </div>
                         <div class="col-md-4">
                              <div class="form-group">
                                <label>Date</label>
                                <input v-model="form.date" type="date" name="date"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('date') }">
                                <has-error :form="form" field="date"></has-error>
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

                <div class="row">

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
                    <div class="col-md-6">
                         <div class="form-group">
                    <label for="imageInp">File input</label>
                    <input id="imageInp" type="file" @change="uploadImage" name="img" class="form-control" :class="{ 'is-invalid': form.errors.has('img') }">
                    <has-error :form="form" field="img"></has-error>
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
        data(){
           return {
            events:{},
            form : new Form({
                    id:'',
                    title : '',
                    organizer: '',
                    detail: '',
                    img : '',
                    date : '',
                    status: '',

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
           addEvent(){
               this.$Progress.start();
               this.form.post('api/event/').then(()=>{
                    this.$Progress.finish();
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
            checkuser(){
                if(!this.$gate.isAdminOrAuthor()){
                this.$router.push("empty")
                }  
            }
       },
       created(){
          this.checkuser();
       }
    }
</script>
