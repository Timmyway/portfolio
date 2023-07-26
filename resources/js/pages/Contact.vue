<template>
<div class="container mx-auto">
    <section class="mt-4 container mx-auto">
        <h1 class="text-4xl text-center font-bold mb-4">Me contacter</h1>
        <div class="ti-form shadow-lg bg-slate-100 mb-4" v-if="!isSent">            
            <form>
                <MdTextfield
                    label="Prénom *" field="firstname"
                    v-model:value="formStore.form.firstname"
                    :validator="formStore.v$"
                    name="firstname"
                ></MdTextfield>
                <MdTextfield
                    label="Email *" field="email" type="email"
                    v-model:value="formStore.form.email"
                    :validator="formStore.v$"
                    name="email"
                ></MdTextfield>                
                <div class="workspace">                    
                    <div
                        class="workspace__counter text-lg"
                        v-show="formStore.form.msg?.length > 0"
                    >{{ formStore.form.msg.length }} caractères</div>
                    <textarea 
                        class="form-control mb-2" 
                        cols="30" rows="10" v-model="formStore.form.msg"
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
                    :class="[formStore.isOkForSending ? 'btn-success' : 'btn-disabled']"
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

<script setup>
// import useVuelidate from '@vuelidate/core';
import MdTextfield from '../components/MdTextfield.vue';
import axios from 'axios';
import { computed, inject, onMounted, reactive, ref } from 'vue';
import { useFormStore } from '../stores/formStore.js';

const siteURL = inject('$siteURL');
const captchaKey = inject('$googleCaptchaClientKey');
const formStore = useFormStore();

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

async function fetchCaptcha() {
    // Get the captcha math challenge
    const response = await axios.get(siteURL + 'captcha/api/math');
    captcha.value = response.data;
    console.log('====> ', captcha.value)
}

fetchCaptcha();


async function submit() {
    if (!formStore.isReadyForSending) {                
        flashMsg(errors, {'client error': ['Les champs : nom, prénom et email sont requis. Vérifier que votre message comporte au moins 10 caractères. Merci']});
        return;
    }
    isSent.value = false;    
    const payload = {
        firstname: formStore.form.firstname,
        lastname: formStore.form.lastname,
        email: formStore.form.email,
        phone: formStore.form.phone,
        msg: formStore.form.msg,
        city: null,
        zipcode: null,
        captcha: userCaptcha.value,
        key: captcha.value.key
    }    
    try {
        const response = await axios.post(siteURL + 'api/message', payload);        
        if (response.data.response === 'Message saved') {
            isSent.value = true;
            localStorage.setItem('isSent', true);
            // window.location.href = `${this.siteURL}`;
        }
    } catch(err) {
        if(err.response) {                    
            if (err.response.status == 422) {
                isSent.value = false;                        
                errors.data = err.response.data;
                errors.msg = err.response.data.message;
                fetchCaptcha();
            }
        }        
    }
}
</script>