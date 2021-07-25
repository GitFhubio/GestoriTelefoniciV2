<template>
  <div class="card" style="width:300px;margin:20px;">
    <div class="card-body d-flex flex-column">
      <img style="width:auto;height:40%;" :src="img"/>
      <h5 class="card-text">Nome: {{ name | properCase }}</h5>
       <input type="text" placeholder="Inserisci nuovo nome" v-model="newName">
       <h6 class="card-text">Email: {{ email }}</h6>
      <input type="text" placeholder="Inserisci nuova email" v-model="newEmail">
      <label for="img">Carica nuovo avatar</label>
      <input type="file"  name= "img" multiple @change="onFileChange">
          <div class="buttons" style="margin-top:10px;">
     <button class="goldbtn" @click="update">Update</button>
     <button class="goldbtn" @click="del">Delete</button>
    </div>
    </div>
    </div>
</template>
<script>
  export default {
    name:'AdminCrudComponent',
    data:function(){
        return {
            newName:'',
             newEmail:'',
        }
    },
    methods: {
        onFileChange(e){
            const files = e.target.files;
               let itemfile = files[0].name;
            //    console.log("images/"+itemfile)
               return "images/"+itemfile;

        },
   update() {
        this.$emit('update', this.id,this.newName,this.newEmail,this.onFileChange);
      },
      del() {
        this.$emit('delete', this.id);
      },

    },
    props: ['id', 'name','email','img'],
    filters: {
      properCase(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
      }
    }
  }
</script>
<style>

</style>
