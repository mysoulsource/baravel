<template>
        <div class="container-fluid">
            <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="header pull-left">
                    <h4 class="title">Demands</h4>
                    <p class="category">List of demands you made</p>
                </div>
                <div class="header pull-right">
                    <button class="btn btn-primary" @click="openaddModal">Add New</button>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Blood</th>
                            <th>Date</th>
                            <th>Urgency</th>
                            <th>Accepted By</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Options</th>
                        </thead>
                        <tbody>
                            <tr v-for="demand in demands.data" :key="demand.id">
                                <td>{{demand.id}}</td>
                                <td>{{demand.title}}</td>
                                <td>{{demand.blood_name.name}}</td>
                                <td>{{demand.date}}</td>
                                <td>{{demand.urgency | urgencyStatus}}</td>
                                <td>{{demand.accepted_by}}</td>
                                <td>{{demand.code}}</td>
                                <td><p class="demandstatus">{{demand.status | demandStatus}}</p></td>
                                <td>
                                    <a href="" data-toggle="modal"  data-target="#DemandModal" @click.prevent="openeditModal(demand)"><i class="fas fa-pen"></i></a>
                                    <a href="" @click.prevent="deleteDemand(demand.id)"><i class="fa fa-trash text-red"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="footer">
                    <pagination :data="demands" @pagination-change-page="getDemands"></pagination>
                </div>

            </div>
            <!-- modal -->
            <div class="modal fade" id="DemandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editMode" >Add new</h5>
                            <h5 class="modal-title" v-show="editMode" >Edit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form @submit.prevent="editMode ? editDemand() : addDemand()" @keydown="form.onKeydown($event)">
                        <div class="modal-body">
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                <label>Title</label>
                                                <input v-model="form.title" type="text" name="title"
                                                    class="form-control border-input" :class="{ 'is-invalid': form.errors.has('title') }">
                                                <has-error :form="form" field="title"></has-error>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Blood</label>
                                                    <select name="blood"
                                                    class="form-control border-input" v-model="form.blood" :class="{ 'is-invalid': form.errors.has('blood') }">
                                                    <option value="" disabled>Select Blood Type</option>
                                                    <option v-for="blood in bloods.data" :key="blood.id" :value="blood.id">{{blood.name}}</option>
                                                    </select>
                                                <has-error :form="form" field="blood"></has-error>
                                            </div>
                                        </div>
                            </div>
                            <div class="row">
                                     <div class="col-md-6">
                                        <div class="form-group">
                                                <label>Date</label>
                                                <input v-model="form.date" type="date" name="date"
                                                    class="form-control border-input" :class="{ 'is-invalid': form.errors.has('date') }">
                                                <has-error :form="form" field="date"></has-error>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Urgency</label>
                                                    <select name="urgency"
                                                    class="form-control border-input" v-model="form.urgency" :class="{ 'is-invalid': form.errors.has('urgency') }">
                                                    <option value="" disabled>Select urgency</option>
                                                    <option value="1">High</option>
                                                    <option value="2">Medium</option>
                                                    <option value="3">Low</option>
                                                    </select>
                                                <has-error :form="form" field="urgency"></has-error>
                                            </div>
                                        </div>
                            </div>
                            <div class="row">

                                 <div class="col-md-6">
                                         <div class="form-group">
                                                <label>Location</label>
                                                <input v-model="form.location" type="text" name="location"
                                                    class="form-control  border-input" :class="{ 'is-invalid': form.errors.has('location') }">
                                                <has-error :form="form" field="location"></has-error>
                                            </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                                <label>Detail</label>
                                                    <textarea v-model="form.detail" type="text" name="detail"
                                                    class="form-control border-input" :class="{ 'is-invalid': form.errors.has('detail') }"></textarea>
                                                <has-error :form="form" field="detail"></has-error>
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

            <!-- end -->
        </div>

            </div>
        </div>
</template>
<script>
export default {
    data(){
        return{
            demands:{},
            bloods:{},
            editMode:false,
            form:new Form({
                id:'',
                title:'',
                blood:'',
                detail:'',
                date:'',
                urgency:'',
                location:''
            })
        }
    },
    methods:{
        getBloods(){
            axios.get('api/bloods').then((data)=>{this.bloods = data});
        },
        getDemands(page = 1){
            axios.get('api/demands?page=' + page)
                .then(response => {
                    this.demands = response.data;
                });
        },
        editDemand(){
             this.$Progress.start();
               this.form.put('api/demands/'+ this.form.id).then(()=>{
                    this.$Progress.finish();
                     $('#DemandModal').modal('hide');
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
        addDemand(){
             this.$Progress.start();
               this.form.post('api/demands').then(()=>{
                    this.$Progress.finish();
                    $('#DemandModal').modal('hide');
                     Fire.$emit('datauploaded');
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
        openaddModal(){
            this.editMode= false;
            $('#DemandModal').modal('show');
        },
        openeditModal(demand){
            this.editMode= true;
            $('#DemandModal').modal('show');
            this.form.fill(demand);
        },
        deleteDemand(id){
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
                                    this.form.delete('api/demands/' + id).then(()=>{
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
        this.getDemands();
        this.getBloods();
          Fire.$on('datauploaded',()=>{
            this.getDemands();
        })
    }
}
</script>

<style>
    .pending{
            padding: 2px 3px;
            background: #cccfd2;
            border-radius: 2px;
            text-align: center;
    }
    .success{
         padding: 2px 3px;
            background: green;
            border-radius: 2px;
            text-align: center;
    }
    .denied{
         padding: 2px 3px;
            background: red;
            border-radius: 2px;
            text-align: center;
    }
    .card .header button{
        margin:5px 0;
    }
    .card .footer{
        padding: 0 20px;
    }
</style>