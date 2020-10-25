<template>
    <div class="book-details d-flex flex-md-nowrap flex-wrap align-items-center">
        <h4>Chapter {{ chapter.number }}</h4>
        <div class="d-flex sig-count pl-md-5">
            <span>{{ chapter.signatureCount }} sig.</span>
            <span>{{ chapter.evaluationCount }} eval.</span>
        </div>
        <div v-if="signatures" class="sig-stars">
            <a v-for="(signature, i) in signatures" :key="i" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" title="Signature Details" data-placement="top"
                data-html="true" data-content="<strong>Date:</strong> { signature.date }<br><strong>Listener:</strong> { signature.listener }">
                <i class="fas fa-star fa-2x" style="color: { starColor }"></i>
            </a>
        </div>
    </div>
</template>

<script>
export default {
    props: ['bookcolor'],
    data() {
        return {
            chapter: {
                number: 0,
                signatureCount: 0,
                evaluationCount: 0,
                color: this.bookcolor
            },
            signatures: []
        }
    },
    computed: {
        starColor: function() {
            //return isEvaluation ? this.chapter.color : '#ffe300';
        }
    }
}
</script>