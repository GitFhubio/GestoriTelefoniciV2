<template>
<!-- :style="{'background-image':'url('+element.img+')'}"> -->
        <div class="categories" @click="clickedCategory()">
            <!-- @click="$emit('selCat')" -->
            <img :src="element.img" alt="">
            <p>{{element.nome}}</p>
        </div>
</template>

<script>
    export default {
          name:'CategoryComponent',
          data:function(){
            return{
              catselected:this.element
            }
          },
          props:{
              element:Object,
          },
          methods: {
           clickedCategory() {  this.$event.$emit('selCat',this.catselected)}
          },
        // mounted() {
        //     console.log(this.giampselected)
        // }
    }
</script>
