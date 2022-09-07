import { createStore } from 'vuex'
import axios from 'axios'
import router from '../router'

import findStudentRecord from './modules/findStudentRecord'

export default createStore({
    state: {
        user: {},
        isLoggedIn: false,
        showAdminNav: false,
        showStudentCard: false,
        showSkeletonStudentCard: true,
    },
    mutations: {
        setUser(state, data){
            state.user = data
        },
        isLoggedIn(state){
            state.isLoggedIn = true
        },
        showAdminNav(state){
            state.showAdminNav = !state.showAdminNav
        },
        showStudentCard(state){
            state.showStudentCard = true
            state.showSkeletonStudentCard = false
        },
        loadSkeletonStudentCard(state){
            state.showStudentCard = false
            state.showSkeletonStudentCard = true
            setTimeout(state.showStudentCard = true, 3000)
            setTimeout(state.showSkeletonStudentCard = false, 3000)
        },
        destroyToken(state){
            localStorage.setItem('user_token', "null");
        }
    },
    actions: {
        loginUser({ commit }, user ){
            axios.post('api/login', {
                email: user.email,
                password: user.password
            })
            .then(response => {
                if(response.data.status === 200){
                    commit('isLoggedIn')
                    if(response.data.role === 1){
                        commit('showAdminNav')
                    }
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
        currentStudent: findStudentRecord, 
    },
})