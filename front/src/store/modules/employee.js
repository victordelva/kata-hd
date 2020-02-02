import axios from 'axios';

const employee = {
    namespaced: true,
    state: {
        employees: [],
    },
    mutations: {
        setEmployees (state, data) {
            state.employees = data;
        },
    },
    actions: {
        fetchEmployees (context) {
            return axios.get('http://0.0.0.0:8080/employees').then(function (data) {
                context.commit('setEmployees', data.data.data);
            });
        },
    }
};

export default employee;