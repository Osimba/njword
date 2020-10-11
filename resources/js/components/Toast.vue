<template>
    <div class="toast" role="alert" style="opacity: 1; position: fixed; top: 10px; right: 10px;" aria-live="assertive" aria-atomic="true" v-show="show">
        <div class="toast-header">
            <strong class="mr-5" v-html="toastTitle"></strong>
        </div>
        <div class="toast-body" v-html="toastMessage"></div>
    </div>
</template>

<script>
export default {
    props: ['title', 'message'],
    
    data() {
        return {
            show: false,
            toastTitle: '',
            toastMessage: ''
        }
    },

    created() {
        if(this.message) {
            this.flash(this.title, this.message)
        }
        window.events.$on('flash', (title, message) => this.flash(title, message));
    },

    methods: {
        flash(title, message) {
            this.show = true;
            this.toastTitle = title;
            this.toastMessage = message;

            setTimeout(() => {
                this.hide();
            }, 5000);
        },

        hide() {
            this.show = false;
        }
    }
}
</script>