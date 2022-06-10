<template>
    <div class="container my-3">
        <div >
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEtuModal">
                Ajouter un étudiant
            </button>

            <!-- Modal -->
            <div class="modal fade" id="addEtuModal" tabindex="-1" role="dialog" aria-labelledby="addEtuModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabel">Ajout d'un etudiant</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" name="nom" id="nom" class="form-control"
                                    v-model="nom"></input>
                                </div>
                                <div class="form-group">
                                    <label for="prenoms">Prenoms</label>
                                    <input type="text" name="prenoms" id="prenoms" class="form-control"
                                    v-model="prenoms"></input>
                                </div>
                                <div class="form-group">
                                    <label for="sexe">Sexe</label>
                                    <input type="text" name="sexe" id="sexe" class="form-control"
                                    v-model="sexe"></input>
                                </div>
                                <div class="form-group">
                                    <label for="naissance_naissance">Date de naissance</label>
                                    <input type="text" name="date_naissance" id="date_naissance" class="form-control"
                                    v-model="date_naissance"></input>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="mail" placeholder="....@gmail.com" name="email" id="email" class="form-control"
                                    v-model="email"></input>
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Numéro de téléphone</label>
                                    <input type="text" placeholder="00-00-00-00" name="telephone" id="telephone" class="form-control"
                                    v-model="telephone"></input>
                                </div>
                                <div class="form-group">
                                    <label for="filiere">Nom de La filière</label>
                                    <input type="text" name="filiere" id="filiere" class="form-control"
                                    v-model="filiere"></input>
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
                nom: '',

                prenoms: '',

                sexe: '',

                date_naissance: '',

                email: '',
                
                telephone: '',

                filiere: ''
            }
        },

        methods: {
            ajout() {
                axios.post('http://127.0.0.1:8000/liste/etudiants', {
                    nom: this.nom,
                    prenoms: this.prenoms,
                    sexe: this.sexe,
                    date_naissance: this.date_naissance,
                    email: this.email,
                    telephone: this.telephone,
                    filiere: this.filiere
                })
                .then(response => this.$emit('ajout-etudiant', response))
                .catch(error => console.log(error));
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>