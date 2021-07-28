<template>
  <div @mouseenter="onHover()" @mouseleave="onLeave()" class="card" :class="zoom">
    <div class="card-body d-flex flex-column">
      <img class="operator_img" :src="image()">
      <h5 class="card-text">Nome: {{ name | properCase }}</h5>
       <input type="text" placeholder="Inserisci nuovo nome" v-model="newName">
       <h6 class="card-text">Email: {{ email }}</h6>
      <input type="text" placeholder="Inserisci nuova email" v-model="newEmail">
      <label for="img">Carica nuovo avatar</label>
      <input type="file"  name= "img" @change="onFileChange" ref="fileInput" >
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
             baseurl:location.origin+'/',
             zoom:'zoom-off',
             url:this.img
        }
    },
    methods: {
        image(){
          if(this.url.indexOf("http") == -1){
              return this.baseurl+this.url;
          } else{
              return this.url;
          }
        },
      onFileChange(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
    //   console.log(location.origin+'/images'+this.url.slice(this.url.indexOf('/')+1));
    //   console.log('/images/'+this.url.slice(this.url.lastIndexOf('/')+1));
    },
   update() {
     var datas = new FormData();
    const file = this.$refs.fileInput.files[0];
    datas.append('my_file', file);
    datas.append('my_name', this.newName)
    datas.append('my_email',this.newEmail)
     datas.append('_method', 'PUT')
     this.$http.post(`/api/myoperators/${this.id}`,datas,{
           headers: {
      'Content-Type': `multipart/form-data;`,
                        }
                    }

                    )
    .then(response => {
        console.log(response.data)
    })
    .catch(error => {
        console.log(error.response.data)
    });

        this.$emit('update', this.id,this.newName,this.newEmail
        );
}
,
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
