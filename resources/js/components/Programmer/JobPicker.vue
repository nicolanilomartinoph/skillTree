<template>
  <div class="row">
    <button v-on:click="showJobs" class="col-11 mx-auto">JOBS</button>
    <select class="col-11 mx-auto" v-if="displayJobs" size="5" v-model="selectedJobs" multiple>
      <option v-for="job in jobNamesAndID" :key="job.id">{{job['job name']}}</option>
    </select>
  </div>
</template>

<script>
export default {
  data() {
    return {
      displayJobs: false,
      availableJobs: this.$store.getters.jobNamesAndID,
      selectedJobs: ""
    };
  },
  computed: {
    jobNamesAndID: function() {
      return this.$store.getters.jobNamesAndID;
    }
  },
  methods: {
    showJobs: function() {
      this.displayJobs = !this.displayJobs;
      // inquire database for available jobs

      if (this.$store.state.availableJobsDetails.length === 0) {
        axios
          .get("/showJobs")
          .then(response => {
            this.$store.dispatch("set_availableJobsDetails", response.data);
          })
          .catch(error => {
            console.log(error);
          });
      }
    }
  }
};
</script>