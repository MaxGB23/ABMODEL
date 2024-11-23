<template>
    <div class="menu-icon" @click="toggleMenu">
        <span></span>
        <span></span>
        <span></span>
    </div>
</template>

<script>
export default {
    props: {
        isMenuVisible: {
            type: Boolean,
            default: false,
        },
    },
    methods: {
        toggleMenu() {
            this.$emit('toggle-menu');
        },
    },
};
</script>

<style scoped>
.menu-icon {
    display: flex;
    flex-direction: column;
    cursor: pointer;
    z-index: 1000;
    padding: 10px;
}

.menu-icon span {
    width: 30px;
    height: 3px;
    background: #fff;
    margin: 5px 0;
    transition: all 0.3s;
}
</style>
