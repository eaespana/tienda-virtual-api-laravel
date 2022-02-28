<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Módulo de Articulos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                   <div class ="md:col-span-1">
                        <div class ="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Listado de Articulos</h3>
                                <p class="text-sm text-gray-600">Toma el registro correcto y ejecuta cualquier</p>
                        </div>
                   </div>
                   <div class ="md:col-span-2 mt-5 md:mt0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <div class="flex justify-between">
                                <input
                                    type="text" class="form-input reunded-md shadow-sm"
                                    placeholder="Buscar..."
                                    v-model="q">
                            </div>
                            <hr class="my-6">
                            <table>
                                <tr v-for="articulo in articulos">
                                    <td class="border px4 py-2">
                                        {{articulo.id}} - {{articulo.nombre_articulo}}
                                    </td>
                                    <td class="border px4 py-2">
                                        <Link :href="route('articulos.show', articulo.id)" class="bg-blue-500 text-white font-blod py-1 px-3 rounded-md">
                                        Mostrar
                                        </Link>
                                    </td>
                                </tr>
                            </table>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Welcome from '@/Jetstream/Welcome.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3'

    export default defineComponent({
        components: {
            AppLayout,
            Welcome,
            Head,
            Link,
        },
        props: {
            articulos: Array,
        },
        data() {
            return {
                q: ''
            }
        },
        watch: {
            q: function (value) {
                this.$inertia.get(this.route('articulos.index', {q: value}), {q: value}, { preserveState: true })
            }
        }
    })
</script>
