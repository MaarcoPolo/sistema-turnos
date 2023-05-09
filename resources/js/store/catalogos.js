export default{
    store: {
        tiposTurnos: []
    },
    getters:{
        getCatalogoTiposTurnos(state) {
            return state.tiposTurnos
        },
    },
    mutations:{
        setCatalogoTiposTurnos(state, payload) {
            state.tiposTurnos = payload
        },
    }
}