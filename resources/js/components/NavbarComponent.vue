<template>
<nav id="navbar">
    <div class="header-left">
      <div class="logo" >
          <a href="/">
        <img :src=img_path alt="logo">
          </a>
      </div>
    </div>
    <div class="header-right" @mouseleave="hideDrop">
      <ul>
        <li v-for="(menu,index) in menulist" :key=index @mouseenter="showDrop(index)"><a href="">{{menu.voce}}</a>
          <ul @mouseleave="hideDrop" v-if="indexNav === index" class="dropdown">
            <li v-for="(item,ind) in menu.content" :key=ind>{{item}}</li>
          </ul>
        </li>
      </ul>
      <ul>
        <li @mouseenter="hideDrop" class="nav-button">Schedule a call</li>
        <!-- <li><a class="btn btn-light  mr-sm-1 my-btn-login" href="/login">Accedi</a></li>
        <li><a class="btn btn-light my-btn-register" href="/register">Registrati</a></li> -->
        <slot></slot>
    <li><a href=""><i class="fas fa-shopping-cart"></i></a></li>
    <li><a href=""><i class="fas fa-search"></i></a></li>
    <li @click="toggled=!toggled"><a><i class="fas fa-bars"></i></a></li>
      </ul>

    </div>
    <div class="toggle-menu"  v-if="toggled">
        <ul class="left">
            <li v-for="(menu,index) in menulist" :key=index @mouseenter="showDrop(index)"><a href="">{{menu.voce}}</a>
              <ul @mouseleave="hideDrop" v-if="indexNav === index" class="dropdown">
                <li v-for="(item,ind) in menu.content" :key=ind>{{item}}</li>
              </ul>
            </li>
        </ul>
          <a href="#"><i @click="toggled=!toggled" class="fa fa-times" aria-hidden="true"></i></a>
    </div>
</nav>
</template>

<script>
    export default {
    props:['img_path'],
      name:'NavbarComponent',
      data:function() {return{
                      toggled:false,
            indexActive:'',
            indexSocial:'',
            indexNav:'',
            menulist:[
              { voce: 'Home'},
              { voce: 'Services',
              content:['All Services','Service Single Page'] },
              { voce: 'About',
              content:['About me','Our Sponsor','Contact']  },
              { voce: 'Videos',
              content:['All Playlists','Playlist Page','Video Single Page']   },
              { voce: 'Blog' },
              { voce: 'Store',
              content:['Single Product','Variable Product'] }
            ]
      }},
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
             toggle(){
               {this.toggled=true;}
            },
          nowActive(ind){
            this.indexActive=ind;
          }
          ,
          showDrop(index){
            if (index!= 0 && index!= 4){
              this.indexNav=index;
            } else {
              this.indexNav='';
            }}
            ,
            hideDrop(){
              this.indexNav='';
            }
        }

    }
</script>
<style scoped lang="scss" >

</style>
