<template>
    <div class="">
        <div class="mb-3">
            <input type="text" class="form-control" v-model="name" id="_name">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" v-model="age" id="age">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" v-model="job" id="job">
        </div>
        <div class="mb-3">
            <input @click.prevent="addPerson" class="btn btn-primary" value="Добавить">
        </div>
        <SomeComponent :obj="obj"></SomeComponent>
    </div>
</template>

<script>
    import SomeComponent from './SomeComponent.vue';

    export default {
        name: "CreateComponent",

        data() {
            return {
                name: null,
                age: null,
                job: null,
                obj: {
                    color: 'black',
                    number: 11,
                    isPublished: true
                }
            }
        },

        methods: {
            addPerson() {
                axios.post('/api/people', {
                    name: this.name,
                    age: this.age,
                    job: this.job
                })
                    .then(res => {
                        this.$parent.$refs.index.getPeople();
                        this.name = null,
                            this.age = null,
                            this.job = null
                    })
            }
        },

        components: {
            SomeComponent
        }
    }

</script>

<style scoped>

</style>
