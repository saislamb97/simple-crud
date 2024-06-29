<template>
  <div class="container mt-4">
    <h1 class="mb-4">User List</h1>
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>
            <button class="btn btn-primary btn-sm" @click="editUser(user.id)">Edit</button>
            <button class="btn btn-danger btn-sm" @click="deleteUser(user.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
    <button class="btn btn-success" @click="addUser">Add User</button>
  </div>
</template>

<script>
import { mapState, mapActions } from 'vuex'

export default {
  computed: {
    ...mapState(['users'])
  },
  methods: {
    ...mapActions(['fetchUsers', 'deleteUser']),
    editUser(userId) {
      this.$router.push({ name: 'EditUser', params: { id: userId } })
    },
    addUser() {
      this.$router.push({ name: 'AddUser' })
    }
  },
  mounted() {
    this.fetchUsers()
  }
}
</script>

<style scoped>
.table {
  margin-top: 20px;
}

.thead-dark th {
  background-color: #343a40;
  color: white;
}

.btn {
  margin-right: 5px;
}

.container {
  max-width: 800px;
}

h1 {
  text-align: center;
}
</style>
