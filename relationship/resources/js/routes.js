import ListMentor from './components/mentor/ListMentor.vue';
import CreateMentor from './components/mentor/CreateMentor.vue';
import EditMentor from './components/mentor/EditMentor.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: ListMentor
    },
    {
        name: 'add',
        path: '/add',
        component: CreateMentor
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditMentor
    }
];