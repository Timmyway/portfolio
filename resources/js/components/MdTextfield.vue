<template>
<div 
    :class="[(!validator[field]['valid' + $capitalize(field)].$invalid ? 'is-valid' : 'is-not-valid'), !validator[field].$dirty ? 'is-clean' : '']"
>
    <div class="m-form-group">
        <input
            type="text" 
            class="m-form-control"
            :name="name"
            :class="[value ? 'has-value' : '']"
            v-model="value"
            @keyup="$emit('update:value', value)"
            @input="validator[field].$touch"
        >
        <label>{{ label }}</label>
        <transition 
            enter-active-class="animate__animated animate__flipInX" 
            leave-active-class="animate__animated animate__flipOutX"
        >
            <div class="error-msg" v-if="(validator[field]['valid' + $capitalize(field)].$invalid && validator[field].$dirty)">
                <span class="error-msg__text">{{ validationData[field].msg }}</span>
            </div>
        </transition>
    </div>
</div>
</template>

<script>
import { ref } from '@vue/runtime-core';
import { validationData } from '../stateless/validationData';

export default {
    name: 'MdTextfield',
    inject: ['$capitalize'],    
    props: {
        name: {
            type: String
        },
        field: {
            type: String
        },
        label: {
            type: String
        },
        type: {
            type: String,
            default: 'text'
        },
        validator: {
            type: Object
        }
    },
    setup(props) {        
        let value = ref('');                

        return { validationData, value }
    }
}
</script>

<style>

</style>