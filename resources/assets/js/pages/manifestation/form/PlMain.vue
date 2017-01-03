<template>
  <form>
    <div class="bread-crumb nav">
      <router-link class="button is-primary tag" :to="{ name: 'manifestation.create' }">
        Data e Local
      </router-link>
      <span class="icon">
        <i class="fa fa-angle-double-right"></i>
      </span>
      <router-link class="button is-primary tag" :to="{ name: 'manifestation.create.fact' }">
        Informações
      </router-link>
    </div>

    <div style="position: relative; top: 0;left:0">
      <transition :name="transitionName">
        <router-view class="child-view"></router-view>
      </transition>
    </div>

    <nav class="level">
      <div class="level-left"></div>
      <div class="level-right">
        <div class="level-item">
          <button class="button is-primary" type="submit">Enviar</button>
        </div>
      </div>
    </nav>
  </form>
</template>

<script>
  export default {
  data () {
      return {
        transitionName: 'slide-left'
      }
    },
    // dynamically set transition based on route change
    watch: {
      '$route' (to, from) {
        const toDepth = to.path.split('/').length
        const fromDepth = from.path.split('/').length
        this.transitionName = toDepth < fromDepth ? 'slide-right' : 'slide-left'
      }
    }
  }
</script>

<style>
.bread-crumb {
  margin-bottom: 20px;
}
.child-view {
  position: relative;
  width: 100%;
  transition: all .5s ease;/*cubic-bezier(.55,0,.1,1);*/
}
.slide-left-enter, .slide-right-leave-active, .slide-left{
  opacity: 0;
  -webkit-transform: translate(30px, 0);
  transform: translate(30px, 0);
  height: 0;

}
.slide-left-leave-active, .slide-right-enter {
  opacity: 0;
  -webkit-transform: translate(-30px, 0);
  transform: translate(-30px, 0);
  height: 0;

}
</style>
