<template>
    <div class="container">
            <add-etudiant @ajout-etudiant="refresh"></add-etudiant>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active">
                    Liste des étudiants
                </a>
                <li class="list-group-item d-flex justify-content-between align-items-center" 
                v-for="etudiant in etudiants" :key="etudiant.id" >
                    <a href="#" > 
                        {{ etudiant.nom }}
                        {{ etudiant.prenoms }}
                    </a>

                    <div>   
                        <button type="button" class="btn btn-secondary" data-toggle="modal" 
                        data-target="#editEtuModal" @click="editEtudiant(etudiant.id)">
                            <i class="fa fa-pencil fa-fw " style="color:white" ></i>
                        </button>

                        <button type="button" class="btn btn-danger" @click="deleteEtudiant(etudiant.id)" 
                        data-dismiss="modal">
                            <i class="fa fa-trash fa-fw " style="color:white"></i>
                        </button> 
                    </div>    
                </li>
                <edit-etudiant v-bind:etudiantToEdit="etudiantToEdit" @update-etudiant="refresh"></edit-etudiant>
            </div>
    </div>
</template>

<script>
    
    import axios from 'axios';

    export default {

        data() {
            return {
                etudiants: {

                },

                etudiantToEdit: ''

                
            }
        },

        created() {
            
            axios.get('http://127.0.0.1:8000/liste/etudiants')
                .then(response => this.etudiants = response.data)
                .catch(error => console.log(error));
        },

        methods: {

            editEtudiant(id) {
                axios.get('http://127.0.0.1:8000/edit/etudiant/' + id)
                    .then(response => this.etudiantToEdit = response.data)
                    .catch(error => console.log(error));
            },

            deleteEtudiant(id) {
                axios.delete('http://127.0.0.1:8000/liste/etudiants/' + id)
                    .then(response => this.etudiants = response.data)
                    .catch(error => console.log(error));
            },

            refresh(etudiants) {
                this.etudiants = etudiants.data
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>