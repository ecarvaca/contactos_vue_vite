<script setup>
    import { onMounted, ref } from "vue"
    import { useRouter } from "vue-router"

    const router = useRouter();

    let id = ref("");
    let nombres = ref("");
    let apellidos = ref("");
    let correo = ref("");

    const props = defineProps({
        contacto_id: String,
        default: ''
    })

    onMounted(async () => {
        getContacto()
    })

    const getContacto = async () => {
        const response = await axios.get(`/api/contactos/${props.contacto_id}`);

        id.value = response.data.contacto.id
        nombres.value = response.data.contacto.nombres
        apellidos.value = response.data.contacto.apellidos
        correo.value = response.data.contacto.correo
    }

    const editar = async () => {
        await axios.put(`/api/contactos/${id.value}`, {
            nombres: nombres.value,
            apellidos: apellidos.value,
            correo: correo.value,
        })

        id.value = ""
        nombres.value = ""
        apellidos.value = ""
        correo.value = ""

        router.push("/contactos")
    }
</script>

<template>
    <h1>Contactos edit</h1>
    <hr>

    <div>
        <div class="mb-3">
            <label for="">Nombres</label>

            <input type="text" v-model="nombres" class="form-control">
        </div>

        <div class="mb-3">
            <label for="">Apellidos</label>

            <input type="text" v-model="apellidos" class="form-control">
        </div>

        <div class="mb-3">
            <label for="">Correo</label>

            <input type="text" v-model="correo" class="form-control">
        </div>

        <div class="mb-3">
            <router-link class="btn btn-secondary" style="margin-right: 10px;" to="/contactos">Ir a la index</router-link>
            <button type="button" class="btn btn-primary" @click="editar()">Editar</button>
        </div>
    </div>
</template>