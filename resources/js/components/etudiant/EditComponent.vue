<template>
    <div class="container my-3">
        <div >

            <!-- Modal -->
            <div class="modal fade" id="editEtuModal" tabindex="-1" role="dialog" aria-labelledby="editEtuModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editEtuModalLabel">Modification sur un étudiant</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" name="nom" id="nom" class="form-control"
                                    v-model="etudiantToEdit.nom"></input>
                                </div>
                                <div class="form-group">
                                    <label for="prenoms">Prenoms</label>
                                    <input type="text" name="prenoms" id="prenoms" class="form-control"
                                    v-model="etudiantToEdit.prenoms"></input>
                                </div>
                                <div class="form-group">
                                    <label for="sexe">Sexe</label>
                                    <input type="text" name="sexe" id="sexe" class="form-control"
                                    v-model="etudiantToEdit.sexe"></input>
                                </div>
                                <div class="form-group">
                                    <label for="naissance_naissance">Date de naissance</label>
                                    <input type="text" name="date_naissance" id="date_naissance" class="form-control"
                                    v-model="etudiantToEdit.date_naissance"></input>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="mail" placeholder="....@gmail.com" name="email" id="email" class="form-control"
                                    v-model="etudiantToEdit.email"></input>
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Numéro de téléphone</label>
                                    <input type="text" placeholder="00-00-00-00" name="telephone" id="telephone" class="form-control"
                                    v-model="etudiantToEdit.telephone"></input>
                                </div>
                                <div class="form-group">
                                    <label for="filiere">Nom de la filière</label>
                                    <input type="text" name="filiere" id="filiere" class="form-control"
                                    v-model="etudiantToEdit.filiere"></input>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-success" @click="updateEtudiant" data-dismiss="modal">
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

        props: ['etudiantToEdit'],

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

            updateEtudiant() {
                axios.patch('http://127.0.0.1:8000/liste/etudiants/' + this.etudiantToEdit.id, {
                    
                    nom: this.etudiantToEdit.nom,

                    prenoms: this.etudiantToEdit.prenoms,

                    sexe: this.etudiantToEdit.sexe,

                    date_naissance: this.etudiantToEdit.date_naissance,

                    email: this.etudiantToEdit.email,
                    
                    telephone: this.etudiantToEdit.telephone,

                    filiere: this.etudiantToEdit.filiere
                })
                .then(response => this.$emit('update-etudiant', response))
                .catch(error => console.log(error));
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>