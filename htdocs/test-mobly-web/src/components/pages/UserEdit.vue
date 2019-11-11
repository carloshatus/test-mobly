<template>
  <div class="container">
    <h2>user</h2>
    <hr />
    <div class="row">
      <div class="col-sm">
        <div class="form-group">
          <label>name *</label>
          <input class="form-control" type="text" required v-model="user.name" />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm">
        <div class="form-group">
          <label>username *</label>
          <input class="form-control" type="text" required v-model="user.username" />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm">
        <div class="form-group">
          <label>email *</label>
          <input class="form-control" type="text" required v-model="user.email" />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm">
        <div class="form-group">
          <label>phone</label>
          <input class="form-control" type="text" v-model="user.phone" />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm">
        <div class="form-group">
          <label>website</label>
          <input class="form-control" type="text" v-model="user.website" />
        </div>
      </div>
    </div>
    <div v-if="user.address">
      <h3>address</h3>
      <hr />
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label>street</label>
            <input class="form-control" type="text" v-model="user.address.street" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label>suite</label>
            <input class="form-control" type="text" v-model="user.address.suite" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label>city</label>
            <input class="form-control" type="text" v-model="user.address.city" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label>zipcode</label>
            <input class="form-control" type="text" v-model="user.address.zipcode" />
          </div>
        </div>
      </div>
      <div v-if="user.address.geo">
        <h4>geo</h4>
        <hr />
        <div class="row">
          <div class="col-sm">
            <div class="form-group">
              <label>lat</label>
              <input class="form-control" type="text" v-model="user.address.geo.lat" />
            </div>
          </div>
          <div class="col-sm">
            <div class="form-group">
              <label>lng</label>
              <input class="form-control" type="text" v-model="user.address.geo.lng" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-if="user.address">
      <h3>company</h3>
      <hr />
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label>name</label>
            <input class="form-control" type="text" v-model="user.company.name" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label>catchPhrase</label>
            <input class="form-control" type="text" v-model="user.company.catchPhrase" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label>bs</label>
            <input class="form-control" type="text" v-model="user.company.bs" />
          </div>
        </div>
      </div>
    </div>
    <p v-if="error" class="text-danger">Preencha os campos marcados com *</p>
    <hr />
    <router-link :to="`/users`" tag="button" class="btn btn-outline-danger" title="cancel">
      <span class="fa fa-arrow-left"></span>
    </router-link>
    <button type="button" class="btn btn-outline-success float-right" title="save">
      <span class="fa fa-floppy-o" @click="saveUser()"></span>
    </button>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data: () => ({
    error: false,
    user: {
      id: 0,
      name: "",
      username: "",
      email: "",
      phone: "",
      website: "",
      address: {
        street: "",
        suite: "",
        city: "",
        zipcode: "",
        geo: {
          lat: "",
          lng: ""
        }
      },
      company: {
        name: "",
        catchPhrase: "",
        bs: ""
      }
    }
  }),
  mounted() {
    if (this.$route.params.id) this.getUser();
  },
  methods: {
    getUser() {
      axios
        .get(`${this.$url}/users/${this.$route.params.id}`)
        .then(response => {
          this.user = response.data;
        })
        .catch();
    },
    saveUser() {
      if (this.user.name && this.user.username && this.user.email) {
        if (this.$route.params.id) {
          axios
            .put(`${this.$url}/users/${this.$route.params.id}`, this.user)
            .then(() => {
              this.$router.push("/users");
            })
            .catch();
        } else {
          axios
            .post(`${this.$url}/users`, this.user)
            .then(() => {
              this.$router.push("/users");
            })
            .catch();
        }
      } else {
        this.error = true;
      }
    }
  }
};
</script>

<style scoped>
.container {
  margin-top: 5px;
  margin-bottom: 5px;
}
</style>