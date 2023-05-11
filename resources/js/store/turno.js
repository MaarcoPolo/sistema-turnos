export default {
    state: {
        turnoGenerado: null,
        turnos:[],
        // obtenerturnos:[]
    },
    getters:{
        getTurnoGenerado(state) {
            return state.turnoGenerado
        },
        getAtencionTurnos(state){
            return state.turnos
        },
        // getObtenerTurnos(state){
        //     return state.obtenerturnos
        // }

    },
    mutations:{
        setTurnoGenerado(state, payload) {
            state.turnoGenerado = payload
        },
        setAtencionTurnos(state, payload){
            state.turnos = payload
        },
        // setObtenerTurnos(state, payload){
        //     state.obtenerturnos = payload
        // }
    }

}