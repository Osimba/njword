<template>
    <div>
        <nav class="nav nav-pills nav-fill mb-3">
            <!-- <a id="book-1-tab" class="nav-link active" data-toggle="tab" href="#book-1" role="tab"  aria-controls="book-1" aria-selected="true">
                Sermon Book 1
            </a> -->
            <a v-for="(tab, i) in tabs" :key="i" class="nav-link"
                :class="[tab.color, { active: tab.isActive }]" :href="tab.href" @click="selectTab(tab)">{{ tab.name }}</a>
        </nav>
        <section class="book-details-list">
            <slot></slot>
        </section>
    </div>
</template>

<script>
export default {
    data() {
        return  {
            tabs: []
        }
    },

    created() {
        this.tabs = this.$children;
    },

    methods: {
        selectTab(selectedTab) {
            this.tabs.forEach(tab => {
                tab.isActive = (tab.name == selectedTab.name);
            });
        }
    }
}
</script>