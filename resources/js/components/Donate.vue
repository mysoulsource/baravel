
<template>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Bloods</h3>
                <div class="card-tools">
                    <button class="btn btn-primary">Add New</button>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <td>Id</td>
                        <td>Requested By</td>
                        <td>Requested date</td>
                        <td>Donation Date</td>
                        <td>Urgency</td>
                        <td>Message</td>
                        <td>Options</td>
                    </tr>
                    <tr v-for="donate in donates.data" :key="donate.id">
                        <td>{{donate.id}}</td>
                        <td>{{donate.requested_by_name.name}}</td>
                        <td>{{donate.created_at}}</td>
                        <td>{{donate.date}}</td>
                        <td>{{donate.urgency}}</td>
                        <td>{{donate.message}}</td>
                        <td>
                            <a href="#" @click="acceptRequest(donate.id)"><i class="fas fa-check-square text-green"></i></a>
                            <a href="#" @click="declineRequest(donate.id)"><i class="fas fa-times-circle text-red"></i> </a>
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
                donates:{},
                form:new Form({
                    name:'',
                    detail:'',
                    image:'',
                })
            }
        },
        methods:{
            getBloods(){
                axios.get('api/donate').then((data)=>{this.donates = data});
            },
            acceptRequest(id){
                swal({
                    title: 'Are you sure?',
                    text: "",
                    type: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Accept it!'
                }).then((result) => {
                    if (result.value) {
                        axios.post('api/donate/accept', { did : id }, {
                        })
                        .then(()=>{
                            Fire.$emit('datauploaded');
                            swal(
                                'Accepted!',
                                'Request accepted Successfully.',
                                'success'
                            )
                        })
                            .catch(()=>{
                                swal('Oops!!','Something went wrong','warning');
                            });


                    }
                })





            },
            declineRequest(id){
                axios.post('api/donate/decline', { did : id }, {
                })
                    .then(()=>{
                        Fire.$emit('datauploaded');
                        swal(
                            'Declined!',
                            'Request Declined Successfully.',
                            'success'
                        )
                    })
                    .catch(()=>{
                        swal('Oops!!','Something went wrong','warning');
                    });

            }
        },
        created(){
            this.getBloods();
            Fire.$on('datauploaded',()=>{
                this.getBloods();
            });
        }
    }
</script>

