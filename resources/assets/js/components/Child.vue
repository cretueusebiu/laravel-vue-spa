<template>
  <transition name="page" mode="out-in">
    <slot>
      <router-view></router-view>
    </slot>
  </transition>
</template>

<script>
export default {
  name: 'child'
}
</script>
