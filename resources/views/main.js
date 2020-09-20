Vue.component('task-list', {
    template: '<ul><slot></slot></ul>'
});

Vue.component('task', {

    template: '<li><slot></slot></li>',

    data() {

        return {
            message: 'This is a message'
        }
    }
});

new Vue({
    el: '#root'
});