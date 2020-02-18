<template>
  <div class="modal myr">
    <div class="container myc">
      <div class="modal-content">{{event.isTrusted}}</div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      data: "TEST",
      event: event.isTrusted
    };
  },
  created() {
    console.log(event.isTrusted);
  },
  destroyed() {
    console.log("DESTROYED");
  }
};
</script>
