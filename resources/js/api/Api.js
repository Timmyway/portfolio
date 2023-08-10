import axios from 'axios';

var Api = axios.create({
    baseURL: 'https://budgetdevis.com/support/'
});

// Api.defaults.withCredentials = true;

export default Api;