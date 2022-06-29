<template>
<div class="container-fluid">
    <section class="mt-4 container-xxl">
        <h4 class="text-lg text-center">Contact me</h4>
        <div class="ti-form">            
            <form>
                <MdTextfield
                    label="Lastname *" field="lastname" type="text"
                    v-model:value="form.lastname"
                    :validator="v$"
                ></MdTextfield>
                <MdTextfield
                    label="Firstname *" field="firstname"
                    v-model:value="form.firstname"
                    :validator="v$"                    
                ></MdTextfield>
                <MdTextfield
                    label="Email *" field="email" type="email"
                    v-model:value="form.email"
                    :validator="v$"                    
                ></MdTextfield>
                <MdTextfield
                    label="Phone" field="phone" type="tel"
                    v-model:value="form.phone"
                    :validator="v$"                    
                ></MdTextfield>
                <div class="workspace">
                    <div class="workspace__counter">{{ form.msg.length }}</div>
                    <textarea 
                        class="form-control mb-2" 
                        cols="30" rows="10" v-model="form.msg"
                        placeholder="Tu peux me laisser un message, je serai ravis de le lire. (5 caractères minimum)"
                    ></textarea>
                </div>
                <div class="g-recaptcha" data-sitekey="6LdToqwgAAAAADVrh7JOmD8qjh-B4SmA856ZW-dm"></div>
                <br>
                <button class="btn" :class="[isOkForSending ? 'btn-success' : 'btn-disabled']" @click.prevent="submit">Contacter</button>
                <br>

                <!-- Error messages from backend -->
                <div class="mt-2">                    
                    <div
                        v-for="(error, index) in errors.data" :key="`error-${index}-${error}`"                        
                    >
                        <template v-if="typeof error === 'object'">
                            <div 
                                v-for="(msg, field) in error" :key="`error-child-${index}-${field}`"
                                class="badge bg-danger text-theme mb-1"
                            >
                                <div class="badge__icon">
                                    <i class="fa fa-times"></i>
                                </div>
                                <span class="badge__text">
                                    {{ (Array.isArray(msg)) ? msg[0] : msg }}
                                </span>
                            </div>
                        </template>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
</template>

<script>
// import useVuelidate from '@vuelidate/core';
import MdTextfield from '../components/MdTextfield.vue';
import useValidation from '../composables/useValidation';
const axios = require('axios');
import { inject, reactive } from 'vue';

export default {    
    components: {
        MdTextfield
    },  
    setup() {
        const siteURL = inject('$siteURL');
        const { v$, form, validationData } = useValidation();

        const errors = reactive({msg: '', data: {}});

        function flashMsg(notif, msg='', timeout=8000) {
            console.log(notif.data);
            notif.data = [];
            notif.data.push(msg);
            setTimeout(() => {
                notif.data = [];
            }, timeout);
        }
        
        return { v$, form, validationData, errors, siteURL, flashMsg };
    },
    computed: {
        isOkForSending() {            
            if (this.v$.firstname.validFirstname.$invalid || this.v$.lastname.validLastname.$invalid
                || this.v$.email.validEmail.$invalid || this.v$.msg.$invalid
            ) {
                console.log('Client validation fails');
                return false;
            }
            return true;
        }
    },
    methods: {        
        submit() {
            if (!this.isOkForSending) {                
                this.flashMsg(this.errors, {'client error': ['Les champs : nom, prénom et email sont requis. Vérifier que votre message comporte au moins 10 caractères. Merci']});
                return;
            }
            const payload = {
                firstname: this.form.firstname,
                lastname: this.form.lastname,
                email: this.form.email,
                phone: this.form.phone,
                msg: this.form.msg,
                city: null,
                zipcode: null

            }
            axios.post(this.siteURL + 'api/message', payload)
            .then((response) => {
                console.log(response.data);
            })
            .catch((err) => {
                if(err.response) {                    
                    if (err.response.status == 422) {
                        this.errors.data = err.response.data;
                        this.errors.msg = err.response.data.message;                        
                    }
                }                
            })        
        }
    }    
}
</script>

<style>

</style>