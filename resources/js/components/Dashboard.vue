<template>
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-life-ring"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Demands</span>
                            <span class="info-box-number">{{data.demands}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-calendar-check"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Events</span>
                            <span class="info-box-number">{{data.events}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-hands-helping"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Success Request</span>
                            <span class="info-box-number">{{data.successRequest}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Members</span>
                            <span class="info-box-number">{{data.users}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>

        </div><!--/. container-fluid -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <line-chart></line-chart>
                </div>
            </div>
        </div>

    </section>
</template>

<script>

    export default {
        data() {
            return {
                data: [],
            }
        },
        methods: {
            getData() {
                axios.get("api/getBloodGroup")
                    .then(({data}) => (this.data = data));

            }


        },
        mounted() {
            // this.getData();
        }
    }
</script>
