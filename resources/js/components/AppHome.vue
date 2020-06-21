<template>
<v-app>
    <div>
    <toolbar></toolbar>
    <router-view></router-view>
    <app-footer></app-footer>
</div>
</v-app>


</template>

<script>
import Toolbar from './Toolbar'
import AppFooter from './AppFooter'
import Login from './login/Login'
// import Signup from './login/signup'


export default{
    name: 'app',
    components: {
        'toolbar' : Toolbar,
        'app-footer' : AppFooter,
        'login' : Login,
        // 'signup': Signup
        }
}
</script>

<style>

</style>
