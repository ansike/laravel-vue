<template>
    <div class="container">
        home
    </div>
</template>

<script>
    export default {
        name:'home',
        data(){
            return{}
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            init(){
                this.axios('/api/home/user').then((res)=>{
                    debugger
                })
            }
        }
    }
</script>
