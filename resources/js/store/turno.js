export default {
    state: {
        turnoGenerado: null,
    },
    getters:{
        getTurnoGenerado(state) {
            return state.turnoGenerado
        }

    },mutations:{
        setTurnoGenerado(state, payload) {
            state.turnoGenerado = payload
        }
    }

}