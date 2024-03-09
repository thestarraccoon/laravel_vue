<template>
    <div class="">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Job</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="person in people">
                <tr :class="isEdit(person.id) ? 'd-none' : ''">
                    <th scope="row">{{ person.id }}</th>
                    <td>{{ person.name}}</td>
                    <td>{{ person.age}}</td>
                    <td>{{ person.job}}</td>
                    <td><a href="#" @click.prevent="changeEditPersonID(person.id, person)" class="btn btn-success">Edit</a></td>
                    <td><a href="#" @click.prevent="deletePerson(person.id)" class="btn btn-danger">Delete</a></td>
                </tr>
                <tr :class="isEdit(person.id) ? '' : 'd-none'">
                    <th scope="row">{{ person.id }}</th>
                    <td><input type="text" v-model="name" class="form-control"></td>
                    <td><input type="number" v-model="age" class="form-control"></td>
                    <td><input type="text" v-model="job" class="form-control"></td>
                    <td><a href="#" @click.prevent="updatePerson(person.id)" class="btn btn-success">Update</a></td>
                </tr>
            </template>

            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "IndexComponent",

        data() {
            return {
                people: null,
                editPersonID: null,
                name: '',
                age: null,
                job: ''
            }
        },

        mounted(){
            this.getPeople()
        },

        methods: {
            getPeople() {
                axios.get('api/people')
                .then ( res => {
                        this.people = res.data
                    }
                )
            },

            changeEditPersonID(id, person) {
                this.editPersonID = id
                this.name = person.name
                this.age = person.age
                this.job = person.job
            },

            isEdit(id){
                return this.editPersonID === id
            },

            updatePerson(id){
                this.editPersonID = null
                axios.patch(`api/people/${id}`, {
                    name: this.name,
                    age: this.age,
                    job: this.job
                })
                .then ( res => {
                    this.getPeople()
                })
            },

            deletePerson(id){
                axios.delete(`api/people/${id}`)
                .then ( res => {
                    this.getPeople()
                    console.log(res);
                })
            }
        }
    }

</script>

<style scoped>

</style>
