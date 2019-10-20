<template>
    <div class="container">
        <div class="row">
            <div class="col-md-9 fixPadding">
                <transition name="fade" mode="out-in">
                    <router-view :key="key"></router-view>
                </transition>
            </div>
            <div class="col-md-3">
                <right-bar></right-bar>
            </div>
        </div>
    </div>
</template>

<script>
    import RightBar from "./RightBar"
    export default {
        components : {
            RightBar
        },
        computed:{
            key(){
                return this.$route.path + Math.random();
            }
        }
    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .4s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>