<template>
    <div class="container my-3">
        <div >
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                Ajouter une filière
            </button>

            <!-- Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabel">Ajout d'une filière</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="name">Nom de la filère</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                    v-model="name"></input>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-success" @click="ajout" data-dismiss="modal">
                                Enrégistrer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import axios from 'axios';

    export default {

        data() {
            return {
                name: ''
            }
        },

        methods: {
            ajout() {
                axios.post('http://127.0.0.1:8000/liste/filieres', {
                    name: this.name
                })
                .then(response => this.$emit('ajout-filiere', response))
                .catch(error => console.log(error));
            }
        }
    }
</script>