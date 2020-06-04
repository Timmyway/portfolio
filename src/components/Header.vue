<template>    
    <div class="header">
        <div class="row">            
            <div v-if="showNav" class="sidenav col-sm-3">
                <ul :class="['nav', typeof color === undefined || color != '' ? color : 'primary']">
                    <li class="nav-item">
                        <i class="fas fa-home"></i>
                        <router-link class="nav-item__link" to="/">Accueil</router-link>
                    </li>
                    <li class="nav-item">
                        <i class="fas fa-address-card"></i>
                        <router-link class="nav-item__link" to="/aboutme">A propos de moi</router-link>
                    </li>
                    <li class="nav-item">
                        <i class="fas fa-address-book"></i>
                        <router-link class="nav-item__link" to="/cv">CV</router-link>
                    </li>
                </ul>
            </div>
            <div class="col-sm-1">
                <button class="header-menu__button" @click="showNav = !showNav">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['color'],
    data() {
        return {
            showNav: false
        }
    }
}
</script>

<style lang="scss">     
    .nav {
        display: flex;
        flex-flow: column wrap;
        justify-content: center;
        padding: 0; margin: 0;        
        font-size: 1.2rem;
        .nav-item {
            display: flex;
            flex-direction: column;
            margin: 0px;
            padding: 0px;            
            color: whitesmoke;
            list-style: none;
            margin: 0.3rem 1rem;
            &:hover {
                background: lighten(#333333, 15%);                
            }
            .nav-item__link {                
                text-decoration: none;
                color: whitesmoke;
                padding: 0.3rem;
                border-radius: 4px;                
            }
        }
    }

    .header-menu__button {
        position: absolute;
    }

    @media (min-width:480px) {
        .nav {
            flex-flow: row nowrap;
        }
    }
</style>