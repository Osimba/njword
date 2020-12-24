<template>
    <div>
        <a class="signature-popovers" :data-details="'signature-' + signature.id" role="button" @click="openDetails = !openDetails">
            <i :class="'fas fa-star fa-2x ' + (signature.evaluation ? 'book-' + bookid : 'default') + '-star'"></i> 
        </a>
        <StarPopover :signature="signature" v-if="openDetails"></StarPopover>
    </div>
</template>

<script>
import StarPopover from './StarPopover.vue';

export default {
    components: {StarPopover},
    props: ['signatureinfo', 'bookid'],

    data() {
        return {
            signature: this.signatureinfo,
            openDetails: false
        }
    },

    methods: {
        closeSignatureDetails() {
            this.openDetails = false;
        }
    }
}
</script>