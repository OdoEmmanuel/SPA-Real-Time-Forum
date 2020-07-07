<template>
    <v-toolbar>
        <!-- <v-app-bar-nav-icon></v-app-bar-nav-icon> -->
        <v-toolbar-title>FORUM</v-toolbar-title>
        <v-spacer></v-spacer>
        <app-notification></app-notification>
        <v-toolbar-items class="hidden-sm-and-down">

            <router-link
            v-for="item in items"
            :key="item.title"
            :to="item.to"
            v-if="item.show">
            <v-btn >{{ item.title }}</v-btn>
            </router-link>

        </v-toolbar-items>
    </v-toolbar>
</template>

<script>
import AppNotification from './AppNotification'
export default{
    components:{AppNotification},
    data(){
        return{
            items:[
                {title: 'Forum', to:'/forum',show:true},
                {title: 'Ask Question', to:'/ask',show: User.loggedIn()},
                {title: 'Category', to:'/category',show: User.admin()},
                {title: 'Login', to:'/login',show: !User.loggedIn()},
                {title: 'Logout', to:'/logout',show: User.loggedIn() },
            ]
        }
    },
    created() {
        EventBus.$on('logout', () =>{
            User.logOut()
        })
    },
}
</script>

<style>

</style>
