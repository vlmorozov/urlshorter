<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Url</div>

                    <div class="card-body">
                        <div>
                            <input v-model="url"/>
                            <button class="btn btn-info" v-on:click="send">Add</button>

                            <div class="errors">
                            <div v-for="(msg) in errors">{{msg}}</div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header">Links</div>

                    <div class="card-body">
                        <div v-for="(item) in links">
                            <a :href="item.link" target="_blank">{{item.id}}: {{item.link}}</a>
                        </div>

                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header">History</div>

                    <div class="card-body">
                        <table style="margin: 0 auto">
                            <tr>
                                <th>
                                    Date
                                </th>
                                <th>
                                    Url
                                </th>
                            </tr>
                            <tr v-for="(item) in history">
                                <td>{{item.date}}</td>
                                <td>{{item.link}}</td>
                            </tr>
                        </table>


                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
    import axios from 'axios';

    export default {
        methods: {
            send: function () {

                let params = {
                    url: this.url
                };
                axios.post('/', params).then((r) => {
                    this.loadData();
                }).catch((e) => {
                    console.log(e);
                })
            },

            loadData: function() {
                axios.get('/list').then((r) => {
                    if (r.data) {
                        this.links = r.data.data;
                    }
                }).catch((e) => {
                    console.log(e);
                });
            },

            loadHistory: function() {

                setInterval(() => {
                    axios.get('/history').then((r) => {
                        if (r.data) {
                            this.history = r.data.data;
                        }
                    }).catch((e) => {
                        console.log(e);
                    });

                }, 1000);

            },
        },
        mounted() {
            console.log('Component mounted.');
            this.loadData();
            this.loadHistory();
        },
        data: function() {
            return {
                links: [],
                history: [],
                errors: [],
                url: ''
            };
        }
    }
</script>
