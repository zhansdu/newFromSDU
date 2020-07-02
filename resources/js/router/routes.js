import Admin from "../views/Admin";
import Home from '../views/Home';
export default [
    {
        path: '/admin',
        component: Admin,
        name: 'admin',
    },
    {
    	path:'',
    	component:Home,
    	name:'Home'
    }
];
