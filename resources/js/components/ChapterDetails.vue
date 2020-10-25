<template>
    <div class="book-details d-flex flex-md-nowrap flex-wrap align-items-center">
        <h4>Chapter {{ chapter.number }}</h4>
        <div class="d-flex sig-count pl-md-5">
            <span>{{ signatureCount }} sig.</span>
            <span>{{ evaluationCount }} eval.</span>
        </div>
        <div v-if="signatures" class="sig-stars">
            <a v-for="(signature, i) in signatures" :key="i" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" title="Signature Details" data-placement="top"
                data-html="true" :data-content="'<strong>Date:</strong> ' + signature.sig_date + '<br><strong>Listener:</strong> ' + signature.from_member">
                <i class="fas fa-star fa-2x" :style="{ color: starColor(signature) }"></i>
            </a>
        </div>
    </div>
</template>

<script>
export default {
    props: ['chapter', 'bookcolor'],
    data() {
        return {
            signatureCount: 0,
            evaluationCount: 0,
            color: this.bookcolor,
            signatures: []
        }
    },

    created() {
        this.getSignatures();
    },

    methods: {
        getSignatures() {
            axios.get('/chapter/' + this.chapter.id + '/signatures')
                .then(response => {
                    this.signatureCount = response.data.sigCount;
                    this.evaluationCount = response.data.evalCount;
                    this.signatures = response.data.signatures;
                });  
        },

        starColor(signature) {
            return signature.evaluation ? this.color : '#ffe300';
        }
    }
}
</script>