import vueRouter from 'vue-router';


let routes=[
    { path: '/', component: require('./views/home') },
    { path: '/about', component: require('./views/about')}
]


export default new vueRouter({
    routes:routes
})