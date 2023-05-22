export default{
    store: {
        tiposTurnos: [],
        casasJusticia:[]
    },
    getters:{
        getCatalogoTiposTurnos(state) {
            return state.tiposTurnos
        },
        getCasasJusticia(state) {
            return state.casasJusticia
        },
    },
    mutations:{
        setCatalogoTiposTurnos(state, payload) {
            state.tiposTurnos = payload
        },
        setCasasJusticia(state, payload) {
            state.casasJusticia = payload
        },
    }
}