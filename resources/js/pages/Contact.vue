<template>
    <div class="container">
        <form @submit.prevent="sendForm">
            <div class="my-3">
                <label for="name" class="form-label">Name</label>
                <input v-model="name" type="text" name="name" class="form-control" id="name" placeholder="Mario Rossi">
            </div>

            <!-- messaggio di errore -->
            <div v-for="(error, index) in errors.name" :key="index" class="alert alert-warning" role="alert">
                {{ error }}
            </div>

            <div class="my-3">
                <label for="email" class="form-label">Email address</label>
                <input v-model="email" type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>

            <!-- messaggio di errore -->
            <div v-for="(error, index) in errors.email" :key="index" class="alert alert-warning" role="alert">
                {{ error }}
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea v-model="message" class="form-control" id="message" name="message" rows="3" placeholder="Leave your message here"></textarea>
            </div>
            
            <!-- messaggio di errore -->
            <div v-for="(error, index) in errors.message" :key="index" class="alert alert-warning" role="alert">
                {{ error }}
            </div>

            <!-- messaggio di successo -->
            <div v-if="success" class="alert alert-success" role="alert">
                Message forwarded succesfully!
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </div>
</template>

<script>

export default {
    name: 'Contact',
    data() {
        return {
            name: null,
            email: null,
            message: null,
            success: false,
            errors: {},
        }
    },

    methods: {
        sendForm() {
            axios.post('/api/contact',
            {
                'name': this.name,
                'email': this.email,
                'message': this.message,
            })
            .then(response=>{
                console.log(response.data);
                if (!response.data.success) {
                    this.errors = response.data.errors;
                } else {
                    this.success = true;
                    this.errors = {};
                }
            })
            .catch(error=>{
                console.log(error.response.data);
            })
        }
    }
};
</script>

<style lang="scss" scoped>

</style>