export default {
    state: {
        turnoGenerado: null,
        turnos:[],
        turnosPantalla:[],
        // obtenerturnos:[]
    },
    getters:{
        getTurnoGenerado(state) {
            return state.turnoGenerado
        },
        getAtencionTurnos(state){
            return state.turnos
        },
        getTurnosPantalla(state){
            return state.turnosPantalla
        }

    },
    mutations:{
        setTurnoGenerado(state, payload) {
            state.turnoGenerado = payload
        },
        setAtencionTurnos(state, payload){
            state.turnos = payload
        },
        setTurnosPantalla(state, payload){
            state.turnosPantalla = payload
        }
    }

}