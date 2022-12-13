<template>
<div class="container mx-auto">
    <section class="mt-4 container mx-auto">
        <h1 class="text-4xl p-6 text-center font-bold">Me contacter</h1>
        <div class="ti-form" v-if="!isSent">            
            <form>
                <MdTextfield
                    label="Nom *" field="lastname" type="text"
                    v-model:value="form.lastname"
                    :validator="v$"
                    name="lastname"
                ></MdTextfield>
                <MdTextfield
                    label="Prénom *" field="firstname"
                    v-model:value="form.firstname"
                    :validator="v$"
                    name="firstname"
                ></MdTextfield>
                <MdTextfield
                    label="Email *" field="email" type="email"
                    v-model:value="form.email"
                    :validator="v$"
                    name="email"
                ></MdTextfield>
                <MdTextfield
                    label="Téléphone *" field="phone" type="tel"
                    v-model:value="form.phone"
                    :validator="v$"
                    name="phone"
                ></MdTextfield>
                <div class="workspace">
                    <div class="workspace__counter">{{ form.msg.length }}</div>
                    <textarea 
                        class="form-control mb-2" 
                        cols="30" rows="10" v-model="form.msg"
                        placeholder="Tu peux me laisser un message, je serai ravis de le lire. (5 caractères minimum)"
                        name="msg"
                    ></textarea>
                </div>

                <!-- Google recaptcha -->
                <!-- <div id="recaptcha-container"></div> -->

                <!-- Mew captcha -->
                <div class="flex gap-3 mb-4">
                    <span id="captcha-img">
                        <img :src="captcha.img" alt="">
                    </span>
                    <button 
                        class="px-2 py-1 rounded bg-red-400 hover:bg-red-300"
                        @click.prevent="fetchCaptcha()"
                    >Reload</button>
                </div>
                <div>
                    <input type="text" name="captcha" placeholder="Captcha" v-model="userCaptcha">
                </div>

                <br>
                <button 
                    v-if="!isSent"
                    class="btn bg-blue-600 text-theme hover:bg-blue-700" type="submit" 
                    :class="[isOkForSending ? 'btn-success' : 'btn-disabled']"
                    @click.prevent="submit"
                >Envoyer</button>                
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
        <div v-else class="thanks">
            <p v-if="isSent" class="text-md thanks__msg">
                Merci pour votre message.
            </p>
        </div>    
    </section>
</div>
</template>

<script>
// import useVuelidate from '@vuelidate/core';
import MdTextfield from '../components/MdTextfield.vue';
import useValidation from '../composables/useValidation';
const axios = require('axios');
import { inject, onMounted, reactive, ref } from 'vue';

export default {    
    components: {
        MdTextfield
    },  
    setup() {
        const siteURL = inject('$siteURL');
        const captchaKey = inject('$googleCaptchaClientKey');
        const { v$, form, validationData } = useValidation();

        const errors = reactive({msg: '', data: {}});

        let isSent = ref(localStorage.getItem('isSent') ? localStorage.getItem('isSent') : false);

        const userCaptcha = ref();

        onMounted(() => {
            // grecaptcha.ready(function() {
            //     grecaptcha.render("recaptcha-container", {
            //         "sitekey": captchaKey
            //     });
            // });
        })

        function flashMsg(notif, msg='', timeout=8000) {
            console.log(notif.data);
            notif.data = [];
            notif.data.push(msg);
            setTimeout(() => {
                notif.data = [];
            }, timeout);
        }

        const captcha = ref({
            img: '',
            key: ''
        });

        function fetchCaptcha() {            
            axios.get(siteURL + 'captcha/api/math')
            .then((response) => {
                captcha.value = response.data;
            })
        }

        fetchCaptcha();
        
        return { v$, form, validationData, errors, siteURL, flashMsg, isSent, captchaKey,
            userCaptcha, captcha, fetchCaptcha
        };
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
            this.isSent = false;
            const payload = {
                firstname: this.form.firstname,
                lastname: this.form.lastname,
                email: this.form.email,
                phone: this.form.phone,
                msg: this.form.msg,
                city: null,
                zipcode: null,
                captcha: this.userCaptcha,
                key: this.captcha.key
            }
            axios.post(this.siteURL + 'api/message', payload)
            .then((response) => {
                console.log(response.data);
                if (response.data.response === 'Message saved') {
                    this.isSent = true;
                    localStorage.setItem('isSent', true);
                    // window.location.href = `${this.siteURL}`;
                }
            })
            .catch((err) => {
                if(err.response) {                    
                    if (err.response.status == 422) {
                        this.isSent = false;                        
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