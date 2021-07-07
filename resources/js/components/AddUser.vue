<template>
    <div>
        <h3 class="text-center">Add User</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addUser">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="user.email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" v-model="user.password">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="user.name">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
            <div>{{ message }}</div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {},
                message: '',
                err:''
            }
        },
        methods: {
            addUser() {
                var format = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                if(this.user.email.match(format)){
                
                let uri = 'api/user/add'; // add book api
                this.axios
                    .post('http://127.0.0.1:8000/api/user/add', this.user) // sending the data to the controller
                    .then(response => (
                         this.message=response.data
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)}
                else{
                    alert("Email address has wrong format")
                }
                    
            }
        }
    }
</script>