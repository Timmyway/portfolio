<template>
<section class="container-fluid">
    <h1 class="text-lg mt-2 d-flex align-items-center">
        <span class="text-white">Outil de conversion</span>
    </h1>    
    <h4>Mode disponibles : ({{ mode }})</h4>
    <select name="" id="" class="form-control" v-model="mode">
        <option value="b64-to-utf8">Conversion Base64 vers UTF-8</option>
        <option value="utf8-to-b64">Conversion UTF-8 vers Base64</option>
        <option value="url-encode">Encodage d'URI souple (A-Z a-z 0-9 ; , / ? : @ & = + $ - _ . ! ~ * ' ( ) #)</option>
        <option value="url-decode">Décodage d'URI souple (A-Z a-z 0-9 ; , / ? : @ & = + $ - _ . ! ~ * ' ( ) #)</option>
        <option value="url-encode-full">Encodage d'URI complète (encode tout)</option>
        <option value="url-decode-full">Décodage d'URI complète (décode tout)</option>
        <option value="html-entities">Encoder/décoder caractères HTML</option>
        <option value="iso-latin-1">Encoder/décoder caractères ISO-8859-1</option>
    </select>
    <div class="command-bar bg-joker command-bar--detached">        
        <div>
            <div class="group" v-show="mode === 'html-entities'">
                <button class="group__item btn btn-sm bg-white text-theme-contrast" @click.prevent="setHTMLEntities('encode')">Encoder caractères HTML</button>
                <button class="group__item btn btn-sm bg-white text-theme-contrast" @click.prevent="setHTMLEntities('decode')">Décoder caractères HTML</button>					
            </div>
            <div class="group" v-show="mode === 'iso-latin-1'">
                <button class="group__item btn btn-sm text-theme-contrast" @click.prevent="setIsolatin">Convertir Iso latin 1 en UTF-8</button>						
            </div>
        </div>        
    </div>	

    <div class="row">
        <div class="col-md-6 col-12 mb-2 workspace">
            <!-- Input your string here -->
            <textarea class="form-control workspace-txt" v-model="msg" :placeholder="helpMsg" maxlength="50000"></textarea>
            <div class="workspace__counter">{{ msgLength }}</div>
        </div>
        <div class="col-md-6 col-12 mb-2 workspace">
            <!-- Get result here -->
            <textarea class="form-control workspace-txt" v-model="result" placeholder="Résultat" ref="area-result"></textarea>
            <button class="btn btn-sm mt-3 btn-icon" @click="copy('area-result')">
                <i class="fas fa-copy "></i>
            </button>
        </div>
    </div>		
</section>
</template>

<script>
export default {
    inject: ['$axios'],
    data() {
        return {
            baseURL: 'tools/',
            msg: '',
            mode: 'b64-to-utf8',
            updatedResult: ''				
        }
    },
    computed: {
        msgLength() {
            return this.msg.length;
        },
        helpMsg() {
            switch (this.mode) {
                case 'utf8-to-b64':
                    return `Conversion d'un texte en UTF-8 vers Base64.
    Utilité: Echapper les accents, espaces et autres caractères spéciaux. 
    "En informatique, base64 est un codage de l'information utilisant 64 caractères, choisis pour être disponibles sur la majorité des systèmes." Wikipedia.

    26 lettres minuscules, 26 lettres majuscules, 10 chiffres (0 à 9), +, /`
                    break;
                case 'b64-to-utf8':
                    return `Conversion d'un texte en Base64 vers UTF-8.
    "UTF-8 (abréviation de l’anglais Universal Character Set Transformation Format1 - 8 bits) est un codage de caractères informatiques conçu pour coder l’ensemble des caractères du « répertoire universel de caractères codés »" Wikipedia.

    Bref, c'est l'ensemble de tous les caractères possibles existant, des caractères japonais ばんかい aux emoji ⚽. Sans l'Unicode, le web serait fade.`
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
        },
        result: {
            get() {
                // Base64 encodage
                if (this.mode === 'utf8-to-b64') {
                    return this.utf8ToB64(this.msg);						
                } else if (this.mode === 'b64-to-utf8') {
                    return this.b64ToUtf8(this.msg);
                // URL encodage
                } else if (this.mode === 'url-encode') {
                    return encodeURI(this.msg)
                } else if (this.mode === 'url-decode') {
                    return decodeURI(this.msg)					
                } else if (this.mode === 'url-encode-full') {
                    return encodeURIComponent(this.msg)
                } else if (this.mode === 'url-decode-full') {
                    return decodeURIComponent(this.msg)
                } else if (this.mode === 'html-entities' || this.mode === 'iso-latin-1') {
                    return this.updatedResult;
                }
            },
            set(newValue) {						
                return newValue;
            }
        }
    },
    methods: {
        setHTMLEntities(encodageMode) {
            console.log('Encode HTML chars');
            if (!this.msg || this.mode !== 'html-entities') {
                console.log('Nothing to encode/decode');
                return;
            }
            this.result = '';
            this.$axios.post('api/hentities', {
                str: this.msg,
                mode: encodageMode
            })
            .then((response) => {						
                this.updatedResult = response.data.response;
                this.result = response.data.response;						
            })
            .catch((error) => {
                console.log(error);
            });
        },
        setIsolatin() {
            if (!this.msg || this.mode !== 'iso-latin-1') {
                console.log('Nothing to encode/decode');
                return;
            }
            this.result = '';
            this.$axios.post('api/isolatin', {
                str: this.msg
            })
            .then((response) => {						
                this.updatedResult = response.data.response;
                this.result = response.data.response;						
            })
            .catch((error) => {
                console.log(error);
            });
        },
        utf8ToB64(str) {
            try {
                return window.btoa(unescape(encodeURIComponent( str )));						
            } catch(err) {
                return ''
            }
            
        },
        b64ToUtf8(str) {
            try {
                return decodeURIComponent(escape(window.atob( str )));
            } catch(err) {
                return
            }					
        },
        copy(ref) {            
            /* Select the text field */
            const copyText = this.$refs[ref];
            if (!copyText.value) {                
                return;
            }
            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/

            /* Copy the text inside the text field */
            document.execCommand("copy");					
        }
    }
}
</script>