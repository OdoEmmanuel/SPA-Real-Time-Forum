<template>
    <div>
        <vue-simplemde v-model="reply.reply"/>
                <v-card-actions >
                    <v-btn icon small @click="update">
                        <v-icon color="teal">save</v-icon>
                    </v-btn>
                    <v-btn icon small @click="cancel">
                        <v-icon color="black">cancel</v-icon>
                    </v-btn>
                </v-card-actions>

    </div>
</template>

<script>
export default {
    props:['reply'],

    methods: {
        update(){
            axios.patch(`/api/question/${this.reply.question_slug}/reply/${this.reply.id}`,{body:this.reply.reply})
            .then(res => this.cancel(this.reply.reply))
        },
        cancel(reply){
            EventBus.$emit('cancelEditing',reply);
        }
    },
}
</script>

<style>

</style>
