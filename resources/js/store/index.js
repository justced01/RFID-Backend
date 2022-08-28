import { createStore } from 'vuex'
import axios from 'axios'
import router from '../router'

export default createStore({
    state: {
        isLoggedIn: false,
        user: {}
    },
    mutations: {
        isLoggedIn(state){
            state.isLoggedIn = true
        },
        setUser(state, data){
            state.user = data
        }
    },
    actions: {
        loginUser({ commit }, user ){
            axios.post('api/users/login', {
                email: user.email,
                password: user.password
            })
            .then(response => {
                if(response.data.status === 200){
                    commit('isLoggedIn')
                    localStorage.setItem('user_token', response.data.access_token)
                    router.push(response.data.redirect)
                } else {
                    console.log(response.data.message)
                }
            })
            .catch(function(error) {
                console.error(error);
            });
        },
        getUser({ commit }){
            axios.post('/api/users/show')
            .then(response => {
                commit('setUser', response.data.data)
            })
            .catch(error => {
                console.log(error);
            })
        },
    },
    getters: {

    },
    modules: {

    },
})