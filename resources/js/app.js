require('./bootstrap');

window.Vue = require('vue')
window.events = new Vue();
window.flashMessage = function (title, message) {
    window.events.$emit('flash', title, message);
}

Vue.component('Toast', require('./components/Toast.vue').default);
Vue.component('Signature', require('./components/Signature').default);

new Vue({
    el: '#app',
    data: {

    },
});