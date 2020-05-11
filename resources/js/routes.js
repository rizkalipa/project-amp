import Home from './views/Home';
import Product from './views/Product';
import Checkout from './views/Checkout';
import Login from './views/Login';
import Logout from './views/Logout';
import Register from './views/Register';

export let routes = [
    {
        path: '/',
        component: Home,
        name: 'Home',
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/product',
        component: Product,
        name: 'product'
    },
    {
        path: '/checkout',
        component: Checkout,
        name: 'checkout',
    },
    {
        path: '/login',
        component: Login,
        name: 'login',
    },
    {
        path: '/logout',
        component: Logout,
        name: 'logout',
    },
    {
        path: '/register',
        component: Register,
        name: 'register',
    }
];
