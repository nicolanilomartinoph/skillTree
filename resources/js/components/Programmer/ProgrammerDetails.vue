<template>
  <div class="col-3 text-center myc text-decoration-none">
    <h4 class="myc">Programmer Details</h4>
    <ul class="myc">
      <li class="mx-auto">Name: {{ name }}</li>
      <li v-for="job in programmerJobs" :key="job">{{job}}</li>
    </ul>
    <button @click="toggleJobsModal" data-toggle="modal" data-target="#myModal">JOBS</button>
    <JobPickerModal v-if="displayJobsModal" id="myModal"></JobPickerModal>
  </div>
</template>

<script>
/*
- 
*/
import JobPicker from "./JobPicker.vue";
import JobPickerModal from "./JobPickerModal.vue";

export default {
  data() {
    return {
      displayJobs: false,
      jobs: this.$store.state.programmerJobs,
      displayJobsModal: false
    };
  },
  props: ["testProp"],
  computed: {
    name: function() {
      return this.$store.state.name;
    },
    programmerJobs: function() {
      return this.$store.state.programmerJobs;
    }
  },
  methods: {
    toggleJobsModal: function() {
      this.displayJobsModal = !this.displayJobsModal;
    }
  },
  components: { JobPicker, JobPickerModal }
};
</script>

<style>
ul {
  list-style-type: none;
  margin: 0px;
  padding: 0px;
}
</style>