<template>
<v-container>
    <v-form @submit.prevent="login">
        <v-text-field
            label="E-mail"
            v-model="form.email"
            type="email"
            required
        ></v-text-field>

        <v-text-field
            label="Password"
            v-model="form.password"
            type="password"
            required
        ></v-text-field>

         <v-btn
         color="green"
         class="mr-4"
         type="submit"
        >Login</v-btn>

     <router-link to="/signup">
        <v-btn >Sign Up</v-btn>
      </router-link>
    </v-form>
  </v-container>
</template>

<script>

export default{

    data() {
        return {
            form :{
                email:null,
                password:null
            }
        }
    },
    methods:{
        login(){
          User.login(this.form)
        }
    }
}

</script>

<style>

</style>
