require('./bootstrap');

window.Vue = require('vue')
window.events = new Vue();
window.flashMessage = function (title, message) {
    window.events.$emit('flash', title, message);
}

Vue.component('Status', require('./components/Status.vue').default);
Vue.component('Toast', require('./components/Toast.vue').default);
Vue.component('Signature', require('./components/Signature.vue').default);
Vue.component('Star', require('./components/Star.vue').default);


var vueObj = new Vue({
    el: '#app',
    data: {
        show: true
    },
    methods: {
        updateBookStatus(event) {
            this.$refs.books[event.book-1].getBookStatus();
        }
    }
});

document.addEventListener('click', function (event) {

    if($(event.target).closest(".popover.bs-popover-top").length == 1 || $(event.target).closest('.signature-popovers').length == 1) {
        
    } else {
        vueObj.$refs.stars.forEach(element => {
            element.openDetails = false;
        });
    }
});