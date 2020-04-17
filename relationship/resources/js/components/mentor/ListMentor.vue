<template>
    <div>
        <h3 class="text-center">List of mentors</h3><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>FullName</th>
                <th>Course Handle</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="mentor in mentors" :key="mentor.id">
                <td>{{ mentor.id }}</td>
                <td>{{ mentor.fullname }}</td>
                <td>{{ mentor.course_handle }}</td>
                <td>{{ mentor.created_at }}</td>
                <td>{{ mentor.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: mentor.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="removeMentor(mentor.id)">Remove</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                mentors: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/mentors')
                .then(response => {
                    this.mentors = response.data;
                });
        },
        methods: {
            removeMentor(id) {
                this.axios
                    .delete(`http://localhost:8000/api/mentor/delete/${id}`)
                    .then(response => {
                        let i = this.mentors.map(item => item.id).indexOf(id); // find index of your object
                        this.mentors.splice(i, 1)
                    });
            }
        }
    }
</script>