<template>
    <section class="p-4">
        <h4 class="mb-2 text-lg">Mode disponibles :</h4>
        <select class="wt-conversion-tool__select" v-model="mode">
            <option value="b64-to-utf8">Conversion de Base64 vers UTF-8</option>
            <option value="utf8-to-b64">Conversion d'UTF-8 vers Base64</option>
            <option value="url-encode">Encodage d'URI souple (A-Z a-z 0-9 ; , / ? : @ & = + $ - _ . ! ~ * ' ( ) #)</option>
            <option value="url-decode">Décodage d'URI souple (A-Z a-z 0-9 ; , / ? : @ & = + $ - _ . ! ~ * ' ( ) #)</option>
            <option value="url-encode-full">Encodage d'URI complet (encode tout)</option>
            <option value="url-decode-full">Décodage d'URI complet (décode tout)</option>
            <option value="html-entities">Encodage/décodage de caractères HTML</option>
            <option value="iso-latin-1">Encodage/décodage de caractères ISO-8859-1</option>
        </select>
        <div class="command-bar bg-slate-100 command-bar--detached">
            <div>
                <div class="group" v-show="mode === 'html-entities'">
                    <button class="group__item btn btn-sm bg-yellow-200 text-theme-contrast" @click.prevent="setHTMLEntities('encode')">Encoder caractères HTML</button>
                    <button class="group__item btn btn-sm bg-blue-200 text-theme-contrast" @click.prevent="setHTMLEntities('decode')">Décoder caractères HTML</button>
                </div>
                <div class="group" v-show="mode === 'iso-latin-1'">
                    <button class="group__item btn btn-sm bg-yellow-200 text-theme-contrast" @click.prevent="setIsolatin">Convertir Iso latin 1 en UTF-8</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-12 mb-2 workspace">
                <!-- Input your string here -->
                <textarea
                    class="form-control workspace-txt"
                    v-model="msg"
                    :placeholder="helpMsg"
                    maxlength="50000"
                ></textarea>
                <div class="workspace__counter">{{ msgLength }}</div>
            </div>
            <div class="col-md-6 col-12 mb-2 workspace">
                <!-- Get result here -->
                <textarea
                    ref="areaResult"
                    class="form-control workspace-txt"
                    v-model="result"
                    placeholder="Résultat"
                    readonly
                ></textarea>
                <button class="btn btn-sm mt-3 btn-icon" @click="copy">
                    <i class="fas fa-copy"></i>
                </button>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, inject, computed } from 'vue';
import useCopy from '../composables/useCopy';

const axios = inject('$axios');
// Data
const baseURL = ref('tools/');
const msg = ref('');
const mode = ref('b64-to-utf8');
const updatedResult = ref('');
const areaResult = ref();

// Computed
const msgLength = computed(() => {
    return msg.value.length;
});

const helpMsg = computed(() => {
    switch (mode.value) {
        case 'utf8-to-b64':
            return `Conversion d'un texte en UTF-8 vers Base64.
Utilité: Echapper les accents, espaces et autres caractères spéciaux.
"En informatique, base64 est un codage de l'information utilisant 64 caractères, choisis pour être disponibles sur la majorité des systèmes." Wikipedia.

26 lettres minuscules, 26 lettres majuscules, 10 chiffres (0 à 9), +, /`
            break;
        case 'b64-to-utf8':
            return `Conversion d'un texte en Base64 vers UTF-8.
"UTF-8 (abréviation de l’anglais Universal Character Set Transformation Format1 - 8 bits) est un codage de caractères informatiques conçu pour coder l’ensemble des caractères du « répertoire universel de caractères codés »" Wikipedia.

Bref, c'est l'ensemble de tous les caractères possibles existant, des caractères japonais ばんかい aux emoji ⚽.`
        case 'url-encode':
            return "Si en entrée on a: https://mozilla.org/?x=шеллы, on peut s'attendre en sortie à quelque chose comme cela: https://mozilla.org/?x=%D1%88%D0%B5%D0%BB%D0%BB%D1%8B";
            break;
        case 'url-encode-full':
            return `Si en entrée on a: https://mozilla.org/?x=шеллы, on peut s'attendre en sortie à quelque chose comme cela: https%3A%2F%2Fmozilla.org%2F%3Fx%3D%D1%88%D0%B5%D0%BB%D0%BB%D1%8B.

Remarque: Même les ":", "/" et même le "?" ont été convertis.`
        case 'html-entities':
            return "Convertit les entités HTML à leurs caractères correspondant et vis versa";
            break;
        case 'iso-latin-1':
            return `"La norme ISO 8859-1, dont le nom complet est ISO/CEI 8859-1, et qui est souvent appelée Latin-1 ou Europe occidentale, forme la première partie de la norme internationale ISO/CEI 8859, qui est une norme de l’Organisation internationale de normalisation pour le codage des caractères en informatique." Wikipedia`;
            break;
        default:
            return 'Entrer le texte à encoder ici';
            break;
    }
});

