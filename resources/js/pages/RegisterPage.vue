<template>
    <div class="row mt-5">
        <div class="col-12 col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    Register
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="loginEmail">
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPassword">
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <button class="btn btn-primary mb-3">Register</button>
                        <router-link :to="{name: 'login'}">Already have an account?</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    /**
     * Todo: Implement Registration Functionality.
     * You should redirect the user to the Todo Dashboard
     * after they register.
     */
}
</script>
