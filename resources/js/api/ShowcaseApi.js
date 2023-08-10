import Api from "../api/Api";

export default {
    async getLandingpages() {
        try {
            return await Api.get('api/lp-full');
        } catch(error) {
            throw error;
        }
    },
    apiUrl: Api.defaults.baseURL
}