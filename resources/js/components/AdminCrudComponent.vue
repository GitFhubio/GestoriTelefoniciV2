<template>
  <div @mouseenter="onHover()" @mouseleave="onLeave()" class="card" :class="zoom">
    <div class="card-body d-flex flex-column">
      <img class="operator_img" :src="url"/>
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
             zoom:'zoom-off',
             url:this.img,
        }
    },
    methods: {
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
       datas.append('my_name', this.newName);
        datas.append('my_email', this.newEmail);
        // datas.append('_method', 'PUT')
    console.log(datas.get('my_file'));
    //    https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Google_Chrome_icon_%28September_2014%29.svg/1200px-Google_Chrome_icon_%28September_2014%29.svg.png
        this.$emit('update', this.id,this.newName,this.newEmail
        // ,datas
        );

    // data.append('my_name', this.newName)
    // data.append('my_email',this.newEmail)
    // datas.append('my_id', this.id);
    //  datas.append('_method', 'POST')
     this.$http.post('/api/myoperators/',datas,{
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
