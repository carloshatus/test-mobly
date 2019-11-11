<template>
  <div class="container">
    <p>Importando dados...</p>
  </div>
</template>

<script>
import axios from "axios";

export default {
  mounted() {
    this.importUsers();
  },
  methods: {
    importUsers() {
      axios
        .get(`${this.$url}/import`)
        .then(response => {
          if (response.data) {
            this.$router.push("/users");
          }
        })
        .catch();
    }
  }
};
</script>

<style scoped>
</style>