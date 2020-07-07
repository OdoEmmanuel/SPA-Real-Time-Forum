<template>
    <v-container>
     <v-card>
        <v-form @submit.prevent="update">
           <v-text-field
            label="Title"
            v-model="form.title"
            type="text"
            required
            ></v-text-field>

            <vue-simplemde v-model="form.body" />
            <v-card-actions>
             <v-btn icon small type="submit">
                 <v-icon color="teal">save</v-icon>
             </v-btn>
             <v-btn icon small @click="cancel">
                 <v-icon color="black">cancel</v-icon>
             </v-btn>
            </v-card-actions>

        </v-form>
       </v-card>
    </v-container>
</template>
<script>
export default {
    props:['data'],
    data() {
        return {
            form:{
                title:null,
                body:null
            }
        }
    },
    methods: {
        cancel(){
            EventBus.$emit('cancelEditing')
        },
        update(){
            axios.patch(`/api/question/${this.data.slug}`,this.form)
            .then(res => this.cancel())
        }
    },
    created() {
        this.form = this.data
    },
}
</script>
<style>

</style>
