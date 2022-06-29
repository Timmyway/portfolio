import useVuelidate from '@vuelidate/core'
import { required, minLength } from '@vuelidate/validators';
import { reactive } from 'vue';

export default function useValidation() {
    const validationData = {
        'civ': {
            rule: (value) => {
                const result = /monsieur|madame/.test(value)
                return result;
            },
            msg: "Sélectionner l'un des boutons ci-dessus"
        },
        'email': {
            rule: (value) => {
                const result = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})+$/.test(value)
                return result;
            },
            msg: "Exemple : monemail@gmail.com"
        },		
        'firstname': {
            rule: (value) => {
                const result = /^[^ 0-9'!"â‚¬#$%&\'()*+,./:;<=>?@[\\\]^_`{|}~'-]{2,}([-'\s][^0-9'!"â‚¬#$%&\'()*+,./:;<=>?@[\\\]^_`{|}~'-]+){0,5}$/.test(value)
                return result && value !== null;
            },
            msg: "Votre prénom sans chiffre ou symbole"        
        },
        'lastname': {
            rule: (value) => {
                const result = /^[^ 0-9'!"#$%&\'()*+,./:;<=>?@[\\\]^_`{|}~'-]{2,}([-'\s][^0-9'!"#$%&\'()*+,./:;<=>?@[\\\]^_`{|}~'-]+){0,5}$/.test(value)
                return result && value !== null;
            },
            msg: "Votre nom sans chiffre ou symbole"        
        },
        'phone': {
            rule: (value) => {
                const result = /^(00261|^\+261|^0)+\s?(32|34|33|38)+\s?[0-9]{2}\s?[0-9]{3}\s?[0-9]{2}$/.test(value)
                return result;
            },
            msg: "Exemple : 0341234567 ou +261 38 12 345 67 ou 033 12 345 67"
        },
        'zipcode': {
            rule: (value) => {
                const result = /^(?:[0-8]\d|9[0-9])\d{3},?/.test(value)
                return result;
            },        
            msg: "Exemple de format accepté: 31001"
        },
        'address': {
            rule: (value) => {
                const result = /.{4,}/.test(value)
                return result;
            },
            msg: "Exemple: 12 Rue de la Liberté"
        },
        'city': {
            rule: (value) => {
                const result = /monsieur|madame/.test(value)
                return result;
            },
            msg: "Exemple: Marseille"
        },
        'age': {
            rule: (value) => {
                const result = /^(18|19|[2-9][0-9])$/.test(value)
                return result;
            },
            msg: "Veuillez renseigner votre age (Vous devez être majeur pour continuer)"
        }        
    }

    const form = reactive({
        civ: '',
        firstname: '',
        lastname: '',
        zipcode: '',
        phone: '',
        email: '',
        address: '',
        city: '',
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

    return { v$, form, validationData }
}