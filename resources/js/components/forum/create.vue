<template>
<v-container>
     <v-form @submit.prevent="create">

         <span class="red--text" v-if="errors.title">{{errors.title[0]}}</span>
        <v-text-field
            label="Title"
            v-model="form.title"
            type="text"
            required
        ></v-text-field>

         <span class="red--text" v-if="errors.category_id">{{errors.category_id[0]}}</span>
        <v-select
        :items="categories"
        item-text="name"
        item-value="id"
        v-model="form.category_id"
        label="Category"
        autocomplete
        ></v-select>

         <span class="red--text" v-if="errors.body">{{errors[0]}}</span>
          <vue-simplemde v-model="form.body" />

         <v-btn
         color="green"
         class="mr-4"
         type="submit"
         :disabled="disable"
        >Create</v-btn>
    </v-form>
</v-container>
</template>
<<script>
export default {
    data() {
        return {
            form :{
                title:null,
                category_id:null,
                body:null
            },
            categories:[],
            errors:{}
        }
    },
    created() {
        axios.get('/api/category')
        .then(res => this.categories =  res.data.data)
        .catch(error => this.errors.response.data.error)
    },
    methods :{
        create(){
            axios.post('/api/question',this.form)
            .then(res => this.$router.push(res.data.path))
            .catch(error => this.errors = error.response.data.errors)
        }
    },
    computed:{
        disable(){
            // return !(this.form.title && this.form.body && this.form.category_id)
          }
    }
}
</script>
<style>

</style>
