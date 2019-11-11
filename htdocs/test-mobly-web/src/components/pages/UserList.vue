<template>
  <div>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">
            Actions
            <router-link
              :to="'/users/add'"
              tag="button"
              class="btn btn-outline-success"
              title="add"
            >
              <span class="fa fa-plus"></span>
            </router-link>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in apiData" :key="user.id">
          <th scope="row">{{user.id}}</th>
          <td>{{user.name}}</td>
          <td>{{user.email}}</td>
          <td>
            <div class="btn-group" role="group">
              <router-link
                :to="`/users/${user.id}/posts`"
                tag="button"
                class="btn btn-outline-info"
                title="posts"
              >
                <span class="fa fa-comments-o"></span>
              </router-link>
              <router-link
                :to="`/users/${user.id}/edit`"
                tag="button"
                class="btn btn-outline-warning"
                title="edit"
              >
                <span class="fa fa-pencil-square-o"></span>
              </router-link>
              <button
                type="button"
                class="btn btn-outline-danger"
                title="remove"
                @click="deleteUser(user.id)"
              >
                <span class="fa fa-trash-o"></span>
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data: () => ({
    apiData: {}
  }),
  mounted() {
    this.getUsers();
  },
  methods: {
    getUsers() {
      axios
        .get(`${this.$url}/users`)
        .then(response => {
          this.apiData = response.data;
        })
        .catch();
    },
    deleteUser(id) {
      axios
        .delete(`${this.$url}/users/${id}`)
        .then(() => {
          this.getUsers();
        })
        .catch();
    }
  }
};
</script>

<style scoped>
table {
  margin-top: 5px;
  margin-bottom: 5px;
}
</style>