<template>
    <h1>
        Autorización de clientes para la conexión al API.
        <a class="btn btn-success pull-right" tabindex="-1" @click="showCreateClientForm">
            <i class="fa fa-plus"></i> Nuevo cliente
        </a>
    </h1>
</template>

<script>
    export default {

        /**
         * Prepare the component (Vue 1.x).
         */
        ready() {
            this.prepareComponent();
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {
                $('#modal-create-client').on('shown.bs.modal', () => {
                    $('#create-client-name').focus();
                });
            },

            /**
             * Show the form for creating new clients.
             */
            showCreateClientForm() {
                $('#modal-create-client').modal('show');
            },
        }
    }
</script>
