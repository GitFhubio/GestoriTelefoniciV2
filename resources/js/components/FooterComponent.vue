<template>
<footer id="footer">
    <div class="container">
      <div class="footer-top">
        <div class="brand-section">
          <img :src=img_path alt="Avada logo">
          <p>Ac aliquam neque sagittis diam faucibus vitae purus turpis phasellus. Pellentesque consectetur amet purus ultrices mauris.</p>
          <ul class="socialNetworks">
            <li v-for="(social,index) in socialIcons" :key=index><i :class="social.icon" @mouseenter="showNameSocial(index)" @mouseleave="hideNameSocial"></i>
              <div v-if="indexSocial === index" class="dropdown">
                {{social.name}}
              </div>
            </li>
          </ul>
        </div>
        <div class="recent-posts">
          <h6>Recent posts</h6>
          <ul>
            <li v-for="(post,ind) in posts" :key=ind><i class="fas fa-angle-right"></i>{{post}}</li>
          </ul>
        </div>
        <div class="contact-informations">
          <h6>Contact Informations</h6>
          <ul>
            <li>{{contacts.address}}</li>
            <li>Mobile:{{contacts.mobile}}</li>
            <li>Email: {{contacts.email}}</li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <ul>
          <li v-html="copy" v-for="(copy,ind) in rights" :key=ind>{{copy}}</li>
        </ul>
      </div>
    </div>
  </footer>
</template>

<script>
    export default {
        props:['img_path'],
      name:'FooterComponent',
      data:function() {return{
            indexActive:'',
            indexSocial:'',
            indexNav:'',
            socialIcons:[
              { icon: 'fab fa-facebook-f',name:'facebook' },
              { icon: 'fab fa-twitter',name:'twitter' },
              { icon: 'fab fa-youtube',name:'youtube' },
              { icon: 'fab fa-instagram',name:'instagram' },
              { icon: 'fab fa-linkedin-in',name:'linkedin' }
            ],
            posts:['The best protein shake','Ultimate cardio workout','New juices available now','Tips to find training partners','20 best healthy recipes'
          ],
          contacts:{address: '4746 Tipple Road Michigan 48449',
          mobile:"1.800.000.000",
          email:"info@your-company.com"},
          rights:[
            '© Copyright 2012 - 2021',
            'Avada theme by <span>ThemeFusion</span>',
            'All rights reserved',
            'Powered by <span>WordPress</span>'
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
          },
          // funzioni dropdown social icons per far uscire nome all'hover
          showNameSocial(index){
            this.indexSocial=index;
          },
          hideNameSocial(){
            this.indexSocial='';
          }
        }

    }
</script>
<style scoped lang="scss" >

</style>
