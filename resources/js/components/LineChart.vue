<template>

</template>

<script>
    import VueCharts from 'vue-chartjs';
    export default {
        extends: VueCharts.Line,
        name : 'LineChart',
        mounted () {
            this.renderChart({
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [
                    {
                        label: 'Data One',
                        backgroundColor: '#f87979',
                        data: [40, 39, 10, 40, 39, 80, 40]
                    }
                ]
            }, {responsive: true, maintainAspectRatio: false})
        }
    }

</script>

<style scoped>

</style>