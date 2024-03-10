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
                <ShowComponent :person="person" :ref="`show_${person.id}`"></ShowComponent>
                <EditComponent :person="person" :ref="`edit_${person.id}`"></EditComponent>
            </template>

            </tbody>
        </table>
    </div>
</template>

<script>
    import EditComponent from './EditComponent.vue';
    import ShowComponent from "./ShowComponent.vue";

    export default {
        name: "IndexComponent",

        components: {
            EditComponent,
            ShowComponent
        },

        data() {
            return {
                people: null,
                editPersonID: null,
                name: '',
                age: null,
                job: ''
            }
        },

        mounted() {
            this.getPeople();
        },

        methods: {
            getPeople() {
                axios.get('api/people')
                    .then(res => {
                            this.people = res.data
                        }
                    )
            },

            isEdit(id) {
                return this.editPersonID === id
            },
        },
    }

</script>

<style scoped>

</style>

