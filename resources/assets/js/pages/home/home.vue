<template>
    <el-container>
        <el-header>Header</el-header>
        <el-container>
            <el-aside width="200px">Aside</el-aside>
            <el-main>
                <span v-for="item in data">
                    {{item.name}}--{{item.email}}<br />
                </span>
            </el-main>
        </el-container>
    </el-container>
</template>

<script>
    export default {
        name:'home',
        data(){
            return{
                data:[]
            }
        },
        mounted() {
            console.log('Component mounted.');
            this.init();
        },
        methods:{
            init(){
                axios('/api/user/userlist').then((res)=>{
                    this.data = res.data.data;
                })
            }
        }
    }
</script>
