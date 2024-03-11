<template>
    <div class="w-25" v-if="person">
        <div class="mb-3">
            <input type="text" class="form-control" v-model="person.name" placeholder="name">
        </div>
        <div class="mb-3">
            <input type="number" class="form-control" v-model="person.age" placeholder="age">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" v-model="person.job" placeholder="job">
        </div>
        <div class="mb-3">
            <input :disabled="!isDisabled" @click.prevent="$store.dispatch('updatePerson',
            {
                id: person.id,
                name: person.name,
                age: person.age,
                job: person.job
            })" type="submit" class="btn btn-primary" value="Update">
        </div>
    </div>
</template>

<script>
    export default {
        name: "Edit",

        data() {
            return {
                name: null,
                age: null,
                job: null,
            }
        },

        mounted() {
            this.$store.dispatch('getPerson', this.$route.params.id);
        },

        methods: {

        },

        computed: {
            isDisabled() {
                return this.person.name && this.person.age && this.person.job;
            },

            person() {
                return this.$store.getters.person;
            }
        }
    }
</script>

<style scoped>

</style>
