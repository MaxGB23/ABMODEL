import { createRouter, createWebHistory } from 'vue-router'
import Home from '../components/Home.vue'
import About from '../components/About.vue'
import Contact from '../components/Contact.vue'
import Services from '../components/Services.vue'
import Faq from '../components/FAQ.vue'
import notFound from '../components/NotFound.vue'

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
