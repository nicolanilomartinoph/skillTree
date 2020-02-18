<template>
  <div class="col-4 text-center myr">
    <h4 class="col-12 myc">Programmer Skills</h4>
    <div id="skills-container" class="col-12 myc">
      <Skills></Skills>
    </div>
  </div>
</template>

<script>
import Skills from "../Skill/Skill.vue";

export default {
  components: { Skills },
  computed: {
    jobs: function() {
      return this.$store.state.jobs;
    }
  }
};
</script>

<style scoped>
#skills-container {
  height: 5000px;
  max-height: 70vh;
  overflow-x: hidden;
  overflow-y: auto;
}
</style>

<style>
.skill-img {
}
</style>