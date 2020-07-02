import Admin from "../views/Admin";
import Home from "../views/Home";

export const routes = [
    {
        path: '/admin',
        component: Admin,
        name: 'admin',
    },
    {
        path: '/',
        component: Home,
        name: 'home',
    }
];
