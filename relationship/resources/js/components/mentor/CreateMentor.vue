<template>
    <div>
        <h3 class="text-center">Create Mentor</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addMentor">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" v-model="mentor.fullname">
                    </div>
                    <div class="form-group">
                        <label>Course Handle</label>
                        <input type="text" class="form-control" v-model="mentor.course_handle">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Mentor</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                mentor: {}
            }
        },
        methods: {
            addMentor() {

                this.axios
                    .post('http://localhost:8000/api/mentor/add', this.mentor)
                    .then(response => (
                        this.$router.push({name: 'home'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>