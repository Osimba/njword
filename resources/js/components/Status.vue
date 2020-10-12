<template>
    <div class="d-flex mx-auto book-status">
        <span class="w-10">{{ book.shortName }}</span>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" 
                role="progressbar" v-bind:style="styleObject"
                v-bind:aria-valuenow="book.status" aria-valuemin="0" 
                aria-valuemax="100">{{ book.status }}%</div>
        </div>
        <span class="w-10">{{ book.status / 10 }}/10</span>
    </div>
</template>

<script>
export default {
    props: ['bookid'],
    data() {
        return {
            book: {
                shortName: '',
                status: 0,
                color: ''
            },
            styleObject: {
                width: '',
                backgroundColor: ''
            }
        }
    },

    created() {
        this.getBookStatus();
    },

    methods: {
        getBookStatus() {
            axios.get('/books/' + this.bookid + '/status')
                .then(response => {
                    this.book.shortName = response.data.shortName;
                    this.book.status = response.data.status;
                    this.book.color = response.data.color;
                    this.updateStyles();
                });    
        },

        updateStyles() {
            this.styleObject.width = this.book.status + '%';
            this.styleObject.backgroundColor = this.book.color;
        }
    }
}
</script>