<template>
    <v-container>
            <v-alert v-if="errors" type="error">
            Please input a category name
            </v-alert>
        <v-form @submit.prevent="submit">
            <v-text-field
                label="Category Name"
                v-model="form.name"
                required
            ></v-text-field>

            <v-btn type="submit"  :disabled="disable" color="yellow" v-if="editSlug">Update</v-btn>
            <v-btn type="submit"  :disabled="disable" color="teal" v-else>Create</v-btn>

        </v-form>

        <v-card class="mt-4">
            <v-toolbar color="indigo" dark dense>
                <v-toolbar-title>Categories</v-toolbar-title>
            </v-toolbar>

            <v-list>
                <div  v-for="(category,index) in categories" :key="category.id">
                    <v-list-item>

                   <v-list-item-action>
                       <v-btn icon small @click="edit(index)">
                           <v-icon color="orange">edit</v-icon>
                       </v-btn>
                   </v-list-item-action>

                   <v-list-item-content>
                        <v-list-item-title>
                           {{category.name}}
                        </v-list-item-title>
                   </v-list-item-content>

                   <v-list-item-action>
                       <v-btn icon small @click="destroy(category.slug)">
                           <v-icon color="red">delete </v-icon>
                       </v-btn>
                   </v-list-item-action>

               </v-list-item>
               <v-divider></v-divider>
                </div>

            </v-list>
        </v-card>
    </v-container>
</template>
<script>
export default {
    data() {
        return {
            form:{
                name:null
            },
            categories:{},
            editSlug:null,
            errors:null
        }
    },
    created(){
         if(!User.admin()){
             this.$router.push('/forum')
         }
            axios.get('/api/category')
            .then(res => this.categories = res.data.data)
        },
    methods: {
        submit(){
            this.editSlug ? this.update() : this.create()
               .then(res => {
                    this.categories.unshift(res.data)
                    this.form.name = null
            })
        },
        update(){
                axios.patch(`/api/category/${this.editSlug}`,this.form)

        },
        create(){
                axios.post('/api/category',this.form)
                .then(res => {
                    this.categories.unshift(res.data)
                    this.form.name = null
            })
                .catch(error => this.errors = error.response.data.errors)
        },
        destroy(slug,index){
            axios.delete(`/api/category/${slug}`)
            .then(res => this.categories.splice(index,1))
        },
        edit(index){
            this.form.name = this.categories[index].name
            this.editSlug = this.categories[index].slug
            this.categories.splice(index,1)

        }

    },
        computed:{
            disable(){
                return !this.form.name
            }
    }
}
</script>

<style>

</style>
