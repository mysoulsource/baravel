<template>
    <div class="container" v-if="$gate.isAdmin()">
        <div class="row">
           <passport-clients></passport-clients>
            <passport-authorized-clients></passport-authorized-clients>
            <passport-personal-access-tokens></passport-personal-access-tokens>
        </div>
    </div>
</template>

<script>
    export default {
        methods:{
            checkuser(){
                if(!this.$gate.isAdmin()){
                this.$router.push("empty")
                }  
            }
        },
        mounted() {
            this.checkuser();
        }
    }
</script>
