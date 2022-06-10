<template>
    <div class="container my-3">
        <div class="dropdown my-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton" 
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                FILIERES DISPONIBLES
            </button>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
                <li v-for="filiere in filieres" :key="filiere.id" @click="getFiliere(filiere.id)">
                    <a class="dropdown-item" @click="getEtudiants">
                        {{ filiere.name }}
                    </a>
                </li>
            </div>
        </div>
            
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">NOMS</th>
                        <th scope="col">PRENOMS</th>
                    </tr>
                </thead>
                <tbody v-for="etudiant in etudiants">
                    <tr v-if="etudiant.filiere == filiereFiltree.name">
                        <th scope="row">{{ etudiant.nom }}</th>
                        <td>{{ etudiant.prenoms }}</td>
                    </tr>
                </tbody>
            </table>
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

                filiereFiltree: {

                },

                etudiants: {

                },
            }
        },

        created() {
            
            axios.get('http://127.0.0.1:8000/liste/deroulante')
                .then(response => this.filieres = response.data)
                .catch(error => console.log(error));

        },

        methods: {

            getFiliere(id) {
                axios.get('http://127.0.0.1:8000/filiere/' + id)
                    .then(response => this.filiereFiltree = response.data)
                    .catch(error => console.log(error));
            },

            getEtudiants(id) {
                axios.get('http://127.0.0.1:8000/etudiants')
                    .then(response => this.etudiants = response.data)
                    .catch(error => console.log(error));
            }

        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>