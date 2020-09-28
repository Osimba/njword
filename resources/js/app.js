require('./bootstrap');

window.events = new Vue();

window.flashMessage = function (title, message) {
    window.events.$emit('flash', title, message);
}

Vue.component('toast', {

    props: ['title', 'message'],

    template: `
    
        <div class="toast" role="alert" style="opacity: 1; position: fixed; top: 10px; right: 10px;" aria-live="assertive" aria-atomic="true" v-show="show">
            <div class="toast-header">
                <strong class="mr-5" v-html="toastTitle"></strong>
            </div>
            <div class="toast-body" v-html="toastMessage"></div>
        </div>
    `,

    data() {
        return {
            show: false,
            toastTitle: '',
            toastMessage: ''

        }
    },

    created() {
        if(this.message) {
            this.flash(this.title, this.message)
        }

        window.events.$on('flash', (title, message) => this.flash(title, message));
    },


    methods: {

        flash(title, message) {
            this.show = true;
            this.toastTitle = title;
            this.toastMessage = message;

            setTimeout(() => {
                this.hide();
            }, 5000);
        },

        hide() {
            this.show = false;
        }
    }

});

Vue.component('signature', {

    props: ['is-evaluation'],

    data() {
        return {
            chapters: [],
            form: {
                book: 0,
                chapter: 0,
                date: new Date(),
                listener: '',
                route: this.isEvaluation ? '/evaluations' : '/signatures',
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

    template: `

        <form @submit.prevent="onSubmit">
            <div class="form-inline justify-content-around">
                <books v-on:bookValue="getChapters($event)"></books>
                <book-chapters v-on:chapterValue="setFormChapter($event)" v-bind:chapters="chapters"></book-chapters>
            </div>
            <div class="form-inline justify-content-around">
                <input v-model="form.date" class="form-control col col-sm-1" type="date" name="date" id="date">
                <input v-model="form.listener" type="text" name="listener" id="listener" class="form-control col" placeholder="Listener">
                <input class="btn btn-success" type="submit" value="Add Signature">
            </div>
        </form>
    `,

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

        onSubmit() { 


            axios.post(this.form.route, this.form)
                .then(response => {
                    // display message on front end
                    flashMessage(response.data.title, response.data.message);
                    this.form.listener = '';
                });

            
        }
    }
});

Vue.component('books', {
    props: ['value'],

    template: `
    
        <select name="book" id="book" class="form-control col col-sm-1"
            v-model="selectedBook"
            >
            <option disabled selected hidden value="0">Select a Book</option>
            <option v-for="book in books" v-bind:value="book.id">
                {{ book.name }}
            </option>
        </select>
    `,

    data() {

        return {

            selectedBook: 0,
            books: [],

        }
    },

    mounted() {

        axios.get('/books')
            .then(response => this.books = response.data);


    },

    watch: {

        selectedBook: function () {
            this.$emit('bookValue', this.selectedBook);
        }
    }

});

Vue.component('book-chapters', {

    props: ['chapters'],

    template: `
    
        <select name="chapter" id="chapter" v-model="selectedChapter" class="form-control col">
            <option disabled selected hidden value="0">Select a Chapter</option>
            <option v-for="chapter in chapters" v-bind:value="chapter.id">
                {{ chapter.number }} - {{ chapter.title }}
            </option>
        </select>
    `,

    data() {

        return {

            selectedChapter: 0,

        }
    },

    watch: {

        selectedChapter: function () {
            this.$emit('chapterValue', this.selectedChapter);
        }
    }

    
});

new Vue({
    el: '#app',

    data: {

    },

    

});