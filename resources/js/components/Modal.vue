<template>
    <div class="modal fade" :id="modalID" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Створити відправку</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="from">Звідки</label>
                        <input type="text" v-model="values.from" @change="errors.from = null" class="form-control" id="from">
                        <div class="invalid-feedback">{{errors.from}}</div>
                    </div>
                    <div class="form-group">
                        <label for="to">Куди</label>
                        <input type="text" v-model="values.to" @change="errors.to = null" class="form-control" id="to">
                        <div class="invalid-feedback">{{errors.to}}</div>
                    </div>
                    <div class="form-group">
                        <label for="date">Дата</label>
                        <input type="date" v-model="values.date" @change="errors.date = null" class="form-control" id="date">
                        <div class="invalid-feedback">{{errors.date}}</div>
                    </div>

                    <div class="form-group">
                        <label for="name">Вантаж</label>
                        <input type="text" v-model="values.name" @change="errors.name = null" class="form-control" id="name">
                        <div class="invalid-feedback">{{errors.name}}</div>
                    </div>
                    <div class="form-group">
                        <label for="weight">Вага(т)</label>
                        <input type="number" v-model="values.weight" @change="errors.weight = null" class="form-control" id="weight">
                        <div class="invalid-feedback">{{errors.weight}}</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                    <button type="button" class="btn btn-primary" @click="create()">Зберегти</button>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
    .invalid-feedback {
        display: block;
    }
</style>
<script>
    import API from '../api/methods'

    export default {
        props: ['modalID'],
        data() {
            return {
                id: this.modalID,
                values: {from: null, to: null, date: null, name: null, weight: null},
                errors: {from: null, to: null, date: null, name: null, weight: null}
            }
        },
        methods: {
            closeModal() {
                $('.close').trigger('click');
            },
            successCallback(response) {
                this.closeModal();
                this.$parent.loadRoutes();
                this.$swal({icon: 'success', showConfirmButton: false, toast: true, position: 'top-right', timer: 3000, text: response.data.message});
            },
            failCallback(response) {
                for (let field in response.data.errors) {
                    this.$set(this.errors, field, response.data.errors[field][0]);
                }
            },
            create() {
                API.create(this.values, (response) => {
                    response.data.status ? this.successCallback(response) : this.failCallback(response);
                });
            }
        }
    }
</script>