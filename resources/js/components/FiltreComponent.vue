<template>
    <div class="container">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active">
                    Liste des étudiants en "{{ filiere.name }}"
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

                props: ['filiere'],
            }
        },

        methods: {

            
        },

        mounted() {
            this.getResults();
            console.log('Component mounted.')
        }
    }
</script>