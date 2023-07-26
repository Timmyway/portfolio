
import { required } from "@vuelidate/validators";
import { defineStore } from "pinia";
import { computed, reactive } from "vue";
import { validationData } from '../stateless/validationData.js';
import useVuelidate from '@vuelidate/core';
import { minLength } from '@vuelidate/validators';

export const useFormStore = defineStore('multistep', () => {
    const form = reactive({        
        firstname: '',
        lastname: '',        
        phone: '',
        email: '',                
        msg: ''
    });

    const rules = {
        civ: {
            required: required,
            validCiv: validationData.civ.rule
        },
        age: {
            required: required,
            validAge: validationData.age.rule
        },
        firstname: {
            required: required,
            validFirstname: validationData.firstname.rule
        },
        lastname: {
            required: required,
            validLastname: validationData.lastname.rule
        },
        zipcode: {
            required: required,
            validZipcode: validationData.zipcode.rule
        },
        email: {
            required: required,
            validEmail: validationData.email.rule
        },
        phone: {            
            validPhone: validationData.phone.rule
        },
        address: {            
            validAddress: validationData.address.rule
        },
        city: {
            required: required,
        },
        msg: {
            required,
            minLength: minLength(5)
        }
    }    

    const v$ = useVuelidate(rules, form);    

    const isReadyForSending = computed(() => {
        if (!v$.value.firstname.validFirstname.$invalid && 
            !v$.value.email.validEmail.$invalid &&
            form.msg          
        ) {
            return true;
        }
        return false;
    });

    return { form, validationData, v$, isReadyForSending }
  })