<template>
  <div class="row mt-5">
    <div class="col-12 col-md-6 offset-md-3">
      <div class="card">
        <div class="card-header">Register</div>
        <div class="card-body">
          <form @submit.prevent="onSubmit">
            <div class="mb-3">
              <label for="loginEmail" class="form-label">Email address</label>
              <input
                v-model="requestData.email"
                type="email"
                class="form-control"
                id="loginEmail"
              />
            </div>
            <div class="mb-3">
              <label for="loginPassword" class="form-label">Password</label>
              <input
                v-model="requestData.password"
                type="password"
                class="form-control"
                id="loginPassword"
              />
            </div>
            <div class="d-flex flex-column align-items-center">
              <button class="btn btn-primary mb-3">Register</button>
              <router-link :to="{ name: 'login' }"
                >Already have an account?</router-link
              >
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapMutations } from "vuex";
export default {
  /**
   * Todo: Implement Registration Functionality.
   * You should redirect the user to the Todo Dashboard
   * after they register.
   */
  data() {
    return {
      requestData: {
        email: null,
        password: null,
      },
    };
  },
  computed: {
    ...mapGetters({
      isAuth: "auth/isAuth",
    }),
  },
  methods: {
    ...mapMutations({
      setToken: "auth/setToken",
    }),
    async onSubmit() {
      try {
        const { data } = await axios.post("/api/register", this.requestData);
        await this.setToken(data.token);
        this.$router.push({ name: "auth.todo.dashboard" });
      } catch (error) {
        console.log("onSubmit :>> ", error);
      }
    },
  },
};
</script>
