import { createRouter, createWebHistory } from "vue-router";

import { DefaultLayout, AdminLayout } from "../Layouts";
import { axiosAuthenticator } from "../ts/axios";

import {
    Start,
    Dashboard,
    Login,
    Register,
    Overview,
    Clients,
    Emails,
    Salesmans,
    Salesman,
    Appointments,
    MyAppointments,
    Contracts,
    MyContracts,
    Client,
} from "../views";

const routes = [
    {
        component: DefaultLayout,
        path: "/start",
        children: [
            { path: "/start", name: "Start", component: Start },
            {
                path: "/login",
                name: "Login",
                component: Login,
            },
            {
                path: "/register",
                name: "Register",
                component: Register,
            },
        ],
    },

    {
        path: "/",
        redirect: "/start",
    },

    {
        component: AdminLayout,
        path: "/admin",
        redirect: "/dashboard",
        children: [
            {
                path: "/dashboard/",
                component: Dashboard,
                name: "Dashboard",
                redirect: "/dashboard/overview",
                beforeEnter: (to: any, from: any, next: any) => {
                    axiosAuthenticator
                        .get("/api/authenticated")
                        .then(() => {
                            next();
                        })
                        .catch(() => {
                            return next({ name: "Login" });
                        });
                },

                children: [
                    {
                        path: "/dashboard/overview",
                        component: Overview,
                        name: "Overview",
                    },
                    {
                        path: "/dashboard/clients",
                        component: Clients,
                        name: "Clients",
                    },
                    {
                        path: "/dashboard/client/:id",
                        component: Client,
                        name: "Client",
                        props: true,
                    },
                    {
                        path: "/dashboard/contracts",
                        component: Contracts,
                        name: "Contracts",
                    },
                    {
                        path: "/dashboard/appointments",
                        component: Appointments,
                        name: "Appointments",
                    },
                    {
                        path: "/dashboard/emails",
                        component: Emails,
                        name: "Emails",
                    },
                    {
                        path: "/dashboard/salesmans",
                        component: Salesmans,
                        name: "Salesmans",
                    },
                    {
                        path: "/dashboard/salesman/:id",
                        component: Salesman,
                        name: "Salesman",
                        props: true,
                    },
                    {
                        path: "/dashboard/mycontracts",
                        component: MyContracts,
                        name: "MyContracts",
                    },
                    {
                        path: "/dashboard/myappointments",
                        component: MyAppointments,
                        name: "MyAppointments",
                    },
                ],
            },
        ],
    },
];

const router = createRouter({
    routes,
    history: createWebHistory(),
});
export default router;
