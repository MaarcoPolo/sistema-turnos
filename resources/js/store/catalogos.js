export default{
    store: {
        tiposTurnos: [],
        casasJusticia:[],
        ventanillas:[],
        tipoUsuarios:[]
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
        getTipoUsuarios(state) {
            return state.tipoUsuarios
        },
    },
    mutations:{
        setCatalogoTiposTurnos(state, payload) {
            state.tiposTurnos = payload
        },
        setCasasJusticia(state, payload) {
            state.casasJusticia = payload
        },
        setVentanillasDisponibles(state, payload) {
            state.ventanillas = payload
        },
        setTipoUsuarios(state, payload) {
            state.tipoUsuarios = payload
        },
    }
}