const result = computed({
    get() {
        // Base64 encodage
        if (mode.value === 'utf8-to-b64') {
            return utf8ToB64(msg.value);
        } else if (mode.value === 'b64-to-utf8') {
            return b64ToUtf8(msg.value);
        // URL encodage
        } else if (mode.value === 'url-encode') {
            return encodeURI(msg.value)
        } else if (mode.value === 'url-decode') {
            return decodeURI(msg.value)
        } else if (mode.value === 'url-encode-full') {
            return encodeURIComponent(msg.value)
        } else if (mode.value === 'url-decode-full') {
            return decodeURIComponent(msg.value)
        } else if (mode.value === 'html-entities' || mode.value === 'iso-latin-1') {
            return updatedResult.value;
        }
    },
    set(newValue) {
        return newValue;
    }
});

// Methods
function setHTMLEntities(encodageMode) {
    console.log('Encode HTML chars');
    if (!msg.value || mode.value !== 'html-entities') {
        console.log('Nothing to encode/decode');
        return;
    }
    result.value = '';
    axios.post('api/hentities', {
        str: msg.value,
        mode: encodageMode
    })
    .then((response) => {
        updatedResult.value = response.data.response;
        result.value = response.data.response;
    })
    .catch((error) => {
        console.log(error);
    });
}

function setIsolatin() {
    if (!msg.value || mode.value !== 'iso-latin-1') {
        console.log('Nothing to encode/decode');
        return;
    }
    result.value = '';
    axios.post('api/isolatin', {
        str: msg.value
    })
    .then((response) => {
        updatedResult.value = response.data.response;
        this.result = response.data.response;
    })
    .catch((error) => {
        console.log(error);
    });
}

function utf8ToB64(str) {
    try {
        return window.btoa(unescape(encodeURIComponent( str )));
    } catch(err) {
        return ''
    }

}

function b64ToUtf8(str) {
    try {
        return decodeURIComponent(escape(window.atob( str )));
    } catch(err) {
        return
    }
}

const { copy } = useCopy(areaResult);
</script>

<style scoped lang="scss">
.command-bar {
	display: flex;
	flex-direction: row;
	align-items: flex-start;
	&--detached {margin: 10px 0;}
	.group {
		display: flex;
		flex-direction: row;
		align-items: flex-start;
		flex-wrap: wrap;
		justify-content: space-evenly;
		padding: 5px 15px;
	}
	.group__item {margin-bottom: 3px; margin-top: 3px;}
	.group__item:not(:first-child) {margin-left: 3px;}
	.group__item:not(:last-child) {margin-right: 3px}
}

/* Workspace */
.workspace {
	position: relative;
	button {
		position: absolute;
		top: 0; right: 3%;
		i {color: #040926;}
		outline: none;
	}
	.workspace-txt {
		height: 320px;
		max-height: 640px;
	}
	&__counter {
		position: absolute;
		top: -10%; right: 0;
		background-color: rgba(#111111, .5);
		color: white;
		padding: 0.3rem 0.7rem;
		text-align: center;
		border-radius: 4px;
		font-size: 1.2rem;
		font-weight: bold;
		z-index: 99;
	}
}

.wt-conversion-tool__select option:nth-child(-n+2) {
    background-color: rgb(217 249 157);
}
.wt-conversion-tool__select option:nth-child(3),
.wt-conversion-tool__select option:nth-child(4) {
    background-color: rgb(199 210 254);
}
.wt-conversion-tool__select option:nth-child(5),
.wt-conversion-tool__select option:nth-child(6) {
    background-color: rgb(245 208 254);
}
.wt-conversion-tool__select option:nth-child(7),
.wt-conversion-tool__select option:nth-child(8) {
    background-color: rgb(254 215 170);
}

.wt-conversion-tool__select {
    padding: 10px 10px;
}
</style>
