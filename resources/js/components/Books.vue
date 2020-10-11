<template>
    <select name="book" id="book" class="form-control col col-sm-1"
        v-model="selectedBook">
        <option disabled selected hidden value="0">Select a Book</option>
        <option v-for="(book, i) in books" v-bind:value="book.id" v-bind:key="i">
            {{ book.name }}
        </option>
    </select>
</template>

<script>
export default {
    props: ['value'],
    data() {
        return {
            selectedBook: 0,
            books: [],
        }
    },

    created() {
        axios.get('/books')
            .then(response => this.books = response.data);
    },

    watch: {
        selectedBook: function () {
            this.$emit('bookValue', this.selectedBook);
        }
    }
}
</script>