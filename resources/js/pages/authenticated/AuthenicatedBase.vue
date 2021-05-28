<template>
    <div>
        <div class="w-100 py-3 d-flex align-content-center">
            <router-link :to="{name: 'logout'}" class="ms-auto">Logout</router-link>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
export default {

}
</script>
