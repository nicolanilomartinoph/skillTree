<template>
  <div class="container">
    <div class="row">
      <ProgrammerDetails :testProp="testdata"></ProgrammerDetails>
      <ProgrammerAvatar></ProgrammerAvatar>
      <ProgrammerSkills></ProgrammerSkills>
    </div>
  </div>
</template>


<script>
/*
Programmer  component

- is only a container for child components
- initializes the state with the user's details upon mount which is
  needed by child components as seen in set_details method.
*/

import ProgrammerDetails from "./ProgrammerDetails.vue";
import ProgrammerAvatar from "./ProgrammerAvatar.vue";
import ProgrammerSkills from "./ProgrammerSkills.vue";

export default {
  data() {
    return {
      testdata: "testData"
    };
  },
  components: {
    ProgrammerDetails,
    ProgrammerAvatar,
    ProgrammerSkills
  },
  methods: {
    set_details: function() {
      //Prepare the obj to commit
      axios.get("/programmerDetails").then(response => {
        let keys = Object.keys(response.data).length;
        let jobsAsString = { name: response.data.name, jobs: [] };

        //Push job name to array  if true
        for (let x = 1; x < keys; x++) {
          response.data[Object.keys(response.data)[x]]
            ? jobsAsString.jobs.push(Object.keys(response.data)[x])
            : null;
        }

        this.$store.commit("set_details", jobsAsString);
      });
    }
  },
  created: function() {
    this.set_details();
  },
  beforeUpdate: function() {
    this.set_details();
  },
  updated: function() {
    this.set_details();
  }
};
</script>

