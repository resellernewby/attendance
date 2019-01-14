<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        <div>
                            <button @click.prevent='buat()'>Buat</button>
                        </div>
                    </div>

                    <div class="card-body">                        
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Presence</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="list in lists" :key="list.id">
                                <td>{{list.user.name}}</td>
                                <td>{{list.presence}}</td>
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
                axios.get('/list').then( ( {data} ) => (this.lists = data));
            },
            buat(){
                alert('tes');
                axios.post('/attendance', {tanggal: '2019-01-14'});
                loadData();
            }
        },
        mounted() {
            this.loadData();
        }
    }
</script>
