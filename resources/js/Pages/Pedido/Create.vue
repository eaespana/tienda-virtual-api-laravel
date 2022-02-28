<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Módulo de Pedidos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                   <div class ="md:col-span-1">
                        <div class ="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Crear nuevo pedido</h3>
                                <p class="text-sm text-gray-600">Luego de crear la podrás editar</p>
                        </div>
                   </div>
                   <div class ="md:col-span-2 mt-5 md:mt0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <form @submit.prevent="submit">

                                <label class="block font-medium text-sm text-gray-700">ciudad de entrega
                                </label>
                                <input v-model="ciudad_entrega" placeholder="edíteme" class="form-control" type="text" >
                                    <p>El mensaje es: {{ ciudad_entrega }}</p>
                                <label class="block font-medium text-sm text-gray-700">direccion de entrega
                                </label>
                                <input v-model="direccion_entrega" placeholder="edíteme" class="form-control" type="text" >
                                    <p>El mensaje es: {{ direccion_entrega }}</p>
                                <label class="block font-medium text-sm text-gray-700">Articulo
                                </label>
                                <select v-model="selected" name="articulo_seleccionado" id="articulo_seleccionado">
                                    <option v-for="articulo in articulos" v-bind:value="articulo.id">{{articulo.nombre_articulo}}</option>
                                </select>
                                <span>Seleccionado: {{ selected }}</span>
                                <label class="block font-medium text-sm text-gray-700">cantidad
                                </label>
                                <input v-model="cantidad_solicitada" placeholder="edíteme" class="form-control" type="number" >
                                    <p>El mensaje es: {{ cantidad_solicitada }}</p>
                                <div class="col-4 pl-4">
                                    <button type="button" v-on:click="addDetallePedido" name="agregaRuta" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md" id="btn-agregar">
                                    Agregar articulo
                                    </button>
                                </div>

                                <div class="form-group">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nombre articulo</th>
                                                <th style="width:100px;">Cantidad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="item in detalle">
                                            <td >@{{item.nombre_articulo}}</td>
                                            <td class="text-center">@{{item.cantidad_solicitada}}</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <button v-if="pedidoValido"  v-on:click="registarPedido" class="btn btn-success">Registrar</button>
                                    <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </form>
                            <hr class="my-6">
                            <Link :href="route('pedidos.index')">
                                Volver
                            </Link>
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
            clientes: Array
        },
        data () {
            return {
                pedido: {},
                detalle: [],
                detallePedido: {},
                articulosSeleccionado: {},
                form: {
                    articulo_id: ''
                },
                data: {
                    selected: '',
                },
                cantidad_solicitada: '',
            }
        },
        methods: {
            submit() {
                let dataRegister = {}
                dataRegister['pedido'] = {
                    ciudad_remision: this.ciudad_entrega,
                    direccion_remision: this.direccion_entrega,
                };
                dataRegister['detallePedido'] = this.detalle;
                this.$inertia.post(this.route('pedidosarticulostore'), dataRegister)
            },
            addDetallePedido: function()  {
                this.detalle.push({
                    articulo_id: this.selected,
                    nombre_articulo: this.articulos.find((articulo) =>  articulo.id == this.selected).nombre_articulo,
                    cantidad_solicitada: this.cantidad_solicitada,
                })
            }
        },
        computed: {
            pedidoValido : function() {
                return (this.detalle.length > 0);
            }
        }
    })
</script>
