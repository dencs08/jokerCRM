import { createRouter, createWebHistory } from "vue-router";

import { DefaultLayout } from "../Layouts";

import { Start } from "../views";

const routes = [
    {
        component: DefaultLayout,
        path: "/start",
        children: [{ path: "/start", name: "Start", component: Start }],
    },

    {
        path: "/",
        redirect: "/start",
    },

    // {
    //     component: DefaultLayout,
    //     path: '/',
    //     children: [
    //         { path: '/start', component: Start }
    //     ]
    // },

    // {
    //     component: AdminLayout,
    //     path: '/admin',
    //     redirect: '/dashboard',
    //     children: [
    //         {
    //             path: '/dashboard/',
    //             component: Dashboard,
    //             name: 'Dashboard',
    //             redirect: '/dashboard/overview',
    //             beforeEnter: (to, from, next) => {
    //                 axiosAuthenticator.get('/api/authenticated').then(() => {
    //                     next()
    //                 }).catch(() => {
    //                     return next({ name: 'Login' })
    //                 })
    //             },

    //             children: [
    //                 {
    //                     path: '/dashboard/overview',
    //                     component: Overview,
    //                     name: 'Overview'
    //                 },
    //                 {
    //                     path: '/dashboard/emailing',
    //                     component: Emailing,
    //                     name: 'Emailing',
    //                     redirect: '/dashboard/emailing/pricing',
    //                     children: [{
    //                         path: '/dashboard/emailing/pricing',
    //                         component: EmailPricing,
    //                         name: 'EmailPricing'
    //                     },
    //                     {
    //                         path: '/dashboard/emailing/response',
    //                         component: EmailResponse,
    //                         name: 'EmailResponse'
    //                     }]
    //                 },
    //                 {
    //                     path: '/dashboard/analitics',
    //                     component: Analitics,
    //                     name: 'Analitics'
    //                 },
    //                 {
    //                     path: '/dashboard/externallinks',
    //                     component: ExternalLinks,
    //                     name: 'ExternalLinks'
    //                 }
    //             ]
    //         },
    //         {
    //             path: '/login',
    //             name: 'Login',
    //             component: Login,
    //         }
    //     ]
    // }
];

const router = createRouter({
    routes,
    history: createWebHistory(),
});
export default router;
