<template>
  <div class="container">
    <topbar />
    <router-view />
  </div>
</template>

<script>
import Topbar from "./Topbar";

export default {
  name: "Main",
  components: {
    Topbar
  }
};
</script>

<style scoped>
</style>
