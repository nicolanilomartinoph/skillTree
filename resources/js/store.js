import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

var store = new Vuex.Store({
    state: {
        name: "state data",
        programmerJobs: [],
        availableJobsDetails: []

    },
    getters: {
        jobNames: state => {
            let jobNames = []
            for (let job of state.availableJobsDetails) {
                jobNames.push(job['job name']);
            }
            return jobNames;
        },
        jobNamesAndID: (state) => {
            let jobNamesAndID = []
            for (let job of state.availableJobsDetails) {
                let obj = {}
                obj.id = job.id
                obj['job name'] = job['job name']
                jobNamesAndID.push(obj);
            }
            return jobNamesAndID;
        }
    },
    mutations: {
        set_details(state, p) {
            state.name = p.name;
            state.programmerJobs = p.jobs;
        },
        set_availableJobsDetails(state, p) {
            for (let payload of p) {
                state.availableJobsDetails.push(payload)
            }
        }
    },
    actions: {
        set_availableJobsDetails({ commit }, p) {

            commit('set_availableJobsDetails', p)
        }
    }
})

export default store;   