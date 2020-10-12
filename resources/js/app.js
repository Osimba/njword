require('./bootstrap');

window.Vue = require('vue')
window.events = new Vue();
window.flashMessage = function (title, message) {
    window.events.$emit('flash', title, message);
}

Vue.component('Status', require('./components/Status.vue').default);
Vue.component('Toast', require('./components/Toast.vue').default);
Vue.component('Signature', require('./components/Signature.vue').default);

new Vue({
    el: '#app',
    data: {
        
    },
    methods: {
        updateBookStatus(event) {
            this.$refs.books[event.book-1].getBookStatus();
        }
    }
});