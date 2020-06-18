<template>
    <v-toolbar>
        <v-app-bar-nav-icon></v-app-bar-nav-icon>
        <v-toolbar-title>FORUM</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items class="hidden-sm-and-down">
            <router-link to="/forum">
            <v-btn >Forum</v-btn>
            </router-link>
            <router-link to="/question">
            <v-btn >Ask Question</v-btn>
            </router-link>
             <router-link to="/categories">
              <v-btn >Category</v-btn>
            </router-link>
            <router-link to="/login">
            <v-btn >Login</v-btn>
            </router-link>

        </v-toolbar-items>
    </v-toolbar>
</template>

<script>
export default{

}
</script>

<style>

</style>
