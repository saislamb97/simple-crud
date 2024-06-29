import { createStore } from 'vuex'
import axios from 'axios'

export default createStore({
  state: {
    users: []  // Ensure this is an array
  },
  mutations: {
    SET_USERS(state, users) {
      console.log('SET_USERS:', users)
      state.users = users
    },
    ADD_USER(state, user) {
      console.log('ADD_USER before:', state.users)
      state.users.push(user)
      console.log('ADD_USER after:', state.users)
    },
    UPDATE_USER(state, updatedUser) {
      const index = state.users.findIndex(user => user.id === updatedUser.id)
      if (index !== -1) {
        state.users.splice(index, 1, updatedUser)
      }
    },
    DELETE_USER(state, userId) {
      state.users = state.users.filter(user => user.id !== userId)
    }
  },
  actions: {
    fetchUsers({ commit }) {
      axios.get('http://localhost:8081/users')
        .then(response => {
          // Handle response structure
          const users = response.data.data;
          commit('SET_USERS', users)
        })
    },
    addUser({ commit }, user) {
      axios.post('http://localhost:8081/users', user)
        .then(() => {
          commit('ADD_USER', user)
        })
    },
    updateUser({ commit }, user) {
      axios.put(`http://localhost:8081/users/${user.id}`, user)
        .then(() => {
          commit('UPDATE_USER', user)
        })
    },
    deleteUser({ commit }, userId) {
      axios.delete(`http://localhost:8081/users/${userId}`)
        .then(() => {
          commit('DELETE_USER', userId)
        })
    }
  }
})
