<template>
    <div class="container mt-5">
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" :data-target="'#'+modalID">Створити</button>
        <modal :modalID="modalID"/>
        <ul class="list-group">
            <li class="list-group-item" v-for="route in routes">
                <div class="row">
                    <div class="col-2">{{route.date}}</div>
                    <div class="col-4">{{route.from +' - '+ route.to}}</div>
                    <div class="col-4">{{route.selected_load.name}}</div>
                    <div class="col-2">{{route.selected_load.weight+' т'}}</div>
                </div>
            </li>
        </ul>
    </div>
</template>
<script>
    import Modal from './Modal'
    import API from '../api/methods'

    export default {
        components: {Modal},
        data() {
            return {
                modalID: 'create-modal',
                routes: []
            }
        },
        mounted() {
            this.loadRoutes();
        },
        methods: {
            loadRoutes() {
                API.all((response) => this.routes = response.data);
            }
        }
    }
</script>