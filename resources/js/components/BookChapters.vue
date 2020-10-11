<template>
    <select name="chapter" id="chapter" v-model="selectedChapter" class="form-control col">
        <option disabled selected hidden value="0">Select a Chapter</option>
        <option v-for="(chapter, i) in chapters" v-bind:value="chapter.id" v-bind:key="i">
            {{ chapter.number }} - {{ chapter.title }}
        </option>
    </select>
</template>

<script>
export default {

    props: ['chapters'],

    data(){
        return {
            selectedChapter: 0,
        }
    },

    watch: {
        selectedChapter: function () {
            this.$emit('chapterValue', this.selectedChapter);
        }
    }
}
</script>