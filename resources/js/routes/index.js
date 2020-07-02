import {adminRoutes} from "./admin";
import {userRoutes} from "./user";
import Admin from "../components/admin/Admin";
import User from "../components/user/User";

export const routes = [
    {
        path: '/admin',
        component: Admin,
        children: adminRoutes,
    },
    {
        path: '/',
        component: User,
        children: userRoutes
    }
];
