<template>
    <div :style="btnStyles" class="m-auto custom-boton-catalogo">
        <div>
            <img class="m-auto" :style="imgStyles" :src="'../../../icons/'+nombre_icon" alt="">
        </div>
        <p class="mt-2 custom-text-boton-catalogo">{{nombre_catalogo}}</p>
    </div>
</template>

<script>
    export default {
        name: 'boton-catalogo',
        props: {
            nombre_icon: {
                type: String,
                required: true
            },
            nombre_catalogo: {
                type: String,
                required: true,
            },
            height: {
                type: String,
                default: 5,
            },
            width: {
                type: String,
                default: 5,
            },
            heightBtn: {
                type: String,
                default: 12,
            },
            widthBtn: {
                type: String,
                default: 12,
            },
        },
        computed: {
            imgStyles() {
                return {
                    "height": `${this.height}rem`,
                    "width": `${this.width}rem`,
                }
            },
            btnStyles() {
                return {
                    "height": `${this.heightBtn}rem`,
                    "width": `${this.widthBtn}rem`,
                }
            },
        }
    }
</script>

<style scoped>
.custom-text-boton-catalogo {
    text-transform: uppercase;
    font-weight: 500;
}

.custom-boton-catalogo {
    background-color: #fafbfd;
    border-bottom: 1px solid #C6C5C7;
    cursor: pointer;
    transition: .3s all ease-in-out;
}

.custom-boton-catalogo:hover {
    transform: scale(1.1);
}
</style>