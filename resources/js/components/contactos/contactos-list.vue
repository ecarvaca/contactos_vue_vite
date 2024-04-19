<script setup>
    import { onMounted, ref } from "vue"
    import { useRouter } from "vue-router"

    const router = useRouter();

    let contactos = ref([])

    onMounted(async () => {
        getContactos()
    })

    const nuevoContacto = async () => {
        router.push('/contactos/new')
    }

    const getContactos = async () => {
        let response = await axios.get("/api/contactos")
        
        contactos.value = response.data.contactos;
    }

    const onShow = async (event,id) => {
        event.preventDefault();
        
        router.push(`/contactos/edit/${id}`)
    }
</script>

<template>
    <h1>Contactos list</h1>
    <hr>

    <a class="btn btn-primary" @click="nuevoContacto">Nuevo</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Correo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in contactos" :key="item.id" v-if="contactos.length > 0">
                <td>{{ item.id }}</td>
                <td>{{ item.nombres }}</td>
                <td>{{ item.apellidos }}</td>
                <td>{{ item.correo }}</td>
                <td>
                    <a href="#" @click="onShow($event, item.id)">Editar</a>
                    |
                    <a href="">Eliminar</a>
                </td>
            </tr>
            <tr v-else>
                <td colspan="20"></td>
            </tr>
        </tbody>
    </table>
</template>