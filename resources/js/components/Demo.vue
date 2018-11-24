
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
                                <td>Name</td>
                                <td>Detail</td>
                                <td>Image</td>
                                <td>Options</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
            demands:{},
            form:new Form({
                name:'',
                detail:'',
                image:'',
            })
        }
    },
    methods:{
        getBloods(){
            axios.get('api/bloods').then((data)=>{this.demands = data});
        }
    },
    created(){
        this.getBloods();
    }
}
</script>

