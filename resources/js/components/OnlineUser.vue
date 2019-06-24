<template>
    <div class="is-pulled-left"
    style="padding-right:2px;">
        <i class="fa fa-circle green" v-if="checkUser()"></i>
        <i class="fa fa-circle red" v-else></i>
    </div>
</template>

<script>
    export default {
        props: ['friend', 'onlineusers'],
        methods: {
            checkUser: function() {
                return _.find(this.onlineusers, {id: this.friend.id});
            }
        }
    }
</script>

<style>
    .red {
        color: red;
    }
    .green {
        color: green;
    }
</style>
