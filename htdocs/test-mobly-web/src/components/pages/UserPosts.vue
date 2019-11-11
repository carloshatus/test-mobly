<template>
  <div class="container">
    <div class="card" v-for="post in apiData" :key="post.id">
      <div class="card-body">
        <h5 class="card-title">{{post.id}} {{post.title}}</h5>
        <p class="card-text">{{post.body}}</p>
      </div>
    </div>
    <hr />
    <router-link :to="`/users`" tag="button" class="btn btn-outline-danger" title="cancel">
      <span class="fa fa-arrow-left"></span>
    </router-link>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data: () => ({
    apiData: {}
  }),
  mounted() {
    this.getPosts();
  },
  methods: {
    getPosts() {
      axios
        .get(`${this.$url}/users/${this.$route.params.id}/posts`)
        .then(response => {
          this.apiData = response.data;
        })
        .catch();
    }
  }
};
</script>

<style scoped>
.container,
.card {
  margin-top: 5px;
  margin-bottom: 5px;
}
</style>