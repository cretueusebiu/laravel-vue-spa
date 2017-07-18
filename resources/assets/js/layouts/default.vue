<template>
  <div class="default-layout flex-center position-ref full-height">
    <child/>
  </div>
</template>

<script>
export default {
  name: 'default-layout'
}
</script>

<style lang="scss">
.default-layout {
  background-color: #fff;
  color: #636b6f;
  font-weight: 100;
  height: 100vh;
  margin: 0;

  .links > a {
    color: #636b6f;
    padding: 0 25px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
  }
}
</style>

<style scoped>
.full-height {
  height: 100vh;
}

.flex-center {
  align-items: center;
  display: flex;
  justify-content: center;
}

.position-ref {
  position: relative;
}
</style>
