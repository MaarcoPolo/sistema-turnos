export default{
    store: {
        tiposTurnos: [],
        casasJusticia:[],
        ventanillas:[]
    },
    getters:{
        getCatalogoTiposTurnos(state) {
            return state.tiposTurnos
        },
        getCasasJusticia(state) {
            return state.casasJusticia
        },
        getVentanillasDisponibles(state) {
            return state.ventanillas
        },
    },
    mutations:{
        setCatalogoTiposTurnos(state, payload) {
            state.tiposTurnos = payload
        },
        setCasasJusticia(state, payload) {
            state.casasJusticia = payload
        },
        getVentanillasDisponibles(state, payload) {
            state.ventanillas = payload
        },
    }
}