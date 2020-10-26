<template>
    <article :class="{ 'd-flex': isActive, 'flex-wrap': isActive }" v-show=isActive>
        <slot></slot>
    </article>
</template>

<script>
export default {
    props: {
        name: { required: true },
        color: { required: true},
        selected: { default: false }
    },

    data() {
        return  {
            isActive: false
        }
    },

    computed: {
        href() {
            return '#' + this.name.toLowerCase().replace(/ /g, '-');
        }
    },

    mounted() {
        this.isActive = this.selected;
    }
}
</script>