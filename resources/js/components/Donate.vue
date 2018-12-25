
<template>
    <div class="container-fluid">
        <div class="row">

    <div class="col-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Donate</h4>
                <p class="category">List of request made to you</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">

                   <thead>
                           <!--<th>Id</th>-->
                           <th>Requested By</th>
                           <th>Requested date</th>
                           <th>Donation Date</th>
                           <th>Urgency</th>
                           <th>Message</th>
                           <th>Options</th>
                   </thead>


                    <tbody>
                    <tr v-for="donate in donates.data" :key="donate.id">
                        <!--<td>{{donate.id}}</td>-->
                        <td>{{donate.requested_by_name.name}}</td>
                        <td>{{donate.created_at}}</td>
                        <td>{{donate.date}}</td>
                        <td>{{donate.urgency | urgencyStatus}}</td>
                        <td>{{donate.message}}</td>
                        <td>
                            <a href="#" @click="acceptRequest(donate.id)"><i class="fa fa-check-square text-green"></i></a>
                            <a href="#" @click="declineRequest(donate.id)"><i class="fa fa-times-circle text-red"></i> </a>
                        </td>

                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <pagination :data="donates" @pagination-change-page="getDonates"></pagination>
            </div>

        </div>
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
            getDonates(page = 1){
                axios.get('api/donate?page=' + page)
                    .then(response => {
                        this.donates = response.data;
                    });
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
            this.getDonates();
            Fire.$on('datauploaded',()=>{
                this.getDonates();
            });
        }
    }
</script>

