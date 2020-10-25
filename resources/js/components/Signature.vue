<template>
    <section class="give-sig" id="signatures">
        <button type="button" data-toggle="collapse" data-target="#signatureForm" aria-controls="signatureForm" 
            class="btn btn-block btn-outline-link text-success mb-2" aria-expanded="true">
            Add Signature <i class="fas fa-chevron-down" aria-hidden="true"></i>
        </button>
        <div id="signatureForm" class="collapse" style="">
            <form @submit.prevent="onSubmit" @change="delete form.errors[$event.target.name]" @keydown="delete form.errors[$event.target.name]">
                <div class="form-inline justify-content-around">
                    <Books v-on:bookValue="getChapters($event)" 
                        v-bind:class="{ formErrors: form.errors['book']}"></Books>
                    <BookChapters v-on:chapterValue="setFormChapter($event)" v-bind:chapters="chapters" 
                        v-bind:class="{ formErrors: form.errors['chapter']}"></BookChapters>
                </div>
                <div class="form-inline justify-content-around">
                    <input v-model="form.date" class="form-control col col-sm-1" type="date" name="date" id="date" 
                        v-bind:class="{ formErrors: form.errors['date']}">
                    <input v-model="form.listener" type="text" name="listener" id="listener" class="form-control col" 
                        placeholder="Listener" v-bind:class="{ formErrors: form.errors['listener']}">
                    <div class="col-sm-2 custom-control custom-checkbox">
                        <input v-model="form.evaluation" type="checkbox" id="evaluation-checkbox" class="custom-control-input">
                        <label for="evaluation-checkbox" class="custom-control-label">Evaluation?</label>
                    </div>
                    <input class="btn btn-success" type="submit" value="Add Signature" :disabled="Object.keys(form.errors).length > 0">
                </div>
            </form>
        </div>
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
                book: null,
                chapter: null,
                date: new Date(),
                evaluation: false,
                listener: '',
                errors: {},
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
            console.log(this.chapters);
        },

        setFormBook(bookID) {
            this.form.book = bookID;
        },

        setFormChapter(chapterID) {
            this.form.chapter = chapterID;
        },

        onSubmit() { 
            axios.post('/signatures', this.form)
                .then(response => {
                    this.$emit('signature-added', {book: this.form.book, chapter: this.form.chapter});

                    // display message on front end
                    flashMessage(response.data.title, response.data.message);
                    this.form.listener = '';
                    this.form.evaluation = false;

                })
                .catch((error) => {
                    this.form.errors = error.response.data.errors;
                });
        }
    }
}
</script>