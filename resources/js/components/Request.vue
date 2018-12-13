
<template>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Your Requests</h3>
                    <div class="card-tools">
                        <button class="btn btn-primary" @click="deleteall()">Add New</button>
                  </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Id</td>
                                <td>Requested To</td>
                                <td>Date</td>
                                <td>Urgency</td>
                                <td>Message</td>
                                <td>Code</td>
                                <td>Options</td>
                            </tr>
                            <tr v-for="request in requests.data" :key="request.id">
                                <td>{{request.id}}</td>
                                <td>{{request.requested_to_name.name}}</td>
                                <td>{{request.date}}</td>
                                <td>{{request.urgency}}</td>
                                <td>{{request.message}}</td>
                                <td>{{request.code}}</td>
                                <td>
                                     <a href="#" @click.prevent="deleteRequest(request.id)"><i class="fas fa-trash text-red"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
</template>
<script>
export default {
    data(){
        return{
            requests:{},
            form:new Form({
                id:'',
                requested_to:'',
                date:'',
                urgency:'',
                message:'',
                code:''
            })
        }
    },
    methods:{
        getRequests(){
            axios.get('api/request').then((data)=>{this.requests = data});
        },
        deleteall(){
            this.$Progress.start();
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
                                    axios.get('api/requestdeletall').then(()=>{
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
        deleteRequest(id){
              this.$Progress.start();
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
                                    axios.delete('api/request/' +  id).then(()=>{
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
        }
    },
    created(){
        this.getRequests();
         Fire.$on('datauploaded',()=>{
               this.getRequests();
           });
    }
}
</script>

