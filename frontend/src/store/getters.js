export default {
    isLoggedIn: state => !!state.token,
    dataProfileUser: state => state.user,
    responseStatus: state => state.status,
    getToken: state => state.token,
    getTemporary:state => state.temporaryData,
}
