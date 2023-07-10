import dayjs from "dayjs";

const validationData = {
    'civ': {
        rule: (value) => {
            const result = /monsieur|madame|mr|mme/.test(value)
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
            const result = /^(00261|^\+261|^0)+\s?(32|34|33|38)+\s?[0-9]{2}\s?[0-9]{3}\s?[0-9]{2}$/.test(value);
            return result;
        },
        msg: "Exemple : 0123456789 ou 01 23 45 67 89 ou 00 33 1 23 45 67 89 ou +33123456789"
    },
    'zipcode': {
        rule: (value) => {
            const result = /^(?:[0-8]\d|9[0-9])\d{3},?.*/.test(value)
            return result;
        },        
        msg: "Exemple de format accepté: 31001"
    },
    'cityzipcode': {
        rule: (value) => {
            const result = /^(?:[0-8]\d|9[0-9])\d{3}$|^(?:[0-8]\d|9[0-9])\d{3}(?=,).*/.test(value)
            return result;
        },
        msg: "Code postal et ville. Exemple: 75001, Paris"
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
            const result = /^[^ 0-9'!"â‚¬#$%&\'()*+,./:;<=>?@[\\\]^_`{|}~'-]{2,}([-'\s][^0-9'!"â‚¬#$%&\'()*+,./:;<=>?@[\\\]^_`{|}~'-]+){0,5}$/.test(value)
            return result && value !== null;
        },
        msg: "Exemple: Marseille"
    },
    'age': {
        rule: (value) => {
            const result = /^(18|19|[2-9][0-9])$/.test(value)
            return result;
        },
        msg: "Veuillez renseigner votre age (Vous devez être majeur pour continuer)"
    },
    'siret': {
        rule: (value) => {
            const result = /^\d{3} ?\d{3} ?\d{3} ?\d{5}$/.test(value)
            return result;
        },
        msg: "Numéro de Siret au format (14 chiffres) suivant : 12345678912345"
    },
    'date': {
        rule: (value) => {
            const date = dayjs(value);
            return date.isValid();
        }
    },
    'birthYearAndAdult': {
        rule: (value) => {
            const result = /^(19|20)[0-9]{2}$/.test(value);
            const currentYear = dayjs().year();            
            const userAge = (currentYear - parseInt(value))
            const limit = ( (userAge > 17) && (userAge < 120) );
            console.log('Limit: ', limit, userAge);
            return limit;                        
        },
        msg: "Année de naissance. Ex: 1960"
    },
    'birthDate': {
        rule: (value) => {
            console.log('Value: -------->', value);
            const result = /[1-2][0-9]{3}-?[0-9]{2}-?[0-9]{2}/.test(value);
            const ageInYears = dayjs().diff(value, 'year');
            console.log('Age in years: ', ageInYears);
            return (ageInYears >= 25) && result;
        },
        msg: "Veuillez renseigner votre date de naissance"
    }
}

export { validationData };