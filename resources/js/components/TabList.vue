<template>
    <div>
        <div class="nav nav-pills nav-fill mb-3" role="tablist">
            <a v-for="(tab, i) in tabs" :key="i" class="nav-link" role="tab"
                :class="[tab.color, { active: tab.isActive }]" :href="tab.href" @click="selectTab(tab)">{{ tab.name }}</a>
        </div>
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