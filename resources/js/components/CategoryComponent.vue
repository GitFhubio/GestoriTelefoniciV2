<template>
<!-- :style="{'background-image':'url('+element.img+')'}"> -->
        <div data-aos="zoom-in" class="categories" @click="clickedCategory()">
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
            }
          },
          props:{
              element:Object,
          },
          methods: {
           clickedCategory() {  this.$emit('selCat')}
          },
        // mounted() {
        //     console.log(this.giampselected)
        // }
    }
</script>
