export default {
    state: {
        token: localStorage.getItem('token') || null,
        user: [],
        products: [],
        wishlist: [],
    },
    mutations : {
        loading(state, data) {
            state.loading = data
        },
        token(state, token) {
            state.token = token
        },
        setUser(state, user) {
            state.user = user
        },
        clearUser(state) {
            state.user = []
        },
        clearToken(state) {
            state.token = null
        },
        getProducts(state, products) {
            state.products = products
        }
    },
    getters: {
        isLoggedIn(state) {
            return state.token != null
        },
        username(state) {
            return state.user.name || ''
        },
        products(state) {
            return state.products
        },
        carts(state) {
            return state.user.cart || []
        },
        wishlist(state) {
            return state.user.wishlist || []
        },
    },
    actions: {
        login({ commit }, data) {
            let payload = data

            return new Promise ((resolve, reject) => {
                axios.post('/api/login', payload)
                .then(response => {
                    commit('token', response.data.access_token)
                    localStorage.setItem('token', response.data.access_token)
                    
                    resolve(response)
                }).catch(error => {
                    reject(error)
                    console.log('Something error! : ', error)
                })
            })
        },
        logout(context) {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token
            return new Promise((resolve, reject) => {
                axios.post('/api/logout')
                    .then(response => {
                        localStorage.removeItem('token')
                        context.commit('clearUser')
                        context.commit('clearToken')
                        resolve(response)
                    })
                    .catch(error => {
                        localStorage.removeItem('token')
                        console.log('There is some error', error)
                    })
            })
        },
        registerUser(context, data) {
            axios.defaults.headers.post['Accept'] = 'application/json'

           return new Promise((resolve, reject) => {
                axios.post('/api/register', {
                    name: data.name,
                    email: data.email,
                    password: data.password
                }).then(response => {
                    resolve(response);
                }).catch(error => {
                    reject(error)
                    console.log(error.response)
                })
           })
        },
        getUser(context) {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token 
            
            return new Promise((resolve, reject) => {
                axios.get('/api/user')
                    .then(response => {
                        context.commit('setUser', response.data)
                        resolve(response)
                        console.log(response.data)
                    })
                    .catch(error => {
                        reject(error)
                    })
            })
        },
        getProducts(context) {
            axios.get('/api/product-list')
                .then(response => {
                    context.commit('getProducts', response.data)
                })
                .catch(error => {
                    console.log(error)
                })
        },
        addWishlist(context, payload) {
            axios.defaults.headers.post['Authentication'] = 'Bearer' + context.state.token

            axios.post('/api/wishlist', payload).then(response => {
                context.dispatch('getUser')
            })
        },
        saveToCart(context, payload) {
            axios.defaults.headers.post['Authorization'] = 'Bearer ' + context.state.token

            return new Promise((resolve, reject) => {
                axios.post('/api/cart', payload)
                    .then(response => {
                        context.dispatch('getUser')
                        resolve(response)
                    })
                    .catch(error => {
                        reject(error)
                    })
            })
        }
    }
}