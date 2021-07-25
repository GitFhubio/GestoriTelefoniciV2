<template>
  <div @mouseenter="onHover()" @mouseleave="onLeave()" class="card" :class="zoom">
    <div class="card-body d-flex flex-column">
      <img :src="img"/>
      <h5 class="card-text">Nome: {{ name | properCase }}</h5>
       <input type="text" placeholder="Inserisci nuovo nome" v-model="newName">
       <h6 class="card-text">Email: {{ email }}</h6>
      <input type="text" placeholder="Inserisci nuova email" v-model="newEmail">
      <label for="img">Carica nuovo avatar</label>
      <input type="file"  name= "img" multiple @change="onFileChange">
          <div class="buttons" style="margin-top:10px;">
     <button class="goldbtn" @click="update">Aggiorna </button>
     <button class="goldbtn" @click="del">Cancella</button>
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
             zoom:'zoom-off'
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
        onHover() {
       this.zoom='zoom-on';
    },
    onLeave() {
        this.zoom='zoom-off';
     }

    },
    props: ['id', 'name','email','img'],
    filters: {
      properCase(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
      }
    }
  }
</script>
<style scoped lang="scss">
.card{
width:300px;
margin:20px;
img{
width:auto;
height:40%;
}
}
</style>
