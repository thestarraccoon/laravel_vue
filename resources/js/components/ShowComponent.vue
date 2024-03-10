<template>
    <tr :class="this.$parent.isEdit(person.id) ? 'd-none' : ''">
        <th scope="row">{{ person.id }}</th>
        <td>{{ person.name}}</td>
        <td>{{ person.age}}</td>
        <td>{{ person.job}}</td>
        <td><a href="#" @click.prevent="changeEditPersonID(person.id, person)"
               class="btn btn-success">Edit</a></td>
        <td><a href="#" @click.prevent="deletePerson(person.id)" class="btn btn-danger">Delete</a></td>
    </tr>
</template>

<script>
    export default {
        name: "ShowComponent",

        data() {
            return {
                name: '',
                age: null,
                job: ''
            }
        },

        props: [
            'person'
        ],

        mounted() {
        },

        methods: {
            changeEditPersonID(id, person) {
                console.log(id);
                this.$parent.editPersonID = id;
                let editName = `edit_${id}`;
                let fullEditName = this.$parent.$refs[editName][0];
                fullEditName.name = person.name;
                fullEditName.age = person.age;
                fullEditName.job = person.job;
            },

            deletePerson(id) {
                axios.delete(`api/people/${id}`)
                    .then(res => {
                        this.getPeople()
                    })
            },
        }
    }

</script>

<style scoped>

</style>
