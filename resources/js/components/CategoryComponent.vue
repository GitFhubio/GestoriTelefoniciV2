<template>
<!-- :style="{'background-image':'url('+element.img+')'}"> -->
        <div class="categories" @click="$emit('selCat')">
            <img :src="element.img" alt="">
            <p>{{element.nome}}</p>
        </div>
</template>

<script>
    export default {
          name:'CategoryComponent',
          props:{
              element:Object,
          },
        // mounted() {
        //     console.log('CategoryComponent mounted.')
        // }
    }
</script>
