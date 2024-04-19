<script setup>
    import { onMounted, ref } from "vue"
    import { useRouter } from "vue-router"

    const router = useRouter();

    let nombres = ref("");
    let apellidos = ref("");
    let correo = ref("");

    const guardar = async () => {
        const formData = new FormData();
        formData.append('nombres', nombres.value)
        formData.append('apellidos', apellidos.value)
        formData.append('correo', correo.value)

        await axios.post('/api/contactos', formData)

        nombres.value = ""
        apellidos.value = ""
        correo.value = ""

        router.push("/contactos")
    }
</script>

<template>
    <h1>Contactos nuevo</h1>
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
            <button type="button" class="btn btn-primary" @click="guardar()">Guardar</button>
        </div>
    </div>
</template>