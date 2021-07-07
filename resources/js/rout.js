export const routs = [
    {
        name: 'home',
        path: '/user',
        component: () => import('./components/Home.vue'),
    },
    {
        name: 'add',
        path: '/user/add',
        component: () => import('./components/AddUser.vue'),
        
    },
    
    
];