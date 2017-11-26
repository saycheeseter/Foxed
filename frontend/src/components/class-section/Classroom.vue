<template>
  <div class="home">
    <div class="container-fluid">
      <div class="row justify-content-sm-center">
        <div class="col-3">
          <div class="block-full-height d-flex justify-content-center align-items-start ">

            <div class="text-left mt-5">
              <a href="">AN401</a>
              <hr>
              <router-link class="nav-item" to="/editor">
              <a class="btn btn-success text-center mb-2" type="submit">Code Play</a>
              </router-link>
              <br>
              <a href="">Announcements</a><br>
              <a href="">Assignments</a><br>
              <a href="">Files</a>
            </div>

          </div>
        </div>
        <div class="col-5">
          <div class="block-full-height d-flex justify-content-center align-items-start">
              <div class="feed-block"> 
<!-- to be change *component -->
    <div class="feed-block-inner mt-4 p-2" v-for="item in users">
      <div class="feed-block-inner__header mb-3">
        <img class="m-1" src="http://alloutput.com/wp-content/uploads/2013/11/black-circle-mask-to-fill-compass-outline.png" alt="">
        <a class="mt-2" href="">{{item.name}}</a>
      </div>
      <div class="feed-block-inner__post">
        <img src="https://news.siteintelgroup.com/blog/components/com_easyblog/themes/wireframe/images/placeholder-image.png" alt="">
        <p>Lorem Ipsum this activity with best effort.</p>
        <a class="btn btn-success" type="submit">Start Coding</a>
      </div>
      
    </div>

  </div>
          </div>
        </div>
        <div class="col-4">
          <div class="block-full-height d-flex justify-content-center align-items-start">

            <h5>Forums</h5>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        items: [{
            title: 'AN401'
          },
          {
            title: 'ANIMPORT'
          },
          {
            title: 'WEBFOLIO'
          }
        ],
         users: [{
            name: 'Anna Lumanlan',
            post: ''
          },
          {
            name: 'Franchette Dizon',
            post: ''
          },
          {
            name: 'Chester Cueto',
            post: ''
          }
        ]
      }
    }
  }
</script>

<style scoped>
  form input {
    width: 100%;
  }

  .green {
    background-color: green;
  }

  .picture {
    background-color: #efefef;
    padding: 65px 30px;
    border-radius: 50%;
  }

  ul {
    list-style: none;
    padding: 0;
   
  } li {
      margin: 0;
    }

      .feed-block {

    width: 100%;
    
  } 
      .feed-block-inner__header img{
          width: 40px;
      }
      .feed-block-inner__post img{
          width: 100%;
      }
</style>