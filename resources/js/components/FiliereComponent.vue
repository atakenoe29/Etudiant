<template>
    <div class="container">
            <add-filiere @ajout-filiere="refresh"></add-filiere>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active">
                    Liste des filières
                </a>
                <li class="list-group-item d-flex justify-content-between align-items-center" 
                v-for="filiere in filieres.data" :key="filiere.id" >
                    <a href="#" > 
                        {{ filiere.name }} 
                    </a>

                    <div>   
                        <button type="button" class="btn btn-secondary" data-toggle="modal" 
                        data-target="#editModal" @click="editFiliere(filiere.id)">
                            <i class="fa fa-pencil fa-fw " style="color:white" ></i>
                        </button>

                        <button type="button" class="btn btn-danger" @click="deleteFiliere(filiere.id)" data-dismiss="modal">
                            <i class="fa fa-trash fa-fw " style="color:white"></i>
                        </button> 
                    </div>    
                </li>
                
                <edit-filiere v-bind:filiereToEdit="filiereToEdit" @update-filiere="refresh"></edit-filiere>
            </div>
    </div>
</template>

<script>
    
    import axios from 'axios';

    export default {

        data() {
            return {
                filieres: {

                },

                filiereToEdit: ''

                
            }
        },

        created() {
            
            axios.get('http://127.0.0.1:8000/liste/filieres')
                .then(response => this.filieres = response.data)
                .catch(error => console.log(error));
        },

        methods: {

            getResults(page = 1) {
                axios.get('http://127.0.0.1:8000/liste/filieres?page=' + page)
                    .then(response => {
                    this.filieres = response.data;
                });
            },

            editFiliere(id) {
                axios.get('http://127.0.0.1:8000/edit/filiere/' + id)
                    .then(response => this.filiereToEdit = response.data)
                    .catch(error => console.log(error));
            },

            deleteFiliere(id) {
                axios.delete('http://127.0.0.1:8000/liste/filieres/' + id)
                    .then(response => this.filieres = response.data)
                    .catch(error => console.log(error));
            },

            refresh(filieres) {
                this.filieres = filieres.data
            }
        },

        mounted() {
            this.getResults();
            console.log('Component mounted.')
        }
    }
</script>