<template>
        <div data-aos="zoom-in"  data-aos-duration="500" class='operators'
        :style="  {'background-image':'url('+item.img+')'}">
            <div>
            <a :href="'/operators/' +item.id"></a>
            <p v-if="!item.img" class="no-photo">{{item.name}}</p>
            </div>
        </div>
</template>

<script>
    export default {
          name:'OperatorComponent',
          props:{
              item:Object,
              parameter:Array,
          },
        // mounted() {
        //     console.log('Component mounted.')
        // }
    }
</script>
