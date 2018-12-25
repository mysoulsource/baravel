
<template>

        <div class="col-12">
            <div class="card">
                <div class="header pull-left">
                    <h4 class="title">Request</h4>
                    <p class="category">List of request you made</p>
                </div>
                <div class="header pull-right">
                    <button class="btn btn-danger" @click="deleteall()">Delete All</button>
                </div>

                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>


                                <th>Id</th>
                                <th>Requested To</th>
                                <th>Date</th>
                                <th>Urgency</th>
                                <th>Message</th>
                                <th>Code</th>
                                <th>Options</th>

                        </thead>
                        <tbody>
                            <tr v-for="request in requests.data" :key="request.id">
                                <td>{{request.id}}</td>
                                <td>{{request.requested_to_name.name}}</td>
                                <td>{{request.date}}</td>
                                <td>{{request.urgency | urgencyStatus}}</td>
                                <td>{{request.message}}</td>
                                <td>{{request.code}}</td>
                                <td>
                                     <a href="#" @click.prevent="deleteRequest(request.id)"><i class="fa fa-trash text-red"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="footer">
                    <pagination :data="requests" @pagination-change-page="getRequests"></pagination>
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
        getRequests(page = 1){
            axios.get('api/request?page=' + page)
                .then(response => {
                    this.requests = response.data;
                });
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

<style>
    .card .header button{
        margin:5px 0;
    }
    .card .footer{
        padding: 0 20px;
    }
</style>