<template>
    <div>
        <h3 class="text-center">Connection</h3><br/>

        
        <input type='text' v-model="user.email">
        <input type='text' v-model="user.password">
        <button @click='connect()'>Connect</button>
        <div>{{ message }}</div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {},
                message: ''
            }
        },
        
        methods: {

            connect() {
                this.axios
                    .post(`api/user/connect`,this.user)
                    .then(response => {
                        this.message = response.data
                    })
            }
        }
    }
</script>