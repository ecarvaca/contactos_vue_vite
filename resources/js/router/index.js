import { createRouter, createWebHistory } from 'vue-router'
import ContactosList from '../components/contactos/contactos-list.vue'
import ContactosNew from '../components/contactos/contactos-new.vue'
import ContactosEdit from '../components/contactos/contactos-edit.vue'
import NotFound from '../components/NotFound.vue'

const routes = [
    { path: '/contactos', component: ContactosList },
    { path: '/contactos/new', component: ContactosNew },
    { path: '/contactos/edit/:contacto_id', component: ContactosEdit, props: true },
    { path: '/:pathMatch(.*)*', component: NotFound }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router