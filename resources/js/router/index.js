import { createRouter, createWebHistory } from 'vue-router'
import Home from '../Components/Home.vue'
import About from '../Components/About.vue'
import Contact from '../Components/Contact.vue'
import Services from '../Components/Services.vue'
import Faq from '../Components/FAQ.vue'
import notFound from '../Components/NotFound.vue'

const routes = [

    {
        path: '/',
        component: Home
    },
    {
        path: '/about',
        component: About
    },
    {
        path: '/contact',
        component: Contact
    },
    {
        path: '/services',
        component: Services
    },
    {
        path: '/faq',
        component: Faq
    },
    {
        path: '/:pathMatch(.*)*',
        component: notFound
    }

]

const router = createRouter({
    history: createWebHistory(),
    linkExactActiveClass: 'active',
    routes,
})

export default router
