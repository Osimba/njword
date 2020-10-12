<template>
    <section class="give-sig" id="signatures">
        <h2 class="text-center mb-4" v-on:click="testing()">Add Signature</h2>
        <form @submit.prevent="onSubmit">
            <div class="form-inline justify-content-around">
                <Books v-on:bookValue="getChapters($event)"></Books>
                <BookChapters v-on:chapterValue="setFormChapter($event)" v-bind:chapters="chapters"></BookChapters>
            </div>
            <div class="form-inline justify-content-around">
                <input v-model="form.date" class="form-control col col-sm-1" type="date" name="date" id="date">
                <input v-model="form.listener" type="text" name="listener" id="listener" class="form-control col" placeholder="Listener">
                <div class="col-sm-2 custom-control custom-checkbox">
                    <input v-model="form.evaluation" type="checkbox" id="evaluation-checkbox" class="custom-control-input">
                    <label for="evaluation-checkbox" class="custom-control-label">Evaluation?</label>
                </div>
                <input class="btn btn-success" type="submit" value="Add Signature">
            </div>
        </form>
    </section>
</template>

<script>
import Books from './Books.vue';
import BookChapters from './BookChapters.vue';

export default {
    components: {Books, BookChapters},
    data() {
        return {
            chapters: [],
            form: {
                book: 0,
                chapter: 0,
                date: new Date(),
                evaluation: false,
                listener: '',
            }

        }
    },

    created() {
        // Set form date to today's date
        let currentDate = new Date();

        var month = ('0' + (currentDate.getMonth() + 1)).slice(-2);
        var date = ('0' + currentDate.getDate()).slice(-2);
        var year = currentDate.getFullYear();
        var formattedDate = year + '-' + month + '-' + date;

        this.form.date = formattedDate;
    },

    methods: {

        getChapters(bookID) {
            this.setFormBook(bookID);

            axios.get('/books/' + bookID)
                .then(response => this.chapters = response.data);
        },

        setFormBook(bookID) {
            this.form.book = bookID;
        },

        setFormChapter(chapterID) {
            this.form.chapter = chapterID;
        },

        testing() {
            this.$emit('signature-added', {book: 1, chapter: 4});
        },

        onSubmit() { 
            axios.post('/signatures', this.form)
                .then(response => {
                    this.$emit('signature-added', {book: this.form.book, chapter: this.form.chapter});
                    
                    // display message on front end
                    flashMessage(response.data.title, response.data.message);
                    this.form.listener = '';
                    this.form.evaluation = false;

                });
        }
    }
}
</script>