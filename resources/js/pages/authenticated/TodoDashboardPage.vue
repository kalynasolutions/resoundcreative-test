<template>
  <div>
    <h3>Todo Dashboard</h3>
    <transition name="fade">
      <div v-if="alert.text" class="alert" :class="[alertType]" role="alert">
        {{ alert.text }}
      </div>
    </transition>

    <div class="card">
      <div class="card-header">Todos</div>
      <div class="card-body">
        <h5 v-if="!filterTodos.new" class="text-center">
          List empty! Please add todos.
        </h5>
        <ol v-else class="list-group list-group-numbered">
          <li
            v-for="todo in filterTodos.new"
            :key="todo.id"
            class="
              list-group-item
              d-flex
              justify-content-between
              align-items-center
            "
          >
            <div class="ms-2 me-auto">
              <div class="fw-bold">{{ todo.description }}</div>
              {{ todo.created_at | date }}
            </div>
            <div class="d-flex justify-content-between align-items-center">
              <button
                @click.prevent="changeTodo(todo.id, true)"
                class="btn btn-outline-success me-1"
              >
                <i class="bi bi-shield-check"></i>
              </button>
              <button
                @click.prevent="deleteTodo(todo.id)"
                class="btn btn-outline-danger"
              >
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </li>
        </ol>
      </div>
      <div class="card-footer">
        <form
          @submit.prevent="addTodo"
          class="row g-1 justify-content-center justify-content-md-between"
        >
          <div class="col-12 col-md-3 row align-items-center">Add new Todo</div>
          <div class="col-12 col-md-6 mt-2 mt-md-0">
            <label for="description" class="visually-hidden">Description</label>
            <input
              v-model="todo"
              type="text"
              class="form-control"
              id="description"
              placeholder="Todo"
            />
          </div>
          <div class="col-12 col-md-3 row justify-content-center mt-2 mt-md-0">
            <button type="submit" class="btn btn-outline-primary">
              Add todos
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class="card mt-5">
      <div class="card-header">Completed Todos</div>
      <div class="card-body">
        <h5 v-if="!filterTodos.completed" class="text-center">List empty</h5>
        <ol v-else class="list-group list-group-numbered">
          <li
            v-for="todo in filterTodos.completed"
            :key="todo.id"
            class="
              list-group-item
              d-flex
              justify-content-between
              align-items-center
            "
          >
            <div class="ms-2 me-auto">
              <div class="fw-bold">
                <del>{{ todo.description }}</del>
              </div>
              {{ todo.completed_at | date }}
            </div>
            <div class="d-flex justify-content-between align-items-center">
              <button
                @click.prevent="changeTodo(todo.id)"
                class="btn btn-outline-success me-1"
              >
                <i class="bi bi-shield-fill-minus"></i>
              </button>
              <button
                @click.prevent="deleteTodo(todo.id)"
                class="btn btn-outline-danger"
              >
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </li>
        </ol>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  //TODO: Implement Dashboard Functionality
  data() {
    return {
      todos: [],
      todo: "",
      alert: {
        type: "success",
        text: "",
      },
    };
  },
  computed: {
    filterTodos() {
      return {
        new: this.todos.filter((todo) => !todo.completed_at),
        completed: this.todos.filter((todo) => todo.completed_at),
      };
    },
    alertType() {
      return this.alert.type == "danger" ? "alert-danger" : "alert-success";
    },
  },
  methods: {
    alerts(text, type = "success") {
      if (!text) {
        this.alert.text = "";
        return;
      } else {
        this.alert.text = text;
        this.alert.type = type;
      }
    },
    async getTodos() {
      try {
        const { data } = await axios.get("/api/todos");
        this.todos = data.data;
      } catch (error) {
        this.alerts("Oops something is wrong", "danger");
        console.log("error :>> ", error);
      }
    },
    async addTodo() {
      try {
        const { data } = await axios.post("/api/todos", {
          description: this.todo,
        });
        this.todos.push(data.data);
        this.todo = "";
        this.alerts("Todos added");
      } catch (error) {
        this.alerts("Oops something is wrong", "danger");
        console.log("error :>> ", error);
      }
    },
    async changeTodo(id, action = false) {
      try {
        const { data } = await axios.put("/api/todos/" + id, {
          mark_complete: action,
        });
        await this.getTodos();
      } catch (error) {
        this.alerts("Oops something is wrong", "danger");
        console.log("error :>> ", error);
      }
    },
    async deleteTodo(id) {
      try {
        const { data } = await axios.delete("/api/todos/" + id);
        await this.getTodos();
      } catch (error) {
        this.alerts("Oops something is wrong", "danger");
        console.log("error :>> ", error);
      }
    },
  },
  async mounted() {
    await this.getTodos();
  },
};
</script>
