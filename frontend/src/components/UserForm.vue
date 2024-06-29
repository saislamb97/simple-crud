<template>
  <div class="container mt-4">
    <h1 class="mb-4">{{ user.id ? 'Edit User' : 'Add User' }}</h1>
    <form @submit.prevent="submitForm">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" v-model="user.name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" v-model="user.email" required>
      </div>
      <button type="submit" class="btn btn-primary">{{ user.id ? 'Update' : 'Add' }}</button>
      <button type="button" class="btn btn-secondary" @click="cancel">Cancel</button>
    </form>
  </div>
</template>

<script>
import { mapActions, mapState } from 'vuex'

export default {
  props: {
    id: {
      type: String,
      default: null
    }
  },
  data() {
    return {
      user: {
        id: null,
        name: '',
        email: ''
      }
    }
  },
  computed: {
    ...mapState(['users'])
  },
  methods: {
    ...mapActions(['addUser', 'updateUser', 'fetchUsers']),
    submitForm() {
      if (this.user.id) {
        this.updateUser(this.user).then(() => {
          this.$router.push({ name: 'UserList' })
        })
      } else {
        this.addUser(this.user).then(() => {
          this.$router.push({ name: 'UserList' })
        })
      }
    },
    loadUser() {
      const user = this.users.find(user => user.id == this.id)
      if (user) {
        this.user = { ...user }
      }
    },
    cancel() {
      this.$router.push({ name: 'UserList' })
    }
  },
  mounted() {
    if (this.id) {
      this.fetchUsers().then(() => {
        this.loadUser()
      })
    }
  }
}
</script>

<style scoped>
.container {
  max-width: 600px;
}

h1 {
  text-align: center;
}

.btn {
  margin-right: 10px;
}
</style>
