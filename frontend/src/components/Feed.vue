<template>
    <div>
        <h1>Feed</h1>
        <forums-view></forums-view>
    </div>
</template>
<script>
    import Threads from './forum/Threads.vue'
    export default {
        components :{
            'forums-view' : Threads
        }
    }
</script>