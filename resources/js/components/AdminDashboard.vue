<template>
<div>
<div class="wrapper">
<h1 class="text-center">Bentornato nella tua dashboard, {{admin != null ? admin.name : ''}}</h1>
</div>
<h4>Le tue info</h4>
<ul>
<li>Email : {{admin != null ? admin.email : ''}}</li>
<li>Data registrazione :  {{admin != null ? admin.created_at : ''}} </li>
</ul>
<div class="text-center">
    <router-link class="goldbtn" to="/user/operators">Vai agli operatori</router-link>
</div>
</div>
</template>
<script>
  export default {
      data:function(){
          return{
              admin:null
          }
      },
    name:'AdminDashboard',
    mounted: function() {
         axios
        .get('admin')
        .then((response) => {
            this.admin=response.data;
            // console.log(this.admin);
        })
  }
  }
</script>
<style scoped lang="scss">
.wrapper{
background-image:url(https://png.pngtree.com/thumb_back/fw800/back_our/20190628/ourmid/pngtree-blue-background-picture-image_265099.jpg);
h1{
 padding:30px 0;
}
}
.goldbtn{
    padding:10px;
}
</style>
