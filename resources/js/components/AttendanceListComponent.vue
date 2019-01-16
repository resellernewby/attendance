<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        <div>
                            <button @click.prevent="start()">Mulai</button>
                        </div>
                    </div>

                    <div class="card-body">                        
                        <table class="table table-bordered">
                            <thead>
                                <tr>                                
                                <th scope="col">Nama</th>
                                <th scope="col">Shubuh</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="list in lists" :key="list.id">  
                                <td>{{list.user.name}}</td>
                                <td>
                                    <button @click.prevent="update(list.id)">{{list.presence}}</button>
                                </td>
                                </tr>                                
                            </tbody>
                        </table>
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
                lists : {}                                                              
            }
        },
        methods:{
            loadData(){
                axios.get('/list')
                .then( ( {data} ) => (this.lists = data))
                .catch();                
            },
            start(){                
                axios.post('/attendance')
                .then( () => {
                    Fire.$emit('AfterCreate');
                })
                .catch();                              
            },
            update(id){                
                axios.put('/attendance/'+id, {tanggal: '2019-01-15'})
                .then( () => {
                    Fire.$emit('AfterCreate');
                })
                .catch();
                
            }
        },
        created() {
            this.loadData();
            Fire.$on('AfterCreate', () => {
                this.loadData();
            });
        }
    }
</script>
