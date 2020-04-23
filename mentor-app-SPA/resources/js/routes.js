//import all .vue files inside /mentor/ folder
import ListMentor from './components/mentor/ListMentor.vue'; 
import CreateMentor from './components/mentor/CreateMentor.vue';
import EditMentor from './components/mentor/EditMentor.vue';
import Login from './components/mentor/Login.vue';

//Declare router links
export const routes = [
    {
        name: 'home',
        path: '/',
        component: ListMentor,
        meta: { requiresAuth: true }
    },
    {
        name: 'add',
        path: '/add',
        component: CreateMentor,
        meta: { requiresAuth: true }
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditMentor,
        meta: { requiresAuth: true }
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    }
];