<template>
  <div>
    <transition name="page" mode="out-in">
      <slot>
        <router-view></router-view>
      </slot>
    </transition>
  </div>
</template>
