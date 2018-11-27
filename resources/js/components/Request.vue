
<template>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Your Requests</h3>
                    <div class="card-tools">
                        <button class="btn btn-primary">Add New</button>
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
                            </tr>
                            <tr v-for="request in requests.data" :key="request.id">
                                <td>{{request.id}}</td>
                                <td>{{request.requested_to_name.name}}</td>
                                <td>{{request.date}}</td>
                                <td>{{request.urgency}}</td>
                                <td>{{request.message}}</td>
                                <td>{{request.code}}</td>
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
        }
    },
    created(){
        this.getRequests();
    }
}
</script>

