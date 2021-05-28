<template>
    <div></div>
</template>

<script>
export default {
    beforeMount() {
        window.localStorage.removeItem('authToken');
        this.$router.push({name: 'login'});
    }
}
</script>
