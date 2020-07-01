import {adminRoutes} from "./admin";
import {userRoutes} from "./user";
import Admin from "../components/admin/Admin";

export const routes = [
    {
        path: '/admin',
        component: Admin,
        name: 'admin',
        children: adminRoutes,
    },
    {
        path: '/',
        // component: User,
        name: 'user',
        children: userRoutes
    }
];
