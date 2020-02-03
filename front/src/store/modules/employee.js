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
        editEmployee (state, item) {
            /*eslint-disable */
            state.employees[item.id] = item;
        },
        addEmployee (state, item) {
            state.employees.push(item);
        },
        deleteEmployee (state, item) {
            const index = state.employees.indexOf(item);
            state.employees.splice(index, 1);
        },
    },
    actions: {
        fetchEmployees (context) {
            return axios.get('http://0.0.0.0:8080/employees').then(function (data) {
                context.commit('setEmployees', Object.values(data.data.data));
            });
        },
        addEmployee (context, data) {
            context.commit('addEmployee', data);
            return axios.post('http://0.0.0.0:8080/employees', data).then(function () {
            });
        },
        editEmployee (context, item) {
            context.commit('editEmployee', item);
            return axios.put('http://0.0.0.0:8080/employees/'+item.id, item).then(function () {
            });
        },
        deleteEmployee (context, item) {
            context.commit('deleteEmployee', item);

            return axios.delete('http://0.0.0.0:8080/employees/'+item.id).then(function () {
            });
        },
    }
};

export default employee;