<template>
    <el-container>
        <el-header>Header</el-header>
        <el-container>
            <el-aside width="200px">Aside</el-aside>
            <el-main>Main</el-main>
        </el-container>
    </el-container>
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
