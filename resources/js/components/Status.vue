<template>
    <div class="d-flex mx-auto book-status">
        <span class="w-10">{{ book.shortName }}</span>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" 
                role="progressbar" v-bind:style="styleObject"
                v-bind:aria-valuenow="status" aria-valuemin="0" 
                aria-valuemax="100">{{ status }}%</div>
        </div>
        <span class="w-10">{{ status / 10 }}/10</span>
    </div>
</template>

<script>
export default {
    props: ['book'],
    data() {
        return {
            status: 0,
            styleObject: {
                width: '',
                backgroundColor: this.book.color
            }
        }
    },

    created() {
        this.getBookStatus();
    },

    methods: {
        getBookStatus() {
            axios.get('/books/' + this.book.id + '/status')
                .then(response => {
                    this.status = response.data.status;
                    this.updateStyles();
                });    
        },

        updateStyles() {
            this.styleObject.width = this.status + '%';
        }
    }
}
</script>