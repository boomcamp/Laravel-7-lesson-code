<template>
    <div>
        <h3 class="text-center">Update Mentor</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateMentor">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" v-model="mentor.fullname">
                    </div>
                    <div class="form-group">
                        <label>Course Handle</label>
                        <input type="text" class="form-control" v-model="mentor.course_handle">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Mentor</button>
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
        created() {
            this.axios
                .get(`http://localhost:8000/api/mentor/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.mentor = response.data;
                    console.log(response.data);
                });
        },
        methods: {
            updateMentor() {
                this.axios
                    .post(`http://localhost:8000/api/mentor/update/${this.$route.params.id}`, this.mentor)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>