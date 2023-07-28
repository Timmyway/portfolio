import { ref } from "vue";

export default function useCopy(copyText) {    

    function copy() {
        console.log('=========> Copy now', copyText.value)
        if (!copyText.value) {
            return;
        }
        copyText.value.select();
        copyText.value.setSelectionRange(0, 99999); /*For mobile devices*/
    
        /* Copy the text inside the text field */
        document.execCommand("copy");
    }    

    return { copy }
}