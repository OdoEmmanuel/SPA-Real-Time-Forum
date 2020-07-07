<template >
    <div class="text-xs-center">
        <v-menu offset-y>
            <template v-slot:activator="{ on, attrs }">
                <v-btn icon v-on="on">
                     <v-icon color="red">add_alert</v-icon>5
                </v-btn>
            </template>
            <v-list>
                <v-list-item-title>Notificattion</v-list-item-title>
                </v-list-item>
            </v-list>
        </v-menu>
    </div>
</template>

<script>
export default {
    data() {
        return {
            read : {},
            unread : {},
            unreadCount : 0
        }
    },
    created() {
        if(User.loggedIn()){
            this.getNotifications()
        }
    },
    methods: {
        getNotifications(){
            axios.post('/api/notifications')
            .then(res => {
                this.read = res.data.read
                this.unread = res.data.unread
                this.unreadCount = res.data.unread.length

            })
        }
    },

}
</script>

<style>

</style>
